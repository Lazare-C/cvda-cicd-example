<?php
require_once("Account.php");

$acc1 = new Account("Théo", "LeRoux", "mail@gogo.com", "pass123");
$acc2 = new Account("Théo", "LeBOnd", "mail@gogo.com", "pass123");


echo $acc1;
echo "\n----- \n";
echo $acc2;

