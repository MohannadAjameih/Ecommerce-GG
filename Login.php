<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('./system/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    // Retrieve login form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Retrieve user data from the database based on the email
    $sql = "SELECT *, CONCAT(firstname, ' ', lastname) as name FROM users WHERE email = '$email' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];
        // Verify the entered password with the hashed password stored in the database
        if (md5($password) == $hashedPassword) {
            // Password is correct, set session variables or perform other actions
            $_SESSION["type"] = $row["type"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["user_id"] = $row["id"];
            // Redirect to the user's dashboard or another page
            if ($row["type"] == 1 || $row["type"] == 2) {
                header("Location: http://localhost/GG_WebSite/System");
                exit;
            } elseif ($row["type"] == 3) {
                header("Location: http://localhost/GG_WebSite");
                exit;
            }
        } else {
            echo '<script>alert("Invalid email or password.")</script>';
        }
    } else {
        echo '<script>alert("Invalid email or password.")</script>';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php
    // session_start();
    ob_start();
    if (!isset($_SESSION['system'])) {
        $system = $conn->query("SELECT * FROM system_settings")->fetch_array();
        foreach ($system as $k => $v) {
            $_SESSION['system'][$k] = $v;
        }
    }
    ob_end_flush();
    ?>
    <?php
    if (isset($_SESSION['login_id'])) {
        header("location:index.php?page=home");
        exit;
    }
    ?>
    <?php include './Page Items/header.php'; ?>
</head>

<body>
    <div id="page" class="site login">
        <?php include('./Page Items/nav bar.php'); ?>
        <!--Main Section-->
        <main>
            <div class="single-cart">
                <div class="container">
                    <div class="wrapper">
                        <div class="flexwrap1">
                            <div class="item center styled">
                                <h1>Login</h1>
                                <form method="POST" action="">
                                    <ctrl name='● page-offer.html - GG_WebSite-master - Visual Studio Code' role='document' />
                                    <ctrl name='● page-offer.html - GG_WebSite-master - Visual Studio Code' role='document' />
                                    <ctrl name='page-offer.html' role='grouping' />
                                    
                                    <ctrl name='page-offer.html' role='grouping' />

                                    <ctrl name='page-offer.html' role='grouping' />


                                    <ctrl name='page-offer.html' role='grouping' />

                                    <ctrl name='page-offer.html' role='grouping' />

                                    <ctrl name='page-offer.html' role='grouping' />

                                    <ctrl name='page-offer.html' role='grouping' />

                                    <ctrl name='page-offer.html' role='grouping' />

                                    <ctrl name='page-offer.html' role='grouping' />

                                    <ctrl name='page-offer.html' role='grouping' />

                                    <ctrl name='page-offer.html' role='grouping' />

                                    <ctrl name='page-offer.html' role='grouping' />

                                    <ctrl name='page-offer.html' role='grouping' />

                                    <ctrl name='page-offer.html' role='grouping' />
                                    Visual Studio Code' rolerole='grouping'
<ctrl name='● page-offer.html - GG_WebSite-master - Visual Studio Code' role='document' />
<ctrl name='page-offer.html' role='grouping' />

<ctrl name='page-offer.html' role='grouping' />
<input type="email" name="email" id="email" autocomplete="off" required
                                            style="width: 300px;">
                                    </p>
                                    <p>
                                        <label for="password">Password<span></span></label>
                                        <input type="password" name="password" id="password" required
                                            style="width: 300px;">
                                    </p>
                                    <div class="primary-checkout">
                                        <button type="submit" name="login" class="create-button">Log In</button>
                                    </div>
                                </form>
                                <button class="forgot-button">Forgot password?</button>
                                <div class="create-account">
                                    <div class="primary-checkout">
                                        <button class="create-button" onclick="redirectToSignup()">Create new
                                            account</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!--End Main Section-->
    </div>
</body>
<?php include './Page Items/JS.php' ?>

</html>