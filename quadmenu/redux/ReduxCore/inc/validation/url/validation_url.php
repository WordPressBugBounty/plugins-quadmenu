<?php

if ( ! class_exists( 'ReduxLegacy_Validation_url' ) ) {
	class ReduxLegacy_Validation_url {
		public $parent;
		public $field;
		public $value;
		public $current;
		/**
		 * Field Constructor.
		 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
		 *
		 * @since ReduxFrameworkLegacy 1.0.0
		 */
		function __construct( $parent, $field, $value, $current ) {

			$this->parent       = $parent;
			$this->field        = $field;
			$this->field['msg'] = ( isset( $this->field['msg'] ) ) ? $this->field['msg'] : __( 'You must provide a valid URL for this option.', 'redux-framework' );
			$this->value        = $value;
			$this->current      = $current;

			$this->validate();
		} //function

		/**
		 * Field Render Function.
		 * Takes the vars and validates them
		 *
		 * @since ReduxFrameworkLegacy 1.0.0
		 */
		function validate() {

			if ( filter_var( $this->value, FILTER_VALIDATE_URL ) == false ) {
				$this->value = ( isset( $this->current ) ) ? $this->current : '';
				$this->error = $this->field;
			} else {
				$this->value = esc_url_raw( $this->value );
			}
		} //function
	} //class
}
