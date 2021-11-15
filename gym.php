<?php

$name = $_POST['name'] ?? null;
$number = $_POST['number'] ?? null;
$email = $_POST['email']?? null;
$date = $_POST['date']?? null;

$db_host = "localhost";
$db_user = "root";
$db_password = "secret";
$db_base = 'Example';
$db_table = "users";

$db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);

$result = false;

if (isset($_POST['name']) && isset($_POST['number']) && isset($_POST['email']) && isset($_POST['date'])) {
    try {
        $data = [
            'name' => $name,
            'number' => $number,
            'email' => $email,
            'date' => $date
        ];

        $query = $db->prepare("INSERT INTO $db_table (name, phone_number, email, date_visit)
        values (:name, :number, :email, :date)");

        $query->execute($data);

        $result = true;
    } catch (PDOException $e) {
        print "Ошибка!: " . $e->getMessage() . "<br/>";
    }

    if ($result) {
    	echo "Информация занесена в базу данных";
    }
}

$stmt = $db->prepare("SELECT * FROM users ORDER BY `id`");
$stmt->execute();
