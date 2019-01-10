<?php

require_once('controller/dataHandler.php');

class adminModel {

    //Instantiate the html property
    public $html;

	public function __construct()
    {
        /**
         * Make a new instance of the class 
         */

        $this->dataHandler = new dataHandler();
    }

    public function displayAdmin()
    {
        /**
		 * Collect the products and stores the values in app
         * 
         * @return app
		 */

        $app = $this->collectReadProducts();
        include 'view/admin/admin.php';
        exit();
    }

    public function collectReadProduct($sql) 
    {
        /**
		 * Calls the readData method and stores the value in app
         * 
         * @return app
		 */

		$app = $this->dataHandler->readData($sql);
        include 'view/admin/admin.php';
        exit();
	}

    public function collectReadProducts() 
    {
        /**
		 * Calls the readAllData method and stores the value in app
         * 
         * @return app
		 */

        $sql = "SELECT * FROM products";
		$app = $this->dataHandler->readAllData($sql);
        include 'view/admin/admin.php';
        exit();
	}

    public function createProduct() 
    {
        /**
		 * Create a product form
         * 
         * @return html
		 */

        $this->html = '
        <form action="" method="POST">
            <div class="form-group">
                <label for="ean_code">EAN</label>
                <input class="form-control" type="text" name="ean_code" placeholder="EAN Code" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="product_name">Naam</label>
                <input class="form-control" type="text" name="product_name" placeholder="Product naam" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="product_description">Beschrijving</label>
                <textarea class="form-control" name="product_description" placeholder="Productbeschrijving.." style="resize: none;"></textarea>
            </div>
            <div class="form-group">
                <label for="product_price">Prijs</label>
                <input class="form-control" type="decimal" name="product_price" placeholder="Prijs" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="product_brand">Merk</label>
                <input class="form-control" type="text" name="product_brand" placeholder="Merk" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="product_color">Kleur</label>
                <input class="form-control" type="text" name="product_color" placeholder="Kleur" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="product_platform">Platform</label>
                <input class="form-control" type="text" name="product_platform" placeholder="Platform" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="product_image">Afbeelding</label>
                <input class="form-control" type="file" name="product_image" autocomplete="off" required>
            </div>
            <input class="btn btn-success form-control" type="submit" value="Product toevoegen" name="create">
        </form>
        ';

        return $this->html;


    }

    public function updateProduct($updateProduct) 
    {
        /**
		 * Create a update form and fill the inputs from the param
         * 
         * @param updateProduct
         * 
         * @return html
		 */

        $this->html = '
        <form action="" method="POST">
            <div class="form-group">
                <label for="ean_code">EAN</label>
                <input class="form-control" type="text" value="'.$updateProduct['ean_code'].'" name="ean_code" placeholder="EAN Code" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="product_name">Naam</label>
                <input class="form-control" type="text" value="'.$updateProduct['product_name'].'" name="product_name" placeholder="Product naam" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="product_description">Beschrijving</label>
                <textarea class="form-control" name="product_description" style="resize: none;">'.$updateProduct['product_description'].'
                </textarea>
            </div>
            <div class="form-group">
                <label for="product_price">Prijs</label>
                <input class="form-control" type="decimal" value="'.$updateProduct['product_price'].'" name="product_price" placeholder="Prijs" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="product_brand">Merk</label>
                <input class="form-control" type="text" value="'.$updateProduct['product_brand'].'" name="product_brand" placeholder="Merk" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="product_color">Kleur</label>
                <input class="form-control" type="text" value="'.$updateProduct['product_color'].'" name="product_color" placeholder="Kleur" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="product_platform">Platform</label>
                <input class="form-control" type="text" value="'.$updateProduct['product_platform'].'" name="product_platform" placeholder="Platform" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="product_image">Afbeelding</label>
        
                <input class="form-control" type="file" name="product_image" autocomplete="off">
            </div>
            <input class="btn btn-success form-control" type="submit" value="Update" name="update">
        </form>
        ';

        return $this->html;
     }

    public function deleteProduct($sql) 
    {
        /**
		 * Calls the deleteData method and stores the value in app
         * 
         * @return app
		 */
		
        $app = $this->dataHandler->deleteData($sql);
        include('view/admin/admin.php');
        exit();       
	}

}