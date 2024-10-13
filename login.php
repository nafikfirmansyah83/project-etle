<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        
        <link rel="stylesheet" href="css/style-login.css">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    </head>

<body>
    
<section class="login d-flex">
            <div class="login-left w-50 h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-6">
                        <div class="header">
                            <h1>Welcome back</h1>
                            <p>Welcome back! Please enter your details.</p>
                        </div>
                        <form action="ceklogin.php" method="post">
                            <div class="login-form">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your Email" aria-describedby="email" name="email">
          
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter your Password" name="password">
                                <?php
                                    session_start();
                                    if (isset($_SESSION['login_error'])) {
                                        echo '<p class="error-message">' . $_SESSION['login_error'] . '</p>';
                                        unset($_SESSION['login_error']);
                                    }

                                    if (isset($_SESSION['login_success'])) {
                                        echo '<p class="success-message">' . $_SESSION['login_success'] . '</p>';
                                        unset($_SESSION['login_success']);
                                    }
                                ?>
                                <a href="#" class="text-decoration-none text-center">Forgot Password</a>
                                <button type="submit" name="login" class="signin">Sign In</button>
                                <button class="signin-google text-center text-decoration-none"><img src="images/logo_google.png" height="20px" width="20px"> Sign In With Google<br></button>
                                <div class="text-center">
                                    <span class="d-inline">Don't have an account? <a href="#" class="d-inline text-decoration-none">Sign up for free</a></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            <div class="login-right w-50 h-100">
                <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/1.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/2.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/3.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>



    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>