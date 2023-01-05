<?php
class database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "ps25709_ngoquanghuy";
    private $conn;

    public function __construct()
    {
        $conn = $this->connect();
        return $conn;
    }

    public function __destruct()
    {
        $this->conn = null;
    }

    public function connect()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            // echo "Connected successfully";
            return $this->conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

// // ###Chuyển trang
// header("location: index.php");
// echo "<meta http-equiv='refresh' content='0;url=index.php'>";


// // ###Khởi tạo SESSION
// session_start();
// $_SESSION['login']['id']
// $_SESSION['login']['username']
// // Đóng SESSION
// session_unset();


// $username = htmlspecialchars(addslashes(trim($username)));
// $password = md5(htmlspecialchars(addslashes(trim($password))));
// $err = [];
// if (isset($_POST['username'])||isset($_POST['fullname'])){
//     if ($fullname == "") {
//         array_push($err, 'Vui lòng nhập Họ và tên');
//     }
//     if ($email == "") {
//         array_push($err, 'Vui lòng nhập Email');
//     }
//     if ($phone == "") {
//         array_push($err, 'Vui lòng nhập Số điện thoại');
//     }
//     if ($username == "") {
//         array_push($err, 'Vui lòng nhập username');
//     }
//     if ($password == "") {
//         array_push($err, 'Vui lòng nhập mật khẩu');
//     }
//     if ($conf_password == "") {
//         array_push($err, 'Vui lòng nhập xác nhận mật khẩu');
//     } else {
//         if ($password != $conf_password) {
//             array_push($err, 'Xác nhận mật khẩu chưa chính xác');
//         }
//     }
// }

?>

<?php //if (count($err) > 0) { ?>
    <!-- <ul class="alert alert-danger"> -->
        <?php
        // foreach ($err as $value) {
        ?>
             <!-- <li><?php //echo $value ?></li> -->
        <?php //} ?>
    <!-- </ul> -->
<?php //}  ?>


<?php


// // ###Tạo mới 1 đối tượng dữ liệu
// $db=new database();
// $conn = $db->connect();
// $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com')";
// // use exec() because no results are returned
// $conn->exec($sql);
// echo "New record created successfully";


// // ###Truy xuất 1 đối tượng dữ liệu
// $db=new database();
// $conn = $db->connect();
// $sql = "SELECT * FROM MyGuests WHERE id=3";
// $data = $conn->query($sql);
// $row=$data->fetch()
// echo $row['firstname'];
// echo $row['lastname'];
// echo $row['email'];


// // ###Truy xuất toàn bộ dữ liệu
// $db=new database();
// $conn = $db->connect();
// $sql = "SELECT * FROM MyGuests";
// $data = $conn->query($sql);
// while($row=$data->fetch()){
//  echo $row['firstname'];
//  echo $row['lastname'];
//  echo $row['email'];
// }


// // ###Xóa dữ liệu
// $db=new database();
// $conn = $db->connect();
// // sql to delete a record
// $sql = "DELETE FROM MyGuests WHERE id=3";
// // use exec() because no results are returned
// $conn->exec($sql);
// echo "Record deleted successfully";


// // ###Cập nhập dữ liệu
// $db=new database();
// $conn = $db->connect();
// $sql = "UPDATE MyGuests SET lastname='Doe',email='john@example.com' WHERE id=2";
// // Prepare statement
// $stmt = $conn->prepare($sql);
// // execute the query
// $stmt->execute();


// // ###Kiểm tra username, email, phone có trùng nhau không?
// $db = new database();
// $conn = $db->connect();
// $sql = "SELECT * from user where username = '$username' or email = '$email' or phone ='$phone'";
// // use exec() because no results are returned
// $stmt= $conn -> prepare($sql);
// $stmt->execute();
// $numrows = $stmt->rowCount();
// // numrows > 0 : là trùng username hoặc email hoặc sđt


// // ###Kiểm tra đăng nhập: username có tồn tại không? có đúng mật khẩu không?
// $db = new database();
// $conn = $db->connect();
// $sql = "SELECT * from user where username = '$username' and mk = '$password'";
// $stmt = $conn->prepare($sql);
// $stmt->execute();
// $numrows = $stmt->rowCount();
// // numrows == 1 : đúng username và mật khẩu => đăng nhập thành công
// $data = $conn->query($sql);
// $row = $data->fetch();
// if ($numrows == 1) {
//     $_SESSION['login']['id_user'] = $row['id_user'];
//     $_SESSION['login']['username'] = $row['username'];
//     // echo "Đăng nhập thành công";
//     echo "<meta http-equiv='refresh' content='0;url=account.php'>";
// }



// // ###Upload hình ảnh
// // HTML
// <form method="post" enctype="multipart/form-data">
//     <div>
//         <label for="" class="form-label">Hình ảnh:</label>
//         <input type="file" class="form-control" id="usr" name="image">
//     </div>  
// </form>

// // PHP
// $image = isset($_FILES["image"]) ? $_FILES["image"] : "";

// if ($_FILES['image']['error'] > 0) {
//     echo "File Upload Bị Lỗi";
//     // array_push($err, 'File Upload Bị Lỗi');
// } else {
//     // Upload file
//     $file_name = $_FILES['image']['name'];
//     $file_size = $_FILES['image']['size'];
//     $file_path = $_FILES['image']['tmp_name'];
//     $file_type = $_FILES['image']['type'];
//     if (strlen(strstr($file_type, 'image')) > 0) {
//         if ((round($file_size / 1024, 0)) <= 10240) {
//             $now = DateTime::createFromFormat('U.u', microtime(true));
//             $result = $now->format("m_d_Y_H_i_s_u");
//             $krr    = explode('_', $result);
//             $result = implode("", $krr);
//             // echo $result;
//             move_uploaded_file($_FILES['image']['tmp_name'], '../../asset/img/upload/avatar_admin/' . $result . $file_name);
//             $image = $result . $file_name;
//         } else {
//             echo "Vui lòng nhập file < 10MB";
//             // array_push($err, 'Vui lòng nhập file < 10MB');
//         }
//     } else {
//         echo "Vui lòng nhập file định dạng là ảnh";
//         // array_push($err, 'Vui lòng nhập file định dạng là ảnh');
//     }
//     // echo $file_name."<br>";
//     // echo (round($file_size / 1024, 0)) . "KB<br>";
//     // echo $file_path."<br>";
//     // echo $file_type . "<br>";
//     // echo 'File Uploaded';
// }