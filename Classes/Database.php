<?php
Class DB
{
    var $connection;
    var $selected_db;
    function __construct()
    {
        $this->MakeConnection();
    }
    function MakeConnection()			// Check if a connection is possible (in other words... if config.php is correctly configured)
    {
        require "Configs/config.php";
        $this->connection = mysql_connect($db_host, $db_username, $db_password);
        if ($this->connection)
        {
            $this->selected_db = mysql_select_db($db_name);
            if ($this->selected_db)
                return true;
            else
                return false;
        }
        else
            return false;
    }
}
?>