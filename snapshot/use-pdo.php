<?php
$dsn = "mysql:host=localhost;dbname=hoteldb";
$user = "'hoteldb_admin'";
$password = "admin123";
$pdo = null;
try {
   	$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET 'utf8'");
	// PDOの呼び出し
	$pdo = new PDO($dsn, $user, $password, $options);
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
if(!is_null($pdo)){
    echo "データベスに接続に成功しました。";
}else{
    echo "データベスに接続に失敗しました。";
}
 
$sql = "select * from restaurants where area=?"; 
$pstmt = $pdo->prepare($sql); 
$pstmt->bindValue(1, 2); 
$pstmt->execute(); 
$rs= $pstmt ->fetchAll();

foreach ($rs as $record){
    $restaurant = [];
    $restaurant["id"]=record["id"];
    $restaurant["name"]=record["name"];
    $restaurant["detail"]=record["detail"];
    $restaurant["image"]=record["image"];
    $restaurant["area"]=record["area"];
    $restaurant[]=$restaurant;
} 
?>