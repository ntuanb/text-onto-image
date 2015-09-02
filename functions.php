<?php

ob_start();
session_start();

function authCheck() {

    if (!isset($_SESSION['auth'])) {

        header('Location: ' . 'index.php');
        die();

    }

}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function getFiles() {

    $dir = realpath(dirname(__FILE__)) . '/gifts';
    $files = scandir($dir, 1);

    if (sizeof($files) >= 2) {
        $files = array_slice($files, 0, 10);
    }
    else {
        $files = array();
    }

    return $files;

}

function doGiftcard(
    $to, $from, $treatment, $message, $message2 = null, $expiry, $code
) {

    // font color for the image
    $fontFile = 'fonts/MTCORSVA.ttf';
    $fontSize = 17; // pixels
    $fontAngle = 0;

    if (isset($_POST['fontFile']) || isset($_POST['fontSize'])) {
        $fontFile = 'fonts/' . $_POST['fontFile'];
        $fontSize = $_POST['fontSize'];
    }

    $toText = $to;
    // get the sizing for 'To..'
    $toSize = imagettfbbox($fontSize, 0, $fontFile, $toText);
    $toXWidth = $toSize[4]; // getting width of the text based on 2 points
    $toYHeight = $toSize[1] - $toSize[7]; // getting height of the text based on 2 points
    $toXPosition = 637.5 - ($toXWidth / 2); // 575 is the center position for 'To...'
    $toYPosition = 715; // 715 is the starting position for 'To...'

    $fromText = $from;
    // get the sizing for 'From..'
    $fromSize = imagettfbbox($fontSize, 0, $fontFile, $fromText);
    $fromXWidth = $fromSize[4];
    $fromYHeight = $fromSize[1] - $fromSize[7];
    $fromXPosition = 637.5 - ($fromXWidth / 2);
    $fromYPosition = 757;

    $treatmentText = $treatment;
    // get the sizing for 'Treatment..'
    $treatmentSize = imagettfbbox($fontSize, 0, $fontFile, $treatmentText);
    $treatmentXWidth = $treatmentSize[4];
    $treatmentYHeight = $treatmentSize[1] - $treatmentSize[7];
    $treatmentXPosition = 637.5 - ($treatmentXWidth / 2);
    $treatmentYPosition = 797;

    $messageText = $message;
    // get the sizing for 'Message..'
    $messageSize = imagettfbbox($fontSize, 0, $fontFile, $messageText);
    $messageXWidth = $messageSize[4];
    $messageYHeight = $messageSize[1] - $messageSize[7];
    $messageXPosition = 637.5 - ($messageXWidth / 2);
    $messageYPosition = 837;

    $expiry = '+' . $expiry . 'months';
    $expiryText = 'Valid Till: ' . date('d F Y', strtotime($expiry));
    // get the sizing for 'Date..'
    $expirySize = imagettfbbox($fontSize - 1, 0, $fontFile, $expiryText);
    $expiryXWidth = $expirySize[2];
    $expiryYHeight = $expirySize[1];
    $expiryXPosition = 940 - $expiryXWidth;
    $expiryYPosition = 681 - $expiryYHeight;

    $codeText = 'Code: ' . $code;
    // get the sizing for 'Code..'
    $codeSize = imagettfbbox($fontSize - 1, 0, $fontFile, $codeText);
    $codeXWidth = $codeSize[2];
    $codeYHeight = $codeSize[1];
    $codeXPosition = 940 - $codeXWidth - 2;
    $codeYPosition = 699 - $codeYHeight;

    // get the existing image
    // The file to load into the creation and add text to.
    $image = imagecreatefromjpeg('IMAGE_FILE_NAME');

    // set the font color for the image
    $fontColor = imagecolorallocate($image, 50, 50, 50);

    // insert
    imagettftext($image, $fontSize, $fontAngle, $toXPosition, $toYPosition, $fontColor, $fontFile, $toText); // to
    imagettftext($image, $fontSize, $fontAngle, $fromXPosition, $fromYPosition, $fontColor, $fontFile, $fromText); // to
    imagettftext($image, $fontSize, $fontAngle, $treatmentXPosition, $treatmentYPosition, $fontColor, $fontFile, $treatmentText); // to
    imagettftext($image, $fontSize, $fontAngle, $messageXPosition, $messageYPosition, $fontColor, $fontFile, $messageText); // to
    imagettftext($image, $fontSize - 1, $fontAngle, $expiryXPosition, $expiryYPosition, $fontColor, $fontFile, $expiryText); // to
    imagettftext($image, $fontSize - 1, $fontAngle, $codeXPosition, $codeYPosition, $fontColor, $fontFile, $codeText); // to

    // If line 2 of the message exists
    if ($message2 && strlen($message2) > 0) {

        $messageText = $message2;
        // get the sizing for 'Message..'
        $messageSize = imagettfbbox($fontSize, 0, $fontFile, $messageText);
        $messageXWidth = $messageSize[4];
        $messageYHeight = $messageSize[1] - $messageSize[7];
        $messageXPosition = 637.5 - ($messageXWidth / 2);
        $messageYPosition = 880;
        imagettftext($image, $fontSize, $fontAngle, $messageXPosition, $messageYPosition, $fontColor, $fontFile, $messageText); // message 2

    }

    // Render the image to a file
    $filename = date('Ymd') . '_' . generateRandomString(20) . '_' . $to . '_' . $from . '.jpg';
    imagejpeg($image, 'gifts/' . $filename);

    // Display the image
    echo '<img src="gifts/' . $filename . '">';

}
