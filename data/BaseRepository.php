<?php
abstract class BaseRepository
{
    private $conn;
    
    function __construct()
    {
        $mysql_database = "puchiedarcycom";
        $mysql_hostname = "localhost";
        $mysql_username = "michelle";
        $mysql_password = "rocksoftly";
        
        $this->conn = mysql_connect($mysql_hostname, $mysql_username, $mysql_password);
        mysql_select_db($mysql_database, $this->conn);
    }
    
    function Select($query)
    {
        $results = array();
        
        $rows = $this->Execute($query);
        while ($row = mysql_fetch_assoc($rows)) {
            array_push($results, $row);
        }
        
        return $results;
    }
    
    function Execute($query)
    {
        $results = mysql_query($query) or die("Error: " . mysql_error() . "\n");
        return $results;
    }
    
    function GetLastInsertId()
    {
        return mysql_insert_id($this->conn);
    }
    
    function Escape($string)
    {
        $string = mysql_real_escape_string($string);
        
        $p = new HTMLPurifier();
        return $p->purify($string);
    }
}