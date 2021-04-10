<?php
$to_email = "ghargesalan18ce@student.mes.ac.in";
$subject = "Feedback For your Seamless Online/offline Shopping";
$body = "Hi, This is test email send by PHP Script";
$headers = "From: salonigharge035@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}