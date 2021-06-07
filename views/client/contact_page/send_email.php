<?php
// define variables and set to empty values
require_once '../../../data/config.php';

use PHPMailer\PHPMailer\PHPMailer;

require_once "../../../vendor/autoload.php";
require_once "./valid_email_form.php";
$firstName = $lastName = $email = $subject = $website = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = valid_first_name(test_input($_POST["firstName"]));
    $lastName = valid_last_name(test_input($_POST["lastName"]));
    $email = valid_email(test_input($_POST["email"]));
    $subject = valid_subject(test_input($_POST["subject"]));
    $website = valid_website(test_input($_POST["website"]));
    $message = valid_message(test_input($_POST["message"]));
    $result = array(
        "firstName" => $firstName,
        "lastName" => $lastName,
        "email" => $email,
        "subject" => $subject,
        "website" => $website,
        "message" => $message,
        "success" => false
    );

    //Send email
    if (!$firstName && !$lastName && !$email && !$subject && !$website && !$message) {
        $result['success'] = true;
        $mail = new PHPMailer(true); //Argument true in constructor enables exceptions
        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "bookstore4t@gmail.com"; // Your Email Address
        $mail->Password = "burnthemall"; // Your Password
        $mail->Port = 587;
        //From email address and name
        $mail->From = test_input($_POST["email"]);
        $mail->FromName = test_input($_POST["firstName"]) . " " . test_input($_POST["lastName"]);

        //To address and name
        // $mail->addAddress("recepient1@example.com", "Recepient Name");
        $mail->addAddress("bookstore4t@gmail.com"); //Recipient name is optional

        //Address to which recipient will reply
        $mail->addReplyTo(test_input($_POST["email"]), "Reply");

        $mail->isHTML(true);

        $mail->Subject = test_input($_POST["subject"]);
        $mail->Body = "<i>" . test_input($_POST["message"]) . "</i>";
        $mail->AltBody = "This is the plain text version of the email content";
        try {
            $mail->send();
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $query = "insert into send_email_log (first_name,last_name,email,website,subject,message,created_at)
            values ('" . test_input($_POST["firstName"]) . "','"
                . test_input($_POST["lastName"]) . "','"
                . test_input($_POST["email"]) . "','"
                . test_input($_POST["website"]) . "','"
                . test_input($_POST["subject"]) . "','"
                . test_input($_POST["message"]) . "','"
                . date('Y-m-d H:i:s') . "')";
            $mysql_db->query($query);
        } catch (Exception $e) {
        }
    }
    echo json_encode($result);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}