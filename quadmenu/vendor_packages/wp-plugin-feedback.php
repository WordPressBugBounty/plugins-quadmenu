<?php

if ( class_exists( 'QuadLayers\\PluginFeedback\\Load' ) ) {
	\QuadLayers\PluginFeedback\Load::instance()->add(
		QUADMENU_PLUGIN_FILE,
		array(
			'support_link' => 'https://wordpress.org/support/plugin/quadmenu/',
		)
	);
}