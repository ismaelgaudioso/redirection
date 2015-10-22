
        <div class="jumbotron">
	      <div class="container">
	        <h1><?php echo lang('last','Last: '); ?> <?php echo $current_ip["ip"]; ?></h1>
	        <p><?php echo lang('description1'); ?> <strong><?php echo $current_ip["last_date"]; ?></strong>. <?php echo lang('description2'); ?></p>
	        <p><a class="btn btn-primary btn-lg" href="config" role="button"><?php echo lang('button_config_params'); ?></a></p>
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
		          			<p><span class="label label-default"><?php echo lang('last_access'); ?> <?php echo nice_date(unix_to_human($redirection->last_date,TRUE,'eu'),'d-m-Y h:m:s'); ?></span></p>
		          			<p><a class="btn btn-default redirectionButton" data-id="<?php echo $redirection->config_id; ?>" href="<?php echo ($redirection->config_type=="redirection_ssl")? "https":"http" ?>://<?php echo $current_ip["ip"].":".$redirection->config_value; ?>" role="button" target="_blank"><?php echo lang('button_go'); ?></a></p>
		        		</div>
		        	</div>
		        </div>
		        <?php endforeach; ?>		       
		    </div>

	    </div>

