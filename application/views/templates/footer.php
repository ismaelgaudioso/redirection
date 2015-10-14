

		<?php foreach($min_loads["min_js"] as $script): ?>
        <script type="text/javascript" src="<?php echo $script; ?>"></script>
    	<?php endforeach; ?>

    	<?php if(isset($js)): ?>
    		<?php foreach($js as $script): ?>
        	<script type="text/javascript" src="<?php echo $script; ?>"></script>
    		<?php endforeach; ?>
    	<?php endif; ?>
    </body>
</html>