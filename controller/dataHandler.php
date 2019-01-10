<?php

class dataHandler {

    //Instantiate some properties
    private $_conn;
    private $dsn = 'mysql:host=127.0.0.1;dbname=multiversum';
    private $username = 'root';
    private $password = '';

    function __construct()
    {
        /**
		 * Make an new instance of the db connection method
		 */

        $this->_conn = new PDO($this->dsn, $this->username, $this->password);
        $this->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function createData($sql)
    {
        /**
		 * Execute a create query
         * 
         * @return last_inserted_id
		 */

        $this->_conn->exec($sql);
        return "Product " . $this->_conn->lastInsertId() . " succesvol toegevoegd.";
    }

    function readData($sql)
    {
        /**
		 * Grabs a single data row as object
         * 
         * @return fetchAll
		 */

        $stmt = $this->_conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    function readDataAssoc($sql)
    {
        /**
		 * Grabs all data as associative array
         * 
         * @return fetchAll
		 */

        $stmt = $this->_conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readAllData($sql) 
    {
        /**
		 * Grabs all data rows as object
         * 
         * @return fetchAll
		 */

        $stmt = $this->_conn->prepare($sql);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    function updateData($sql)
    {
        /**
		 * Update a row
         * 
         * @return last_inserted_id
		 */

        $stmt = $this->_conn->prepare($sql);
        $stmt->execute();
        return $this->_conn->lastInsertId();
    }

    function deleteData($sql)
    {
        /**
		 * Delete a row
         * 
         * @return message 'verwijderd'
		 */

        $stmt = $this->_conn->prepare($sql);
        $stmt->execute();

        return "verwijderd";
    }
}
