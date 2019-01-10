<?php

require_once('model/loginModel.php');

class loginController {

    public function __construct()
    {
        /**
         * Make a new instance of the class 
         */

        $this->loginModel = new loginModel();
    }

    public function validateLogin()
    {
        /**
		 * Calls the submitLogin method and stores the value in app
         * 
         * @return app
		 */

        $app = $this->loginModel->submitLogin();

        include_once('view/admin/login.php');
        exit();
    }

}