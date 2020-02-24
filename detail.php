<!DOCTYPE html>
<html>
<head>
	<title>Book Edit</title>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1>Book Edit</h1>

		<div class="frm-register">
			<div class="row">
				<div class="col-8">
					<form action="." method="post">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" value="<?php echo isset($book['name']) ? $book['name'] : ''; ?>" disabled>
						</div>

						<div class="form-group">
							<label>Price</label>
							<input type="text" name="price" class="form-control" value="<?php echo isset($book['price']) ? $book['price'] : ''; ?>" disabled>
						</div>
						
						<div class="form-group">
							<label>Description</label>
							<textarea name="description" class="form-control" disabled><?php echo isset($book['description']) ? $book['description'] : ''; ?></textarea>
						</div>

						<div class="form-group">
							<a href="." class="btn btn-primary">Book List</a>
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