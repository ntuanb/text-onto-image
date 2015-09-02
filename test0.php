<?php

// v_0.01
// By Nguyen Tuan Bui

$imageFile = '';
$imageUpdatedFile = '';

function doGift($to, $from, $treatment, $message) {

	// font color for the image
	$fontFile = 'font/arial.ttf';
	$fontSize = 17; // pixels
	$fontAngle = 0;

	$toText = $to;
	// get the sizing for 'To..'
	$toSize = imagettfbbox($fontSize, 0, $fontFile, $toText);
	$toXWidth = $toSize[4]; // getting width of the text based
	$toYHeight = $toSize[1] - $toSize[7]; // getting height of the text
	$toXPosition = 500 - ($toXWidth / 2); // 500 is the center position
	$toYPosition = 100;

	$fromText = $from;
	// get the sizing for 'From..'
	$fromSize = imagettfbbox($fontSize, 0, $fontFile, $fromText);
	$fromXWidth = $fromSize[4];
	$fromYHeight = $fromSize[1] - $fromSize[7];
	$fromXPosition = 500 - ($fromXWidth / 2);
	$fromYPosition = 150;

	$treatmentText = $treatment;
	// get the sizing for 'Treatment..'
	$treatmentSize = imagettfbbox($fontSize, 0, $fontFile, $treatmentText);
	$treatmentXWidth = $treatmentSize[4];
	$treatmentYHeight = $treatmentSize[1] - $treatmentSize[7];
	$treatmentXPosition = 500 - ($treatmentXWidth / 2);
	$treatmentYPosition = 200;

	$messageText = $message;
	// get the sizing for 'Message..'
	$messageSize = imagettfbbox($fontSize, 0, $fontFile, $messageText);
	$messageXWidth = $messageSize[4];
	$messageYHeight = $messageSize[1] - $messageSize[7];
	$messageXPosition = 500 - ($messageXWidth / 2);
	$messageYPosition = 250;

	$expiryText = 'Valid Till: ' . date("j") . ' ' . date("F") . ' ' . (intval(date("Y")) + 1);
	// get the sizing for 'Date..'
	$expirySize = imagettfbbox($fontSize - 1, 0, $fontFile, $expiryText);
	$expiryXWidth = $expirySize[2];
	$expiryYHeight = $expirySize[1];
	$expiryXPosition = 500 - $expiryXWidth;
	$expiryYPosition = 300 - $expiryYHeight;

	// get the existing image
	$image = imagecreatefromjpeg($imageFile);

	// set the font color for the image
	$fontColor = imagecolorallocate($image, 35, 35, 35);

	// insert
	imagettftext($image, $fontSize, $fontAngle, $toXPosition, $toYPosition, $fontColor, $fontFile, $toText); // to
	imagettftext($image, $fontSize, $fontAngle, $fromXPosition, $fromYPosition, $fontColor, $fontFile, $fromText); // to
	imagettftext($image, $fontSize, $fontAngle, $treatmentXPosition, $treatmentYPosition, $fontColor, $fontFile, $treatmentText); // to
	imagettftext($image, $fontSize, $fontAngle, $messageXPosition, $messageYPosition, $fontColor, $fontFile, $messageText); // to
	imagettftext($image, $fontSize - 1, $fontAngle, $expiryXPosition, $expiryYPosition, $fontColor, $fontFile, $expiryText); // to

	// render
	imagejpeg($image, $imageUpdatedFile);

}

doGiftcard('Jane Sarah', 'John Smith', '40 minutes of super goodness', 'Happy Birthday!');
