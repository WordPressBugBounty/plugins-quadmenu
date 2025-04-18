<?php

class ReduxLegacy_P {

	public function __construct() {

		add_action( 'wp_ajax_nopriv_redux_p', array( $this, 'proxy' ) );
		add_action( 'wp_ajax_redux_p', array( $this, 'proxy' ) );
	}

	public function proxy() {

		if ( ! isset( $_GET['nonce'] ) || ( isset( $_GET['nonce'] ) && ! wp_verify_nonce( $_GET['nonce'], 'redux-ads-nonce' ) ) ) {
			die();
		}

// Script: Simple PHP Proxy: Get external HTML, JSON and more!
//
// *Version: 1.6, Last updated: 1/24/2009*
//
// Project Home - http://benalman.com/projects/php-simple-proxy/
// GitHub       - http://github.com/cowboy/php-simple-proxy/
// Source       - http://github.com/cowboy/php-simple-proxy/raw/master/ba-simple-proxy.php
//
// About: License
//
// Copyright (c) 2010 "Cowboy" Ben Alman,
// Dual licensed under the MIT and GPL licenses.
// http://benalman.com/about/license/
//
// About: Examples
//
// This working example, complete with fully commented code, illustrates one way
// in which this PHP script can be used.
//
// Simple - http://benalman.com/code/projects/php-simple-proxy/examples/simple/
//
// About: Release History
//
// 1.6 - (1/24/2009) Now defaults to JSON mode, which can now be changed to
// native mode by specifying ?mode=native. Native and JSONP modes are
// disabled by default because of possible XSS vulnerability issues, but
// are configurable in the PHP script along with a url validation regex.
// 1.5 - (12/27/2009) Initial release
//
// Topic: GET Parameters
//
// Certain GET (query string) parameters may be passed into ba-simple-proxy.php
// to control its behavior, this is a list of these parameters.
//
// url - The remote URL resource to fetch. Any GET parameters to be passed
// through to the remote URL resource must be urlencoded in this parameter.
// mode - If mode=native, the response will be sent using the same content
// type and headers that the remote URL resource returned. If omitted, the
// response will be JSON (or JSONP). <Native requests> and <JSONP requests>
// are disabled by default, see <Configuration Options> for more information.
// callback - If specified, the response JSON will be wrapped in this named
// function call. This parameter and <JSONP requests> are disabled by
// default, see <Configuration Options> for more information.
// user_agent - This value will be sent to the remote URL request as the
// `User-Agent:` HTTP request header. If omitted, the browser user agent
// will be passed through.
// send_cookies - If send_cookies=1, all cookies will be forwarded through to
// the remote URL request.
// send_session - If send_session=1 and send_cookies=1, the SID cookie will be
// forwarded through to the remote URL request.
// full_headers - If a JSON request and full_headers=1, the JSON response will
// contain detailed header information.
// full_status - If a JSON request and full_status=1, the JSON response will
// contain detailed cURL status information, otherwise it will just contain
// the `http_code` property.
//
// Topic: POST Parameters
//
// All POST parameters are automatically passed through to the remote URL
// request.
//
// Topic: JSON requests
//
// This request will return the contents of the specified url in JSON format.
//
// Request:
//
// > ba-simple-proxy.php?url=http://example.com/
//
// Response:
//
// > { "contents": "<html>...</html>", "headers": {...}, "status": {...} }
//
// JSON object properties:
//
// contents - (String) The contents of the remote URL resource.
// headers - (Object) A hash of HTTP headers returned by the remote URL
// resource.
// status - (Object) A hash of status codes returned by cURL.
//
// Topic: JSONP requests
//
// This request will return the contents of the specified url in JSONP format
// (but only if $enable_jsonp is enabled in the PHP script).
//
// Request:
//
// > ba-simple-proxy.php?url=http://example.com/&callback=foo
//
// Response:
//
// > foo({ "contents": "<html>...</html>", "headers": {...}, "status": {...} })
//
// JSON object properties:
//
// contents - (String) The contents of the remote URL resource.
// headers - (Object) A hash of HTTP headers returned by the remote URL
// resource.
// status - (Object) A hash of status codes returned by cURL.
//
// Topic: Native requests
//
// This request will return the contents of the specified url in the format it
// was received in, including the same content-type and other headers (but only
// if $enable_native is enabled in the PHP script).
//
// Request:
//
// > ba-simple-proxy.php?url=http://example.com/&mode=native
//
// Response:
//
// > <html>...</html>
//
// Topic: Notes
//
// * Assumes magic_quotes_gpc = Off in php.ini
//
// Topic: Configuration Options
//
// These variables can be manually edited in the PHP file if necessary.
//
// $enable_jsonp - Only enable <JSONP requests> if you really need to. If you
// install this script on the same server as the page you're calling it
// from, plain JSON will work. Defaults to false.
// $enable_native - You can enable <Native requests>, but you should only do
// this if you also whitelist specific URLs using $valid_url_regex, to avoid
// possible XSS vulnerabilities. Defaults to false.
// $valid_url_regex - This regex is matched against the url parameter to
// ensure that it is valid. This setting only needs to be used if either
// $enable_jsonp or $enable_native are enabled. Defaults to '/.*/' which
// validates all URLs.
//
// ############################################################################


		$_GET['mode']         = 'native';
		$_GET['full_headers'] = 1;
		$_GET['full_status']  = 1;
		$_GET['send_cookies'] = 1;

// Change these configuration options if needed, see above descriptions for info.
		$enable_jsonp    = false;
		$enable_native   = true;
		$valid_url_regex = '/.*/';

// ############################################################################
		$url = $_GET['url'];

		if ( isset( $_GET['nonce'] ) ) {
			$url = str_replace( 'nonce=' . $_GET['nonce'] . '&', '', $url );
		}

		if ( ! $url ) {

			// Passed url not specified.
			$contents = 'ERROR: url not specified';
			$status   = array( 'http_code' => 'ERROR' );

		} elseif ( ! preg_match( $valid_url_regex, $url ) ) {

			// Passed url doesn't match $valid_url_regex.
			$contents = 'ERROR: invalid url';
			$status   = array( 'http_code' => 'ERROR' );

		} else {
			$url = urldecode( $url );
			if ( isset( $_GET['proxy'] ) ) {
				$url .= '&proxy=' . $_GET['proxy'];
			}

			// Ad URL rewrite
			if ( strpos( $url, 'http' ) === false ) {
				$url = 'http:' . $url;
			}

			if ( isset( $_GET['callback'] ) ) {
				foreach ( $_GET as $key => $value ) {
					if ( in_array( $key, array( 'url', 'mode', 'full_headers', 'full_status', 'send_cookies' ) ) ) {
						continue;
					}
					$url .= '&' . $key . '=' . $value;
				}
			}

			$args = array(
				'user-agent' => isset( $_GET['user_agent'] ) ? $_GET['user_agent'] : $_SERVER['HTTP_USER_AGENT'],
				'method'     => 'GET',
			);

			if ( isset( $_GET['send_cookies'] ) && $_GET['send_cookies'] ) {
				$cookie = array();
				foreach ( $_COOKIE as $key => $value ) {
					$cookie[] = $key . '=' . $value;
				}
				if ( isset( $_GET['send_session'] ) && $_GET['send_session'] ) {
					$cookie[] = SID;
				}
				$args['cookies'] = $cookie;

			}
			if ( strtolower( $_SERVER['REQUEST_METHOD'] ) == 'post' ) {
				$args['body']   = $_POST;
				$args['method'] = 'POST';

			}

			$response = wp_remote_request(
				$url,
				$args
			);

			if ( ! is_wp_error( $response ) ) {
				$status   = $response['response']['code'];
				$contents = $response['body'];
			}
		}

		if ( isset( $_GET['mode'] ) && $_GET['mode'] == 'native' ) {
			if ( ! $enable_native ) {
				$contents = 'ERROR: invalid mode';
				$status   = array( 'http_code' => 'ERROR' );
			}

			if ( ! is_wp_error( $response ) && isset( $response['headers']['content-type'] ) ) {
				header( 'Content-Type: ' . $response['headers']['content-type'] );
			}
			if ( ! is_wp_error( $response ) && isset( $response['headers']['content-language'] ) ) {
				header( 'Content-Language: ' . $response['headers']['content-language'] );
			}
			if ( ! is_wp_error( $response ) && isset( $response['headers']['set-cookie'] ) ) {
				header( 'Set-Cookie: ' . $response['headers']['set-cookie'] );
			}

			if ( isset( $contents ) ) {
				print str_replace( 'ads.redux.io', 'look.redux.io', $contents );
			}
		} else {

			// $data will be serialized into JSON data.
			$data = array();

			// Propagate all HTTP headers into the JSON data object.
			if ( isset( $_GET['full_headers'] ) && $_GET['full_headers'] ) {
				$data['headers'] = array();

			}

			// Propagate all cURL request / response info to the JSON data object.
			if ( isset( $_GET['full_status'] ) && $_GET['full_status'] ) {
				$data['status'] = $status;
			} else {
				$data['status']              = array();
				$data['status']['http_code'] = $status['http_code'];
			}

			// Set the JSON data object contents, decoding it from JSON if possible.
			$decoded_json     = json_decode( $contents );
			$data['contents'] = str_replace( 'e(window).width()', 'window.innerWidth||e(window).width()', $decoded_json ? $decoded_json : $contents );

			// Generate appropriate content-type header.

			$is_xhr = isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ? strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) : 'xmlhttprequest';
			header( 'Content-type: application/' . ( $is_xhr ? 'json' : 'x-javascript' ) );

			// Get JSONP callback.
			$jsonp_callback = $enable_jsonp && isset( $_GET['callback'] ) ? $_GET['callback'] : null;

			// Generate JSON/JSONP string
			$json = json_encode( $data );

			print $jsonp_callback ? "$jsonp_callback($json)" : $json;

		}
	}
}

	new ReduxLegacy_P();
