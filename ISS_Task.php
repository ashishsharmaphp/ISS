<?php

namespace App\Controllers;

class ISSController
{
    function resizeImageContain($imageA, $imageB)
    {
        $targetWidth = $imageA['Width'];
        $targetHeight = $imageA['Height'];

        $sourceWidth = $imageB['Width'];
        $sourceHeight = $imageB['Height'];

        $sourceRatio = $sourceWidth / $sourceHeight;
        $targetRatio = $targetWidth / $targetHeight;

        if ($sourceRatio > $targetRatio) {
            $resizeWidth = $targetWidth;
            $resizeHeight = $targetWidth / $sourceRatio;
        } else {
            $resizeWidth = $targetHeight * $sourceRatio;
            $resizeHeight = $targetHeight;
        }

        return ['Width' => $resizeWidth, 'Height' => $resizeHeight];
    }


    function resizeImageCover($imageA, $imageB)
    {
        $targetWidth = $imageA['Width'];
        $targetHeight = $imageA['Height'];

        $sourceWidth = $imageB['Width'];
        $sourceHeight = $imageB['Height'];

        if ($sourceWidth > $targetWidth) {
            $resizeWidth = $sourceWidth;
        } else {
            $resizeWidth = $targetWidth;
        }

        if ($sourceHeight > $targetHeight) {
            $resizeHeight = $sourceHeight;
        } else {
            $resizeHeight = $targetHeight;
        }

        return ['Width' => $resizeWidth, 'Height' => $resizeHeight];
    }
}

$controll = new ISSController();

$imageA = ['Width' => 180, 'Height' => 250];
$imageB = ['Width' => 360, 'Height' => 200];

$resizedImageContain = $controll->resizeImageContain($imageA, $imageB);
$resizedImageCover = $controll->resizeImageCover($imageA, $imageB);

echo "Resized imageB Contain width: " . $resizedImageContain['Width'] . ", height: " . $resizedImageContain['Height'] . PHP_EOL;


echo "Resized imageB Cover width: " . $resizedImageCover['Width'] . ", height: " . $resizedImageCover['Height'] . PHP_EOL;