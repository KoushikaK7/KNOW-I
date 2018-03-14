<?php
class ICanDbConnection
{
	var $m_conn = false;
 
	function __construct()
	{
		$this->m_conn = mysql_connect('localhost','root','')or die('cannot connect to the server');
		mysql_select_db('glosys')or die('cannot select the database');
		mysql_query ("set character_set_results='utf8'");
	}
	
	function close()
	{
		return mysql_close($this->m_conn);
	}
}
?>