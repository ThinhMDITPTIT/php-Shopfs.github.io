<?php 
	session_start();
	require_once __DIR__. "/../../libraries/Database.php";
	require_once __DIR__. "/../../libraries/Function.php";

    $db = new Database;

    if(!isset($_SESSION['admin_id']))
    {
    	header("location: /webphp/login/");
    }

    define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/webphp/public/uploads/");

//Tổng người dùng
    $CountUsers = $db->countTable("users");
//Tổng danh mục sản phẩm
    $CountCates = $db->countTable("category");
//Tổng sản phẩm
    $CountPros = $db->countTable("product");
//Tổng đơn hàng
    $CountOrders = $db->countTable("transaction");
//Tổng doanh thu
    $CountBillsql = "SELECT SUM(amount) FROM transaction WHERE status = 1";
    $CountBill = $db->total($CountBillsql);
?>