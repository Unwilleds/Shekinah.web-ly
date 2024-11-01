<?php
    session_start();
    $isLoggedIn = isset($_SESSION['user']);
    $username = $isLoggedIn ? $_SESSION['user'] : null;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <?php
        require_once __DIR__ . '/../Assets/User_auth_head.php';
    ?>
  </head>
  <body>

    <div class="container" id="register">
      <center>
        <h1>Register</h1>
      </center>
      <?php 
      if (isset($_POST["submit"])){
        $fullName = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    
        $errors = array();
    
        if (empty($fullName) OR empty($email) OR empty($password) OR empty($confirmPassword)){
            array_push($errors, "All fields are required");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL ) and strlen($email)!==0){
            array_push($errors, "Email is not valid");
        }
        if (strlen($password) < 8 and strlen($password)!==0){
            array_push($errors, "Password must be at least 8 characters long");
        }
        if (!preg_match("/[a-z]/i", $password)){
          array_push($errors, "Password must contain at least one letter");
        }
        if (!preg_match("/[0-9]/", $password)){
          array_push($errors, "Password must contain at least one number");
        }
        if ($password !== $confirmPassword){
            array_push($errors, "Password do not match");
        }
        if (!isset($_POST["terms"]) and !(empty($fullName) OR empty($email) OR empty($password)) and ($password == $confirmPassword)){
            array_push($errors, "You must agree to the terms and conditions to register");
        }
        
        require_once __DIR__ . "/../Database/database.php";
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);

        if ($rowCount > 0){
          array_push($errors, "Email already exist!");
        }

        if (count($errors) > 0){
            foreach($errors as $error){
                echo "<div class='errors'>$error</div>";
            }
        } else {
            $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
            if ($prepareStmt) {
              mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $passwordHash);
              mysqli_stmt_execute($stmt);
              $_SESSION["user"] = "yes";
              $_SESSION["registration_success"] = "You are registered successfully";
          
              header("Location: /../Pages/homepage.php");
              
          }else{
                die("Something went wrong!");
            }
        }
       
    }
    
      ?>
      <form action="user_register.php" method="post" class="form" id="register-form">
    <div id="inputs">
      <input
        type="text"
        name="name"
        id="name"
        placeholder="Enter your Full Name"
        value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>"
        autocomplete="off"
      />
      <input
        type="email"
        name="email"
        id="email"
        placeholder="Enter your Email Address"
        value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>"
        autocomplete="off"
      />
     
      
      <span class="seePasswordToggle">
        <input
          type="password"
          name="password"
          id="password1"
          placeholder="Create your Password"
          value="<?= isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '' ?>"
          autocomplete="off"
        />
        <i class="fa-solid fa-eye" onclick="seePassword('password1', this)"></i>
      </span>

      <span class="seePasswordToggle">
        <input
        type="password"
        name="confirmPassword"
        id="confirmPassword"
        placeholder="Confirm Password"
        value="<?= isset($_POST['confirmPassword']) ? htmlspecialchars($_POST['confirmPassword']) : '' ?>"
        autocomplete="off"
        />
        <i class="fa-solid fa-eye" id="icon" onclick="seePassword('confirmPassword', this)"></i>
      </span>
    </div>
    <div class="conf">
      <label for="checkbox1">
        <input type="checkbox" id="checkbox1" name="terms" <?= isset($_POST['terms']) ? 'checked' : '' ?> />I accept all terms and conditions
      </label>
    </div>
    
    <input type="submit" name="submit" value="Register now" />
    <div id="error-message" style="color:red; display:none;"></div>
  </form>
  
  <center>
    <span id="register-btn">
      Already have an account yet?
      <a id="r-btn" href="./user_login.php">Login here</a>
    </span>
  </center>
</div>

    <?php
        require_once __DIR__ . '/../Assets/Html_footer.php';
    ?>
  </body>
</html>
