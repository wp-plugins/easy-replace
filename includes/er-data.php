<?php
namespace er;

class ERData
{
	public static function getList()
	{
		global $wpdb;

		$table_prefix = $wpdb->prefix;
		$easy_replace = $table_prefix.'easyreplace';	
		
		$QueryforData = $wpdb->prepare( "SELECT * FROM $easy_replace WHERE status = %s", 1);
		$Data = $wpdb->get_results($QueryforData);

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

}
?>