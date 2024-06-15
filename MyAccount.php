<?php include('./System/db_connect.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php"); // Replace "login.php" with the actual login page URL
    exit;
    
}
// Check if the "user_id" key exists in the $_SESSION array
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"]; // Replace "user_id" with the actual column name in the users table
    $sql = "SELECT u.*, c.* 
    FROM users u, clients c 
    WHERE u.id = c.user_id 
    AND u.id = $user_id";
    ;
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $firstName = $row["firstname"];
        $lastName = $row["lastname"];
        $email = $row["email"];
        $gender = $row["gender"];
        // Create radio buttons for gender
        $maleChecked = ($gender === 'male') ? 'checked' : '';
        $femaleChecked = ($gender === 'female') ? 'checked' : '';
        // Display radio buttons
        $phoneNumber = $row["phone"];
        $country = $row["country"];
        $Address = $row["Address"];
        $address_line2 = $row["address_line2"];
        $city = $row["city"];
        $state = $row["state"];
        $zipCode = $row["zip_code"];
        $dateRegistered = $row["date_registered"];
        $isAdmin = $row["is_admin"];
        $cardNumber = $row["card_number"];
        $Cardholder = $row["Cardholder_name"];
        $cardExpiryDate = $row["card_expiry_date"];
        $cardCVV = $row["card_cvv"];
        $preferredPaymentMethod = $row["preferred_payment_method"];

        if (isset($_POST['Update_User'])) {
            // Retrieve form data
            $firstName = $_POST["fname"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $gender = $_POST['gender'];

            // Update data in the `users` table
            $sql = "UPDATE users SET firstname='$firstName', lastname='$lastName', email='$email' WHERE id=$user_id";
            if ($conn->query($sql) === true) {
                // Update data in the `clients` table
                $sql = "UPDATE clients SET first_name='$firstName', last_name='$lastName', email='$email', phone='$phone' ,gender='$gender' WHERE user_id=$user_id";
                if ($conn->query($sql) === true) {
                    echo '<script>alert("Updated successfully.")</script>';
                } else {
                    echo '<script>alert("Something went wrong, please try again!")</script>';
                }
            } else {
                echo '<script>alert("Something went wrong, please try again!")</script>';
            }
        }
        if (isset($_POST['Update_Password'])) {
            // Retrieve form data
            $oldPassword = $_POST["old_password"];
            $newPassword = $_POST["new_password"];
            $confirmPassword = $_POST["confirm_password"];
            // Retrieve the stored password from the database
            $sql = "SELECT password FROM users WHERE id = $user_id";
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $storedPassword = $row["password"];
                // Verify the old password
                if (md5($oldPassword) === $storedPassword) {
                    // Check if the new password matches the confirmation
                    if ($newPassword === $confirmPassword) {
                        // Hash the new password
                        $hashedPassword = md5($newPassword);
                        // Update the password in the database
                        $sql = "UPDATE users SET password='$hashedPassword' WHERE id=$user_id";
                        if ($conn->query($sql) === true) {
                            echo '<script>alert("Password updated successfully.")</script>';
                        } else {
                            echo '<script>alert("Something went wrong, please try again!")</script>';
                        }
                    } else {
                        echo '<script>alert("New password and confirmation password do not match.")</script>';
                    }
                } else {
                    echo '<script>alert("Incorrect old password.")</script>';
                }
            }
        }
        if (isset($_POST['update_address'])) {
            // Retrieve form data
            $Address = $_POST["Address"];
            $Address2 = $_POST["Address2"];
            $zipcode = $_POST["zip_code"];
            $Country = $_POST["Country"];
            $city = $_POST['city'];
            $state = $_POST['state'];
            // Update data in the `clients` table
            $sqlClients = "UPDATE clients SET Address='$Address', address_line2='$Address2', zip_code='$zipcode', country='$Country', city='$city', state='$state' WHERE user_id=$user_id";
            // Update data in the `users` table     
            // Execute the update queries
            if ($conn->query($sqlClients) === true) {
                echo '<script>alert("Updated successfully.")</script>';
            } else {
                echo '<script>alert("Something went wrong, please try again!")</script>';
            }
        }
        if (isset($_POST['Update_CreditCard'])) {
            // Retrieve form data
            $cardNumber = $_POST["card_number"];
            //$hashedCardNumber = md5($cardNumber);
            $cardExpiryDate = $_POST["card_expiry_date"];
            $cardholder_Name = $_POST["Cardholder_name"];
            $cvv = $_POST["card_cvv"];
            //$hashedCVV = md5($cvv);

            if (isset($_POST['cancel'])) {
                // Redirect the user back without performing the update
                header("Location: MyAccount.php"); // Replace "profile.php" with the appropriate page URL
                exit;
            }
            // Update data in the `clients` table
            $sqlClients = "UPDATE clients SET card_number='$cardNumber', Cardholder_name='$cardholder_Name', card_expiry_date='$cardExpiryDate', card_cvv='$cvv' WHERE user_id=$user_id";
            // Update data in the `users` table
            // Execute the update queries
            if ($conn->query($sqlClients) === true) {
                echo '<script>alert("Updated successfully.")</script>';
            } else {
                echo '<script>alert("Something went wrong, please try again!")</script>';
            }
        }
    } else {
        echo "User not found.";
    }
} else {
    echo "User ID is not set in the session.";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include './Page Items/header.php' ?>
    <?php include './Page Items/countryJS.php' ?>
</head>

<body>
    <div id="page" class="site page-single">
        <?php include('./Page Items/nav bar.php') ?>

        <!--Main Section-->
        <main>
            <div class="single-product">
                <div class="container">
                    <div class="wrapper">
                        <div class="breadcrumb">
                            <ul class="flexitem">
                                <li><a href="./index.php"></a>Home</li>
                                <li><a href="./page-single.php"></a>My Account</li>
                            </ul>
                        </div>
                        <section class="py-5 my-5">
                            <div class="container">
                                <h1 class="mb-5">Account Settings</h1>
                                <div class="bg-white shadow rounded-lg d-block d-sm-flex">
                                    <div class="profile-tab-nav border-right">
                                        <div class="p-4">
                                            <h4 class="text-center">
                                                <?php echo $firstName ?>
                                            </h4>
                                        </div>
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                            aria-orientation="vertical">
                                            <a class="nav-link active" id="account-tab" data-toggle="pill"
                                                href="#account" role="tab" aria-controls="account"
                                                aria-selected="false">
                                                <i class="ri-account-box-line"></i>
                                                Account
                                            </a>
                                            <a class="nav-link" id="password-tab" data-toggle="pill" href="#password"
                                                role="tab" aria-controls="password" aria-selected="false">
                                                <i class="ri-key-2-line"></i>
                                                Password
                                            </a>
                                            <a class="nav-link" id="Address-tab" data-toggle="pill" href="#Address"
                                                role="tab" aria-controls="Address" aria-selected="true">
                                                <i class="ri-map-pin-user-line"></i>
                                                Address
                                            </a>
                                            <a class="nav-link" id="Credit-tab" data-toggle="pill" href="#Credit"
                                                role="tab" aria-controls="Credit" aria-selected="false">
                                                <i class="ri-bank-card-line"></i>
                                                Credit
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="account" role="tabpanel"
                                            aria-labelledby="account-tab">
                                            <h3 class="mb-4">Account Settings</h3>
                                            <form action="" method="POST">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input type="text" class="form-control"
                                                                value="<?php echo $firstName ?>" name="fname"
                                                                pattern="[A-Za-z]+">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input type="text" class="form-control"
                                                                value="<?php echo $lastName ?>" name="lastName"
                                                                pattern="[A-Za-z]+">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="text" class="form-control"
                                                                value="<?php echo $email ?>" name="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Phone number</label>
                                                            <input type="text" class="form-control"
                                                                value="<?php echo $phoneNumber ?>" name="phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Company</label>
                                                            <input type="text" class="form-control" value="--">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Gender</label>
                                                            <div class="form-inline">
                                                                <div class="form-check mr-3">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="gender" id="male" value="male" <?php echo $maleChecked; ?>>
                                                                    <label class="form-check-label"
                                                                        for="male">Male</label>
                                                                </div>
                                                                <div class="form-check mr-3">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="gender" id="female" value="female" <?php echo $femaleChecked; ?>>
                                                                    <label class="form-check-label"
                                                                        for="female">Female</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button type="submit" name="Update_User"
                                                        class="btn btn-primary">Update</button>
                                                    <button class="btn btn-light">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="password" role="tabpanel"
                                            aria-labelledby="password-tab">
                                            <h3 class="mb-4">Password Settings</h3>
                                            <form action="" method="post">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Old password</label>
                                                            <input type="password" class="form-control"
                                                                name="old_password" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>New password</label>
                                                            <input type="password" class="form-control"
                                                                name="new_password" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Confirm new password</label>
                                                            <input type="password" class="form-control"
                                                                name="confirm_password" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button type="submit" name="Update_Password"
                                                        class="btn btn-primary">Update</button>
                                                    <button class="btn btn-light"
                                                        onclick="window.location.href='MyAccount.php'">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="Address" role="tabpanel"
                                            aria-labelledby="Address-tab">
                                            <h3 class="mb-4">Address Settings</h3>
                                            <form action="" method="POST">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" class="form-control" name="Address"
                                                                value="<?php echo $Address ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Address 2</label>
                                                            <input type="text" class="form-control" name="Address2"
                                                                value="<?php echo $address_line2 ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>zip code</label>
                                                            <input type="text" class="form-control" name="zip_code"
                                                                maxlength="5" pattern="[0-9]{1,5}"
                                                                title="Please enter a numeric zip code up to 5 digits"
                                                                value="<?php echo $zipCode ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Country</label>
                                                            <select class="form-control" id="countrySelect"
                                                                name="Country">
                                                                <option>
                                                                    <?php echo "$country</>"; ?>
                                                                </option>";
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>city</label>
                                                            <input type="text" class="form-control" name="city"
                                                                value="<?php echo $city ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>state</label>
                                                            <input type="text" class="form-control" name="state"
                                                                value="<?php echo $state ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button type="submit" name="update_address"
                                                        class="btn btn-primary">Update</button>
                                                    <button class="btn btn-light">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="Credit" role="tabpanel"
                                            aria-labelledby="Credit-tab">
                                            <h3 class="mb-4">Credit Card</h3>
                                            <form action="" method="POST">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Card Number</label>
                                                            <input type="text" class="form-control" name="card_number"
                                                                maxlength="19" oninput="formatCardNumber(this)"
                                                                value="<?php echo $cardNumber ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="cardHolderName">Cardholder Name</label>
                                                            <input type="text" class="form-control" id="Cardholder_name"
                                                                placeholder="Enter cardholder name"
                                                                pattern="[A-Za-z\s]+"
                                                                value="<?php echo $Cardholder ?>"
                                                                name="Cardholder_name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="expiration-date">Expiration Date (MM/YY)</label>
                                                            <input type="text" class="form-control" id="expiration-date"
                                                                maxlength="5" name="card_expiry_date"
                                                                value="<?php echo $cardExpiryDate ?>"
                                                                oninput="formatExpirationDate(this)" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="cvv">CVV</label>
                                                            <div class="input-group">
                                                                <input type="password" class="form-control" id="cvv"
                                                                    placeholder="CVV" maxlength="3" name="card_cvv"
                                                                    value="<?php echo $cardCVV ?>" required>
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-outline-secondary"
                                                                        type="button" id="toggleCvv">
                                                                        <i class="fa fa-eye" id="cvvEyeIcon"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button type="submit" name="Update_CreditCard"
                                                        class="btn btn-primary">Update</button>
                                                    <button class="btn btn-light"
                                                        onclick="window.location.href='MyAccount.php'">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </main>
        <!--End Main Section-->
        <?php include('./Page Items/footer.php'); ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fslightbox/3.4.1/index.js"></script>

    <script>
        function formatCardNumber(input) {
            var cardNumber = input.value.replace(/\D/g, '');
            if (cardNumber.length > 16) {
                cardNumber = cardNumber.slice(0, 16);
            }
            var formattedCardNumber = '';
            for (var i = 0; i < cardNumber.length; i++) {
                if (i > 0 && i % 4 === 0) {
                    formattedCardNumber += '-';
                }
                formattedCardNumber += cardNumber[i];
            }
            input.value = formattedCardNumber;
            input.setAttribute('data-original-value', cardNumber); // Store the original value without slashes
        }

        // Example code to retrieve the value with slashes
        var inputElement = document.querySelector('input[name="card_number"]');
        var originalValue = inputElement.getAttribute('data-original-value');
        if (originalValue) {
            var formattedValue = '';
            for (var i = 0; i < originalValue.length; i++) {
                if (i > 0 && i % 4 === 0) {
                    formattedValue += '-';
                }
                formattedValue += originalValue[i];
            }
            inputElement.value = formattedValue;
        };

        function formatExpirationDate(input) {
            let value = input.value.replace(/\D/g, ''); // Remove non-digit characters
            let formattedValue = '';

            if (value.length > 2) {
                formattedValue = value.slice(0, 2) + '/' + value.slice(2, 4);
            } else {
                formattedValue = value;
            }

            input.value = formattedValue;
        }
    </script>
    <?php include './Page Items/JS.php' ?>
    <?php include './Page Items/accountJS.php' ?>

</body>

</html>