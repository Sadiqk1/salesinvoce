<?php
const DB_SERVER = '127.0.0.1';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'salesinvoice';
class dbconn
{
    protected $dbh;


    function __construct()
    {
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbh = $con;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }


}