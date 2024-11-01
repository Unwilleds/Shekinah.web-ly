<?php
    session_start();
    if (isset($_SESSION["user"])){
        header("Location: /Shekinah.web/Pages/homepage.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        require_once __DIR__ . '/../Assets/User_auth_head.php';
    ?>
</head>
<body>
<div class="container" id="login">
      <center>
        <h1>Login</h1>
      </center>
      <?php 
        if (isset($_POST["login"])){
            $lEmail = $_POST["lEmail"];
            $lPassword = $_POST["lPassword"];

            require_once __DIR__ . "/../Database/database.php";
            
            // Select full name along with the user's password
            $sql = "SELECT full_name, password FROM users WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $lEmail); // Bind the email parameter
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if ($user) {
                if (password_verify($lPassword, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    $_SESSION["full_name"] = $user["full_name"]; // Store the full name in session
                    header("Location: /Shekinah.web/Pages/homepage.php");
                    die();
                } else {
                    echo "<div class='errors'>Password does not match</div>";
                   
                }
            } else {
                if (filter_var($lEmail, FILTER_VALIDATE_EMAIL ) and strlen($lEmail)!==0){
                    echo "<div class='errors'>Email does not match</div>";
                } else if (empty($lEmail) OR empty($lPassword) ){
                    echo "<div class='errors'>All fields are required</div>"; 
                } 
                // if(password_verify($lPassword, $user["password"]) ){
                //     echo "<div class='errors'>Password does not match</div>";
                // }
                
            }

            $stmt->close(); // Close the statement
        }
?>

      <form action="user_login.php" method="post" class="form" id="login-form" >
        <div id="inputs">
          
          <input
            type="email"
            name="lEmail"
            id="email"
            placeholder="Enter your Email Address"
            autocomplete="false"
            value="<?= isset($_POST['lEmail']) ? htmlspecialchars($_POST['lEmail']) : '' ?>"
          />

          
          <span class="seePasswordToggle">
            <input
              type="password"
              name="lPassword"
              id="password"
              placeholder="Enter your Password"
              autocomplete="false"
               value="<?= isset($_POST['lPassword']) ? htmlspecialchars($_POST['lPassword']) : '' ?>"
            />
            <i class="fa-solid fa-eye" onclick="seePassword('password', this)"></i>
          </span>
        </div>
        <div class="conf">
          <label for="checkbox">
            <input type="checkbox" id="checkbox" value="Remember Me" />Remember
            me</label
          >
          <a href="./forgot_password.php">Forgot Password?</a>
        </div>

        <input type="submit" name="login" id="login-submit" value="Login now" />
      </form>
      <center>
        <span id="login-btn">
          Don't have an account yet?
          <a id="l-btn" href="./user_register.php">Register here</a>
        </span>
      </center>
    </div>

    <?php
        require_once __DIR__ . '/../Assets/Html_footer.php';
    ?>
    
</body>
</html>