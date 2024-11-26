<?php
session_start();
if (isset($_SESSION["user"])) {
  header("Location: /Shekinah.web/Pages/homepage.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Authentication</title>
  <?php require_once __DIR__ . '/../Assets/User_auth_head.php'; ?>
</head>

<body>
  <!-- <div class="container" id="container">
  
    <div class="form-container sign-up-container">
      <form action="user_login.php" method="post" class="form" id="register-form">
        <h1>Create Account</h1>
        <input type="hidden" name="form_type" value="signup" />
        <?php
        if (isset($_POST["submit"])) {
          // Sign-Up Logic
          $fullName = $_POST["name"];
          $email = $_POST["email"];
          $password = $_POST["password"];
          $confirmPassword = $_POST["confirmPassword"];

          $passwordHash = password_hash($password, PASSWORD_DEFAULT);
          $errors = [];

          if (empty($fullName) || empty($email) || empty($password) || empty($confirmPassword)) {
            $errors[] = "All fields are required.";
          }
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email address.";
          }
          if (strlen($password) < 8) {
            $errors[] = "Password must be at least 8 characters long.";
          }
          if (!preg_match("/[a-z]/i", $password)) {
            $errors[] = "Password must contain at least one letter.";
          }
          if (!preg_match("/[0-9]/", $password)) {
            $errors[] = "Password must contain at least one number.";
          }
          if ($password !== $confirmPassword) {
            $errors[] = "Passwords do not match.";
          }
          if (!isset($_POST["terms"])) {
            $errors[] = "You must agree to the terms and conditions.";
          }

          require_once __DIR__ . "/../Database/database.php";
          $sql = "SELECT * FROM users WHERE email = ?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("s", $email);
          $stmt->execute();
          $result = $stmt->get_result();

          if ($result->num_rows > 0) {
            $errors[] = "Email already exists.";
          }

          if (!empty($errors)) {
            foreach ($errors as $error) {
              echo "<div class='errors'>$error</div>";
            }
          } else {
            $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $fullName, $email, $passwordHash);

            if ($stmt->execute()) {
              $_SESSION["user"] = "yes";
              $_SESSION["registration_success"] = "Registration successful.";
              header("Location: /Pages/homepage.php");
              exit();
            } else {
              echo "<div class='errors'>Something went wrong. Please try again later.</div>";
            }
          }
        }
        ?>

        <input type="text" name="name" placeholder="Full Name"
          value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>" />
        <input type="email" name="email" placeholder="Email"
          value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" />
        <input type="password" name="password" id="register-password" placeholder="Password" />
        <input type="password" name="confirmPassword" id="register-confirm-password" placeholder="Confirm Password" />
        <div>
          <label>
            <input type="checkbox" name="terms" <?= isset($_POST['terms']) ? 'checked' : '' ?> />
            I agree to the terms and conditions.
          </label>
        </div>
        <input type="submit" name="submit" id="submit" value="Sign Up" />
      </form>
    </div>

    <div class="form-container sign-in-container">
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Welcome Back!</h1>
            <p>To keep connected with us please login with your personal info</p>
            <button class="ghost" id="signIn">Sign In</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Hello, Friend!</h1>
            <p>Enter your personal details and start journey with us</p>
            <button class="ghost" id="signUp">Sign Up</button>
          </div>
        </div>
      </div>
      <form action="user_login.php" method="post" class="form" id="login-form">
        <h1>Sign In</h1>

        <input type="hidden" name="form_type" value="signin" />

        <?php
        if (isset($_POST["login"])) {
        
          $lEmail = $_POST["lEmail"];
          $lPassword = $_POST["lPassword"];

          require_once __DIR__ . "/../Database/database.php";

          $sql = "SELECT full_name, password FROM users WHERE email = ?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("s", $lEmail);
          $stmt->execute();
          $result = $stmt->get_result();
          $user = $result->fetch_assoc();

          if ($user && password_verify($lPassword, $user["password"])) {
            $_SESSION["user"] = "yes";
            $_SESSION["full_name"] = $user["full_name"];

            if (isset($_POST["rememberMe"])) {
              setcookie("user_login", $user["full_name"], time() + (86400), "/");
            }

            header("Location: /Pages/homepage.php");
            exit();
          } else {
            echo "<div class='errors'>Invalid email or password.</div>";
          }
        }
        ?>

        <input type="email" name="lEmail" placeholder="Email"
          value="<?= isset($_POST['lEmail']) ? htmlspecialchars($_POST['lEmail']) : '' ?>" />
        <input type="password" name="lPassword" id="login-password" placeholder="Password" />
        <div>
          <label>
            <input type="checkbox" name="rememberMe" /> Remember me
          </label>
        </div>
        <input type="submit" name="login" value="Sign In" />
      </form>

    </div> -->


    <div class="container" id="container">
  <!-- Sign Up Form -->
  <div class="form-container sign-up-container">
    <form action="user_login.php" method="post" class="form" id="register-form">
      <h1>Create Account</h1>
      <input type="hidden" name="form_type" value="signup" />

      <!-- PHP Errors for Signup -->
      <?php
        if (isset($_POST["submit"])) {
          // Sign-Up Logic
          $fullName = $_POST["name"];
          $email = $_POST["email"];
          $password = $_POST["password"];
          $confirmPassword = $_POST["confirmPassword"];

          $passwordHash = password_hash($password, PASSWORD_DEFAULT);
          $errors = [];

          if (empty($fullName) || empty($email) || empty($password) || empty($confirmPassword)) {
            $errors[] = "All fields are required.";
          }
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email address.";
          }
          if ((strlen($password) < 8) ) {
            $errors[] = "Password must be at least 8 characters long.";
          }
          
          if ((!preg_match("/[0-9]/", $password)) or (!preg_match("/[a-z]/i", $password))) {
            $errors[] = "Password must contain at least one number and letter.";
          }
          if ($password !== $confirmPassword) {
            $errors[] = "Passwords do not match.";
          }
          // if (!isset($_POST["terms"])) {
          //   $errors[] = "You must agree to the terms and conditions.";
          // }

          require_once __DIR__ . "/../Database/database.php";
          $sql = "SELECT * FROM users WHERE email = ?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("s", $email);
          $stmt->execute();
          $result = $stmt->get_result();

          if ($result->num_rows > 0) {
            $errors[] = "Email already exists.";
          }

          if (!empty($errors)) {
            foreach ($errors as $error) {
              echo "<div class='errors'>$error</div>";
            }
          } else {
            $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $fullName, $email, $passwordHash);

            if ($stmt->execute()) {
              $_SESSION["user"] = "yes";
              $_SESSION["registration_success"] = "Registration successful.";
              header("Location: /Pages/homepage.php");
              exit();
            } else {
              echo "<div class='errors'>Something went wrong. Please try again later.</div>";
            }
          }
        }
        ?>

      <input type="text" name="name" placeholder="Full Name"  value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>" />
      <input type="email" name="email" placeholder="Email"  value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" />
      <input type="password" name="password" id="register-password" placeholder="Password"  />
      <input type="password" name="confirmPassword" id="register-confirm-password" placeholder="Confirm Password"  />
      <div class="form-grps">
        <label class="checkbx">
          <input type="checkbox" name="terms" <?= isset($_POST['terms']) ? 'checked' : '' ?> />
          I agree to the terms and conditions.
        </label>
      </div>
      <input type="submit" name="submit" id="submit" value="Sign Up" />
    </form>
  </div>

  <!-- Sign In Form -->
  <div class="form-container sign-in-container">
    <form action="user_login.php" method="post" class="form" id="login-form">
      <h1>Sign In</h1>
      <input type="hidden" name="form_type" value="signin" />

      <!-- PHP Errors for Login -->
      <?php
        if (isset($_POST["login"])) {
          // Sign-In Logic
          $lEmail = $_POST["lEmail"];
          $lPassword = $_POST["lPassword"];

          require_once __DIR__ . "/../Database/database.php";

          $sql = "SELECT full_name, password FROM users WHERE email = ?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("s", $lEmail);
          $stmt->execute();
          $result = $stmt->get_result();
          $user = $result->fetch_assoc();

          if ($user && password_verify($lPassword, $user["password"])) {
            $_SESSION["user"] = "yes";
            $_SESSION["full_name"] = $user["full_name"];

            if (isset($_POST["rememberMe"])) {
              setcookie("user_login", $user["full_name"], time() + (86400), "/");
            }

            header("Location: /Pages/homepage.php");
            exit();
          } else {
            echo "<div class='errors'>Invalid email or password.</div>";
          }
        }
        ?>

      <input type="email" name="lEmail" placeholder="Email"  value="<?= isset($_POST['lEmail']) ? htmlspecialchars($_POST['lEmail']) : '' ?>" />
      <input type="password" name="lPassword" id="login-password" placeholder="Password"  />
      <div class="form-grps">
        <label class="checkbx">
          <input type="checkbox" name="rememberMe" /> Remember me
        </label>
        <label class="forgot">
          <a href="./forgot_password.php">Forgot Password?</a>
        </label>
        
      </div>
      <input type="submit" name="login" value="Sign In" />
    </form>
  </div>

  <!-- Overlay -->
  <div class="overlay-container">
    <div class="overlay">
      <div class="overlay-panel overlay-left">
        <h1>Welcome Back!</h1>
        <p>To keep connected with us, please log in with your personal info</p>
        <button class="ghost" id="signIn">Sign In</button>
      </div>
      <div class="overlay-panel overlay-right">
        <h1>Hello, Friend!</h1>
        <p>Enter your personal details and start your journey with us</p>
        <button class="ghost" id="signUp">Sign Up</button>
      </div>
    </div>
  </div>
</div>

    <?php require_once __DIR__ . '/../Assets/Html_footer.php'; ?>
</body>

</html>