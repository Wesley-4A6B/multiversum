<?php

require_once('model/catalogusModel.php');

class catalogusController {

    public function __construct()
    {   
        /**
		 * Make an new instance of the classes
		 */

        $this->catalogusModel = new catalogusModel();
    }   

    public function showCatalogus()
    {
        /**
         * Calls the collectCatalogus method and stores the value in app
         * 
         * @return app
         */

        $app = $this->catalogusModel->collectCatalogus();  
        
        include_once('view/catalogus.php');
        exit();
    }

}