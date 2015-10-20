
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