<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       peeller.com
 * @since      1.0.0
 *
 * @package    Peeller_Dynamic_Content
 * @subpackage Peeller_Dynamic_Content/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Peeller_Dynamic_Content
 * @subpackage Peeller_Dynamic_Content/admin
 * @author     cheli kirshanbaum <chelli.p.k@gmail.com>
 */
class Peeller_Dynamic_Content_Admin {

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
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Peeller_Dynamic_Content_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Peeller_Dynamic_Content_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_name."-bootstrap", plugin_dir_url(__FILE__) . 'css/bootstrap.min.css', array(), $this->version, 'all');
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/peeller-dynamic-content-admin.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Peeller_Dynamic_Content_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Peeller_Dynamic_Content_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script($this->plugin_name."-jquery", "//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js","", $this->version, false);
        wp_enqueue_script($this->plugin_name."-bootstrap", plugin_dir_url(__FILE__) . 'js/bootstrap.min.js', array('jquery'), $this->version, false);
        wp_enqueue_script($this->plugin_name."-angular", "//code.angularjs.org/1.2.20/angular.min.js","", $this->version, false);
        wp_enqueue_script($this->plugin_name."-angular-form-builder", plugin_dir_url(__FILE__) . 'js/angular-form-builder.js', "", $this->version, false);
        wp_enqueue_script($this->plugin_name."-angular-form-builder-components", plugin_dir_url(__FILE__) . 'js/angular-form-builder-components.js', "", $this->version, false);
        wp_enqueue_script($this->plugin_name."-angular-validator","//kelp404.github.io/angular-validator/dist/angular-validator.min.js", "", $this->version, false);
        wp_enqueue_script($this->plugin_name."-angular-validator-rules","//kelp404.github.io/angular-validator/dist/angular-validator-rules.min.js", "", $this->version, false);
        wp_enqueue_script($this->plugin_name."-angular-route","https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js", "", $this->version, false);
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/peeller-dynamic-content-admin.js', array('jquery'), $this->version, false);
    }

    public function admin_menu() {
        add_menu_page($this->plugin_name, $this->plugin_name, "level_0", $this->plugin_name, array($this,"dashboard_page"), "");
    }

    public function dashboard_page() {
       	include( plugin_dir_path( __FILE__ ) . 'index.html' );
    }

}
