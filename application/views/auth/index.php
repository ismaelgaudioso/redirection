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

<?php if($message): ?>
<div class="alert alert-info" role="alert" id="infoMessage"><?php echo $message;?></div>
<?php endif; ?>




<div class="container">
	<h2>Users</h2>
	<table class="table table-striped">
		<tr>
			<th><?php echo lang('index_fname_th');?></th>
			<th><?php echo lang('index_lname_th');?></th>
			<th><?php echo lang('index_email_th');?></th>
			<th><?php echo lang('index_groups_th');?></th>
			<th><?php echo lang('index_status_th');?></th>
			<th><?php echo lang('index_action_th');?></th>
		</tr>
		<?php foreach ($users as $user):?>
			<tr>
	            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
	            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
	            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
				<td>
					<?php foreach ($user->groups as $group):?>
						<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
	                <?php endforeach?>
				</td>
				<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
				<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
			</tr>
		<?php endforeach;?>
	</table>

	<p><?php echo anchor('auth/create_user', lang('index_create_user_link'))?> | <?php echo anchor('auth/create_group', lang('index_create_group_link'))?></p>
</div>