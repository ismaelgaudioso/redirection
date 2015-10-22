<form class="form-signin" action="<?php echo base_url();?>auth/login" method="post" accept-charset="utf-8">

        <img src="<?php echo base_url();?>assets/images/vertical.png"  alt="logo" style="width:300px;margin:5px auto 20px auto;"/>

        <h2 class="form-signin-heading" style="display:none;"><?php echo lang('login_heading');?></h2>
        <p><?php echo lang('login_subheading');?></p>

        <?php if($message): ?>
        <div class="alert alert-danger" role="alert"><?php echo $message; ?></div>
        <?php endif; ?>

        <label for="identity" class="sr-only"><?php echo lang('login_identity_label', 'identity');?></label>
        <input type="email" name="identity" id="identity" class="form-control" placeholder="Email address" required="" autofocus="" value="<?php echo $identity["value"]; ?>">
        
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
        
        <div class="checkbox">
          <label>
            <input type="checkbox" name="remember" value="1" id="remember"> <?php echo lang('login_remember_label', 'remember');?>
          </label>
        </div>

        <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo lang("login_sign_in_button"); ?></button>
</form>