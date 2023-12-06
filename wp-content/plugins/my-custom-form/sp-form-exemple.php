<?php

/*
Plugin Name:  Contact Form Plugin
Description: Simple non-bloated WordPress Contact Form
Version: 1.0
Author: Agbonghama Collins
*/

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    function html_form_code(){
        echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
        echo '<p>';
        echo '<label for="cf-email" style="color: #5E358A; font-weight: bold;">Votre Email</label> <br />';
        echo '<input type="email" id="cf-email" name="cf-email" placeholder="Entrez votre email" value="' . ( isset( $_POST["cf-email"] ) ? esc_attr( $_POST["cf-email"] ) : '' ) . '" size="40" style="height: 40px" />';
        echo '</p>';
        echo '<p>';
        echo '<label for="cf-name" style="color: #5E358A; font-weight: bold;">Votre Nom </label> <br />';
        echo '<input type="text" id="cf-name" name="cf-name" pattern="[a-zA-Z0-9 ]+" placeholder="Entrez votre nom" value="' . ( isset( $_POST["cf-name"] ) ? esc_attr( $_POST["cf-name"] ) : '' ) . '" size="40" style="height: 40px" />';
        echo '</p>';
        echo '<p>';
        echo '<label for="cf-message" style="color: #5E358A; font-weight: bold;">Message </label> <br />';
        echo '<textarea id="cf-message" rows="10" cols="35" name="cf-message" placeholder="Entrez votre message">' . ( isset( $_POST["cf-message"] ) ? esc_attr( $_POST["cf-message"] ) : '' ) . '</textarea>';
        echo '</p>';
        // Uncomment the following lines if you want to include a subject field
        // echo '<p>';
        // echo '<label for="cf-subject" style="color: #5E358A; font-weight: bold;">Subject <span style="color: red;">*</span></label> <br />';
        // echo '<input type="text" id="cf-subject" name="cf-subject" pattern="[a-zA-Z ]+" placeholder="Enter the subject" value="' . ( isset( $_POST["cf-subject"] ) ? esc_attr( $_POST["cf-subject"] ) : '' ) . '" size="40" />';
        // echo '</p>';
        echo '<p><input type="submit" name="cf-submitted" value="Envoyer" style="width: 100%" /></p>';
        echo '</form>';
    }
    

    function deliver_mail() {

        // if the submit button is clicked, send the email
        if ( isset( $_POST['cf-submitted'] ) ) {

            try {

                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer; //$mail = new PHPMailer(true); ancien

                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'diakiteisac77@gmail.com';                     //SMTP username
                $mail->Password   = 'flnsuzlxgophkhql';                               //SMTP password
                // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 587;  //465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                // sanitize form values
                $name    = sanitize_text_field( $_POST["cf-name"] );
                $email   = sanitize_email( $_POST["cf-email"] );
                // $subject = sanitize_text_field( $_POST["cf-subject"] );
                $message = esc_textarea( $_POST["cf-message"] );
        
                // get the blog administrator's email address
                $to = get_option( 'admin_email');

                //Recipients
                $mail->setFrom('diakiteisac77@gmail.com','Le MentOr');
                $mail->addAddress('isacdiakite3@gmail.com');     //Add a recipient
        
                $headers = "From: $name <$email>" . "\r\n";

                $mail->addReplyTo($email, $name);
                $mail->Subject = 'Contact Le MentOr';
                $mail->isHTML(false);
                $mail->Body = <<<EOT
                E-mail: $email
                Nom: $name
                Message: $message
                EOT;

                if (!$mail->send()) {
                    echo 'Désolé, quelque chose a mal tourné. Veuillez réessayer plus tard.';
                } else {
                    echo 'Message envoyé ! Merci de nous avoir contactés.';
                }
        
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }

    function cf_shortcode() {
        ob_start();
        deliver_mail();
        html_form_code();
    
        return ob_get_clean();
    }

    add_shortcode( 'ProCV_contact_form', 'cf_shortcode' );
?>