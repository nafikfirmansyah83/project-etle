<!doctype html>
<html lang="en">
  	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Landing Page</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  	</head>
  	<body>
		<div class="d-flex justify-content-center align-items-center mt-5">
			<img class="mt-4" height="500px" weight="500px" src="https://img.freepik.com/free-vector/police-officers-concept-illustration_114360-16937.jpg?w=740&t=st=1702198918~exp=1702199518~hmac=5db95cd43e0f19133907dbfdc9832d82bff833db5df0a687392e281e4575fe4a" alt="">
		</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  	</body>
</html>
<?php
session_start();
require_once('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM login WHERE email='$username' AND password='$password'";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        $_SESSION['id_user'] = $user['id'];
		$_SESSION['email'] = $user['email'];
        $_SESSION['level'] = $user['level'];

        if ($user['level'] == 'operator') {
			header('Location: index.php');
        } else {
            header('Location: cekdata.php');
		}
    } else {
		header('Location: login.php');
    }
} else {
    header('Location: login.php');
}
?>