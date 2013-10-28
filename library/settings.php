<?php
class MedianSettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Median Theme Settings', 
            'Median Theme', 
            'manage_options', 
            'median-setting-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'median_option_name' );
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>
            <h2>Median Theme Settings</h2>           
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'median_option_group' );   
                do_settings_sections( 'median-setting-admin' );
                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'median_option_group', // Option group
            'median_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'General Settings', // Title
            null, // Callback
            'median-setting-admin' // Page
        );  

        add_settings_field(
            'median_desc', // ID
            'Blog Description Override', // Title 
            array( $this, 'median_desc_callback' ), // Callback
            'median-setting-admin', // Page
            'setting_section_id' // Section           
        );      
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['median_desc'] ) )
            $new_input['median_desc'] = $input['median_desc'];

        return $new_input;
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function median_desc_callback()
    {
        printf(
            '<textarea id="median_desc" name="median_option_name[median_desc]" cols="40" rows="3">%s</textarea>',
            isset( $this->options['median_desc'] ) ? esc_attr( $this->options['median_desc']) : ''
        );
    }
}

if( is_admin() )
    $median_settings_page = new MedianSettingsPage();