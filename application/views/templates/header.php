<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="Free Dynamic Direction. Point your dynamic IP to a hostname.">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="<?=base_url()?>assets/images/favicon.ico" type="image/x-icon">

        <title><?php echo $page_title; ?></title>
        
        <?php foreach($min_loads["min_css"] as $link): ?>
        <link rel="stylesheet" href="<?php echo $link; ?>" />
    	<?php endforeach; ?>

    	<?php if(isset($css)): ?>
    		<?php foreach($css as $cs): ?>
        	<link rel="stylesheet" href="<?php echo $cs; ?>" />
    		<?php endforeach; ?>
    	<?php endif; ?>

    </head>
    <body>