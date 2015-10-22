
		<?php if($page_title != "Login"): ?>
		<div class="container">
	    	<hr>
	    	<footer>
	        	<p>© <a href="https://github.com/ismaelgaudioso/redirection" target="_blank">Redirector</a> 2015</p>
	      	</footer>
		</div>
		<?php endif; ?>

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