<?php
namespace er;

class ERData
{
	public static function getList()
	{
		global $wpdb;

		$easy_replace = $wpdb->prefix.'easyreplace';	

		$SQLQuery =  $wpdb->prepare("SELECT * FROM $easy_replace WHERE status = %s", 1);

		if(isset($_POST['s']))
		{
			$SQLQuery .=  " AND name LIKE '%".$_POST['s']."%'";
		}

		$Data = $wpdb->get_results($SQLQuery);

		return $Data;
	}

	public static function getForm($id)
	{
		global $wpdb;

		$easy_replace = $wpdb->prefix.'easyreplace';	

		$Query = $wpdb->prepare( "SELECT * FROM $easy_replace WHERE id = %d AND status = %s", $id, 1);	
		$Data = $wpdb->get_row($Query);

		return ERData::_processData($Data);
	}

	public static function getFormRequests($id)
	{
		global $wpdb;

		$easy_replace = $wpdb->prefix.'easyreplace';

		$QueryforData = $wpdb->prepare( "SELECT * FROM $easy_replace WHERE status = %s", $id, 1);
		
		$Data = $wpdb->get_results($QueryforData);

		return $Data;
	}

	public static function deleteReplacement($id)
	{
		global $wpdb;

		$er = $wpdb->prefix.'easyreplace';
		
		$wpdb->delete( $er, array( 'id' => $id ), array( '%d' ) );

		return true;
	}

}
?>