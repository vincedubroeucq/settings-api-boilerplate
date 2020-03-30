<?php
defined( 'ABSPATH' ) || die();


/******************************
 * Setting up the admin pages
 ******************************/
add_action( 'admin_menu', 'settings_boilerplate_menu_items' );
/**
 * Registers our new menu items
 */
function settings_boilerplate_menu_items() {

    // `add_menu_page()` creates a top-level menu item.
    $page_hookname = add_menu_page(
        __( 'Top Level Settings Page', 'settings-boilerplate' ), // Page title
        __( 'Top Level Settings Page', 'settings-boilerplate' ), // Menu title
        'manage_options',                                        // Capabilities
        'settings_boilerplate_top_level_settings_page',          // Slug
        'settings_boilerplate_top_level_page_callback',          // Display callback
        'dashicons-carrot',                                      // Icon
        66                                                       // Priority/position. Just after 'Plugins'
    );

    // `add_submenu_page()` creates a sub-menu item.
    $subpage_hookname = add_submenu_page(
        'options-general.php',                                   // Parent slug
        __( 'Sub Level Settings Page', 'settings-boilerplate' ), // Page title
        __( 'Sub Level Settings Page', 'settings-boilerplate' ), // Menu title
        'manage_options',                                        // Capabilities
        'settings_boilerplate_sub_level_settings_page',          // Slug
        'settings_boilerplate_sub_level_page_callback',          // Display callback
        10                                                       // Priority/position.
    );

    // `add_menu_page()` and `add_submenu_page()` return a menu slug you can use as a hook
    // e.g. add_action( 'load-' . $hookname, 'settings_boilerplate_my_function' );
}

/**
 * Displays our top level page content
 */
function settings_boilerplate_top_level_page_callback(){
    ?>
        <div class="wrap">
            <!-- Displays the title -->
            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
            <!-- The form must point to options.php -->
            <form action="options.php" method="POST">
                <?php 
                    // Output the necessary hidden fields : nonce, action, and option page name
                    settings_fields( 'settings_boilerplate' );
                    // Loops through registered sections and fields for the page slug passed in, and display them.
                    do_settings_sections( 'settings_boilerplate_top_level_settings_page' );
                    // Displays a submit button
                    submit_button();
                ?>
            </form>
        </div>
    <?php
}

/**
 * Displays our sub level page content
 * For this example, the subpage displays exactly the same page content.
 */
function settings_boilerplate_sub_level_page_callback(){
    ?>
        <div class="wrap">
            <!-- Displays the title -->
            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
            <!-- The form must point to options.php -->
            <form action="options.php" method="POST">
                <?php 
                    // It is absolutely possible to display the same settings on another page.
                    // Here the page displays the same settings as the main page.
                    settings_fields( 'settings_boilerplate' );
                    do_settings_sections( 'settings_boilerplate_top_level_settings_page' );
                    submit_button();
                ?>
            </form>
        </div>
    <?php
}