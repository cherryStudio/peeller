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
        wp_enqueue_style($this->plugin_name . "-font-awesome", plugin_dir_url(__FILE__) . 'css/font-awesome.min.css', array(),  '4.4.0', 'all');
        wp_enqueue_style($this->plugin_name . "-bootstrap", plugin_dir_url(__FILE__) . 'css/bootstrap.min.css', array(), $this->version, 'all');
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/peeller-dynamic-content-admin.css', array(), $this->version, 'all');
        wp_enqueue_style($this->plugin_name. "-wizard", plugin_dir_url(__FILE__) . 'css/gsdk-base.css', array(), $this->version, 'all');
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
        wp_enqueue_script($this->plugin_name . "-jquery", "//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js", "", $this->version, false);
        wp_enqueue_script($this->plugin_name . "-bootstrap", plugin_dir_url(__FILE__) . 'js/bootstrap.min.js', array('jquery'), $this->version, false);
        wp_enqueue_script($this->plugin_name . "-angular", "//code.angularjs.org/1.2.20/angular.min.js", "", $this->version, false);
        wp_enqueue_script($this->plugin_name . "-angular-form-builder", plugin_dir_url(__FILE__) . 'js/angular-form-builder.js', "", $this->version, false);
        wp_enqueue_script($this->plugin_name . "-angular-form-builder-components", plugin_dir_url(__FILE__) . 'js/angular-form-builder-components.js', "", $this->version, false);
        wp_enqueue_script($this->plugin_name . "-angular-validator", "//kelp404.github.io/angular-validator/dist/angular-validator.min.js", "", $this->version, false);
        wp_enqueue_script($this->plugin_name . "-angular-validator-rules", "//kelp404.github.io/angular-validator/dist/angular-validator-rules.min.js", "", $this->version, false);
        wp_enqueue_script($this->plugin_name . "-angular-route", "https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js", "", $this->version, false);
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/peeller-dynamic-content-admin.js', array('jquery'), $this->version, false);
        wp_enqueue_script($this->plugin_name. "-bootstrap-wizard-js", plugin_dir_url(__FILE__) . 'js/jquery.bootstrap.wizard.js', array('jquery'), $this->version, false);
        wp_enqueue_script($this->plugin_name. "-wizard-js", plugin_dir_url(__FILE__) . 'js/wizard.js', array('jquery'), $this->version, false);
    }

  public function prefix_ajax_get_form_builder() {
        $cp_public = get_post_meta($_GET['post'], 'cp_form_builder', true);
         echo $cp_public;  
         die();
    }
   
   public function prefix_ajax_get_post_meta() {
        $cp_public = get_post_meta($_GET['post']);
         echo json_encode($cp_public);  
         die();
    }
    
    public function prefix_ajax_save_post_meta() {
        global $post;
        $cp_general_name = get_post_meta($post_id, 'cp_general_name', true);
        $cp_singular_name = get_post_meta($post_id, 'cp_singular_name', true);
        $cp_form_builder = get_post_meta($post_id, 'cp_form_builder', true);
        $post_id = $_POST['id'];
        update_post_meta($post_id, 'cp_singular_name', $_POST['cp_singular_name'][0], "");
        update_post_meta($post_id, 'cp_general_name', $_POST['cp_general_name'][0], $cp_general_name);
        update_post_meta($post_id, 'cp_add_new', 'Add new '.$_POST['cp_singular_name'][0],  'Add new '.$cp_singular_name);
        update_post_meta($post_id, 'cp_add_new_item','Add new '.$_POST['cp_singular_name'][0], 'Add new '.$cp_singular_name);
        update_post_meta($post_id, 'cp_edit_item', 'Edit '.$_POST['cp_singular_name'][0], 'Edit '.$cp_singular_name);
        update_post_meta($post_id, 'cp_new_item', 'New '.$_POST['cp_singular_name'][0], 'New '.$cp_singular_name);
        update_post_meta($post_id, 'cp_all_items','All '. $_POST['cp_general_name'][0], 'All '.$cp_general_name );
        update_post_meta($post_id, 'cp_view_item', 'View '.$_POST['cp_singular_name'][0], 'View '.$cp_singular_name);
        update_post_meta($post_id, 'cp_search_items', 'Search '.$_POST['cp_general_name'][0], 'Search '.$cp_general_name);
        update_post_meta($post_id, 'cp_not_found', $_POST['cp_singular_name'][0]." not found", $cp_singular_name." not found");
        update_post_meta($post_id, 'cp_not_found_in_trash',$_POST['cp_singular_name'][0]." not found in trash", $cp_singular_name." not found in trash");
        update_post_meta($post_id, 'cp_form_builder', $_POST['cp_form_builder'], $cp_form_builder);
   
        die();
    }
   
   
   
      public function prefix_ajax_get_post_structure() {
          
        global $post;
        $cp_public = get_post_meta($post->ID, 'cp_form_builder', true);
         echo $cp_public;  die();
    }
   
    public function admin_menu() {
        add_menu_page($this->plugin_name, $this->plugin_name, "level_0", $this->plugin_name, array($this, "dashboard_page"), "");
    }

    public function dashboard_page() {
        include( plugin_dir_path(__FILE__) . 'index.php' );
    }

    public function cpt_save_postdata() {
        global $post;
        if ($_POST['cpt-hidd'] == 'true') {
            
        $cp_general_name = get_post_meta($post->ID, 'cp_general_name', true);
        $cp_singular_name = get_post_meta($post->ID, 'cp_singular_name', true);
        $cp_form_builder = get_post_meta($post->ID, 'cp_form_builder', true);

        update_post_meta($post->ID, 'cp_public', "on", "on");
        update_post_meta($post->ID, 'cp_publicly_queryable', "on", "on");
        update_post_meta($post->ID, 'cp_show_ui', "on", "on");
        update_post_meta($post->ID, 'cp_show_in_menu',"on", "on");
        update_post_meta($post->ID, 'cp_query_var', "on", "on");
        update_post_meta($post->ID, 'cp_rewrite', "on", "on");
        update_post_meta($post->ID, 'cp_has_archive', "on", "on");
        update_post_meta($post->ID, 'cp_hierarchical',false, false);
        update_post_meta($post->ID, 'cp_capability_type', 'post', 'post');
        update_post_meta($post->ID, 'cp_menu_position', 5, 5);
        update_post_meta($post->ID, 'cp_s_title',true, true);
        update_post_meta($post->ID, 'cp_s_editor', false, false);
        update_post_meta($post->ID, 'cp_s_author', true, true);
        update_post_meta($post->ID, 'cp_s_thumbnail', true, true);
        update_post_meta($post->ID, 'cp_s_form_builder', true, true);
        update_post_meta($post->ID, 'cp_s_comments', true, true);
        update_post_meta($post->ID, 'cp_general_name', $_POST['cp_general_name'], $cp_general_name);
        update_post_meta($post->ID, 'cp_singular_name', $_POST['cp_singular_name'], $cp_singular_name);
        update_post_meta($post->ID, 'cp_add_new', 'Add new '.$_POST['cp_singular_name'],  'Add new '.$cp_singular_name);
        update_post_meta($post->ID, 'cp_add_new_item','Add new '.$_POST['cp_singular_name'], 'Add new '.$cp_singular_name);
        update_post_meta($post->ID, 'cp_edit_item', 'Edit '.$_POST['cp_singular_name'], 'Edit '.$cp_singular_name);
        update_post_meta($post->ID, 'cp_new_item', 'New '.$_POST['cp_singular_name'], 'New '.$cp_singular_name);
        update_post_meta($post->ID, 'cp_all_items','All '. $_POST['cp_general_name'], 'All '.$cp_general_name );
        update_post_meta($post->ID, 'cp_view_item', 'View '.$_POST['cp_singular_name'], 'View '.$cp_singular_name);
        update_post_meta($post->ID, 'cp_search_items', 'Search '.$_POST['cp_general_name'], 'Search '.$cp_general_name);
        update_post_meta($post->ID, 'cp_not_found', $_POST['cp_singular_name']." not found", $cp_singular_name." not found");
        update_post_meta($post->ID, 'cp_not_found_in_trash',$_POST['cp_singular_name']." not found in trash", $cp_singular_name." not found in trash");
        update_post_meta($post->ID, 'cp_parent_item_colon', "", "");
        update_post_meta($post->ID, 'cp_form_builder', $_POST['cp_form_builder'], $cp_form_builder);
            
        }
    }

    public function cpt_inner_custom_box() {
        global $post;
        
        $cp_public = get_post_meta($post->ID, 'cp_public', true);
        $cp_publicly_queryable = get_post_meta($post->ID, 'cp_publicly_queryable', true);
        $cp_show_ui = get_post_meta($post->ID, 'cp_show_ui', true);
        $cp_show_in_menu = get_post_meta($post->ID, 'cp_show_in_menu', true);
        $cp_query_var = get_post_meta($post->ID, 'cp_query_var', true);
        $cp_rewrite = get_post_meta($post->ID, 'cp_rewrite', true);
        $cp_has_archive = get_post_meta($post->ID, 'cp_has_archive', true);
        $cp_hierarchical = get_post_meta($post->ID, 'cp_hierarchical', true);
        $cp_capability_type = get_post_meta($post->ID, 'cp_capability_type', true);
        $cp_menu_position = get_post_meta($post->ID, 'cp_menu_position', true);
        $cp_s_title = get_post_meta($post->ID, 'cp_s_title', true);
        $cp_s_editor = get_post_meta($post->ID, 'cp_s_editor', true);
        $cp_s_author = get_post_meta($post->ID, 'cp_s_author', true);
        $cp_s_thumbnail = get_post_meta($post->ID, 'cp_s_thumbnail', true);
        $cp_s_form_builder = get_post_meta($post->ID, 'cp_s_form_builder', true);
        $cp_s_comments = get_post_meta($post->ID, 'cp_s_comments', true);
        $cp_general_name = get_post_meta($post->ID, 'cp_general_name', true);
        $cp_singular_name = get_post_meta($post->ID, 'cp_singular_name', true);
        $cp_add_new = get_post_meta($post->ID, 'cp_add_new', true);
        $cp_add_new_item = get_post_meta($post->ID, 'cp_add_new_item', true);
        $cp_edit_item = get_post_meta($post->ID, 'cp_edit_item', true);
        $cp_new_item = get_post_meta($post->ID, 'cp_new_item', true);
        $cp_all_items = get_post_meta($post->ID, 'cp_all_items', true);
        $cp_view_item = get_post_meta($post->ID, 'cp_view_item', true);
        $cp_search_items = get_post_meta($post->ID, 'cp_search_items', true);
        $cp_not_found = get_post_meta($post->ID, 'cp_not_found', true);
        $cp_not_found_in_trash = get_post_meta($post->ID, 'cp_not_found_in_trash', true);
        $cp_parent_item_colon = get_post_meta($post->ID, 'cp_parent_item_colon', true);
        $cp_form_builder = get_post_meta($post->ID, 'cp_form_builder', true);
        ?>
    
        <?php include( plugin_dir_path(__FILE__) . 'index.php' );
    }

    public function init_custom_post_types() {
        $labels = array(
            'name' => _x('CPT', 'post type general name'),
            'singular_name' => _x('CPT', 'post type singular name'),
            'add_new' => _x('Add New Post Type', 'CPT'),
            'add_new_item' => __('Add New Post Type'),
            'edit_item' => __('Edit Post Type'),
            'new_item' => __('New Post Type'),
            'all_items' => __('All Post Types'),
            'view_item' => __('View Post Type'),
            'search_items' => __('Search Post Type'),
            'not_found' => __('No Post Type found'),
            'not_found_in_trash' => __('No Post Type found in Trash'),
            'parent_item_colon' => '',
            'menu_name' => __('Post Types')
        );
        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title')
        );
        register_post_type('CPT', $args);

        $the_query = new WP_Query(array('post_type' => array('CPT')));
        while ($the_query->have_posts()) : $the_query->the_post();
            global $post;
            //*************************get the values
            $cp_public = get_post_meta($post->ID, 'cp_public', true);
            if ($cp_public == "on") {
                $cp_public = true;
            } else {
                $cp_public = false;
            }
            $cp_publicly_queryable = get_post_meta($post->ID, 'cp_publicly_queryable', true);
            if ($cp_publicly_queryable == "on") {
                $cp_publicly_queryable = true;
            } else {
                $cp_publicly_queryable = false;
            }
            $cp_show_ui = get_post_meta($post->ID, 'cp_show_ui', true);
            if ($cp_show_ui == "on") {
                $cp_show_ui = true;
            } else {
                $cp_show_ui = false;
            }
            $cp_show_in_menu = get_post_meta($post->ID, 'cp_show_in_menu', true); //
            if ($cp_show_in_menu == "on") {
                $cp_show_in_menu = true;
            } else {
                $cp_show_in_menu = false;
            }
            $cp_query_var = get_post_meta($post->ID, 'cp_query_var', true); //
            if ($cp_query_var == "on") {
                $cp_query_var = true;
            } else {
                $cp_query_var = false;
            }
            $cp_rewrite = get_post_meta($post->ID, 'cp_rewrite', true); //
            if ($cp_rewrite == "on") {
                $cp_rewrite = true;
            } else {
                $cp_rewrite = false;
            }
            $cp_has_archive = get_post_meta($post->ID, 'cp_has_archive', true); //
            if ($cp_has_archive == "on") {
                $cp_has_archive = true;
            } else {
                $cp_has_archive = false;
            }
            $cp_hierarchical = get_post_meta($post->ID, 'cp_hierarchical', true);
            if ($cp_hierarchical == "on") {
                $cp_hierarchical = true;
            } else {
                $cp_hierarchical = false;
            }
            $cp_capability_type = get_post_meta($post->ID, 'cp_capability_type', true);
            $cp_menu_position = get_post_meta($post->ID, 'cp_menu_position', true);
            $cp_s_title = get_post_meta($post->ID, 'cp_s_title', true);
              $cp_s[] = array();
            if ($cp_s_title == "on") {
                $cp_s[] = 'title';
            }
            $cp_s_editor = get_post_meta($post->ID, 'cp_s_editor', true);
            if ($cp_s_editor == "on") {
                $cp_s[] = 'editor';
            }
            $cp_s_author = get_post_meta($post->ID, 'cp_s_author', true);
            if ($cp_s_author == "on") {
                $cp_s[] = 'author';
            }
            $cp_s_thumbnail = get_post_meta($post->ID, 'cp_s_thumbnail', true);
            if ($cp_s_thumbnail == "on") {
                $cp_s[] = 'thumbnail';
            }
             $cp_s_form_builder = get_post_meta($post->ID, 'cp_s_form_builder', true);
            if ($cp_s_form_builder == "on") {
                $cp_s[] = 'form_builder';
            }
            $cp_s_excerpt = get_post_meta($post->ID, 'cp_s_excerpt', true);
            if ($cp_s_excerpt == "on") {
                array_push($cp_s, 'excerpt');
            }
            $cp_s_comments = get_post_meta($post->ID, 'cp_s_comments', true);
            if ($cp_s_comments == "on") {
                array_push($cp_s, 'comments');
            }
            $cp_general_name = get_post_meta($post->ID, 'cp_general_name', true);
            $cp_singular_name = get_post_meta($post->ID, 'cp_singular_name', true);
            $cp_add_new = get_post_meta($post->ID, 'cp_add_new', true);
            $cp_add_new_item = get_post_meta($post->ID, 'cp_add_new_item', true);
            $cp_edit_item = get_post_meta($post->ID, 'cp_edit_item', true);
            $cp_new_item = get_post_meta($post->ID, 'cp_new_item', true);
            $cp_all_items = get_post_meta($post->ID, 'cp_all_items', true);
            $cp_view_item = get_post_meta($post->ID, 'cp_view_item', true);
            $cp_search_items = get_post_meta($post->ID, 'cp_search_items', true);
            $cp_not_found = get_post_meta($post->ID, 'cp_not_found', true);
            $cp_not_found_in_trash = get_post_meta($post->ID, 'cp_not_found_in_trash', true);
            $cp_parent_item_colon = get_post_meta($post->ID, 'cp_parent_item_colon', true);
            $cp_form_builder = get_post_meta($post->ID, 'cp_form_builder', true);

            $labels = array(
                'name' => _x(get_the_title($post->ID), 'post type general name'),
                'singular_name' => _x($cp_singular_name, 'post type singular name'),
                'add_new' => _x($cp_add_new, get_the_title($post->ID)),
                'add_new_item' => __($cp_add_new_item),
                'edit_item' => __($cp_edit_item),
                'new_item' => __($cp_new_item),
                'all_items' => __($cp_all_items),
                'view_item' => __($cp_view_item),
                'search_items' => __($cp_search_items),
                'not_found' => __($cp_not_found),
                'not_found_in_trash' => __($cp_not_found_in_trash),
                'parent_item_colon' => __($cp_parent_item_colon),
                'menu_name' => __(get_the_title($post->ID))
            );
            $args = array(
                'labels' => $labels,
                'public' => $cp_public,
                'publicly_queryable' => $cp_publicly_queryable,
                'show_ui' => $cp_show_ui,
                'show_in_menu' => $cp_show_in_menu,
                'query_var' => $cp_query_var,
                'rewrite' => $cp_rewrite,
                'capability_type' => 'post',
                'has_archive' => $cp_has_archive,
                'hierarchical' => $cp_hierarchical,
                'menu_position' => $cp_menu_position,
                'supports' => $cp_s
            );
            register_post_type(get_the_title($post->ID), $args);

        endwhile;
    }

    public function cpt_add_meta_boxes() {
        add_meta_box('cpt_meta_id', 'Custom Post Type Settings ', array($this,'cpt_inner_custom_box'), 'CPT', 'normal');
    }

}
