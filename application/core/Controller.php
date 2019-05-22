<?php

/**
 * Class Controller
 * This is the "base controller class". All other "real" controllers extend this class.
 */

class Controller
{
    public $db;
    public $model;

    /**
     * Whenever a controller is created, open a database connection too.
     */
    public function __construct()
    {
        $this->connectDatabase();
        $this->loadModel();
    }

    // Connect to database.
    public function connectDatabase()
    {
        $this->db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$this->db->set_charset('utf8');
		if ($this->db->connect_error) {
			die("Error: " . $this->db->connect_error);
		}
    }

    /**
     * Load model.
     * @return object model
     */
    public function loadModel()
    {
        require_once MODEL_PATH . 'CrawlerModel.php';
        $this->model = new CrawlerModel($this->db);
    }
}

?>