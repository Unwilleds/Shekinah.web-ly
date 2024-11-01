<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
            gap: 3em;
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
            <a href="./user_login.php"><i class="fa-solid fa-arrow-left"></i></a>
            <center><h1>Forgot Password</h1></center>
        </div>

        <?php

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST['email'])) {
                $email = $_POST["email"];
                $token = bin2hex(random_bytes(16));
                $token_hash = hash("sha256", $token);
                $expiry = date("Y-m-d H:i:s", time() + 60 * 30);

                $mysqli = require_once __DIR__ . "/../Database/database.php";

                $sql = "UPDATE users
                        SET reset_token_hash = ?,
                            reset_token_expires_at = ?
                        WHERE email = ?";

                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("sss", $token_hash, $expiry, $email);
                $stmt->execute();

                if ($mysqli->affected_rows) {

                    $mail = require __DIR__ . "/Mailer/mailer.php";

                    $mail->setFrom("noreply@example.com");
                    $mail->addAddress($email);
                    $mail->Subject = "Password Reset";

                    $mail->Body = "Click <a href='http://localhost/Shekinah.web/User-auth/reset-password.php?token=$token'>here</a> to reset your password.";

                    try {
                        $mail->send();
                        echo "<div class='success'>A reset link has been sent to your email address.</div>";
                        unset($_POST['email']);
                    } catch (Exception $e) {
                        echo "<div class='errors'>Message could not be sent. Mailer error: " . htmlspecialchars($mail->ErrorInfo) . "</div>";
                    }
                } else {
                    if (strlen($email) !== 0) {
                        echo "<div class='errors'>No account found with that email.</div>";
                    }
                }
            }
        }
        ?>

        <form action="" method="post" class="form" >
            <div id="inputs">
                <input type="email" id="email" name="email" placeholder="Enter your Email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required autocomplete="false"> 
            </div>
            <input type="submit" name="send" value="Send" class="send">
        </form>
    </div>
    <?php
        require_once __DIR__ . '/../Assets/Html_footer.php';
    ?>
</body>
</html>
