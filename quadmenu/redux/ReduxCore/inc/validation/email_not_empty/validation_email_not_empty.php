<?php

if ( ! class_exists( 'ReduxLegacy_Validation_email_not_empty' ) ) {
	class ReduxLegacy_Validation_email_not_empty {

		/**
		 * Field Constructor.
		 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
		 *
		 * @since ReduxFrameworkLegacy 1.0.0
		 */
		function __construct( $parent, $field, $value, $current ) {

			$this->parent       = $parent;
			$this->field        = $field;
			$this->field['msg'] = ( isset( $this->field['msg'] ) ) ? $this->field['msg'] : __( 'You must provide a valid email for this option.', 'redux-framework' );
			$this->value        = $value;
			$this->current      = $current;

			$this->validate();
		} //function

		/**
		 * Field Render Function.
		 * Takes the vars and outputs the HTML for the field in the settings
		 *
		 * @since ReduxFrameworkLegacy 1.0.0
		 */
		function validate() {

			if ( ! is_email( $this->value ) || ! isset( $this->value ) || empty( $this->value ) ) {
				$this->value = ( isset( $this->current ) ) ? $this->current : '';
				$this->error = $this->field;
			}
		} //function
	} //class
}
