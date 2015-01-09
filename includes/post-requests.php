<?php
namespace er;
/**
 * @package Internals
 */

// Action hook for AJAX Request
add_action('wp_ajax_page_add_new', array('er\PostData', 'addNew'));


class PostData
{
	public static function addNew()
	{
		// Get the form data
		$Data = self::getData();
	
		// Insert data into DB
		$RetVal = self::addData($Data);

		if($RetVal)
		{
			$msg = 'Successfully added';
		}
		else
		{
			$msg = 'Oops, there seems to be some issue.';
		}

		$response = array('status' => $RetVal, 'msg' 	=> $msg);
		
		wp_send_json($response);
	}

	public static function getData()
	{
		$Data = array();

		$Data['name'] 				= isset($_POST['name']) ? $_POST['name'] : ''; 	
		$Data['sourcestring'] 		= isset($_POST['sourcestring']) ? $_POST['sourcestring'] : '';		
		$Data['destinationstring'] 	= isset($_POST['destinationstring']) ? $_POST['destinationstring'] : '';		
		$Data['replaceat'] 			= isset($_POST['replaceat']) ? $_POST['replaceat'] : '';		

		$Data['places'] 			= ''; 
		$Data['created_at']     	= date('Y-m-d H:i:s');
		$Data['updated_at'] 		= date('Y-m-d H:i:s'); 

		$Data['misc'] 				= ''; 
		$Data['status'] 			= 1;

		return $Data;
	}

	public static function addData($Data)
	{
		global $wpdb;

		$table_prefix = $wpdb->prefix;
		$easyreplace = $table_prefix.'easyreplace';
		
		$wpdb->insert($easyreplace, $Data,	array('%s', '%s', '%s') ); 

		return true;
	}
}
?>