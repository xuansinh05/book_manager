<!DOCTYPE html>
<html>
<head>
	<title>Book Register</title>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1>Book Register</h1>

		<div class="frm-register">
			<div class="row">
				<div class="col-8">
					<form action="." method="post">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" value="<?php echo isset($name) ? $name : ''; ?>">
							<?php if (!empty($name_error)) { ?>
								<p><?php echo $name_error; ?></p>
							<?php } ?>
						</div>

						<div class="form-group">
							<label>Price</label>
							<input type="text" name="price" class="form-control" value="<?php echo isset($price) ? $price : ''; ?>">
							<?php if (!empty($price_error)) { ?>
								<p><?php echo $price_error; ?></p>
							<?php } ?>
						</div>
						
						<div class="form-group">
							<label>Description</label>
							<textarea name="description" class="form-control"><?php echo isset($description) ? $description : ''; ?></textarea>
							<?php if (!empty($description_error)) { ?>
								<p><?php echo $description_error; ?></p>
							<?php } ?>
						</div>

						<div class="form-group">
							<input type="hidden" name="action" value="process_add">
							<input type="submit" value="Register">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- js -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>