<?php
// require_once('dataHandler.php');

require_once('controller/dataHandler.php');

class htmlElements {

	//Instantiate the html property
	public $html;

	public function __construct() 
	{	
		/**
         * Make a new instance of the class 
         */

		$this->dataHandler = new dataHandler();
	}

	public function sanitize($content)
	{
		/**
         * Simple (not finished) sanitize method
		 * 
		 * @param content
		 * 
		 * @return dom
         */

		$dom = html_entity_decode($content);
		$dom = preg_replace('#<script(.?)>(.?)</script>#is', '', $dom);
		$dom = strip_tags($dom, '<script>');
		$dom = htmlentities($dom);
		$dom = htmlspecialchars($dom);

		return $dom;
	}

	public function displaySearchProducts()
	{
		/**
		 * Simple search method which grabs all products by the search keyword
		 * 
         * @return html
         */

		if(isset($_POST["search"])) 
		{
            $searchinfo = $_POST["searchinfo"];
            $sql = "SELECT * FROM products WHERE product_name LIKE '%$searchinfo%' OR product_brand LIKE '%$searchinfo%'";
            $products = $this->dataHandler->readAllData($sql);
        } 

		$this->html = '';

		foreach($products as $product)
		{
			if($product->sale == 0)
			{
				$price = '&euro;'.$product->product_price;
			}
			else
			{
				$price = '<span class="sale">&euro;'.$product->product_price.'</span> &euro;'.$product->sale_price;
			}

			$this->html .= '<div class="col-md-4 mb-4">';
			$this->html .= '<div class="card" style="width: 18rem;">
								<a href="/details?pid='.$product->product_id.'">
									<img class="card-img-top img-custom" src="assets/custom/img/'.$product->product_image.'" alt="'.$product->product_name.'">
								</a>	
								<div class="card-body">
									<h5 class="card-title"><a href="/details?pid='.$product->product_id.'">'.$product->product_name.'</a></h5>
									<h5 class="card-title price">'. $price .'</h5>
									<button class="btn btn-success" type="button"><a href="/cart?pid='.$product->product_id.'">In winkelwagen</a></button>
								</div>
		  					</div>';
			$this->html .= '</div>';
		}
		return $this->html;
	}

	public function displayProducts()
	{
		/**
         * Get all the products and put them in a card
		 * 
		 * @return html
         */

		$sql = "SELECT * FROM products";
		$products = $this->dataHandler->readAllData($sql);

		$this->html = '';

		foreach($products as $product)
		{
			if($product->sale == 0)
			{
				$price = '&euro;'.$product->product_price;
			}
			else
			{
				$price = '<span class="sale">&euro;'.$product->product_price.'</span> &euro;'.$product->sale_price;
			}

			$this->html .= "<div class='col-lg-4 col-md-6 col-sm-12 portfolio-item mb-3'>
                       <div class='card h-100'> 
                       <a href='/details?pid=$product->product_id'><img class='card-img-top p-3' src=assets/custom/img/$product->product_image alt='$product->product_name'></a>
					   <div class='card-body d-flex align-items-start flex-column'>
					   <h5><a href='/details?pid=$product->product_id'>$product->product_name</a></h5>
					   <h5 class='card-title price'>$price</h5>
					   <button class='btn btn-success mt-auto' type='button'><a href='/cart?pid=$product->product_id'>In winkelwagen</a></button>
					   ";
					   
            $this->html .= "</div></div></div>";
		}
		$this->html .= "</div></div>";

		return $this->html;
	}

	public function createTable()
	{		
		/**
         * Creates a table
		 * 
		 * @return html
         */

		$sql = "SHOW COLUMNS FROM products";
		$headers = $this->dataHandler->readData($sql);
		
		$sql = "SELECT * FROM products";
		$rows = $this->dataHandler->readData($sql);

        $this->html = "<div class='table-responsive'><table class='table table-bordered table-striped'>";
		$this->html .= "<thead class='thead-light'><tr>";

        foreach($headers as $header)
        { 
            $this->html .= "<th>" . $header->Field . "</th>";
        }

        $this->html .= "<th>Action</th>";

        $this->html .= "</tr></thead>";

        foreach($rows as $row)
        {
            $this->html .= "<tbodt><tr>";

            foreach($row as $key => $value)
            {
				if($key === 'product_image')
				{
					$this->html .= "<td><img src='".$value."' width='150px' height='100px'></td>";
				}
				else
				{
					$this->html .= "<td>" . $value . "</td>";
				}
            }

            $this->html .= "<td><button class='btn btn-primary' type='submit'><a href='/read?pid=".$row->product_id."' style='color: white;'>Read</a></button><button class='btn btn-warning' type='submit'><a href='?action=update&id=".$row->product_id."' style='color: white;'>Update</a></button><button class='btn btn-danger' type='submit'><a href='?action=delete&id=".$row->product_id."' style='color: white;'>Delete</a></button></td>";

            $this->html .= "</tr></tbody>";
        }
        $this->html .= "</tr></table></div>";

        return $this->html;
	}

}