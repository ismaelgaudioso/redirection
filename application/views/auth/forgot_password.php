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
		       	
		    </div>
       	</div>
</nav>

<?php if($message): ?>
<div class="alert alert-info" role="alert" id="infoMessage"><?php echo $message;?></div>
<?php endif; ?>




<div class="container">

	<h2>Forgot password?</h2>

<?php echo form_open("auth/forgot_password");?>

      <p>
      	<label for="email"><?php echo sprintf(lang('forgot_password_email_label'), $identity_label);?></label> <br />
      	<?php echo form_input($email);?>
      </p>

      <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'));?></p>

<?php echo form_close();?>

</div>