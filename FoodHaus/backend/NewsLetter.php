<?php require_once('./includes/header.php'); ?>

<body class="nav-fixed">
    <?php require_once('./includes/top-navbar.php'); ?>
    <!--Side Nav-->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php
            $curr_page = basename(__FILE__);
            require_once("./includes/left-sidebar.php");
            ?>
        </div>

        <!--PHP mail -->

        <div id="layoutSidenav_content">
            <main>
                <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
                    <div class="container-fluid">
                        <div class="page-header-content">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="send"></i></div>
                                <span>Send E-Mail</span>
                            </h1>
                        </div>
                    </div>
                </div>

                <!--Start Form-->
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">E-Mail :&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <a href="E-mail_history.php" title="Mail history" class="btn btn-white">
                                <button class="btn btn-primary mr-2 my-1">E-Mail history</button>
                            </a>
                        </div>

                        <div class="card-body">


                            <form action="NewsLetter.php" method="POST">
                                <div class="form-group">
                                    <label for="post-content">Subject</label>
                                    <input class="form-control" name='subject' required placeholder="This message is about..."></input>

                                    <label for="post-content">Your e-mail:</label>
                                    <textarea class="form-control" name='message' required placeholder="This message will be sent to all users..." id="post-content" rows="9"></textarea>
                                </div>

                                <button name="send-e-mail" class="btn btn-primary mr-2 my-1" type="submit">Send E-Mail</button>

                            </form>

                        </div>
                    </div>
                </div>
                <!--End Form-->

            </main>

        </div>
    </div>
</body>



<?php
require 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

if (isset($_POST['send-e-mail'])) {

    $sql = "SELECT * FROM users";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    while ($users = $stmt->fetch(PDO::FETCH_ASSOC)) {


        $user_email = $users['user_email'];
        $user_name = $users['user_name'];


        // Add a recipient

        $mail->addBCC($user_email, $user_name);






        $message = ($_POST['message']);
        $subject = ($_POST['subject']);



        //MAILER

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'foodhaus.esprittn@gmail.com';                 // SMTP username
        $mail->Password = '(azerty12345)';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->AddReplyTo('foodhaus.esprittn@gmail.com');
        $mail->From = 'foodhaus.esprittn@gmail.com';
        $mail->FromName = 'FoodHaus';





        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    }
    if (!$mail->send()) {
        echo "<p class='alert alert-danger'>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Somethnig went wrong!</p>";
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }

    echo "<p class='alert alert-success'>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; E-mail has been send successfully!</p>";
    $sql = "INSERT INTO e_mails (msg_mail, time_mail) VALUES (:content, :date)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':content' => $message,
        ':date' => date("M n, Y") . ' at ' . date("h:i A"),

    ]);
}

?>



<?php require_once('./includes/footer.php'); ?>