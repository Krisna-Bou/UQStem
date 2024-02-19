<div class="container">
	<title>Register</title>
	<div class="col-4 offset-4">
		<?php echo form_open(base_url() . 'register/check_register'); ?>
		<h2 class="text-center">Register</h2>
		<div class="form-group">
			<?php echo $error; ?>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Email" required="required" name="email">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Username" required="required" name="username">
		</div>
		<div class="form-group">
			<input type="password" class="form-control" placeholder="Password" required="required" name="password">
		</div>
		<h2><small>Secret Questions</small></h2>
		<p> What is your favourite song?</p>
		<div class="form-group">
			<input type="text" class="form-control" required="required" name="s1">
		</div>
		<p> What city were you born in?</p>
		<div class="form-group">
			<input type="text" class="form-control" required="required" name="s2">
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block">Create Account</button>
		</div>


		<?php echo form_close(); ?>
	</div>
</div>

