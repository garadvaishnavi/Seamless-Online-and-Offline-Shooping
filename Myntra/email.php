
<?php
if(isset($_POST)) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "ghargesalan18ce@student.mes.ac.in";
    $email_from = "salonigharge035@gmail.com";
    $email_subject = "Test Email Using PHP feedback from";
 
    $name = $_POST['name']; // required
    $email = $_POST['email']; // required
    $mobile = $_POST['mobile']; // required
    $comments = $_POST['comments']; // required
 
    $response = array('status' => false, 'message' => array());
    $email_exp = '/^[A-Za-z0-9._%-][email protected][A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!isset($email) || !preg_match($email_exp,$email)) {
    array_push($response['message'], 'The Email Address you entered does not appear to be valid');
  }
 
  if(!isset($name) || empty($name)) {
    array_push($response['message'], 'The Name you entered does not appear to be valid.');
  }
 
  if(!isset($mobile) || empty($mobile)) {
    array_push($response['message'], 'The Mobile  you entered does not appear to be valid.');
  }
 
  if(!isset($comments) || empty($comments) || strlen($comments) < 2) {
    array_push($response['message'], 'The Comments you entered do not appear to be valid.');
  }
 
 if(!empty($response['message'])) {
 echo json_encode($response);
 } else {
 $email_body = "Form details below.\n\n";
 $email_body .= "Name: ".$name."\n";
 $email_body .= "Email: ".$email."\n";
 $email_body .= "mobile: ".$mobile."\n";
 $email_body .= "Comments: ".$comments."\n";
 
 // create email headers
 $headers = 'From: '.$email_from."\r\n".
 'Reply-To: '.$email_from."\r\n" .
 'X-Mailer: PHP/' . phpversion();
 if(mail($email_to, $email_subject, $email_body, $headers)) {
 $response = array('status' => true, 'message' => 'Thank you for contacting us. We will be in touch with you very soon.');
 echo json_encode($response);
 
 } 
 }
 }
?>