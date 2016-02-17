<?php
$connectionString = sprintf("mysql:host=%s; port=%s; dbname=%s", 'localhost', 3306, 'tablas');

try {
	$cn = new PDO( $connectionString, 'root', 'root');
	$cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$cn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND , "SET NAMES 'ISO-8859-1'");
} catch (PDOException $e) {
   	echo $e->getMessage();
}
header('Content-type: text/plain');

function update() {
	global $cn;
	try {
		$cn->beginTransaction();
		$cn->exec("update contacts set nombre='Daniel' where id=1");
		$cn->exec("insert contacts set nombre='Nuevo', fecnac='2000-01-01'");
		echo $cn->lastInsertId();
		$cn->exec("update contacts set nombre='Daniel 5' where id=7");
		$cn->exec("update contacts set nombre='Daniel 9' where id=8");
		
		/**/
		$cn->commit();
	} catch (PDOException $e) {
		$cn->rollBack();
		echo $e->getMessage();
	}
	// si se usa modo transacciones no devuelve el ultimo id.
	//echo $cn->lastInsertId() . "\n";
}

function select() {
	global $cn;
	try {
		$rs = $cn->query("select nombre, email from contacts");
	} catch (PDOException $e) {
		$cn->rollBack();
		echo $e->getMessage();
	}
	print_r($rs->fetchAll(PDO::FETCH_OBJ));
}

function multiselect() {
	global $cn;
	try {
		$rs = $cn->query("select * from contacts where id=1;
		select * from contacts where id=7;");
	} catch (PDOException $e) {
		$cn->rollBack();
		echo $e->getMessage();
	}
	do {
		print_r($rs->fetchAll(PDO::FETCH_OBJ));
	} while($rs->nextRowset());
}

//$rs = select();
multiselect();


?>