<?php

if(isset($_POST['email'])) {



    // EDIT THE 2 LINES BELOW AS REQUIRED

    $email_to = "miri.cvetanova@gmail.com";

    $email_subject = "Your email subject line";





    function died($error) {

        // your error code can go here

        echo "We are very sorry, but there were error(s) found with the form you submitted. ";

        echo "These errors appear below.<br /><br />";

        echo $error."<br /><br />";

        echo "Please go back and fix these errors.<br /><br />";

        die();

    }



    // validation expected data exists

    if(!isset($_POST['name']) ||

        !isset($_POST['email']) ||

        !isset($_POST['telephone']) ||

        !isset($_POST['comments'])) {

        died('We are sorry, but there appears to be a problem with the form you submitted.');

    }



    $name = $_POST['name']; // required

    $email_from = $_POST['email']; // required

    $telephone = $_POST['telephone']; // not required

    $comments = $_POST['comments']; // required



    $error_message = "";

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {

    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';

  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$name)) {

    $error_message .= 'The Name you entered does not appear to be valid.<br />';

  }


  if(strlen($comments) < 2) {

    $error_message .= 'The Comments you entered do not appear to be valid.<br />';

  }

  if(strlen($error_message) > 0) {

    died($error_message);

  }

    $email_message = "Form details below.\n\n";



    function clean_string($string) {

      $bad = array("content-type","bcc:","to:","cc:","href");

      return str_replace($bad,"",$string);

    }



    $email_message .= "First Name: ".clean_string($name)."\n";

    $email_message .= "Email: ".clean_string($email_from)."\n";

    $email_message .= "Telephone: ".clean_string($telephone)."\n";

    $email_message .= "Comments: ".clean_string($comments)."\n";





// create email headers

$headers = 'From: '.$email_from."\r\n".

'Reply-To: '.$email_from."\r\n" .

'X-Mailer: PHP/' . phpversion();

@mail($email_to, $email_subject, $email_message, $headers);

?>



<!-- include your own success html here -->
		<div style='width:100%;' id='menu_logo' class='row'>
			<div style="width:70%;" id='logo_icon' class='col-lg-3 col-md-3 col-sm-5 col-xs-5'>
				<a style='margin:1%;' href='index.html'>
					<img style='width:5.9%; margin:1%; float:left;' class="logo" src="img/icon_fakefuture_fullcolor.png">
					<img style='width:20%; float: left; margin: 2.5% 0 0 0%; padding: 0;' class="logotype" src="img/fakefuture.svg">
				</a>
			</div>
		</div>

<div style='margin:10% 0 0 2%; color: #00aeef; font-size: 20px; font-family: Titillium Web;'>
	<p>Thank you for contacting us. We will be in touch with you very soon.</p>
	</div>
<div style='margin:5%'>
	<button style='background:#00aeef; border:none'><a style='color: #fff; text-decoration: none; font-size: 26px;' href='contacts.html'>Go back</a></button>
	</div>



<?php

}

?>
