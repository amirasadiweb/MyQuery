<?php
//require 'vendor/autoload.php';
require 'class/QueryBuilder.php';


$queryBuilder= new QueryBuilder('mylib');
$collection = $queryBuilder->selCollection('books');
//$queryBuilder->delete("5f9bd3a88001000063000e6c");
// $queryBuilder->update('5f9bd8c28001000063000e70','company','myamir');
//$queryBuilder->insert('moein','Ask','iran','AmirasadiWeb@gmail.com');

$list = Array("name", "company","country","email");
echo $queryBuilder->show($list);




