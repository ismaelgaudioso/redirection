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
			                  <li><a href="#">Manage users</a></li>
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
	    <h1>Config</h1>

	    <div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">General Parameters</h3>
		  </div>
		  <div class="panel-body">
		    Panel content
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
			  <tr>
			  	<td>Transmission</td>
			  	<td>Torrent client</td>
			  	<td>9091</td>
			  	<td>No</td>
			  	<td><button class="btn btn-default">Edit</button><button class="btn btn-default">Delete</button></td>
			  </tr>
			</table>
			<button class="btn btn-default">Add new</button>
		  </div>
		</div>

	</div>


    