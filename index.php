<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compable" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<title>Оборудование</title>
</head>
<body>
	<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?PHP
	$link = mysqli_connect("localhost", "root", "", "db_equipment") or die("Ошибка " . mysqli_error($link));

	if(isset($_POST["add"])) {
		$name_type = $_POST['name_type'];
		$mask_sn = $_POST['mask_sn'];
		$sn = $_POST['sn'];
		/*$type_id = $_POST['type_id'];
		$id_type = $_POST['id_type'];*/
		$pattern1 = "/[A-Z0-9]{2}[A-Z]{5}[A-Z0-9]{1}[A-Z]{2}/";
		$pattern2 = "/[0-9]{1}[A-Z0-9]{2}[A-Z]{2}[A-Z0-9]{1}[-_@]{1}[A-Z0-9]{1}[a-z]{2}/";
		$pattern3 = "/[0-9]{1}[A-Z0-9]{2}[A-Z]{2}[A-Z0-9]{1}[-_@]{1}[A-Z0-9]{3}/";
		$send_equip = "INSERT INTO type_of_equipment (name_type, mask_sn) VALUES ('$name_type', '$mask_sn')";
		$result = mysqli_query($link, $send_equip) or die("Не удается подключиться к БД". mysqli_error($link));
		if($name_type[1] and (preg_match($pattern1, $mask_sn))) {
			$send_equip1 = "INSERT INTO equipment (`sn`) VALUES ('$mask_sn')";
			$result1 = mysqli_query($link, $send_equip1) or die("Не удается подключиться к БД". mysqli_error($link));
		}elseif($name_type[2] and (preg_match($pattern2, $mask_sn))) {
			$send_equip1 = "INSERT INTO equipment (`sn`) VALUES ('$mask_sn')";
			$result1 = mysqli_query($link, $send_equip1) or die("Не удается подключиться к БД". mysqli_error($link));
		}elseif($name_type[3] and (preg_match($pattern3, $mask_sn))) {
			$send_equip1 = "INSERT INTO equipment (`sn`) VALUES ('$mask_sn')";
			$result1 = mysqli_query($link, $send_equip1) or die("Не удается подключиться к БД". mysqli_error($link));
		}
	}
	$query = "select * from type_of_equipment";
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	if($result) { 
		echo "<br><table border=1 width=506 align=center>
			<tr><td align='center'>ID</td>
			<td align = 'center'>Тип оборудования</td>
			<td align = 'center'>Маска серийного номера</td></tr>";
		while ($row = mysqli_fetch_array($result)){
			$id_type = $row["id_type"];
			$name_type = $row["name_type"];
			$mask_sn = $row["mask_sn"];
			echo "<table border=1 width=506 align=center> <tr><td>$id_type</td><td>$name_type</td><td>$mask_sn</td></tr>";
		}
	echo "</table>";echo "</select>";
	}	
	$query="select name_type from type_of_equipment";
	$result=mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	$name_type = array('1' => "TP-Link TL-WR74", '2' => "D-Link DIR-300", '3' => "D-Link DIR-300 S");
	echo "</select>";
	$query = "select * from equipment";
	$result1 = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	
	if($result1) { 
		echo "<br><table border=1 width=506 align=center>
			<tr><td align='center'>ID</td>
			<td align = 'center'>Код типа оборудования</td>
			<td align = 'center'>Серийный номер</td>";
		while ($row = mysqli_fetch_array($result1)){
			$id_ = $row["id_"];		
			$type_id = $row["type_id"];
			$sn = $row["sn"];
			"INSERT INTO equipment (`type_id`) VALUES ('$id_type')";
			echo "<tr><td>$id_</td><td>$type_id</td><td>$sn</td></tr>";
		}
		echo "</table>";
	}
echo "</br>";
?>


<html>
<meta charset="UTF-8">
<body>
<form method = "POST">
<table border = "1" align="center">
		<tr>
			<td>Добавление оборудования в базу данных</td>
		</tr>
		<tr>
			<td><input size = "30" type = "text" placeholder = "Введите серийный номер в поле " name = "mask_sn"></td>
		</tr>
		<tr>
			<td>
				<select name = "name_type">
						<?php
						$name_type[0] = "Выбрать тип оборудования...";
						for ($i = 0; $i < count($name_type); $i++){
						echo "<option>$name_type[$i]</option>";}
						?>
				</select>
			</td>
		</tr>
		<tr>
			<td><input name = "add" type = "submit" value = "Добавить"></td>
		</tr>
</form>
</table>
</body>
</html>
