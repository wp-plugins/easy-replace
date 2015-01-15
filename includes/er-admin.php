<?php
namespace er;

class ERAdmin
{
    protected static $instance = null;

    public static function get_instance() 
    {
        // create an object
        NULL === self::$instance and self::$instance = new self;

        return self::$instance;
     }

    public function init()
    {   
        $this->fileInlcudes();

        add_action('admin_menu', array($this, 'menuItems')); 
    }

    public function fileInlcudes()
    {
        require_once ER_PLUGIN_DIR .'/includes/post-requests.php';
        require_once ER_PLUGIN_DIR .'/includes/er-data.php';
        require_once ER_PLUGIN_DIR .'/includes/er-engine.php';
        require_once ER_PLUGIN_DIR .'/includes/er-listtable.php';
    }

    public function menuItems()
    {
        $PageA = add_options_page( 'Easy Replace', 'Easy Replace', 'manage_options', 'er-dashboard', array($this, 'pageDashboard'));
        $PageB = add_submenu_page( 'easy-replace', 'Easy Replace', 'Easy Replace', 'manage_options', 'er-add-new', array($this, 'pageAddNew') );                 

        add_action('admin_print_scripts-' . $PageA, array($this, 'adminScriptStyles'));
        add_action('admin_print_scripts-' . $PageB, array($this, 'adminScriptStyles'));
    }

    public function adminScriptStyles()
    {
        if(is_admin()) 
        {
            wp_enqueue_media();        
            wp_enqueue_script( 'er-ajax-request', plugins_url( 'easy-replace/js/er-admin.js' ), array( 'jquery' ), false, true );
            wp_localize_script( 'er-ajax-request', 'ERAjax', array( 'ajaxurl' => plugins_url( 'admin-ajax.php' ) ) );
            wp_enqueue_script( 'er-think201-validator', plugins_url( 'easy-replace/assets/js/think201-validator.js' ), array( 'jquery' ), false, true );
            
            wp_enqueue_style( 'er-css', plugins_url( 'easy-replace/assets/css/er.css' ), array(), ER_VERSION, 'all' );
        }
    }

    public function pageDashboard()
    {
        require_once ER_PLUGIN_DIR .'/pages/admin-dashboard.php';     
    }

    public function pageAddNew()
    {
        require_once ER_PLUGIN_DIR .'/pages/admin-add-new.php';     
    }
}
?>