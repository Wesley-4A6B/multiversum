<?php

require_once('htmlElements.php');

class catalogusModel {

    public function __construct()
    {
        /**
         * Make a new instance of the class 
         */

        $this->htmlElements = new htmlElements();
    }

    //collect de catalogus via html elements
    public function collectCatalogus()
    {
        /**
         * Collect the catalogus
         * 
         * @return result
         */
        try
        {
            $result = $this->htmlElements->displayProducts();
        }
        catch(PDOException $e)
        {
            throw $e;
        }
        return $result;   
    }

}