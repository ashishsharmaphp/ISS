<?php
namespace Image;

interface ResizeStrategy
{
    public function calculateSize(array $imageA, array $imageB): array;
}

class ContainStrategy implements ResizeStrategy
{
public function calculateSize(array $imageA, array $imageB): array{
   $widthRatio = $imageA['width'] / $imageB['width'];
$heightRatio = $imageA['height'] / $imageB['height'];
 $ratio = min($widthRatio, $heightRatio);

$width = $imageB['width'] * $ratio;
$height = $imageB['height'] * $ratio;

 return ['width' => $width, 'height' => $height];
}
}


class CoverStrategy implements ResizeStrategy
{
 public function calculateSize(array $imageA, array $imageB): array
 {
 $widthRatio = $imageA['width'] / $imageB['width'];
$heightRatio = $imageA['height'] / $imageB['height'];

 $ratio = max($widthRatio, $heightRatio);

 $width = $imageB['width'] * $ratio;
 $height = $imageB['height'] * $ratio;

 return ['width' => $width, 'height' => $height];
 }
}

class ImageResizer
{
private $strategy;

 public function __construct(ResizeStrategy $strategy)
 {
$this->strategy = $strategy;
}

public function resize(array $imageA, array $imageB): array
{
return $this->strategy->calculateSize($imageA, $imageB);
}
}

// Example usage
$imageA = ['width' => 250, 'height' => 500];
$imageB = ['width' => 500, 'height' => 90];

$resizer = new ImageResizer(new ContainStrategy());
$output = $resizer->resize($imageA, $imageB);
print_r($output);

$resizer = new ImageResizer(new CoverStrategy());
$output = $resizer->resize($imageA, $imageB);
print_r($output); 
