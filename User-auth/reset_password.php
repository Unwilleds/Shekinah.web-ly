
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        require_once __DIR__ . '/../Assets/User_auth_head.php';
    ?>
    <style>
         .container h1 {
            margin-top: .5em;
        }
        .form input[type="submit"] {
            margin-bottom: 0;
            margin-top: 1em;
        }
        .form #inputs input[type="email"] {
            border: 1px solid rgb(164, 164, 165);
            border-radius: 5px;
        }
        .container a {
            font-size: 24px;
            text-decoration: none;
            color: black;
            padding-block: .5em;
            font-weight: bold;
        }
        .header {
            display: flex;
            gap: 3.5em;
            align-items: center;
        }

        .success {
            color: green;
        }
        .errors {
            color: red;
        }
      
    </style>
    
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="./forgot-password.php"><i class="fa-solid fa-arrow-left"></i></a>
            <center><h1>Reset Password</h1></center>
        </div>
        <?php
            $token = $_GET["token"];

            $token_hash = hash("sha256", $token);

            $mysqli = require __DIR__ . "/../Database/database.php";

            $sql = "SELECT * FROM users 
                    WHERE reset_token_hash = ?";

            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("s", $token_hash);
            $stmt->execute();

            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if ($user === null) {
                echo "<div class='errors'>Token not found</div>";
                exit(); 
            }
            
            
            if (strtotime($user["reset_token_expires_at"]) <= time()) {
                echo "<div class='errors'>Token has expired</div>";
                exit(); 
            } else {
                echo "<div class='success'>Token is valid and hasn't expired</div>";

            }


            $errors = array();

           
            if (isset($_POST["submit"])) {
                $password = $_POST["password"];
                $confirmPassword = $_POST["confirmPassword"];
                
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                
                if (strlen($password) < 8 && strlen($password) !== 0){
                    array_push($errors, "Password must be at least 8 characters long");
                }
                if (!preg_match("/[a-z]/i", $password)){
                    array_push($errors, "Password must contain at least one letter");
                }
                if (!preg_match("/[0-9]/", $password)){
                    array_push($errors, "Password must contain at least one number");
                }
                if ($password !== $confirmPassword){
                    array_push($errors, "Passwords do not match");
                }

                
                if (count($errors) > 0){
                    foreach($errors as $error){
                        echo "<div class='errors'>$error</div>";
                    }
                }

                
                if (count($errors) === 0){
                    $sql = "UPDATE users
                            SET password = ?,
                                reset_token_hash = NULL,
                                reset_token_expires_at = NULL
                            WHERE id = ?";
                    $stmt = $mysqli->prepare($sql);
                    $stmt->bind_param("si", $passwordHash, $user["id"]); // Fix data type for 'id'
                    $stmt->execute();

                    echo "<div class='success'>Password updated. You can now login.</div>";
                }
            }
            ?>

        <form action="" method="post" class="form">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
            <div id="inputs">
                <span class="seePasswordToggle">
                    <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Enter your Password"
                    autocomplete="false"
                    required
                    />
                    <i class="fa-solid fa-eye" onclick="seePassword('password', this)"></i>
                </span>
                <span class="seePasswordToggle">
                    <input
                    type="password"
                    name="confirmPassword"
                    id="confirmPassword"
                    placeholder="Confirm Password"
                    autocomplete="off"
                    />
                    <i class="fa-solid fa-eye" id="icon" onclick="seePassword('confirmPassword', this)"></i>
                </span>
              
            </div>
            <input type="submit" name="submit" value="Send">
        </form>
    </div>

    <?php
        require_once __DIR__ . '/../Assets/Html_footer.php';
    ?>
    </body>
</html>