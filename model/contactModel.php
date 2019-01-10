<?php

require_once('controller/dataHandler.php');
require_once('htmlElements.php');

//Work in progress
//Not used anymore!

class contactModel {

	public function __construct() 
	{
		$this->dataHandler = new dataHandler();
		$this->htmlElements = new htmlElements();
	}

	public function contact()
	{		
        try
        {
			//$name = $this->htmlElements->sanitize($_REQUEST['naam']);
			//$email = $this->htmlElements->sanitize($_REQUEST['email']);
			//$subject = $this->htmlElements->sanitize($_REQUEST['onderwerp']);
			//$message = $this->htmlElements->sanitize($_REQUEST['bericht']);

            //$result = mail();
        }
        catch(PDOException $e)
        {
            throw $e;
        }
	}

	private function validateContactForm()
	{
		$errors = [];

		if(empty($_REQUEST['naam']))
		{
			array_push($errors, 'Geen naam ingevuld');
		}
		elseif(strlen($_REQUEST['naam']) > 30 || strlen($_REQUEST['naam']) < 3)
		{
			array_push($errors, 'Naam moet tussen de 2 en 30 karakters bevatten');
		}

		if(empty($_REQUEST['email']))
		{
			array_push($errors, 'Geen email ingevuld');
		}
		elseif(!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL))
		{
			array_push($errors, 'Geen geldig emailadres');
		}

		if(empty($_REQUEST['onderwerp']))
		{
			array_push($errors, 'Geen onderwerp ingevuld');
		}
		elseif(strlen($_REQUEST['onderwerp']) > 100 || strlen($_REQUEST['onderwerp']) < 5)
		{
			array_push($errors, 'Onderwerp moet tussen de 5 en 100 karakters bevatten');
		}

		if(empty($_REQUEST['bericht']))
		{
			array_push($errors, 'Geen bericht ingevuld');
		} 
		elseif(strlen($_REQUEST['bericht']) > 1000 || strlen($_REQUEST['bericht']) < 5)
		{
			array_push($errors, 'Bericht moet tussen de 5 en 1000 karakters bevatten');
		}
	
		return $errors;

	}
}