<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbc68521166e23e0e643a362225ccc0cc
{
    public static $files = array (
        '3773ef3f09c37da5478d578e32b03a4b' => __DIR__ . '/../..' . '/jetpack_vendor/automattic/jetpack-assets/actions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'Q' => 
        array (
            'QuadLayers\\WP_Plugin_Table_Links\\' => 33,
            'QuadLayers\\WP_Plugin_Suggestions\\' => 33,
            'QuadLayers\\WP_Plugin_Install_Tab\\' => 33,
            'QuadLayers\\WP_Notice_Plugin_Required\\' => 37,
            'QuadLayers\\WP_Notice_Plugin_Promote\\' => 36,
            'QuadLayers\\WP_Dashboard_Widget_News\\' => 36,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'QuadLayers\\WP_Plugin_Table_Links\\' => 
        array (
            0 => __DIR__ . '/../..' . '/jetpack_vendor/quadlayers/wp-plugin-table-links/src',
        ),
        'QuadLayers\\WP_Plugin_Suggestions\\' => 
        array (
            0 => __DIR__ . '/../..' . '/jetpack_vendor/quadlayers/wp-plugin-suggestions/src',
        ),
        'QuadLayers\\WP_Plugin_Install_Tab\\' => 
        array (
            0 => __DIR__ . '/../..' . '/jetpack_vendor/quadlayers/wp-plugin-install-tab/src',
        ),
        'QuadLayers\\WP_Notice_Plugin_Required\\' => 
        array (
            0 => __DIR__ . '/../..' . '/jetpack_vendor/quadlayers/wp-notice-plugin-required/src',
        ),
        'QuadLayers\\WP_Notice_Plugin_Promote\\' => 
        array (
            0 => __DIR__ . '/../..' . '/jetpack_vendor/quadlayers/wp-notice-plugin-promote/src',
        ),
        'QuadLayers\\WP_Dashboard_Widget_News\\' => 
        array (
            0 => __DIR__ . '/../..' . '/jetpack_vendor/quadlayers/wp-dashboard-widget-news/src',
        ),
    );

    public static $classMap = array (
        'Automattic\\Jetpack\\Assets' => __DIR__ . '/../..' . '/jetpack_vendor/automattic/jetpack-assets/src/class-assets.php',
        'Automattic\\Jetpack\\Assets\\Semver' => __DIR__ . '/../..' . '/jetpack_vendor/automattic/jetpack-assets/src/class-semver.php',
        'Automattic\\Jetpack\\Composer\\Manager' => __DIR__ . '/..' . '/automattic/jetpack-composer-plugin/src/class-manager.php',
        'Automattic\\Jetpack\\Composer\\Plugin' => __DIR__ . '/..' . '/automattic/jetpack-composer-plugin/src/class-plugin.php',
        'Automattic\\Jetpack\\Constants' => __DIR__ . '/../..' . '/jetpack_vendor/automattic/jetpack-constants/src/class-constants.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'ET_Builder_Module_QuadMenu' => __DIR__ . '/../..' . '/lib/integrations/divi/modules/QuadMenu/QuadMenu.php',
        'FLQuadMenuModule' => __DIR__ . '/../..' . '/lib/integrations/beaver/module.php',
        'QuadLayers\\QuadMenu\\Activation' => __DIR__ . '/../..' . '/lib/class-activation.php',
        'QuadLayers\\QuadMenu\\Admin' => __DIR__ . '/../..' . '/lib/class-admin.php',
        'QuadLayers\\QuadMenu\\Backend\\Ajax' => __DIR__ . '/../..' . '/lib/backend/class-ajax.php',
        'QuadLayers\\QuadMenu\\Backend\\Settings' => __DIR__ . '/../..' . '/lib/backend/class-settings.php',
        'QuadLayers\\QuadMenu\\Backend\\Walker\\Nav_Menu_Columns' => __DIR__ . '/../..' . '/lib/backend/walker/class-nav-menu-columns.php',
        'QuadLayers\\QuadMenu\\Backend\\Walker\\Nav_Menu_Defaults' => __DIR__ . '/../..' . '/lib/backend/walker/class-nav-menu-defaults.php',
        'QuadLayers\\QuadMenu\\Backend\\Walker\\Nav_Menu_Mega' => __DIR__ . '/../..' . '/lib/backend/walker/class-nav-menu-mega.php',
        'QuadLayers\\QuadMenu\\Backend\\Walker\\Nav_Menu_Widgets' => __DIR__ . '/../..' . '/lib/backend/walker/class-nav-menu-widgets.php',
        'QuadLayers\\QuadMenu\\Compiler' => __DIR__ . '/../..' . '/lib/class-compiler.php',
        'QuadLayers\\QuadMenu\\Configuration' => __DIR__ . '/../..' . '/lib/class-configuration.php',
        'QuadLayers\\QuadMenu\\Frontend\\Frontend' => __DIR__ . '/../..' . '/lib/frontend/class-frontend.php',
        'QuadLayers\\QuadMenu\\Frontend\\Items' => __DIR__ . '/../..' . '/lib/frontend/class-items.php',
        'QuadLayers\\QuadMenu\\Frontend\\Walker\\QuadMenu_Item' => __DIR__ . '/../..' . '/lib/frontend/walker/class-quadmenu-item.php',
        'QuadLayers\\QuadMenu\\Frontend\\Walker\\QuadMenu_Item_Cart' => __DIR__ . '/../..' . '/lib/frontend/walker/class-quadmenu-item-cart.php',
        'QuadLayers\\QuadMenu\\Frontend\\Walker\\QuadMenu_Item_Column' => __DIR__ . '/../..' . '/lib/frontend/walker/class-quadmenu-item-column.php',
        'QuadLayers\\QuadMenu\\Frontend\\Walker\\QuadMenu_Item_Default' => __DIR__ . '/../..' . '/lib/frontend/walker/class-quadmenu-item-default.php',
        'QuadLayers\\QuadMenu\\Frontend\\Walker\\QuadMenu_Item_Icon' => __DIR__ . '/../..' . '/lib/frontend/walker/class-quadmenu-item-icon.php',
        'QuadLayers\\QuadMenu\\Frontend\\Walker\\QuadMenu_Item_Mega' => __DIR__ . '/../..' . '/lib/frontend/walker/class-quadmenu-item-mega.php',
        'QuadLayers\\QuadMenu\\Frontend\\Walker\\QuadMenu_Item_Post_Type' => __DIR__ . '/../..' . '/lib/frontend/walker/class-quadmenu-item-post-type.php',
        'QuadLayers\\QuadMenu\\Frontend\\Walker\\QuadMenu_Item_Search' => __DIR__ . '/../..' . '/lib/frontend/walker/class-quadmenu-item-search.php',
        'QuadLayers\\QuadMenu\\Frontend\\Walker\\QuadMenu_Item_Widget' => __DIR__ . '/../..' . '/lib/frontend/walker/class-quadmenu-item-widget.php',
        'QuadLayers\\QuadMenu\\Frontend\\Walker\\QuadMenu_Walker' => __DIR__ . '/../..' . '/lib/frontend/walker/class-quadmenu-walker.php',
        'QuadLayers\\QuadMenu\\Icons' => __DIR__ . '/../..' . '/lib/class-icons.php',
        'QuadLayers\\QuadMenu\\Integrations\\Beaver' => __DIR__ . '/../..' . '/lib/integrations/class-beaver.php',
        'QuadLayers\\QuadMenu\\Integrations\\Beaver\\Module' => __DIR__ . '/../..' . '/lib/integrations/beaver/class-module.php',
        'QuadLayers\\QuadMenu\\Integrations\\Divi' => __DIR__ . '/../..' . '/lib/integrations/class-divi.php',
        'QuadLayers\\QuadMenu\\Integrations\\Divi\\Module' => __DIR__ . '/../..' . '/lib/integrations/divi/class-module.php',
        'QuadLayers\\QuadMenu\\Integrations\\Elementor' => __DIR__ . '/../..' . '/lib/integrations/class-elementor.php',
        'QuadLayers\\QuadMenu\\Integrations\\Elementor\\Module' => __DIR__ . '/../..' . '/lib/integrations/elementor/class-module.php',
        'QuadLayers\\QuadMenu\\Integrations\\Polylang' => __DIR__ . '/../..' . '/lib/integrations/class-polylang.php',
        'QuadLayers\\QuadMenu\\Integrations\\WooCommerce' => __DIR__ . '/../..' . '/lib/integrations/class-woocommerce.php',
        'QuadLayers\\QuadMenu\\Locations' => __DIR__ . '/../..' . '/lib/class-locations.php',
        'QuadLayers\\QuadMenu\\Options' => __DIR__ . '/../..' . '/lib/class-options.php',
        'QuadLayers\\QuadMenu\\Panel' => __DIR__ . '/../..' . '/lib/class-panel.php',
        'QuadLayers\\QuadMenu\\Panel\\Options' => __DIR__ . '/../..' . '/lib/panel/class-options.php',
        'QuadLayers\\QuadMenu\\Panel\\Premium' => __DIR__ . '/../..' . '/lib/panel/class-premium.php',
        'QuadLayers\\QuadMenu\\Panel\\System' => __DIR__ . '/../..' . '/lib/panel/class-system.php',
        'QuadLayers\\QuadMenu\\Panel\\Welcome' => __DIR__ . '/../..' . '/lib/panel/class-welcome.php',
        'QuadLayers\\QuadMenu\\Plugin' => __DIR__ . '/../..' . '/lib/class-plugin.php',
        'QuadLayers\\QuadMenu\\Redux' => __DIR__ . '/../..' . '/lib/class-redux.php',
        'QuadLayers\\QuadMenu\\Themes' => __DIR__ . '/../..' . '/lib/class-themes.php',
        'QuadLayers\\QuadMenu\\Widget' => __DIR__ . '/../..' . '/lib/class-widget.php',
        'QuadLayers\\WP_Dashboard_Widget_News\\Load' => __DIR__ . '/../..' . '/jetpack_vendor/quadlayers/wp-dashboard-widget-news/src/Load.php',
        'QuadLayers\\WP_Notice_Plugin_Promote\\Load' => __DIR__ . '/../..' . '/jetpack_vendor/quadlayers/wp-notice-plugin-promote/src/Load.php',
        'QuadLayers\\WP_Notice_Plugin_Promote\\PluginByFile' => __DIR__ . '/../..' . '/jetpack_vendor/quadlayers/wp-notice-plugin-promote/src/PluginByFile.php',
        'QuadLayers\\WP_Notice_Plugin_Promote\\PluginBySlug' => __DIR__ . '/../..' . '/jetpack_vendor/quadlayers/wp-notice-plugin-promote/src/PluginBySlug.php',
        'QuadLayers\\WP_Notice_Plugin_Promote\\PluginBySlugV2' => __DIR__ . '/../..' . '/jetpack_vendor/quadlayers/wp-notice-plugin-promote/src/PluginBySlugV2.php',
        'QuadLayers\\WP_Notice_Plugin_Promote\\Traits\\PluginActions' => __DIR__ . '/../..' . '/jetpack_vendor/quadlayers/wp-notice-plugin-promote/src/Traits/PluginActions.php',
        'QuadLayers\\WP_Notice_Plugin_Promote\\Traits\\PluginActionsLinks' => __DIR__ . '/../..' . '/jetpack_vendor/quadlayers/wp-notice-plugin-promote/src/Traits/PluginActionsLinks.php',
        'QuadLayers\\WP_Notice_Plugin_Promote\\Traits\\PluginDataByFile' => __DIR__ . '/../..' . '/jetpack_vendor/quadlayers/wp-notice-plugin-promote/src/Traits/PluginDataByFile.php',
        'QuadLayers\\WP_Notice_Plugin_Required\\Load' => __DIR__ . '/../..' . '/jetpack_vendor/quadlayers/wp-notice-plugin-required/src/Load.php',
        'QuadLayers\\WP_Notice_Plugin_Required\\Plugin' => __DIR__ . '/../..' . '/jetpack_vendor/quadlayers/wp-notice-plugin-required/src/Plugin.php',
        'QuadLayers\\WP_Plugin_Install_Tab\\Load' => __DIR__ . '/../..' . '/jetpack_vendor/quadlayers/wp-plugin-install-tab/src/Load.php',
        'QuadLayers\\WP_Plugin_Suggestions\\Load' => __DIR__ . '/../..' . '/jetpack_vendor/quadlayers/wp-plugin-suggestions/src/Load.php',
        'QuadLayers\\WP_Plugin_Suggestions\\Page' => __DIR__ . '/../..' . '/jetpack_vendor/quadlayers/wp-plugin-suggestions/src/Page.php',
        'QuadLayers\\WP_Plugin_Suggestions\\Table' => __DIR__ . '/../..' . '/jetpack_vendor/quadlayers/wp-plugin-suggestions/src/Table.php',
        'QuadLayers\\WP_Plugin_Table_Links\\Load' => __DIR__ . '/../..' . '/jetpack_vendor/quadlayers/wp-plugin-table-links/src/Load.php',
        'WPBakeryShortCode_quadmenu_vc' => __DIR__ . '/../..' . '/lib/integrations/class-vc.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbc68521166e23e0e643a362225ccc0cc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbc68521166e23e0e643a362225ccc0cc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbc68521166e23e0e643a362225ccc0cc::$classMap;

        }, null, ClassLoader::class);
    }
}
