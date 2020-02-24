<!DOCTYPE html>
<html>
<head>
	<title>Book List</title>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1>Book List</h1>

		<div class="form-group">
			<a href=".?action=add" class="btn btn-primary">Add New Book</a>
			<a href=".?action=search_price" class="btn btn-secondary">Highest Price </a>
		</div>

		<?php if (!empty($error)) { ?>
			<p class="text-danger"><?php echo $error; ?></p>
		<?php } ?>

		<div class="frm-register">
			<?php if (!empty($books)) { ?>
				<table class="table table-striped table-bordered">
				    <thead>
				      <tr>
				      	<th>No.</th>
				        <th>Code</th>
				        <th>Book Name</th>
				        <th>Price</th>
				        <th>Description</th>
				        <th colspan="3">Action</th>
				      </tr>
				    </thead>
				    <tbody>
				    	<?php $count = 1; foreach ($books as $key => $value) { ?>
					      <tr>
					      	<td><?php echo $count; ?></td>
					        <td><?php echo $value['code']; ?></td>
					        <td><?php echo $value['name']; ?></td>
					        <td><?php echo $value['price']; ?></td>
					        <td><?php echo $value['description']; ?></td>
					        <td><a href=".?action=detail&code=<?php echo $value['code']; ?>" class="btn btn-success">Detail</a></td>
					        <td><a href=".?action=edit&code=<?php echo $value['code']; ?>" class="btn btn-primary">Edit</a></td>
					        <td>
					        	<form action=".">
					        		<input type="hidden" name="code" value="<?php echo $value['code']; ?>">
					        		<input type="hidden" name="action" value="delete">
					        		<button type="submit" class="btn btn-danger">Delete</button>
					        	</form>
					        	<!-- <a href=".?action=delete&code=<?php echo $value['code']; ?>">Delete</a> -->
					        </td>
					      </tr>
					      <?php $count++; ?>
					  	<?php } ?>
				    </tbody>
				  </table>
				<?php } else { ?>
				<p>Data empty</p>
				<?php } ?>
		</div>
	</div>

	<!-- js -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>