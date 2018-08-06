<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Upload</title>
	</head>
	<body style="max-width: 500px; margin:0 auto; padding-top: 50px">

		<?php echo !empty($this->session->flashdata('error')) ? '<h3 style="color:red">'.$this->session->flashdata('error').'</h3>' : ''; ?>
		<?php echo !empty($this->session->flashdata('success')) ? '<h3 style="color:green">'.$this->session->flashdata('success').'</h3>' : ''; ?>

		<?php echo form_open_multipart('upload/image_upload'); ?>
			<input type="file" name="userfile" accept="image/*" required>
			<button type="submit">Uplaod</button>
		<?php echo form_close(); ?>

	</body>
</html>
