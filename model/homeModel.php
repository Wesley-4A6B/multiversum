<?php

require_once('controller/dataHandler.php');

class homeModel {

    //Instantiate the html property
    public $html;

    public function __construct()
    {
        /**
         * Make a new instance of the dataHandler class 
         */

        $this->dataHandler = new dataHandler();
    }

    public function showSales()
    {
        /**
         * Shows the products in sale on the home page
         * 
         * @return html
         */

        $sql = "SELECT * FROM products WHERE sale = '1' LIMIT 9";
		$sales = $this->dataHandler->readData($sql);

		$this->html = '';

        $this->html .= "<div class='container'><div class='row d-flex align-items-stretch'>";
		foreach ($sales as $sale)
		{
            $this->html .= "<div class='col-lg-4 col-md-6 col-sm-12 portfolio-item mb-3'>
                       <div class='card h-100'> 
                       <a href='/details?pid=$sale->product_id'><img class='card-img-top p-3' src=assets/custom/img/$sale->product_image alt='$sale->product_name'></a>
					   <div class='card-body d-flex align-items-start flex-column'>
					   <h5><a href='/details?pid=$sale->product_id'>$sale->product_name</a></h5>
					   <h5 class='card-title price'><span class='sale'>&euro;$sale->product_price</span> &euro;$sale->sale_price</h5>
					   <button class='btn btn-success mt-auto' type='button'><a href='/cart?pid=$sale->product_id'>In winkelwagen</a></button>
					   ";
					   
            $this->html .= "</div></div></div>";
        }
		$this->html .= "</div></div>";
		
		return $this->html;   
		}

}