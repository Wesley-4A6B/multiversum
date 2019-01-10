<?php

require_once('model/adminModel.php');
require_once('dataHandler.php');

class adminController {

	public function __construct()
    {
		/**
		 * Make an new instance of the classes
		 */
        $this->adminModel = new adminModel();
        $this->dataHandler = new dataHandler();
    }

    public function collectCreateProduct() {

		/**
		 * Checks if the create form is submitted
		 * 
		 * @return app
		 */

  		// $target_dir = "assets/custom/img/";
		// $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
		// $uploadOk = 1;
		// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    	if(isset($_POST["create"])) {
    		$code = $_POST['ean_code'];
			$name = $_POST['product_name'];
			$desc = $_POST['product_description'];
			$price = $_POST['product_price'];
			$brand = $_POST['product_brand'];
			$pcolor = $_POST['product_color'];
			$platform = $_POST['product_platform'];
			$image = $_POST['product_image'];

			$sql = 'INSERT INTO products (ean_code, product_name, product_description, product_price, product_brand, product_color, product_platform, product_image) VALUES ("'. $code .'", "'.$name.'", "'.$desc.'", "'.$price.'", "'.$brand.'", "'.$pcolor.'", "'.$platform.'", "'.$image.'")';
			$app = $this->dataHandler->createData($sql);

			// // Check if image file is a actual image or fake image
		 //    $check = getimagesize($_FILES["product_image"]["tmp_name"]);
		 //    if($check !== false) {
		 //        echo "File is an image - " . $check["mime"] . ".";
		 //        $uploadOk = 1;
		 //    } else {
		 //        echo "File is not an image.";
		 //        $uploadOk = 0;
		 //    }
			// // Check if file already exists
			// if (file_exists($target_file)) {
			//     echo "Sorry, file already exists.";
			//     $uploadOk = 0;
			// }
			// // Check file size
			// if ($_FILES["product_image"]["size"] > 500000) {
			//     echo "Sorry, your file is too large.";
			//     $uploadOk = 0;
			// }
			// // Allow certain file formats
			// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			// && $imageFileType != "gif" ) {
			//     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			//     $uploadOk = 0;
			// }
			// // Check if $uploadOk is set to 0 by an error
			// if ($uploadOk == 0) {
			//     echo "Sorry, your file was not uploaded.";
			// // if everything is ok, try to upload file
			// } else {
			//     if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
			//         echo "The file ". basename( $_FILES["product_image"]["name"]). " has been uploaded.";
			//     } else {
			//         echo "Sorry, there was an error uploading your file.";
			//     }
			// }

			header("Location: /admin");
    	} else {
    		$app = $this->adminModel->createProduct();
    	}

    	return $app;
    }


    
	public function collectUpdateProduct() {

		/**
		 * Checks if the update form is submitted
		 * 
		 * @return app
		 */

		if(isset($_POST["update"])) {
    		$code = $_POST['ean_code'];
			$name = $_POST['product_name'];
			$desc = $_POST['product_description'];
			$price = $_POST['product_price'];
			$brand = $_POST['product_brand'];
			$pcolor = $_POST['product_color'];
			$platform = $_POST['product_platform'];
			$image = $_POST['product_image'];
		
			$id = $_GET['pid'];
			
			$sql = 'UPDATE products SET ean_code = "'.$code.'", product_name = "'.$name.'", product_description = "'.$desc.'", product_price = "'.$price.'", product_brand = "'.$brand.'", product_color =  "'.$pcolor.'", product_platform = "'.$platform.'", product_image = "'.$image.'" WHERE product_id = "'.$id.'" ';
			$app = $this->dataHandler->updateData($sql);

			header("Location: /admin");
    	} else {
    		$id = $_GET['pid'];
			$sql = "SELECT * FROM products WHERE product_id = '$id'";
			$updateProduct = $this->dataHandler->readDataAssoc($sql)[0];
    		$app = $this->adminModel->updateProduct($updateProduct);
    	}

    	return $app;

	}

	public function collectDeleteProduct() {

		/**
		 * Checks if the delete button is pressed
		 * 
		 * @return app
		 */
		
			$id = $_GET['pid'];
			$sql = "DELETE FROM products WHERE product_id = '$id'";

			$app = $this->adminModel->deleteProduct($sql);
			header("Location: /admin");

			return $app;
		}
}