<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Styles.css">
    <title></title>
    <style>
             
              
    </style>
</head>
<body>
    <header>
    <div class="homelogo">
        <img src="img/logo.png" alt="Logo">
    </div>
    <div class="homesearch-container">
        <input  type="text" class="homesearch-bar" placeholder="Search...">
        <button class="homesearch-btn">Search</button>
    </div>
     <button class="homeloginButton" onclick="login()">
                <img src="img/login.png" alt="Login">
                <span>Login</span>
     </button>
</header>
<script>
        function login() {
        // Add functionality to login
        window.location.href = '../Controllers/logController.php';
    }
</script>
</body>
</html>
