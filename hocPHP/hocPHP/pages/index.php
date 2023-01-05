<?php
include_once('../lib/db.php');
$category = isset($_POST['category']) ? $_POST['category'] : "";
if (isset($_POST['category'])) {
    $db = new database();
    $conn = $db->connect();
    $sql = "INSERT INTO categories (name_category)
    VALUES ('$category')";
    $conn->exec($sql);
    echo "Thêm danh mục mới thành công";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{box-sizing: border-box;margin: 0;padding: 0;}
        .container{
            max-width: 500px;
            margin: auto;
            margin-top: 80px;
        }
        table {
            border-collapse: collapse;
            margin-top: 20px;
            width: 100%;
        }

        th {
            padding: 20px;
        }

        td {
            padding: 10px;
        }

        button {
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
    <h2>Thêm mới danh mục</h2>
    <form action="" method="post">
        <input name="category" type="text">
        <input type="submit" value="Thêm mới">
    </form>
    <br>
    <hr>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Danh mục</th>
        </tr>
        <?php
        $db = new database();
        $conn = $db->connect();
        $sql = "SELECT * FROM categories";
        $data = $conn->query($sql);
        while ($row = $data->fetch()) { ?>
            <tr>
                <td><?php echo $row['id_category'] ?></td>
                <td><?php echo $row['name_category'] ?></td>
                <td><button>Xóa</button></td>
                <td><button>Sửa</button></td>
            </tr>
        <?php } ?>

    </table>
    </div>
    
</body>

</html>