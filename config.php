<?php
	define ( 'MYSQL_HOST',      '127.0.0.1:3307' );
	define ( 'MYSQL_BENUTZER',  'xb4438_2' );

	define ( 'MYSQL_KENNWORT',  file_get_contents("../config/datab.cofg") );
	define ( 'MYSQL_DATENBANK', 'xb4438_db2' );

	function ExecSQLNonSelect($sql)
	{
		$db_link = mysql_connect(MYSQL_HOST,MYSQL_BENUTZER,MYSQL_KENNWORT) or die('error: ' . mysql_error());
		$db_sel = mysql_select_db(MYSQL_DATENBANK) or die("error choosing db");
		mysql_query ( $sql) or die ('wrong query: ' . mysql_error());
		mysql_close($db_link);	
	}
	
	function ExecSQLReturnAArray($sql)
	{
		$db_link = mysql_connect(MYSQL_HOST,MYSQL_BENUTZER,MYSQL_KENNWORT) or die('error: ' . mysql_error());
		$db_sel = mysql_select_db(MYSQL_DATENBANK) or die("error choosing db");
		$db_erg = mysql_query ( $sql) or die ('wrong query: ' . mysql_error());
		mysql_close($db_link);
		return $db_erg;
	}


?>
