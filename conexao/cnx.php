<?php

class cnx {
    var $host = 'localhost';
    var $user = 'root';
    var $pass = '@ContrabandFox01';
    var $db = 'lea_db';
    var $myconn;

    function connect() {
        $con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$con) {
            die('Could not connect to database!');
        } else {
            $this->myconn = $con;
            $con->set_charset("utf8");
            //echo 'Connection established!';
        }
        return $this->myconn;
    }

    function close($myconn) {
        mysqli_close($myconn);
        //echo 'Connection closed!';
    }
}
