<?php
// 데이터베이스 연결 정보
$host = '127.0.0.1'; // 데이터베이스 호스트
$username = 'root'; // 데이터베이스 사용자 이름
$password = 'qwe123'; // 데이터베이스 비밀번호
$database = 'obt01'; // 사용할 데이터베이스 이름
session_start();
// 데이터베이스에 연결
$conn = new mysqli($host, $username, $password, $database);

// 연결 확인
if ($conn->connect_error) {
    die('데이터베이스 연결 실패: ' . $conn->connect_error);
}

// 사용자로부터 받은 POST 데이터 확인
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username']; // 사용자 이름 또는 이메일
    $pass = $_POST['password']; // 비밀번호

    // 사용자 정보 확인
    $sql = "SELECT * FROM blogin WHERE login_id = '$user' AND login_pw = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['name'] = $row["name"];
            usleep(300000);  //0.3초 후 이동
            header("Location:../index.php");
        }
    } else {
        echo '로그인 실패. 사용자 정보가 일치하지 않습니다.';
    }
}

// 데이터베이스 연결 닫기
$conn->close();
?>