
<?php 

session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
	$action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
	case 'add': { // show form add
		include 'register.php';
		break;
	}

	case 'process_add': { // process data when submit form
		$name = filter_input(INPUT_POST, 'name');
		$price = filter_input(INPUT_POST, 'price');
		$description = filter_input(INPUT_POST, 'description');
		$flag = true;

		// validate name
		if (empty($name)) {
			$name_error = 'The name is required.';
			$flag = false;
		}
		// validate price
		if (empty($price)) {
			$price_error = 'The price is required.';
			$flag = false;
		}
		// validate description
		if (empty($description)) {
			$description_error = 'The description is required.';
			$flag = false;
		}

		// check $flag = true
		if ($flag) {
			// create an array
			$code = 'code_' . date('YmdHis');
			$book = array(
				'code' => $code,
				'name' => $name,
				'price' => $price,
				'description' => $description,
			);

			// add new element to array of SESSION
			$_SESSION['books'][$code] = $book;

			// get data of SESSION current
			$books = $_SESSION['books'];
			include 'list.php';
		} else {
			include 'register.php';
		}

		break;
	}

	case 'edit': {
		$code = filter_input(INPUT_GET, 'code');
		// validate $code
		if (empty($code)) {
			$error = 'The code is invalid.';
			include 'list.php';
		} else {
			// get book from SESSION
			$book = isset($_SESSION['books'][$code]) ? $_SESSION['books'][$code] : null;
			include 'edit.php';
		}

		break;
	}

	case 'process_edit': { // process data when submit form
		$name = filter_input(INPUT_POST, 'name');
		$price = filter_input(INPUT_POST, 'price');
		$description = filter_input(INPUT_POST, 'description');
		$flag = true;

		// validate name
		if (empty($name)) {
			$name_error = 'The name is required.';
			$flag = false;
		}
		// validate price
		if (empty($price)) {
			$price_error = 'The price is required.';
			$flag = false;
		}
		// validate description
		if (empty($description)) {
			$description_error = 'The description is required.';
			$flag = false;
		}

		// check $flag = true
		if ($flag) {
			// update an array
			$code = filter_input(INPUT_POST, 'code');

			// update element to array of SESSION
			$_SESSION['books'][$code]['name'] = $name;
			$_SESSION['books'][$code]['price'] = $price;
			$_SESSION['books'][$code]['description'] = $description;

			// get data of SESSION current
			$books = $_SESSION['books'];
			include 'list.php';
		} else {
			include 'edit.php';
		}

		break;
	}

	case 'detail': {
		$code = filter_input(INPUT_GET, 'code');
		// validate $code
		if (empty($code)) {
			$error = 'The code is invalid.';
			// get data of SESSION current
			$books = $_SESSION['books'];
			include 'list.php';
		} else {
			// get book from SESSION
			$book = isset($_SESSION['books'][$code]) ? $_SESSION['books'][$code] : null;
			include 'detail.php';
		}

		break;
	}

	case 'delete': {
		$code = filter_input(INPUT_GET, 'code');
		// validate $code
		if (empty($code)) {
			$error = 'The code is invalid.';
		} else {
			unset($_SESSION['books'][$code]);
		}

		// get data of SESSION current
		$books = $_SESSION['books'];
		include 'list.php';

		break;
	}

	case 'search_price': {
		$books = $_SESSION['books'];

		$price = 0;
		$book = null;
		foreach ($books as $key => $value) {
			if ($value['price'] > $price) {
				$price = $value['price'];
				$book = $value;
			}
		}

		include 'highest_price.php';
		break;
	}
	
	default: {
		$books = isset($_SESSION['books']) ? $_SESSION['books'] : NULL;
		include 'list.php';
		break;
	}
}

 ?>