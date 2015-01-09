<?php
$post_types = get_post_types( '', 'names' ); 
?>

<div class="wrap">
 	<h2>
 		Add New
 		<a href="<?php print admin_url('admin.php?page=er-dashboard'); ?>" class="add-new-h2">Back</a>
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
		        <section>
		            <input type="hidden" name="action" value="page_add_new">
		            <div class="twp-row">
		                <div class="twp-col-lg-12 twp-col-md-12 twp-col-sm-12 twp-col-xs-12">
		                    <div class="fr-fields-container">  
		                        <label for="sourcestring">Source String:</label>
		                        <input type="text" id="sourcestring" name="sourcestring" placeholder="String to be Found">
		                    </div>
		                    <div class="fr-fields-container">  
		                        <label for="destinationstring">Destination String:</label>
		                        <input type="text" id="destinationstring" name="destinationstring" placeholder="String to be Replaced" value="">
		                    </div>
		                     <div class="fr-fields-container"> 
		                        <label for="replaceat">Replace At:</label>
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
		                     </div>
		      
		                </div>		                
		            </div> 
		        </section>
		        <div class="tclear"></div>
		        <button onClick="ERForm.post('#er_add_form')" class="button button-primary" type="button">Add </button>
		    </form>

		</div>

		<div class="tbox-footer">
		  Add the details for the form reader. Make sure your cross check the details provided.
		</div>
	</div>
</div>
