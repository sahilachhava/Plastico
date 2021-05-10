<?php
//Function for generate a random string (name of tmp image with text)
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

// It's for the font
putenv('GDFONTPATH=' . realpath('.'));

// Name of font to use (without .ttf). It's placed in the same directory of your .php
$font = 'GOTHIC';

$type = "img";
$file = "http://xxx.com/xx.jpg";

$snapchat = new Snapchat($_POST['pseudo'], $_POST['password']);
if (empty($snapchat->auth_token)) {$error = "Error";}
else {
    if ($type=='img') {
        $img = imagecreatefromjpeg($file);
        list($width, $height, $type, $attr) = getimagesize($file);

        $white = imagecolorallocate($img, 255, 255, 255);
        $black = imagecolorallocatealpha($img, 0, 0, 0, 40);

        //We create a rectangle with a opacity  (0.4) black. The rectangle is in the middle of the image and the height is 5% of the image source.
        imagefilledrectangle($img, 0, $height/2 , $width, ($height/2 + 0.05*$height) , $black);

        //We add a text with the font selected. The size is 3.5% of image.
        imagettftext($img, (0.035*$height), 0 , 20, ($height/2 + 0.04*$height), $white, $font, "Blablabla");

        $new_file = "tmp/". generateRandomString() . ".jpg";
        imagepng($img, $new_file); //we save the new image in /tmp with a random name

        $id = $snapchat->upload(
        Snapchat::MEDIA_IMAGE,
        file_get_contents("http://xxx.com/" . $new_file)
        );

    }

        $snapchat->send($id, array('friend'), 8); //we send the image

        unlink($new_file); //we delete the image with text
}
?>