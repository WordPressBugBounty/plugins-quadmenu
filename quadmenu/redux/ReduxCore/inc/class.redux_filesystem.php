<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'ReduxLegacy_Filesystem' ) ) {
	class ReduxLegacy_Filesystem {

		/**
		 * Instance of this class.
		 *
		 * @since    1.0.0
		 * @var      object
		 */
		protected static $instance = null;

		protected static $direct = null;

		private $creds = array();

		public $fs_object = null;

		public $parent = null;

		/**
		 * Return an instance of this class.
		 *
		 * @since     1.0.0
		 * @return    object    A single instance of this class.
		 */
		public static function get_instance( $parent = null ) {

			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self();
			}

			if ( $parent !== null ) {
				self::$instance->parent = $parent;
			}

			return self::$instance;
		}

		public function ftp_form() {
			if ( isset( $this->parent->ftp_form ) && ! empty( $this->parent->ftp_form ) ) {
				echo '<div class="wrap"><div class="error"><p>';
				echo '<strong>' . __( 'File Permission Issues', 'redux-framework' ) . '</strong><br/>' . sprintf( __( 'We were unable to modify required files. Please ensure that <code>%1$1s</code> has the proper read-write permissions, or modify your wp-config.php file to contain your FTP login credentials as <a href="%2$2s" target="_blank">outlined here</a>.', 'redux-framework' ), ReduxLegacy_Helpers::cleanFilePath( trailingslashit( WP_CONTENT_DIR ) ) . '/uploads/', 'https://codex.wordpress.org/Editing_wp-config.php#WordPress_Upgrade_Constants' );
				echo '</p></div><h2></h2>' . '</div>';
			}
		}

		function filesystem_init( $form_url, $method = '', $context = false, $fields = null ) {
			global $wp_filesystem;

			if ( ! empty( $this->creds ) ) {
				return true;
			}

			ob_start();

			/* first attempt to get credentials */
			if ( false === ( $this->creds = request_filesystem_credentials( $form_url, $method, false, $context ) ) ) {
				$this->creds            = array();
				$this->parent->ftp_form = ob_get_contents();
				ob_end_clean();

				/**
				 * if we comes here - we don't have credentials
				 * so the request for them is displaying
				 * no need for further processing
				 */

				return false;
			}

			/* now we got some credentials - try to use them*/
			if ( ! WP_Filesystem( $this->creds ) ) {
				$this->creds = array();
				/* incorrect connection data - ask for credentials again, now with error message */
				request_filesystem_credentials( $form_url, '', true, $context );
				$this->parent->ftp_form = ob_get_contents();
				ob_end_clean();

				return false;
			}

			return true;
		}

		public static function load_direct() {
			if ( self::$direct === null ) {
				require_once ABSPATH . '/wp-admin/includes/class-wp-filesystem-base.php';
				require_once ABSPATH . '/wp-admin/includes/class-wp-filesystem-direct.php';
				self::$direct = new WP_Filesystem_Direct( array() );
			}
		}

		public function execute( $action, $file = '', $params = '' ) {

			if ( empty( $this->parent->args ) ) {
				return;
			}

			if ( ! empty( $params ) ) {
				extract( $params );
			}

			// Setup the filesystem with creds
			require_once ABSPATH . '/wp-admin/includes/template.php';
			require_once ABSPATH . '/wp-includes/pluggable.php';
			require_once ABSPATH . '/wp-admin/includes/file.php';

			if ( $this->parent->args['menu_type'] == 'submenu' ) {
				$page_parent = $this->parent->args['page_parent'];
				$base        = $page_parent . '?page=' . $this->parent->args['page_slug'];
			} else {
				$base = 'admin.php?page=' . $this->parent->args['page_slug'];
			}

			$url = wp_nonce_url( $base, 'redux-options' );

			$this->filesystem_init( $url, 'direct', dirname( $file ) );

			if ( ! file_exists( ReduxFrameworkLegacy::$_upload_dir ) ) {
				$this->do_action( 'mkdir', ReduxFrameworkLegacy::$_upload_dir );
			}

			$hash_path = trailingslashit( ReduxFrameworkLegacy::$_upload_dir ) . 'hash';
			if ( ! file_exists( $hash_path ) ) {
				$this->do_action(
					'put_contents',
					$hash_path,
					array(
						'content' => md5( network_site_url() . '-' . $_SERVER['REMOTE_ADDR'] ),
					)
				);
			}
			$version_path = trailingslashit( ReduxFrameworkLegacy::$_upload_dir ) . 'version';
			if ( ! file_exists( $version_path ) ) {
				$this->do_action(
					'put_contents',
					$version_path,
					array(
						'content' => ReduxFrameworkLegacy::$_version,
					)
				);
			}

			$index_path = trailingslashit( ReduxFrameworkLegacy::$_upload_dir ) . 'index.php';
			if ( ! file_exists( $index_path ) ) {
				$this->do_action(
					'put_contents',
					$index_path,
					array(
						'content' => '<?php' . PHP_EOL . '// Silence is golden.',
					)
				);
			}

			return $this->do_action( $action, $file, $params );
		}

		public function do_action( $action, $file = '', $params = '' ) {

			if ( ! empty( $params ) ) {
				extract( $params );
			}

			global $wp_filesystem;

			if ( ! isset( $params['chmod'] ) || ( isset( $params['chmod'] ) && empty( $params['chmod'] ) ) ) {
				if ( defined( 'FS_CHMOD_FILE' ) ) {
					$chmod = FS_CHMOD_FILE;
				} else {
					$chmod = 0644;
				}
			}
			$res = false;
			if ( ! isset( $recursive ) ) {
				$recursive = false;
			}

			// $target_dir = $wp_filesystem->find_folder( dirname( $file ) );

			// Do unique stuff
			if ( $action == 'mkdir' ) {

				if ( defined( 'FS_CHMOD_DIR' ) ) {
					$chmod = FS_CHMOD_DIR;
				} else {
					$chmod = 0755;
				}
				$res = $wp_filesystem->mkdir( $file );
				if ( ! $res ) {
					wp_mkdir_p( $file );

					$res = file_exists( $file );
					if ( ! $res ) {
						mkdir( $file, $chmod, true );
						$res = file_exists( $file );
					}
				}
				$index_path = trailingslashit( $file ) . 'index.php';
				if ( ! file_exists( $index_path ) ) {
					$wp_filesystem->put_contents(
						$index_path,
						'<?php' . PHP_EOL . '// Silence is golden.',
						FS_CHMOD_FILE // predefined mode settings for WP files
					);
				}
			} elseif ( $action == 'rmdir' ) {
				$res = $wp_filesystem->rmdir( $file, $recursive );
			} elseif ( $action == 'copy' && ! isset( $this->filesystem->killswitch ) ) {
				if ( isset( $this->parent->ftp_form ) && ! empty( $this->parent->ftp_form ) ) {
					$res = copy( $file, $destination );
					if ( $res ) {
						chmod( $destination, $chmod );
					}
				} else {
					$res = $wp_filesystem->copy( $file, $destination, $overwrite, $chmod );
				}
			} elseif ( $action == 'move' && ! isset( $this->filesystem->killswitch ) ) {
				$res = $wp_filesystem->copy( $file, $destination, $overwrite );
			} elseif ( $action == 'delete' ) {
				$res = $wp_filesystem->delete( $file, $recursive );
			} elseif ( $action == 'rmdir' ) {
				$res = $wp_filesystem->rmdir( $file, $recursive );
			} elseif ( $action == 'dirlist' ) {
				if ( ! isset( $include_hidden ) ) {
					$include_hidden = true;
				}
				$res = $wp_filesystem->dirlist( $file, $include_hidden, $recursive );
			} elseif ( $action == 'put_contents' && ! isset( $this->filesystem->killswitch ) ) {
				// Write a string to a file
				if ( isset( $this->parent->ftp_form ) && ! empty( $this->parent->ftp_form ) ) {
					self::load_direct();
					$res = self::$direct->put_contents( $file, $content, $chmod );
				} else {
					$res = $wp_filesystem->put_contents( $file, $content, $chmod );
				}
			} elseif ( $action == 'chown' ) {
				// Changes file owner
				if ( isset( $owner ) && ! empty( $owner ) ) {
					$res = $wp_filesystem->chmod( $file, $chmod, $recursive );
				}
			} elseif ( $action == 'owner' ) {
				// Gets file owner
				$res = $wp_filesystem->owner( $file );
			} elseif ( $action == 'chmod' ) {

				if ( ! isset( $params['chmod'] ) || ( isset( $params['chmod'] ) && empty( $params['chmod'] ) ) ) {
					$chmod = false;
				}

				$res = $wp_filesystem->chmod( $file, $chmod, $recursive );

			} elseif ( $action == 'get_contents' ) {
				// Reads entire file into a string
				if ( isset( $this->parent->ftp_form ) && ! empty( $this->parent->ftp_form ) ) {
					self::load_direct();
					$res = self::$direct->get_contents( $file );
				} else {
					$res = $wp_filesystem->get_contents( $file );
				}
			} elseif ( $action == 'get_contents_array' ) {
				// Reads entire file into an array
				$res = $wp_filesystem->get_contents_array( $file );
			} elseif ( $action == 'object' ) {
				$res = $wp_filesystem;
			} elseif ( $action == 'unzip' ) {
				$unzipfile = unzip_file( $file, $destination );
				if ( $unzipfile ) {
					$res = true;
				}
			}

			if ( ! $res ) {
				if ( $action == 'dirlist' ) {
					if ( empty( $res ) || $res == false || $res == '' ) {
						return;
					}

					if ( is_array( $res ) && empty( $res ) ) {
						return;
					}

					if ( ! is_array( $res ) ) {
						if ( count( glob( "$file*" ) ) == 0 ) {
							return;
						}
					}
				}

				$this->killswitch = true;

				$msg = '<strong>' . __( 'File Permission Issues', 'redux-framework' ) . '</strong><br/>' . sprintf( __( 'We were unable to modify required files. Please ensure that <code>%1$1s</code> has the proper read-write permissions, or modify your wp-config.php file to contain your FTP login credentials as <a href="%2$2s" target="_blank">outlined here</a>.', 'redux-framework' ), ReduxLegacy_Helpers::cleanFilePath( trailingslashit( WP_CONTENT_DIR ) ) . '/uploads/', 'https://codex.wordpress.org/Editing_wp-config.php#WordPress_Upgrade_Constants' );

				$data = array(
					'parent'  => self::$instance->parent,
					'type'    => 'error',
					'msg'     => $msg,
					'id'      => 'redux-wp-login',
					'dismiss' => false,
				);

				ReduxLegacy_Admin_Notices::set_notice( $data );
			}

			return $res;
		}
	}

	ReduxLegacy_Filesystem::get_instance();
}
