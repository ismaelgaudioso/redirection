   <nav class="navbar navbar-inverse navbar-fixed-top">
       	<div class="container">
	        <div class="navbar-header">
	        	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			    </button>
	        	<a class="navbar-brand" href="#">Free Redirection</a>
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

	<div class="container">
	    <div class="panel panel-default" style="margin-top:30px;">
		  <div class="panel-heading">
		    <h3 class="panel-title">General Parameters</h3>
		  </div>
		  <div class="panel-body">

		    <form class="form-inline">
			  <div class="form-group">
			    <label class="sr-only" for="address">IP Address</label>
			    <div class="input-group">
			      <div class="input-group-addon">IP Address</div>
			      <input type="text" class="form-control" id="address" placeholder="0.0.0.0" value="<?php echo($current_ip["address"]); ?>" readonly>
			    </div>
			  </div>
			  <button id="changeIpButtonForm" class="btn btn-primary" data-id="1" data-toggle="modal" data-target="#changeIp" data-backdrop="static">Change IP</button>
			  <button id="updateIpButtonForm" class="btn btn-primary" data-id="1" data-toggle="modal" data-target="#updateIp" data-backdrop="static">Update IP</button>
			  
			</form>
			<div class="alert alert-info" style="margin-top:15px">Última actualización: <?php echo nice_date(unix_to_human($current_ip["last_update"],TRUE,'eu'),'d-m-Y h:m:s'); ?></div>

		  </div>
		</div>

	    <div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">Redirections</h3>
		  </div>
		  <div class="panel-body">		  	
		    <table class="table table-bordered">
			  <tr>
			  	<th>Name</th><th>Description</th><th>Port</th><th>SSL</th><th>Actions</th>
			  </tr>
			  <?php foreach($redirections as $redirection): ?>
			  <tr>
			  	<td><?php echo $redirection->config_name; ?></td>
			  	<td><?php echo $redirection->config_description; ?></td>
			  	<td><?php echo $redirection->config_value; ?></td>
			  	<td>
			  		<?php if($redirection->config_type != "redirection_ssl"): ?>
			  		<span class="label label-default">default</span>
			  		<?php else: ?>
			  		<span class="label label-success">SSL</span>
			  		<?php endif; ?>
			  	</td>
			  	<td>
			  		<button class="btn btn-default" data-id="<?php echo $redirection->config_id; ?>" data-toggle="modal" data-target="#editRedirection">Edit</button>
			  		<button class="btn btn-default" data-id="<?php echo $redirection->config_id; ?>" data-toggle="modal" data-target="#deleteRedirection">Delete</button></td>
			  </tr>
			  <?php endforeach; ?>
			</table>			
			<button class="btn btn-default" data-toggle="modal" data-target="#newRedirection">Add new</button>
		  </div>
		</div>

	</div>


<div class="modal fade" id="editRedirection" tabindex="-1" role="dialog" aria-labelledby="editRedirection">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editModalTitle">Editar</h4>
      </div>
      <div class="modal-body">
        <form>
		  <div class="form-group">
		    <label for="nameEditInput">Name</label>
		    <input type="text" class="form-control" id="nameEditInput" placeholder="Name">
		  </div>
		  <div class="form-group">
		    <label for="descriptionEditInput">Description</label>
		    <input type="text" class="form-control" id="descriptionEditInput" placeholder="Description ...">
		  </div>
		   <div class="form-group">
		    <label for="portEditInput">Port</label>
		    <input type="text" class="form-control" id="portEditInput" placeholder="Port Number">
		  </div>
		  <div class="checkbox">
		    <label>
		      <input type="checkbox" id="sslEditCheckbox"> SSL Connection
		    </label>
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="buttonEdit">Guardar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteRedirection" tabindex="-1" role="dialog" aria-labelledby="deleteRedirection">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete redirection</h4>
      </div>
      <div class="modal-body">
        Are you sure you want remove this redirection?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="buttonDelete" >Eliminar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="newRedirection" tabindex="-1" role="dialog" aria-labelledby="newRedirection">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create new redirection</h4>
      </div>
      <div class="modal-body">
        <form>
		  <div class="form-group">
		    <label for="nameEditInput">Name</label>
		    <input type="text" class="form-control" id="nameEditInput" placeholder="Name">
		  </div>
		  <div class="form-group">
		    <label for="descriptionEditInput">Description</label>
		    <input type="text" class="form-control" id="descriptionEditInput" placeholder="Description ...">
		  </div>
		   <div class="form-group">
		    <label for="portEditInput">Port</label>
		    <input type="text" class="form-control" id="portEditInput" placeholder="Port Number">
		  </div>
		  <div class="checkbox">
		    <label>
		      <input type="checkbox" id="sslEditCheckbox"> SSL Connection
		    </label>
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="buttonCreate">Crear</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="changeIp" tabindex="-1" role="dialog" aria-labelledby="changeIp">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete redirection</h4>
      </div>
      <div class="modal-body">
         <form>
		  <div class="form-group">
		    <label for="addressIp">IP Address</label>
		    <input type="text" class="form-control" id="addressIp" placeholder="0.0.0.0" value="<?php echo($current_ip["address"]); ?>">
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="buttonChangeIp" >Cambiar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="updateIp" tabindex="-1" role="dialog" aria-labelledby="updateIp">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete redirection</h4>
      </div>
      <div class="modal-body">
         This action update the IP Address with your current public IP. Are you sure?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="buttonUpdateIp" >Update</button>
      </div>
    </div>
  </div>
</div>


    