
	<div class="container">
	    <div class="panel panel-default" style="margin-top:30px;">
		  <div class="panel-heading">
		    <h3 class="panel-title"><?php echo lang('general_params'); ?></h3>
		  </div>
		  <div class="panel-body">

		    <form class="form-inline">
			  <div class="form-group">
			    <label class="sr-only" for="address"><?php echo lang('IP_Address'); ?></label>
			    <div class="input-group">
			      <div class="input-group-addon"><?php echo lang('IP_Address'); ?></div>
			      <input type="text" class="form-control" id="address" placeholder="0.0.0.0" value="<?php echo($current_ip["address"]); ?>" readonly>
			    </div>
			  </div>
			  <button id="changeIpButtonForm" class="btn btn-primary" data-id="1" data-toggle="modal" data-target="#changeIp" data-backdrop="static"><?php echo lang('change_ip_button'); ?></button>
			  <button id="updateIpButtonForm" class="btn btn-primary" data-id="1" data-toggle="modal" data-target="#updateIp" data-backdrop="static"><?php echo lang('update_ip_button'); ?></button>
			  
			</form>
			<div class="alert alert-info" style="margin-top:15px"><?php echo lang('last_update'); ?>: <?php echo nice_date(unix_to_human($current_ip["last_update"],TRUE,'eu'),'d-m-Y h:m:s'); ?></div>

		  </div>
		</div>

	    <div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title"><?php echo lang('redirections'); ?></h3>
		  </div>
		  <div class="panel-body">		  	
		    <table class="table table-bordered">
			  <tr>
			  	<th><?php echo lang('name'); ?></th><th><?php echo lang('description'); ?></th><th><?php echo lang('port'); ?></th><th><?php echo lang('ssl'); ?></th><th><?php echo lang('actions'); ?></th>
			  </tr>
			  <?php foreach($redirections as $redirection): ?>
			  <tr>
			  	<td><?php echo $redirection->config_name; ?></td>
			  	<td><?php echo $redirection->config_description; ?></td>
			  	<td><?php echo $redirection->config_value; ?></td>
			  	<td>
			  		<?php if($redirection->config_type != "redirection_ssl"): ?>
			  		<span class="label label-default"><?php echo lang('default'); ?></span>
			  		<?php else: ?>
			  		<span class="label label-success"><?php echo lang('ssl'); ?></span>
			  		<?php endif; ?>
			  	</td>
			  	<td>
			  		<button class="btn btn-default" data-id="<?php echo $redirection->config_id; ?>" data-toggle="modal" data-target="#editRedirection"><?php echo lang('edit_button'); ?></button>
			  		<button class="btn btn-default" data-id="<?php echo $redirection->config_id; ?>" data-toggle="modal" data-target="#deleteRedirection"><?php echo lang('delete_button'); ?></button></td>
			  </tr>
			  <?php endforeach; ?>
			</table>			
			<button class="btn btn-default" data-toggle="modal" data-target="#newRedirection"><?php echo lang('add_new_button'); ?></button>
		  </div>
		</div>

	</div>


<div class="modal fade" id="editRedirection" tabindex="-1" role="dialog" aria-labelledby="editRedirection">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editModalTitle"><?php echo lang('edit_button'); ?></h4>
      </div>
      <div class="modal-body">
        <form>
		  <div class="form-group">
		    <label for="nameEditInput"><?php echo lang('name'); ?></label>
		    <input type="text" class="form-control" id="nameEditInput" placeholder="<?php echo lang('name'); ?>">
		  </div>
		  <div class="form-group">
		    <label for="descriptionEditInput"><?php echo lang('description'); ?></label>
		    <input type="text" class="form-control" id="descriptionEditInput" placeholder="<?php echo lang('description'); ?> ...">
		  </div>
		   <div class="form-group">
		    <label for="portEditInput"><?php echo lang('port'); ?></label>
		    <input type="text" class="form-control" id="portEditInput" placeholder="<?php echo lang('port_number'); ?>">
		  </div>
		  <div class="checkbox">
		    <label>
		      <input type="checkbox" id="sslEditCheckbox"> <?php echo lang('ssl_connection'); ?>
		    </label>
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close_button'); ?></button>
        <button type="button" class="btn btn-primary" id="buttonEdit"><?php echo lang('save_button'); ?></button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteRedirection" tabindex="-1" role="dialog" aria-labelledby="deleteRedirection">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo lang('delete_redirection'); ?></h4>
      </div>
      <div class="modal-body">
        <?php echo lang('message_remove'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close_button'); ?></button>
        <button type="button" class="btn btn-danger" id="buttonDelete" ><?php echo lang('delete_button'); ?></button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="newRedirection" tabindex="-1" role="dialog" aria-labelledby="newRedirection">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo lang('create_new_redirection'); ?></h4>
      </div>
      <div class="modal-body">
        <form>
		  <div class="form-group">
		    <label for="nameEditInput"><?php echo lang('name'); ?></label>
		    <input type="text" class="form-control" id="nameEditInput" placeholder="Name">
		  </div>
		  <div class="form-group">
		    <label for="descriptionEditInput"><?php echo lang('description'); ?></label>
		    <input type="text" class="form-control" id="descriptionEditInput" placeholder="<?php echo lang('description'); ?> ...">
		  </div>
		   <div class="form-group">
		    <label for="portEditInput"><?php echo lang('port'); ?></label>
		    <input type="text" class="form-control" id="portEditInput" placeholder="<?php echo lang('port_number'); ?>">
		  </div>
		  <div class="checkbox">
		    <label>
		      <input type="checkbox" id="sslEditCheckbox"> <?php echo lang('ssl_connection'); ?>
		    </label>
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close_button'); ?></button>
        <button type="button" class="btn btn-primary" id="buttonCreate"><?php echo lang('new_button'); ?></button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="changeIp" tabindex="-1" role="dialog" aria-labelledby="changeIp">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo lang('change_ip_button'); ?></h4>
      </div>
      <div class="modal-body">
         <form>
		  <div class="form-group">
		    <label for="addressIp"><?php echo lang('IP_Address'); ?></label>
		    <input type="text" class="form-control" id="addressIp" placeholder="0.0.0.0" value="<?php echo($current_ip["address"]); ?>">
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close_button'); ?></button>
        <button type="button" class="btn btn-primary" id="buttonChangeIp" ><?php echo lang('change_button'); ?></button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="updateIp" tabindex="-1" role="dialog" aria-labelledby="updateIp">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo lang('update_ip_button'); ?></h4>
      </div>
      <div class="modal-body">
      		<?php echo lang('update_ip_message'); ?>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close_button'); ?></button>
        <button type="button" class="btn btn-primary" id="buttonUpdateIp" ><?php echo lang('update_button'); ?></button>
      </div>
    </div>
  </div>
</div>


    