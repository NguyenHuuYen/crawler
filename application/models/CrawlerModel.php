<?php

/**
 * Class CrawlerModel.
 * @param object $db is a connection database.
 */

class CrawlerModel
{
	public function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (Exception $e) {
            echo 'Caught exception: ' . $e->getMessage();
        }
	}
	
	/**
	 * Insert article's data to database.
	 * @return alert if success.
	 * @return null if fail.
	 */
    public function save($data)
    {
		// Transform keys to 1 array, values to 1 array.
        foreach ($data as $key => $value) {
			$keys[] = $key;
			// Function addslashes() adds slash to the start of ' or ". 
			$values[] = "'" . addslashes($value) . "'";
		}
		// Implode array to string is true with format to insert data.
		$_keys = implode(',', $keys);
		$_values = implode(',', $values);
		$sql = sprintf("INSERT INTO %s(%s) VALUES (%s)", TB_NAME, $_keys, $_values);
		$query = $this->db->query($sql);
		if ($query) {
			echo "<script>
			          alert('Save article_id = {$this->db->insert_id} to database SUCCESSFUL.');
					  window.history.back(-1);
				  </script>";
		}
		return null;
    }
}

?>