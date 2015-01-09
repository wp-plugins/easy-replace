<?php
$Lists = er\ERData::getList();
?>
<div class="wrap">
	<h2>
	Easy Replace
		<a href="<?php print admin_url('admin.php?page=er-add-new'); ?>" class="add-new-h2">Add New</a>
	</h2>
	
	<div class="tbox">
		<div class="tbox-heading">
			<h3>Quick Overview</h3>
			<a href="http://labs.think201.com/easy-replace" target="_blank" class="pull-right">Need help?</a>
		</div>
		<div class="tbox-body">
			<div class="trow">
				<div class="tcol">
					<b>Source String</b>
				</div>
				<div class="tcol">
					<b>Destination String</b>
				</div>
				<div class="tcol">
					<b>Occurrences</b>
				</div>
				<div class="tcol">
					<b>Applicable At</b>
				</div>
			</div>
		<?php
				foreach($Lists as $List)
				{
					?>
					<div class="trow">
						<div class="tcol">
							<a href="<?php print admin_url('#'); ?>">
								<?php echo $List->sourcestring;?>
							</a>
						</div>
						<div class="tcol">
							<a href="<?php print admin_url('#'); ?>">
								<?php echo $List->destinationstring;?>
							</a>
						</div>
						<div class="tcol">
							<a href="<?php print admin_url('#'); ?>">
								<?php echo $List->occurences;?>
							</a>
						</div>
						<div class="tcol">
							<p><?php echo $List->replaceat;?></p>
						</div>
						<div class="tcol">
							<a href="#">
								View Replacements
							</a>
						</div>
					</div>
					<?php
				}
				?>
		</div>
		<div class="tbox-footer">
			Quick list of all forms &amp; common actions.
		</div>
	</div>

</div>
