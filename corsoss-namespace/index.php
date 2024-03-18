<?php
include "prova1.php";
include "prova2.php";
use Spazio1\Prova as Prova1;
use Spazio2\Prova as Prova2;

$obj1=new Prova1;
$obj1->m1(); // Output: ciao dal metodo Spazio1\Prova::m1 della classe Spazio1\Prova