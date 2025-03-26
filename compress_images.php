<?php
function compressImage($source, $destination, $quality) {
    $image_info = getimagesize($source);
    $mime = $image_info['mime'];

    switch ($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($source);
            imagejpeg($image, $destination, $quality);
            break;

        case 'image/png':
            $image = imagecreatefrompng($source);
            imagepng($image, $destination, round(9 * ($quality / 100))); // PNG compression scale
            break;

        case 'image/gif':
            $image = imagecreatefromgif($source);
            imagegif($image, $destination);
            break;

        default:
            return false; // Unsupported format
    }

    imagedestroy($image);
    return true;
}

function compressImagesInFolder($folder) {
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folder), RecursiveIteratorIterator::LEAVES_ONLY);

    foreach ($files as $file) {
        if ($file->isFile()) {
            $file_path = $file->getPathname();
            $image_info = getimagesize($file_path);

            if ($image_info !== false) {
                $quality = ($image_info['mime'] == 'image/png') ? 80 : 85; // Adjust quality
                compressImage($file_path, $file_path, $quality);
                echo "Compressed: $file_path<br>";
            }
        }
    }
}

// Set the main folder (uploads/)
$main_folder = "images/sliders";
compressImagesInFolder($main_folder);

echo "✅ All images in '$main_folder' and subfolders are compressed!";
?>
