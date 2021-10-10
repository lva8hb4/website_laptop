<?php

class Data_Provider
{
    public function ketNoi(){
        $conn = new mysqli("localhost","root","","website_laptop") or die
        (mysqli_error());
        $conn->set_charset("utf8");
        return $conn;
    }
}
