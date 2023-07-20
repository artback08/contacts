<?php

if (isset($_POST['name'])){
    $name = $_POST['name'];
};

if (isset($_POST['phone'])){
    $phone = $_POST['phone'];
};

// Create
if (isset($_POST['submit'])) {
	$sql = ("INSERT INTO `people`(`name`, `phone`) VALUES(?,?)");
	$query = $pdo->prepare($sql);
	if($query->execute([$name, $phone,])){
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
    else{
        echo 'error';
    }
}

// Read
$sql = $pdo->prepare("SELECT * FROM `people` WHERE `is_deleted` = 0");
$sql->execute();
$peoples = $sql->fetchAll();

// Update
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
	$sqll = "UPDATE people SET is_deleted=? WHERE id = {$id}";
	$querys = $pdo->prepare($sqll);
	$querys->execute([1]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}

// Phone formatter
function phone_format($phone) 
{
	$phone = trim($phone);
 
	$res = preg_replace(
		array(
			'/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{3})[-|\s]?\)[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
			'/[\+]?([7|8])[-|\s]?(\d{3})[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
			'/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{4})[-|\s]?\)[-|\s]?(\d{2})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
			'/[\+]?([7|8])[-|\s]?(\d{4})[-|\s]?(\d{2})[-|\s]?(\d{2})[-|\s]?(\d{2})/',	
			'/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{4})[-|\s]?\)[-|\s]?(\d{3})[-|\s]?(\d{3})/',
			'/[\+]?([7|8])[-|\s]?(\d{4})[-|\s]?(\d{3})[-|\s]?(\d{3})/',					
		), 
		array(
			'+7 $2 $3 $4 $5', 
			'+7 $2 $3 $4 $5', 
			'+7 $2 $3 $4 $5', 
			'+7 $2 $3 $4 $5', 	
			'+7 $2-$3 $4', 
			'+7 $2 $3 $4', 
		), 
		$phone
	);
 
	return $res;
}