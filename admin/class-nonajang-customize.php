<?php

/**
 * The customize-specific functionality of the plugin.
 *
 * @link       https://github.com/amd-sufiyan/nonajang
 * @since      1.0.0
 *
 * @package    Nonajang
 * @subpackage Nonajang/customize
 */

/**
 * The customize-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the customize-specific stylesheet and JavaScript.
 *
 * @package    Nonajang
 * @subpackage Nonajang/customize
 * @author     Ahmad Sufiyan <sfi@gmail.com>
 */


class Nonajang_Customize {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct( $plugin_name, $version ) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the customize area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Nonajang_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Nonajang_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/nonajang-customize.css', array(), $this->version, 'all' );
        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/alpha-color-picker.css', array(), $this->version, 'all' );

    }

    /**
     * Register the JavaScript for the customize area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Nonajang_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Nonajang_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/nonajang-customize.js', array( 'jquery' ), $this->version, false );
        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/alpha-color-picker.js', array( 'jquery' ), $this->version, false );

    }
    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function customize_preview_init() {

        wp_enqueue_script( $this->plugin_name . '-customize', plugin_dir_url( __FILE__ ) . 'js/nonajang-admin-customize.js', array( 'jquery','customize-preview' ), $this->version, false );

    }

    public function get_customize_data() {
        $data = array();
        $data[] = array(
            'setting_id'=> 'footer_color',
            'setting_default'=> '#eeeeee',
            'control_description'=> __('lorem', 'nonajang'),
            'control_label'=> __('Footer Color', 'nonajang'),
            'control_type'=> 'color',
        );
        $data[] = array(
            'setting_id'=> 'background_rgba_color',
            'setting_default'=> '#eeeeee',
            'control_description'=> __('lorem', 'nonajang'),
            'control_label'=> __('Background RGBA color', 'nonajang'),
            'control_type'=> 'color',
        );

        $data[] = array(
            'setting_id'=> 'background_text',
            'setting_default'=> 'semua sulit',
            'control_description'=> __('Jangan Makan Ya', 'nonajang'),
            'control_label'=> __('Background Title', 'nonajang'),
            'control_type'=> 'text',
        );
        return $data;
    }
    
    /**
     * [set_nonajang_default_customize description]
     */
    public function set_nonajang_default_customize() {
        $nonajang_was_active = get_theme_mod('nonajang_was_active', false);
        if ( ! $nonajang_was_active ) {
            set_theme_mod('nonajang_was_active', 1);
            foreach ($this->get_customize_data() as $key => $value) {
                set_theme_mod($value['setting_id'], $value['setting_default']);
            }
        }
        

    }

    /**
     * [get_control_label description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function get_control_label( $value ){
        if ($value['control_label']) {
            return $value['control_label'];
        } else {
            return ucwords(str_replace("_", " ", $value["setting_id"]));
        }
    }

    /**
     * [nonajang_customize description]
     * @param  [type] $wp_customize [description]
     * @return [type]               [description]
     */
    public function nonajang_customize( $wp_customize){

        $wp_customize->add_section('nonajang_section_one', array(
            'title' => __('Nona Jang', 'nonajang'),
            'active_callback' => false,
        ));



        // foreach ($this->get_customize_data() as $key => $value) {


        //     $wp_customize->add_setting( $value['setting_id'], array(
        //         'type'                 => 'theme_mod',
        //         'default'              => $value['setting_default'],
        //         'transport'            => 'refresh', // Options: refresh or postMessage.
        //         'capability'           => 'edit_theme_options',
        //     ) );

        //     if( $value['control_type'] == "text"){
        //         $wp_customize->add_control( $value['setting_id'], array(
        //             "label" => $this->get_control_label( $value ),
        //             "section" => 'nonajang_section_one',
        //             "setting" => $value["setting_id"],
        //             "type" => $value["control_type"],
        //         ));

        //     } elseif( $value["control_type"] == "color") {
        //         $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $value["setting_id"], array(
        //             "label" => $this->get_control_label( $value ),
        //             "section" => 'nonajang_section_one',
        //             "setting" => $value["setting_id"],
        //             "sanitize_callback" => "sanitize_hex_color"
        //         )));
        //     } elseif( $value["control_type"] == "image") {
        //         $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $value["setting_id"], array(
        //             "label" => $this->get_control_label( $value ),
        //             "section" => 'nonajang_section_one',
        //             "setting" => $value["setting_id"],
        //         )));
        //     } else {
        //         $wp_customize->add_control( $value["control_type"], array(
        //             "label" => $this->get_control_label( $value ),
        //             "section" => 'nonajang_section_one',
        //             "type" => $value["control_type"],
        //         ));
        //     }
    
        // }

        // Inlcude the Alpha Color Picker control file.
        require_once( dirname( __FILE__ ) . '/alpha-color-picker.php' );
        
        $wp_customize->add_setting('nonajang_site_footer_background', array(
            'title' => __('Footer Color', 'nonajang'),
            // 'type' =>'theme_mod',
            'transport' => 'refresh',
            // 'sanitize_callback'     => 'sanitize_hex_color',
            // 'active_callback' => false,
            'default'     => 'rgba(50,50,50,0.8)',
        ));

        $wp_customize->add_control( new Customize_Alpha_Color_Control(
            $wp_customize,
            'nonajang_site_footer_background',
            array(
                'label' => __('Footer Color', 'nonajang'),
                'settings' => 'nonajang_site_footer_background',
                'section' => 'nonajang_section_one',
                'active_callback' => false,
                'show_opacity'  => true, // Optional.
                'palette'   => array(
                    'rgb(150, 50, 220)', // RGB, RGBa, and hex values supported
                    'rgba(50,50,50,0.8)',
                    'rgba(50,50,50,0.8)',
                    'rgba( 255, 255, 255, 0.2 )', // Different spacing = no problem
                    '#00CC99' // Mix of color types = no problem
                )
            )
        ) );
        
        $wp_customize->add_setting('nonajang_site_footer_color', array(
            'title' => __('Footer Color', 'nonajang'),
            // 'type' =>'theme_mod',
            'transport' => 'refresh',
            // 'sanitize_callback'     => 'sanitize_hex_color',
            // 'active_callback' => false,
            'default'     => 'rgba(255,234,234,0.2)',
        ));

        $wp_customize->add_control( new Customize_Alpha_Color_Control(
            $wp_customize,
            'nonajang_site_footer_color',
            array(
                'label' => __('Footer Color', 'nonajang'),
                'settings' => 'nonajang_site_footer_color',
                'section' => 'nonajang_section_one',
                'active_callback' => false,
                'show_opacity'  => true, // Optional.
                'palette'   => array(
                    'rgb(150, 50, 220)', // RGB, RGBa, and hex values supported
                    'rgba(50,50,50,0.8)',
                    'rgba(50,50,50,0.8)',
                    'rgba( 255, 255, 255, 0.2 )', // Different spacing = no problem
                    '#0CC99' // Mix of color types = no problem
                )
            )
        ) );


    }

    public function get_css() {


        $styles = '
            #site-footer {
                background-color: '. get_theme_mod('nonajang_site_footer_background') .';
            }
            #site-footer p, #site-footer a {
                color: '. get_theme_mod('nonajang_site_footer_color') .';
            }

            header#site-header {
                border-bottom: 1px solid '. get_theme_mod('accent_accessible_colors')["content"]["accent"] .';
            }
        ';

        return apply_filters( 'nonajang_customizer_css', $styles );
    }

    public function set_nonajang_style_theme_mods() {
        set_theme_mod( 'nonajang_styles', $this->get_css() );
        // file_put_contents(plugin_dir_path( __FILE__ ) . 'papadok.json', json_encode( get_theme_mods(), JSON_PRETTY_PRINT));
    }
    

    public function add_customizer_css() {

        if ( is_customize_preview() || ( defined( 'WP_DEBUG' ) && true === WP_DEBUG ) || ( false === $nonajang_styles) ) {
            wp_add_inline_style( $this->plugin_name, $this->get_css() );
        } else {
            wp_add_inline_style( $this->plugin_name, get_theme_mod( 'nonajang_styles' ) );
        }
    }
    

}
