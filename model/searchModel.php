<?php

require_once('controller/dataHandler.php');
require_once('model/htmlElements.php');

class searchModel {

    //Instantiate the html property
    public $html;

    public function __construct()
    {
        /**
         * Make a new instance of the classes 
         */

        $this->dataHandler = new dataHandler();
        $this->htmlElements = new htmlElements();
    }

    public function getSearch()
    {
        /**
         * Calls the displaySearchProducts method and stores the value in result
         * 
         * @return result
         */

        $result = $this->htmlElements->displaySearchProducts();
        return $result;
    }
}