<?php
// Kết nối đến cơ sở dữ liệu
$servername = "127.0.0.1:3306";
$username = "root";
$password = "123456";
$dbname = "webnc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Xử lý yêu cầu từ phía client
$action = $_POST['action'];

switch ($action) {
    case 'read':
        // Đọc dữ liệu từ cơ sở dữ liệu
        $result = $conn->query("SELECT * FROM users");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
        break;

    case 'create':
        // Thêm người dùng mới
        $name = $_POST['name'];
        $email = $_POST['email'];
        $conn->query("INSERT INTO users (name, email) VALUES ('$name', '$email')");
        echo "User added successfully!";
        break;

    case 'update':
        // Cập nhật thông tin người dùng
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $conn->query("UPDATE users SET name='$name', email='$email' WHERE id=$id");
        echo "User updated successfully!";
        break;

    case 'delete':
        // Xóa người dùng
        $id = $_POST['id'];
        $conn->query("DELETE FROM users WHERE id=$id");
        echo "User deleted successfully!";
        break;

    default:
        echo "Invalid action!";
        break;
}

$conn->close();
?>
