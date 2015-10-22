<?php if($page_title != "Login"): ?>
<nav class="navbar navbar-inverse navbar-fixed-top">
       	<div class="container">
	        <div class="navbar-header">
	        	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only"><?php echo lang("toggle_navigation"); ?></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			    </button>
	        	<a class="navbar-brand" href="<?php echo base_url(); ?>"><?php  $app_name?><img src="<?php echo base_url();?>assets/images/horizontal_blanco.png"  alt="logo" style="height:25px;"/></a>
	        </div>
	        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
		       	<ul class="nav navbar-nav navbar-right">
		       		<?php if($this->ion_auth->logged_in()): ?>
			            <li class="<?php echo ($page_title == "Home")? "active" : "" ?>"><a href="<?php echo base_url(); ?>"><?php echo lang("home"); ?></a></li>
			            <li class="<?php echo ($page_title == "Configuration")? "active" : "" ?> dropdown">
			            	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo lang("config"); ?> <span class="caret"></span></a>
			            	<ul class="dropdown-menu">
			                  <li><a href="<?php echo base_url(); ?>config"><?php echo lang("general"); ?></a></li>
			                  <li><a href="<?php echo base_url(); ?>auth"><?php echo lang("users"); ?></a></li>
			                  <li><a href="<?php echo base_url(); ?>clients"><?php echo lang("clients"); ?></a></li>
			                  
			                </ul>
			            </li>
			            <li><a href="<?php echo base_url(); ?>logout"><?php echo lang("logout"); ?></a></li>
			        <?php endif; ?>
			    </ul>
		    </div>
       	</div>
</nav>
<?php endif; ?>