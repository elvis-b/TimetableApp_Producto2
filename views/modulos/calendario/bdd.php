<?php
try
{
	//$bdd = new PDO('mysql:host=localhost;dbname=calendar;charset=utf8', 'root', '');
        
        $bdd = new PDO('mysql:host=localhost;dbname=producto_2;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
