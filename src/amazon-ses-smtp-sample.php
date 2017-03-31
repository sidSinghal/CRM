<!---->
<!--/**-->
<!-- * Created by IntelliJ IDEA.-->
<!-- * User: sneha-->
<!-- * Date: 3/30/2017-->
<!-- * Time: 6:00 PM-->
<!-- */-->
<?php

// Replace sender@example.com with your "From" address.
// This address must be verified with Amazon SES.
define('SENDER', 'sneha.malshetti@yahoo.com');

// Replace recipient@example.com with a "To" address. If your account
// is still in the sandbox, this address must be verified.
define('RECIPIENT', 'sneha.malshetti@yahoo.com');

// Replace smtp_username with your Amazon SES SMTP user name.
define('USERNAME','AKIAI7OSIBVVDR5DJ6NQ');

// Replace smtp_password with your Amazon SES SMTP password.
define('PASSWORD','ArmyyjePGqZdfcX5lJk6XmYI1RQ3MHrVq9qE6TfX/u+k');

// If you're using Amazon SES in a region other than US West (Oregon),
// replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP
// endpoint in the appropriate region.
define('HOST', 'email-smtp.us-east-1.amazonaws.com');

// The port you will connect to on the Amazon SES SMTP endpoint.
define('PORT', '587');

// Other message information
define('SUBJECT','Amazon SES test (SMTP interface accessed using PHP)');
define('BODY','This email was sent through the Amazon SES SMTP interface by using PHP.');

require_once '/Mail.php';
//require_once 'pear/mail';
//require ("class.phpmailer.php");





$headers = array (
    'From' => SENDER,
    'To' => RECIPIENT,
    'Subject' => SUBJECT);

$smtpParams = array (
    'host' => HOST,
    'port' => PORT,
    'auth' => true,
    'username' => USERNAME,
    'password' => PASSWORD
);

// Create an SMTP client.
$mail = Mail::factory('smtp', $smtpParams);

// Send the email.
$result = $mail->send(RECIPIENT, $headers, BODY);

if (PEAR::isError($result)) {
    echo("Email not sent. " .$result->getMessage() ."\n");
} else {
    echo("Email sent!"."\n");
}

?>
<?php
//
//// Replace path_to_sdk_inclusion with the path to the SDK as described in
//// http://docs.aws.amazon.com/aws-sdk-php/v3/guide/getting-started/basic-usage.html
//define('REQUIRED_FILE','C:\Users\sneha\Documents\MS Studies\sem2\Network Structures and Cloud computing\dynamo\aws-sdk-php-resources-master');
//
//// Replace sender@example.com with your "From" address.
//// This address must be verified with Amazon SES.
//define('SENDER', 'sneha.malshetti@yahoo.com');
//
//// Replace recipient@example.com with a "To" address. If your account
//// is still in the sandbox, this address must be verified.
//define('RECIPIENT', 'sneha.malshetti@yahoo.com');
//
//// Replace us-west-2 with the AWS region you're using for Amazon SES.
//define('REGION','us-west-2');
//
//define('SUBJECT','Amazon SES test (AWS SDK for PHP)');
//define('BODY','This email was sent with Amazon SES using the AWS SDK for PHP.');
//
//require REQUIRED_FILE;
//
//use Aws\Ses\SesClient;
//
//$client = SesClient::factory(array(
//    'version'=> 'latest',
//    'region' => REGION
//));
//
//$request = array();
//$request['Source'] = SENDER;
//$request['Destination']['ToAddresses'] = array(RECIPIENT);
//$request['Message']['Subject']['Data'] = SUBJECT;
//$request['Message']['Body']['Text']['Data'] = BODY;
//
//try {
//    $result = $client->sendEmail($request);
//    $messageId = $result->get('MessageId');
//    echo("Email sent! Message ID: $messageId"."\n");
//
//} catch (Exception $e) {
//    echo("The email was not sent. Error message: ");
//    echo($e->getMessage()."\n");
//}
//
//?>
<?php
//use Aws\Ses\SesClient;
//
//require 'vendor/autoload.php';
//
//$client = SesClient::factory(array(
//    'key' => 'AWS_KEY',
//    'secret' => 'AWS_SECRET_KEY',
//    'region' => 'us-east-1'
//));
//
//$emailSentId = $client->sendEmail(array(
//    // Source is required
//    'Source' => 'sneha.malshetti@yahoo.com',
//    // Destination is required
//    'Destination' => array(
//        'ToAddresses' => array('sneha.malshetti@yahoo.com')
//    ),
//    // Message is required
//    'Message' => array(
//        // Subject is required
//        'Subject' => array(
//            // Data is required
//            'Data' => 'SES Testing',
//            'Charset' => 'UTF-8',
//        ),
//        // Body is required
//        'Body' => array(
//            'Text' => array(
//                // Data is required
//                'Data' => 'My plain text email',
//                'Charset' => 'UTF-8',
//            ),
//            'Html' => array(
//                // Data is required
//                'Data' => '<b>My HTML Email</b>',
//                'Charset' => 'UTF-8',
//            ),
//        ),
//    ),
//    'ReplyToAddresses' => array( 'replyTo@email.com' ),
//    'ReturnPath' => 'bounce@email.com'
//));
?>
