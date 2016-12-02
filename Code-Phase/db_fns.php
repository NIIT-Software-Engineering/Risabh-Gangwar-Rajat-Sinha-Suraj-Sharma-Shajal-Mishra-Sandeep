<?php
	function db_connect() {
		$result = new mysqli ('localhost', 'review_user', 'DataStorage987#$%', 'reviewSys');
		if (!$result)
		{
			throw new Exception('Could not connect to database server');
		} else
		{
			return $result;
		}
	}
?>
