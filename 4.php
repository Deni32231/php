<?php
$hostname = '127.0.0.1';
$username = 'root';
$password = 'notSecureChangeMe';
$database = 'mydb';

$link = mysqli_connect($hostname, $username, $password, $database);

if ($link == false) {
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
} else {
    print("Соединение установлено успешно" . "\n \n \n");
}

mysqli_set_charset($link, "utf8");

$sql = "SELECT n.id, `sh`.`штрих_код`\n"

    . "FROM `Номенклатура` n\n"

    . "LEFT JOIN `Штрих-коды` sh ON `sh`.`номенклатура_id` = n.id;";


$result = mysqli_query($link, $sql);

$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

$output_str = "";

$currentId = $rows[0]["id"];
$str_row = $rows[0]["id"];
foreach ($rows as $row) {
    if ($currentId === $row["id"]) {
        $str_row = $str_row . "\t" . $row["штрих_код"];
    } else {
        $output_str = $output_str . $str_row . "\n";
        $currentId = $row["id"];
        $str_row = $row["id"];
    }
}
$output_str = $output_str . $str_row;

print($output_str);

file_put_contents("4_output.txt", $output_str);
?>