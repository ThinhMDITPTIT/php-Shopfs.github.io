<?php 
	session_start();
	require_once __DIR__. "/../libraries/Database.php";
	require_once __DIR__. "/../libraries/Function.php";

    $db = new Database;

    define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/webphp/public/uploads/");

    $category = $db->fetchAll("category");

    /**
    *	Lấy danh sách sản phẩm
    */

    //Sp mới nhất
    $sqlNew = "SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 3";
    $productNew = $db->fetchsql($sqlNew);

    //Sp khuyến mãi
    $sqlSale = "SELECT * FROM product WHERE 1 ORDER BY Sale DESC LIMIT 4";
    $productSale = $db->fetchsql($sqlSale);

    //Sp bán chạy
    // $sqlPay = "SELECT * FROM product WHERE 1 ORDER BY PAY DESC LIMIT 4";
    // $productPay = $db->fetchsql($sqlPay);
?>