<?php
session_start();
require_once('../Controllers/logCheckController.php');

// Initialize $mass with an empty string
$mass = "";

// Check if the session message is set and assign it to $mass
if (isset($_SESSION['mess'])) {
    $mass = $_SESSION['mess'];
    // Unset the session message to avoid displaying it again on subsequent requests
    unset($_SESSION['mess']);
}

if (isset($_POST['log'])) {
    $id = $_POST['id'];
    $pass = $_POST['pass'];
    $loginstatus = login($id, $pass);

    if (!$loginstatus) {
        // If login fails, you might set a session message here
        $_SESSION['mess'] = "Login failed!";
        // Refresh the page to display the error message
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        // Redirect or perform actions for successful login
        // Example: header("Location: dashboard.php");
        echo "Login successful!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="Styles.css">
    <title>Login</title>
    <style>
        
    </style>
</head>
<body>
<div class="log-center-box">
    <form class="log-form" method="post"> <!-- Change the action attribute to the correct login page -->
        <img class="log-logo" src="img/logo.png" alt="Logo"> <!-- Add your image path here -->
        <p>Please fill in your User ID and password:</p> <!-- Updated paragraph element -->
        <input type="text" id="id" name="id" class="log-input" placeholder="User ID"><br> <!-- Updated placeholder -->
        <input type="password" id="pass" name="pass" class="log-input" placeholder="Password"><br> <!-- Updated placeholder -->
        <p class="mass"> <?php echo $mass ; ?> </p>
        <button  onclick="openLog()" name="log" class="log-button">Log In</button>
        <div class="log-tooltip">
            <button type="button" id="register-btn" onclick="openReg()" class="log-button">Register
                <span class="tooltiptext">Restart as patient</span>
            </button>
        </div><br>
        <a href="forgot_password.php" class="log-forgot-password">Forgot Password?</a><br>

    </form>
</div>

<script>
    // JavaScript to handle button click event
    function openLog() {


        
    }
    function openReg() {
        // Redirect to the registration page
       // window.location.href = 'home.php';
window.location.href = '../../../Admin/MVC/Views/dashboard.php';
    }
</script>

</body>
</html>
