		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
		<script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
		<?php 
			if(isset($scripts)){
				foreach($scripts as $script_name){
					$src = base_url() . "public/js/" . $script_name; ?>
					<script src="<?=$src?>"></script>
				<?php }
			}
		?>
	</body>
</html>