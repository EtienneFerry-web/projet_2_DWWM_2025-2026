<?php
//On recupe l'image dans url
$url = $_GET['img'] ?? '';

header('Content-Type: image/jpeg');

list($width_orig, $height_orig) = getimagesize($url);
$width = 280;
$height = 400;

/*$ratio_orig = $width_orig / $height_orig;

if ($width / $height > $ratio_orig) {
    $width = $height * $ratio_orig;
} else {
    $height = $width / $ratio_orig;
}*/


$image_p = imagecreatetruecolor((int)$width, (int)$height);
$image = imagecreatefromstring(file_get_contents($url));

imagecopyresampled(
    $image_p, $image,
    0, 0, 0, 0,
    (int)$width, (int)$height,
    $width_orig, $height_orig
);




//Envoi de l'image
imagejpeg($image_p, null, 100);

