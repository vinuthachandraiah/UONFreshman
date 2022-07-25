<?php
ob_start();
session_start();
$message = "";
if (isset($_POST['email']) &&
    !empty($_POST['email']) &&
    isset($_POST['password']) &&
    !empty($_POST['password'])
) {
    include_once '../config/db.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid Email Format!";
    } else {
        $query = "SELECT * FROM admin WHERE email = ?";

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if (is_array($row)) {

            $hash = $row['password'];
            if (password_verify($password, $hash)) {
                $_SESSION["id"] = $row['adminId'];
                $_SESSION["email"] = $row['email'];
                $_SESSION["is_loggedin"] = $row['email'];
            } else {
                $message = "Invalid Email or Password!";
            }

        } else {
            $message = "Invalid Email or Password!";
        }
    }


} else {
    if ( count($_POST) > 0 )
        $message = "Invalid Email or Password!";
    else
        $message = '';
}
if (isset($_SESSION["id"])) {
    header("Location:categories.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/ui.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <title>The University of Newcastle, Australia</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light border-bottom">
    <div class="container"><a class="navbar-brand" href="#"> <img src="../assets/img/logo.png" height="80" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_main1"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbar_main1">
            <ul class="navbar-nav ms-auto me-sm-2 mt-2 mt-lg-0">
                <li class="nav-item me-2 active"><a class="nav-link" href="#"> Campus</span> </a></li>
                <li class="nav-item me-2"><a class="nav-link" href="#">For Parents</a></li>
                <li class="nav-item me-2"><a class="nav-link" href="#">For Students</a></li>
                <li class="nav-item me-2"><a class="nav-link" href="#">Career Help</a></li>
                <li class="nav-item me-2"><a class="nav-link btn btn-primary text-white" href="#">Freshman App</a></li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown"><a class="nav-link py-0 dropdown-toggle" href="#" role="button"
                                                 data-bs-toggle="dropdown" aria-expanded="false"> <span
                                class="icon-xs bg-gray rounded-circle me-2"><i class="bi bi-person-circle"></i> </span>
                        <span>User</span> </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Account Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="sec">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-body"><h4 class="mb-4">Sign in</h4>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                        ?>">
                            <div class="mb-3"><label class="form-label">Email</label> <input name="email"
                                                                                             class="form-control"
                                                                                             placeholder="ex. name@gmail.com"
                                                                                             type="email"></div>
                            <!-- col end.// -->
                            <!--                            <div class="mb-3"><label class="form-label">Password</label> <a class="float-end" href="#">Forgot?</a>-->
                            <input class="form-control" name="password" placeholder="******" type="password">
                    </div>
                    `
                    <!-- col end.// -->
                    <div class="mb-3"><label class="form-check"> <input class="form-check-input" type="checkbox"
                                                                        value="" checked=""> <span
                                    class="form-check-label"> Remember </span> </label></div>
                    <button class="btn w-100 btn-primary" type="submit"> Sign in</button>
                    </form> <!-- form end.// -->
                    <p class="text-divider my-4"><?php if (isset($message) && !empty($message)) echo $message; ?> </p>
                </div> <!-- card-body end.// -->
            </div>
        </div>
    </div>
    </div>
</section>

<footer class="section-footer bg-dark color-light shadow">
    <div class="container">
        <section class="footer-main py-5">
            <div class="row">
                <aside class="col-lg col-md-4 col-6">
                    <h6 class="title">Quick links</h6>
                    <ul class="list-menu mb-4">
                        <li><a href="#">Degrees</a></li>
                        <li><a href="#">Library</a></li>
                        <li><a href="#">Maps</a></li>
                        <li><a href="#">Staff directory</a></li>
                    </ul>
                </aside> <!-- col end.// -->
                <aside class="col-lg col-md-4 col-6">
                    <h6 class="title">Information about</h6>
                    <ul class="list-menu mb-4">
                        <li><a href="#">Our Uni</a></li>
                        <li><a href="#">Strategic Plan</a></li>
                        <li><a href="#">Colleges and schools</a></li>
                        <li><a href="#">Campus life</a></li>
                    </ul>
                </aside> <!-- col end.// -->
                <aside class="col-lg col-md-4 col-6">
                    <h6 class="title"> Information for</h6>
                    <ul class="list-menu mb-4">
                        <li><a href="#">Study</a></li>
                        <li><a href="#">Research</a></li>
                        <li><a href="#">Business and Industry</a></li>
                        <li><a href="#">International</a></li>
                    </ul>
                </aside> <!-- col end.// -->
                <aside class="col-lg col-md-4 col-6">
                    <h6 class="title"> More </h6>
                    <ul class="list-menu mb-4">
                        <li><a href="#">MyUni</a></li>
                        <li><a href="#">Online tools</a></li>
                        <li><a href="#">AskUON</a></li>
                        <li><a href="#">The Shop</a></li>
                    </ul>
                </aside> <!-- col end.// -->
                <aside class="col-lg-3 col-md-6 col-12">
                    <h6 class="title">Got a question?</h6>
                    <a href="frontend/freshman.php" class="btn btn-lg btn-primary"><i class="bi bi-journal-check"></i>
                        Freshman Site</a>
                </aside>
            </div> <!-- row end.// -->
        </section>
        <section class="footer-bottom d-flex justify-content-center border-top">
            <nav> The University of Newcastle, Australia © 2022</nav>
        </section>
    </div> <!-- container end.// -->
</footer>
<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>

</html>
