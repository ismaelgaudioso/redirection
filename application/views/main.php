
        
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
			            <li class="active"><a href="#">Home</a></li>
			            <li><a href="<?php echo base_url(); ?>config">Config</a></li>
			            <li><a href="<?php echo base_url(); ?>logout">Logout</a></li>
			        </ul>
		        </div>
       		</div>
        </nav>


        <div class="jumbotron">
	      <div class="container">
	        <h1>Last: <?php echo $current_ip["ip"]; ?></h1>
	        <p>This is the last IP register by de server at date <strong><?php echo $current_ip["last_date"]; ?></strong>. All URLs will use this address to redirect.</p>
	        <p><a class="btn btn-primary btn-lg" href="config" role="button">Config params »</a></p>
	      </div>
	    </div>

	    <div class="container">
	    	<div class="row">
		      	<?php foreach($redirections as $redirection): ?>
		        <div class="col-md-4">
		        	<div class="panel panel-default">
  						<div class="panel-heading"><strong><?php echo strtoupper($redirection->config_name); ?></strong></div>
		          		<div class="panel-body">
		          			<p><?php echo $redirection->config_description; ?></p>
		          			<p><span class="label label-default">Last access: <?php echo nice_date(unix_to_human($redirection->last_date,TRUE,'eu'),'d-m-Y h:m:s'); ?></span></p>
		          			<p><a class="btn btn-default" href="#" role="button" target="_blank">Go »</a></p>
		        		</div>
		        	</div>
		        </div>
		        <?php endforeach; ?>		       
		    </div>

	      <hr>

	      <footer>
	        <p>© Free Redirection 2015</p>
	      </footer>
	    </div>

