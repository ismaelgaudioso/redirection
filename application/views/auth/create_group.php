<nav class="navbar navbar-inverse navbar-fixed-top">
       	<div class="container">
	        <div class="navbar-header">
	        	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			    </button>
	        	<a class="navbar-brand" href="#">Redirector</a>
	        </div>
	        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
		       	<ul class="nav navbar-nav navbar-right">
			            <li><a href="<?php echo base_url(); ?>">Home</a></li>
			            <li class="active dropdown">
			            	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Config <span class="caret"></span></a>
			            	<ul class="dropdown-menu">
			                  <li><a href="<?php echo base_url(); ?>config">General</a></li>
			                  <li><a href="<?php echo base_url(); ?>auth">Manage users</a></li>
			                  <li role="separator" class="divider"></li>
			                  <li><a href="#">Stats</a></li>
			                </ul>
			            </li>
			            <li><a href="<?php echo base_url(); ?>logout">Logout</a></li>
			    </ul>
		    </div>
       	</div>
</nav>

<?php if($message): ?>
<div class="alert alert-info" role="alert" id="infoMessage"><?php echo $message;?></div>
<?php endif; ?>




<div class="container">

	<h2>Create group</h2>

<?php echo form_open("auth/create_group");?>

      <p>
            <?php echo lang('create_group_name_label', 'group_name');?> <br />
            <?php echo form_input($group_name);?>
      </p>

      <p>
            <?php echo lang('create_group_desc_label', 'description');?> <br />
            <?php echo form_input($description);?>
      </p>

      <p><?php echo form_submit('submit', lang('create_group_submit_btn'));?></p>

<?php echo form_close();?>

</div>