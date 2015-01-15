<?php
$Lists = er\ERData::getList();
$Replace_list_table = new er\ERListTable();
?>
<div class="wrap">
	<h2>
	Easy Replace
		<a href="<?php print admin_url('admin.php?page=er-add-new'); ?>" class="add-new-h2"><?php esc_html_e( 'Add New' , 'easy-replace');?></a>
	</h2>
	<h4><?php esc_html_e('Quick List of All Replacements', 'easy-replace')?></h4>
<?php
$Replace_list_table->display();
?>

</div>
