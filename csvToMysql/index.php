<?php
require  'db_conf.php';
if (isset($_POST["import"])) {
    $fileName = $_FILES["file"]["tmp_name"];
    if ($_FILES["file"]["size"] > 0) {
        $file = fopen($fileName, 'r');
        while (($column = fgetcsv($file, 10000, ',')) !== FALSE) {
            $stmt = $pdo->prepare('INSERT INTO csv (username, email) 
                VALUES (:username, :email)');
            $stmt->execute([
                'username' => $column[0],
                'email' => $column[1],
            ]);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV To MySQL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file" accept=".csv">
        <button name="import">Import</button>
    </form>
    <?php include('table.php') ?>
</body>

</html>