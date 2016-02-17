<?php

$host = "server";
$database = "kunan_erp";
$user = "dsalas";
$passwd = "metaldasd";

$cn = new PDO(sprintf("mysql:host=%s; dbname=%s",$host,$database),$user,$passwd);
$cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$cn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND , "SET NAMES 'ISO-8859-1'");

if (isset($_POST['v'])) {
	$val = iconv("UTF-8", "ISO-8859-1", $_POST['v']); //utf8_decode($_POST['v']);
	$sql = "update erp_lg_atrv set val='{$val}' where id=7";
	$cn->exec($sql);
}

$sql = "select * from erp_lg_atrv";
$rs = $cn->query($sql);

//$rs->fetchAll();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SEAL: Oportunidades Laborales</title>
<script src="jquery-1.4.4.min.js"></script>
<script>
	$.ajaxSetup({
		type: "POST",
		contentType: "application/x-www-form-urlencoded;charset=ISO-8859-1"
	});
	$(document).ready( function(){
		$("#submit").click( function(){
			//$.post('mysql.php', {v: $("#val").val()});
			$.ajax({
				url: 'mysql.php',
				data: {v: $("#val").val()},
				type: "POST",
				contentType: "application/x-www-form-urlencoded;charset=ISO-8859-1"
			});
		});
	});
</script>
</head>
<body>
	<h1>valores</h1>
	<ul>
		<?php foreach ($rs as $row) { ?>
		<li><?php echo($row['val']); ?></li>
		<?php } ?>
	</ul>
	<input id="val" type="input" value="" />
	<input id="submit" type="button" value="enviar" />
</body>
</html>