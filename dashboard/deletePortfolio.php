<?php
session_start();

require_once 'lib/portfolio.php';

$proID = $_GET['proid'];

$res = deletePortfolio($proID);

if ($res = 1) {
    header("Location:allPortfolio.php");
} else {
    header("Location:allPortfolio.php");
}