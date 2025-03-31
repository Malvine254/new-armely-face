<?php

function compressAndConvertToWebp($sourcePath, $destinationPath, $quality = 80)
{
    // Get image info
    $imageInfo = getimagesize($sourcePath);
    $mime = $imageInfo['mime'];

    // Create image resource from source
    switch ($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($sourcePath);
            break;
        case 'image/png':
            $image = imagecreatefrompng($sourcePath);
            // Convert PNG transparency to white background
            $background = imagecreatetruecolor(imagesx($image), imagesy($image));
            $white = imagecolorallocate($background, 255, 255, 255);
            imagefill($background, 0, 0, $white);
            imagecopy($background, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
            imagedestroy($image);
            $image = $background;
            break;
        default:
            echo "Unsupported image format: $mime";
            return false;
    }

    // Save as .webp with given quality (0-100)
    $result = imagewebp($image, $destinationPath, $quality);

    // Free up memory
    imagedestroy($image);

    if ($result) {
        echo "Image successfully converted to WebP and saved to $destinationPath";
    } else {
        echo "Failed to convert image.";
    }

    return $result;
}

// Example usage
$source = "C:/xampp\htdocs/new-armely-face/images/social-impact/gallery_0.jpg";  // Your input image
$destination = "C:/xampp\htdocs/new-armely-face/images/social-impact/gallery_0.webp";  // Your output image
$quality = 70; // You can adjust quality (70-90 is usually a good range for web)

compressAndConvertToWebp($source, $destination, $quality);

?>
