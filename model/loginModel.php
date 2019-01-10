<?php

session_start();

require_once('controller/dataHandler.php');

class loginModel {

    public function __construct()
    {
        /**
         * Make a new instance of the dataHandler class 
         */

        $this->dataHandler = new dataHandler();
    }

    public function submitLogin()
    {
        /**
         * Submit the login form of the login button has been pushed
         */

        if(isset($_REQUEST['login']))
        {
            if($_REQUEST['email'] == '')
            {
                $e = 'Vul uw email adres in';
            }
            if($_REQUEST['password'] == '')
            {
                $e = 'Vul uw wachtwoord in';
            }
            
            $email = $_REQUEST['email'];
            $password = $_REQUEST['password'];

            $sql = "SELECT * FROM admins WHERE admin_email = '$email' AND admin_password = '$password'";
            $result = $this->dataHandler->readDataAssoc($sql);

            if($result)
            {
                $_SESSION['uid'] = $result[0];
                header('Location: /home');
            }
            else
            {
                die('Deze gegevens zijn niet bekend');
            }
        }   
    }

}