<?php
session_start();
require "../../../data/config.php";
function validPassword($password)
{
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);

    if (!$uppercase || !$lowercase || !$number  || strlen($password) < 8) {
        return 'Password should be at least 8 characters in length and should include at least one upper case letter, and one number.';
    } else {
        return "";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = array(
        "oldPassword" => "",
        "newPassword" => "",
        "confirmNewPassword" => "",
        "systemError" => false,
        "success" => true
    );
    $query = "SELECT password FROM admin WHERE id='" . $_SESSION['id_admin'] . "'";
    $result = $mysql_db->query($query);
    if ($result) {
        $row = $result->fetch_assoc();
        if (!empty($row)) {
            if ($row['password'] == $_POST['oldPassword']) {
                $message['newPassword'] = validPassword($_POST['newPassword']);
                if ($message['newPassword'] === '') {
                    if ($_POST['newPassword'] != $_POST['confirmNewPassword']) {
                        $message['confirmNewPassword'] = "Not match your new password. Please check again.";
                        $message['success'] = false;
                    } else {
                        $query = "update admin set password='" . $_POST['newPassword'] . "'";
                        $result = $mysql_db->query($query);
                        if (!$result) {
                            $message['success'] = false;
                        }
                    }
                } else $message['success'] = false;
            } else {
                $message['oldPassword'] = "Old Password is not match";
                $message['success'] = false;
            }
        } else {
            $message['systemError'] = true;
            $message['success'] = false;
        }
    } else {
        $message['systemError'] = true;
        $message['success'] = false;
    }
    echo json_encode($message);
}
?>
<?php

?>