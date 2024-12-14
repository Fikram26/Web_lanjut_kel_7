<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signin App</title>

    <!-- AdminLTE 3.0.0 CSS -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <style>
        body {
            background-color: #f4f6f9;
        }
    </style>
</head>
<body class="hold-transition login-page">
<main class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="#" class="h1"><b>Sign</b>In</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block" name="submit">Sign In</button>
                    </div>
                </div>
            </form>

            <p class="mb-0 mt-3 text-center">
                &copy; 2017–2024
            </p>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        include 'admin/koneksi.php';

        $user_email = $_POST['email'];
        $user_password = md5($_POST['password']);

        try {
            $stmt = $db->prepare("SELECT * FROM user WHERE email = :email AND password = :password");
            $stmt->bindParam(':email', $user_email);
            $stmt->bindParam(':password', $user_password);
            $stmt->execute();

            $data_user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data_user) {
                session_start();
                $_SESSION['user'] = $data_user['email'];
                $_SESSION['user_id'] = $data_user['id'];
                $_SESSION['level'] = $data_user['level'];

                header('location:admin/index.php'); //redirect
            } else {
                echo "<script>alert('Email dan Password invalid')</script>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    ?>
</main>

<!-- AdminLTE 3.0.0 JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</body>
</html>
