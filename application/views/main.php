
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

