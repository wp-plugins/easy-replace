<?php
$post_types = get_post_types( '', 'names' ); 
?>

<div class="wrap">
 	<h2>
 		<?php esc_html_e( 'Add New' , 'easy-replace');?>
 		<a href="<?php print admin_url('admin.php?page=er-dashboard'); ?>" class="add-new-h2"><?php esc_html_e( 'Back' , 'easy-replace');?></a>
 	</h2>
	
	<div id="message" class="updated below-h2 fr-msg er_success_msg">
		<p>Form has been added</p>
	</div>
	<div id="message" class="error below-h2 fr-msg er_error_msg">
		<p>Form has been not added</p>
	</div>
 	<div class="tbox">
		<div class="tbox-heading">
			<h3>Easy Replace </h3>
		  	<a href="http://labs.think201.com/easy-replace" target="_blank" class="pull-right">Need help?</a>
		</div>
		<div class="tbox-body">
			<form name="er_add_form" id="er_add_form" action="#" method="post">		        
		            <input type="hidden" name="action" value="page_add_new">
		            	<table class="form-table">
		            		<tr valign="top">
		            			<th scope="row">
		            				<label for="sourcestring">SourceString:</label>
		            			</td>
		            			<td>
		                       		 <input type="text" id="sourcestring" name="sourcestring" placeholder="String to be Found" data-validations="required">
		            			</td>
		            		</tr>
		            		<tr valign="top">
		            			<th scope="row">
		            				 <label for="destinationstring">Destination String:</label>
		            			</td>
		            			<td>
		                       		 <input type="text" id="destinationstring" name="destinationstring" placeholder="String to be Replaced" value="" data-validations="required">
		            			</td>
		            		</tr>
		            		<tr valign="top">
		            			<th scope="row">
		            				<label for="replaceat">Replace At:</label>
		            			</td>
		            			<td>
		            				<select name="replaceat">
		            					<option value="">Select a Post Type</option>
		            					<?php
		            					foreach ( $post_types as $post_type ) 
		            					{
		            						?>
		            						<option value="<?php echo $post_type;?>"><?php echo $post_type;?></option>
		            						<?php
		            					}	
		            					?>		                     
		            				</select>
		            			</td>
		            		</tr>
		            	</table>
		            	<p class="submit">	
		            		 <button onClick="ERForm.post('#er_add_form')" class="button button-primary" type="button">Add Replacement</button>
		            	</p>
		    </form>
		</div>

		<div class="tbox-footer">
		  Provide string details to be searched for and replaced with. Easy replace does it for you.
		</div>
	</div>
</div>
