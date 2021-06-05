<?php
function validateContactForm()
{
    return false;
}
function valid_first_name($firstName)
{

    if (empty($firstName)) {
        return "First Name is required";
    } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $firstName)) {
            return "Only letters and white space allowed";
        }
    }
    return false;
}
function valid_last_name($lastName)
{
    if (empty($lastName)) {
        return "Last Name is required";
    } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lastName)) {
            return "Only letters and white space allowed";
        }
    }
    return false;
}
function valid_email($email)
{
    if (empty($email)) {
        return "Email is required";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format";
        }
    }
    return false;
}
function valid_message($message)
{
    if (empty($message)) {
        return "Message is required";
    } else {
        if (strlen($message) <= 10) {
            return "Message is too short";
        }
    }
    return false;
}
function valid_website($website)
{
    if (empty($website)) {
        return false;
    } else {
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
            return "Invalid website";
        }
    }
    return false;
}
function valid_subject($subject)
{
    if (empty($subject)) {
        return false;
    } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $subject)) {
            return "Only letters and white space allowed";
        }
    }
    return false;
}