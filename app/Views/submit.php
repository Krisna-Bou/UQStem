<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Submit to ED</title>
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script> -->

<script>
    // Add restrictions
    Dropzone.options.fileupload = {
      acceptedFiles: 'image/*',
      maxFilesize: 1 // MB
    };
    </script>
</head>
<header>
        <h1>Submit Post</h1>
    </header>
		<?php echo form_open(base_url() . 'submit/check_submit'); ?>
        <div class="form-group col-5">
			<input type="text" class="form-control" placeholder="Title" required="required" name="title">
		</div>
		<div class="form-group col-5">
			<select name="cid" required="required" class="form-control">
				<option value = "CSSE2310">CSSE2310</option>
				<option value = "INFS3202">INFS3202</option>
				<option value = "ENGG4900">ENGG4900</option>
		</div>

		<div class="form-group col-10">
			<input type="text" class="form-control" placeholder="Body" required="required" name="body">
		</div>
		<div class="form-group col-2">
			<button type="submit" class="btn btn-primary btn-block">Submit</button>
		</div>
		
		<?php echo form_close(); ?>

</body>
</html>
