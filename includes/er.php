<?php
namespace er;

// Action hook for AJAX Request
add_action('wp_ajax_post_er_form', array('er\EasyReplace', 'captureForm'));

class EasyReplace
{
	protected static $instance = null;

	public function __construct()
    {
    }

    public static function get_instance() 
    {
	 	// create an object
	 	NULL === self::$instance and self::$instance = new self;

	 	return self::$instance;
	 }

    // Initiation Hook
    public function init()
    {
		
    }

    public static function captureForm()
    {
        $RetVal = false;

        do
        {
            // Check if hidden field is exist
            if(!isset($_POST['post_er_value']) OR empty($_POST['post_er_value']))
            {
                $RetVal = false;
                break;
            }

            $FRValue = $_POST['post_er_value'];

            // Get the details from DB for that form
            $FormConfig = ERData::getForm($FRValue);

            // Collect the form data from the POST Value
            $FormData = EasyReplace::getFormData($FormConfig);

            // Save to DB
            ERDatabase::saveToDb($FormConfig, $FormData);

            // Send Mail
            ERMailer::sendMail($FormConfig, $FormData);

            $RetVal = true;
        }
        while(0);

        if($RetVal)
        {
            $Message = $FormConfig->options->formsuccessmessage;
        }
        else
        {
            $Message = $FormConfig->options->formfailmessage;
        }

        $response = array('status' => $RetVal,'msg'  => $Message);

        wp_send_json($response);
    }

    public static function getFormData($FormConfig)
    {
        // Get the fields names from DATA
        $DataFields = $FormConfig->fields;

        $PostData = array();

        foreach ($DataFields as $field) 
        {
            if(isset($_POST[$field->name]))
            {
                $PostData[$field->name] = $_POST[$field->name];
            }
        }

        return $PostData;
    }   
}

?>