<?php
include('./system/db_connect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST["fname"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $PasswordConforim = $_POST["PasswordConforim"];
    $phone = $_POST["phone"];
    $Address = $_POST['country'];
    $year = $_POST['years'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $dateOfBirth = date("Y-m-d", mktime(0, 0, 0, $month, $day, $year));
    $gender = $_POST['gender'];
    $Date_register = date('Y/m/d');
    if ($password !== $PasswordConforim) {
        echo '<script>alert("Password and confirmation password do not match.")</script>';
    }
    $hashedPassword = md5($password);
    // Insert data into the `users` table
    // Query to check if the email exists
    $checkEmailQuery = "SELECT COUNT(*) FROM users WHERE email = '$email'";
    // Execute the query
    $result = mysqli_query($conn, $checkEmailQuery);
    // Fetch the result
    $count = mysqli_fetch_array($result)[0];
    // Check if the email is already registered
    if ($count > 0) {
        echo '<script>alert("The email is already registered. Please use a different email.")</script>';
    } else {
        // Email is not registered, proceed with the INSERT operation
        $insertQuery = "INSERT INTO users (firstname, lastname, email, password, type) 
        VALUES ('$firstName', '$lastName', '$email', '$hashedPassword', 3)";
        // Execute the INSERT query
        mysqli_query($conn, $insertQuery);
        // Check if the INSERT query was successful
        if (mysqli_affected_rows($conn) > 0) {
            $userId = mysqli_insert_id($conn);
            // Insert data into the `clients` table
            $insertClientQuery = "INSERT INTO clients (user_id, first_name, last_name, email, password, phone, country, date_of_birth, gender, date_registered) 
                                VALUES ('$userId', '$firstName', '$lastName', '$email', '$hashedPassword', '$phone', '$Address', '$dateOfBirth', '$gender', '$Date_register')";
            // Execute the INSERT query for clients
            mysqli_query($conn, $insertClientQuery);

            // Check if the INSERT query for clients was successful
            if (mysqli_affected_rows($conn) > 0) {
                echo '<script>alert("Registered successfully.")</script>';
            } else {
                echo '<script>alert("Something went wrong, please try again!")</script>';
            }
        } else {
            echo '<script>alert("Something went wrong, please try again!")</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
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
                                <h1>Sign Up</h1>
                                <form id="signup-form" method="POST">
                                    <p>
                                        <label for="fname">First Name <span></span></label>
                                        <input type="text" id="first-name" name="fname" required style="width: 300px;"
                                        pattern="[A-Za-z]+">
                                    </p>
                                    <p>
                                        <label for="lname">Last Name <span></span></label>
                                        <input type="text" name="lastName" id="lname" required
                                        pattern="[A-Za-z]+">
                                    </p>
                                    <label for="select1">Birthday<span></span></label><br>
                                    <select id="month" name="month">
                                        <option value=""></option>
                                        <option value="1" selected="selected">Jan</option>
                                        <option value="2">Feb</option>
                                        <option value="3">Mar</option>
                                        <option value="4">Apr</option>
                                        <option value="5">May</option>
                                        <option value="6">Jun</option>
                                        <option value="7">Jul</option>
                                        <option value="8">Aug</option>
                                        <option value="9">Sep</option>
                                        <option value="10">Oct</option>
                                        <option value="11">Nov</option>
                                        <option value="12">Dec</option>
                                    </select>&nbsp;
                                    <select id="day" name="day">
                                        <option value=""></option>
                                        <option value="1" selected="selected">01</option>
                                        <option value="2">02</option>
                                        <option value="3">03</option>
                                        <option value="4">04</option>
                                        <option value="5">05</option>
                                        <option value="6">06</option>
                                        <option value="7">07</option>
                                        <option value="8">08</option>
                                        <option value="9">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                    </select>&nbsp;
                                    <select id="years" name="years">
                                        <option value=""></option>
                                        <option value="1" selected="selected">2023</option>
                                        <option value="2">2022</option>
                                        <option value="3">2021</option>
                                        <option value="4">2020</option>
                                        <option value="5">2019</option>
                                        <option value="6">2018</option>
                                        <option value="7">2017</option>
                                        <option value="8">2016</option>
                                        <option value="9">2015</option>
                                        <option value="10">2014</option>
                                        <option value="11">2013</option>
                                        <option value="12">2012</option>
                                        <option value="13">2011</option>
                                        <option value="14">2010</option>
                                        <option value="15">2009</option>
                                        <option value="16">2008</option>
                                        <option value="17">2007</option>
                                        <option value="18">2006</option>
                                        <option value="19">2005</option>
                                        <option value="20">2004</option>
                                        <option value="21">2003</option>
                                        <option value="22">2002</option>
                                        <option value="23">2001</option>
                                        <option value="24">2000</option>
                                        <option value="25">1999</option>
                                        <option value="26">1998</option>
                                    </select>
                                    <p>
                                    <p>
                                    <div style="margin-top: -2em;">
                                        <label for="gender">Gender<span></span></label>&nbsp;&nbsp;&nbsp;
                                        <input type="radio" id="female" name="gender" value="female" required>
                                        <label for="female">Female</label>&nbsp;&nbsp;
                                        <input type="radio" id="male" name="gender" value="male" required>
                                        <label for="male">Male</label>
                                    </div>
                                    </p>
                                    <p>
                                        <label for="email">Email Address <span></span></label>
                                        <input type="email" name="email" id="email" autocomplete="off" required>
                                    </p>
                                    <p> <label for="Password">Password <span></span></label>
                                        <input type="password" name="password" id="Password" autocomplete="off"
                                            required>
                                    </p>
                                    <p>
                                        <label for="PasswordConforim">Password Confirm <span></span></label>
                                        <input type="password" name="PasswordConforim" id="PasswordConforim"
                                            autocomplete="off" required>
                                    </p>
                                    <p>
                                        <label for="country">Country</label>
                                        <select name="country" id="countrySelect"></select>
                                    </p>
                                    <p>
                                        <label for="phone">Phone Number <span></span></label>
                                        <input type="tel" name="phone" id="phone" required maxlength="10">
                                    </p>
                                    <div class="primary-checkout">
                                        <button type="submit" name="submit" class="create-button">Create new
                                            account</button>
                                    </div>
                                    <button class="forgot-button">Forgot password?</button>
                                    <div class="primary-checkout">
                                        <button class="create-button" onclick="redirectToLogin()">Log In</button>
                                    </div>
                                    </p>
                                </form>
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
<?php include './Page Items/countryJS.php' ?>

</html>