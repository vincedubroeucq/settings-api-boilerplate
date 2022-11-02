<?php
defined( 'ABSPATH' ) || die();

/*******************************************************
 * Adding a single setting field to the top level page
 *******************************************************/
add_action( 'admin_init', 'settings_boilerplate_single_setting' );
/**
 * Registers a single setting
 */
function settings_boilerplate_single_setting(){
    
    // Register a single setting.
    register_setting( 
        'settings_boilerplate',                // Settings group. Custom or existing (e.g. 'general')
        'settings_boilerplate_single_setting', // Setting name
        'sanitize_text_field'                  // Sanitize callback. Function called when saving to sanitize your setting value. Built-in or custom.
    );

    // Register a section in our top level page, to house our single setting
    add_settings_section( 
        'settings_boilerplate_single_setting_section',          // Section ID
        __( 'Single setting section', 'settings-boilerplate' ), // Title
        'settings_boilerplate_single_setting_section_display',  // Callback if you need to display something special in your section. If not, you can pass in an empty string.
        'settings_boilerplate_top_level_settings_page'          // Page to display the section in.
    );

    // Register our single setting field
    add_settings_field( 
        'settings_boilerplate_single_field',                   // Field ID
        __( 'Single text field', 'settings-boilerplate' ),     // Title
        'settings_boilerplate_single_setting_field_display',   // Callback to actually display the field's markup
        'settings_boilerplate_top_level_settings_page',        // Page
        'settings_boilerplate_single_setting_section'          // Section
    );
}


/**
 * Displays the content of the single setting section
 * 
 * @param  array  $args  Arguments passed to the add_settings_section() function call
 */
function settings_boilerplate_single_setting_section_display( $args ){
    // Just var_dumping data here to help you visualize.
    // But basically, this could potentially be empty.
    var_dump( get_option( 'settings_boilerplate_single_setting' ) );
}


/**
 * Displays our single setting
 * 
 * @param  array  $args  Arguments passed to corresponding add_settings_field() call
 */
function settings_boilerplate_single_setting_field_display( $args ){
    $setting = get_option( 'settings_boilerplate_single_setting' );
    $value    = $setting ?: '';
    ?>
        <input id="<?php echo esc_attr( $args['label_for'] ); ?>" class="regular-text" type="text" name="settings_boilerplate_single_setting" value="<?php echo esc_attr( $value ); ?>">
    <?php
}
