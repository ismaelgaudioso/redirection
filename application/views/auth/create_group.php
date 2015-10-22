
<?php if($message): ?>
<div class="alert alert-info" role="alert" id="infoMessage"><?php echo $message;?></div>
<?php endif; ?>




<div class="container">

	<h2><?php echo lang('create_group_title'); ?></h2>

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