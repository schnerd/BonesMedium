<?php
class BonesMediumSettingsPage
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
            'Bones Medium Theme Settings', 
            'Bones Medium', 
            'manage_options', 
            'bm-setting-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'bm_option_name' );
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>
            <h2>Bones Medium Theme Settings</h2>           
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'bm_option_group' );   
                do_settings_sections( 'bm-setting-admin' );
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
            'bm_option_group', // Option group
            'bm_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'General Settings', // Title
            null, // Callback
            'bm-setting-admin' // Page
        );  

        add_settings_field(
            'bm_desc', // ID
            'Blog Description Override', // Title 
            array( $this, 'bm_desc_callback' ), // Callback
            'bm-setting-admin', // Page
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
        if( isset( $input['bm_desc'] ) )
            $new_input['bm_desc'] = $input['bm_desc'];

        return $new_input;
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function bm_desc_callback()
    {
        printf(
            '<textarea id="bm_desc" name="bm_option_name[bm_desc]" cols="40" rows="3">%s</textarea>',
            isset( $this->options['bm_desc'] ) ? esc_attr( $this->options['bm_desc']) : ''
        );
    }
}

if( is_admin() )
    $bm_settings_page = new BonesMediumSettingsPage();