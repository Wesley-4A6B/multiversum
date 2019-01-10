<?php

require_once('model/cartModel.php');

class cartController {

    public function __construct()
    {
        /**
		 * Make an new instance of the classes
		 */

        $this->cartModel = new cartModel();
    }

    public function makeCart()
    {
        /**
         * Call showCart method and stores the value in app
         * 
         * @return app
         */

        $app = $this->cartModel->showCart();
        return $app;
    }

}