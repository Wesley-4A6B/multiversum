<?php

require_once('model/detailsModel.php');

class detailsController {

    public function __construct()
    {
        /**
		 * Make an new instance of the class
		 */

        $this->detailsModel = new detailsModel();
    }

    public function showDetails()
    {
        /**
		 * Call getDetails method and stores the value in app
         * 
         * @return app
		 */

        $app = $this->detailsModel->getDetails();
        return $app;
    }

}