<?php

if(isset($_GET['action']) && isset($_GET['id']))
{
	if($_GET['action'] === 'delete')
	{
		er\ERData::deleteReplacement($_GET['id']); 
	}
}

$Replace_list_table = new er\ERListTable();
?>
<div class="wrap t201plugin">
	<h2>
		Easy Replace
		<a href="<?php print admin_url('admin.php?page=er-add-new'); ?>" class="add-new-h2"><?php esc_html_e( 'Add New' , 'easy-replace');?></a>
	</h2>
	<h4><?php esc_html_e('Quick List of All Replacements', 'easy-replace')?></h4>

	<form method="post">
		<input type="hidden" name="page" value="my_list_test" />
		<?php $Replace_list_table->search_box('search', 'search_id'); ?>
	</form>

	<?php
	$Replace_list_table->display();
	?>

</div>
