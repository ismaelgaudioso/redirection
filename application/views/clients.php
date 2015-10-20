

<?php if(isset($message)): ?>
<div class="alert alert-info" role="alert" id="infoMessage"><?php echo $message;?></div>
<?php endif; ?>




<div class="container">
	<h2>Clients</h2>
	<table class="table table-striped">
		<tr>
			<th>Name</th>
			<th>Api Key</th>
			<th>Date</th>
			<th>Actions</th>
		</tr>
		<?php foreach ($apikeys as $apikey):?>
			<tr>
	            <td><?php echo htmlspecialchars($apikey->api_name,ENT_QUOTES,'UTF-8');?></td>
	            <td><?php echo $apikey->api_key;?></td>
	            <td><?php echo nice_date(unix_to_human($apikey->api_date,TRUE,'eu'),'d-m-Y h:m:s'); ?></td>
				<td>
					<div class="dropdown" style="display:inline">
					  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					    Copy URL<span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					    <li><a href="#">Update IP</a></li>
					  </ul>
					</div>
					<button class="btn btn-primary" data-id="<?php echo $apikey->api_id; ?>" data-toggle="modal" data-target="#regenerateApikey">Regenerate</button>
			  		<button class="btn btn-danger" data-id="<?php echo $apikey->api_id; ?>" data-toggle="modal" data-target="#deleteApikey">Delete</button></td>
			  		
				</td>
			</tr>
		<?php endforeach;?>
	</table>

	<button class="btn btn-default" data-toggle="modal" data-target="#newApikey">Add new</button>
		  

</div>


<div class="modal fade" id="deleteApikey" tabindex="-1" role="dialog" aria-labelledby="deleteApikey">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete API Key</h4>
      </div>
      <div class="modal-body">
        Are you sure you want remove this api key? Clients that current use it will be blocked.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="buttonDelete" >Eliminar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="regenerateApikey" tabindex="-1" role="dialog" aria-labelledby="regenerateApikey">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Regenerate API Key</h4>
      </div>
      <div class="modal-body">
        Are you sure you want regenerate this api key? Clients will have to update the new API Key value.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="buttonUpdate" >Update</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="newApikey" tabindex="-1" role="dialog" aria-labelledby="newApikey">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New API Key</h4>
      </div>
      <div class="modal-body">
        <form>
		  <div class="form-group">
		    <label for="nameApikey">Name</label>
		    <input type="text" class="form-control" id="nameApikey" placeholder="Name">
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="buttonCreate" >Create</button>
      </div>
    </div>
  </div>
</div>