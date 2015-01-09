<?php
namespace er;

class EREngine
{
	public static function getContent($content = null)
	{
		global $post, $wpdb;

		// Get the meta information of the content
		$postMetaData = $post;

		// Get the post type 
		$postType = $postMetaData->post_type;

		// Call the db retriveal function 

		$table_prefix = $wpdb->prefix;
		$easy_replace = $table_prefix.'easyreplace';	
		
		$QueryforData = $wpdb->prepare( "SELECT * FROM $easy_replace WHERE replaceat = %s", $postType);

		$Data = $wpdb->get_results($QueryforData);

		$Search = array();
		$Replace = array();

		// Match and replace it 
		foreach ($Data as $row ) 
		{
			$Search[] = $row->sourcestring;
			$Replace[] = $row->destinationstring;
		}
		
		$content = str_replace( $Search, $Replace, $content);

		return $content;

	}

}
?>