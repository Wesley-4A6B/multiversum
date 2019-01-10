<?php

require_once('model/searchModel.php');

class searchController {

    public function __construct()
    {
        /**
         * Make a new instance of the class 
         */

        $this->searchModel = new searchModel();
    }

    public function showSearch()
    {
        /**
		 * Calls the submitLogin method and stores the value in app
         * 
         * @return app
		 */

        $app = $this->searchModel->getSearch();
        include_once('view/search.php');
    }

}