<?php 
// Check if the file was uploaded without errors
if(isset($_FILES["upload"]["name"]) && $_FILES["upload"]["error"] == 0){
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");

    // Get the file extension
    $file_extension = pathinfo($_FILES["upload"]["name"], PATHINFO_EXTENSION);

    // Check if the file type is allowed
    if(in_array($file_extension, $allowed_extensions)){
        // Specify the directory for storing files
        $upload_folder = "../upload/";

        // Generate a unique filename
        $file_name = uniqid() . '.' . $file_extension;

        // Move the uploaded file to the specified directory
        if(move_uploaded_file($_FILES["upload"]["tmp_name"], $upload_folder . $file_name)){
            // Get the base URL
            $base_url = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\') . '/';

            // Build the full URL to the uploaded file
            $url = $base_url . $upload_folder . $file_name;

            // Get the CKEditor function number
            $func_num = $_GET['CKEditorFuncNum'];

            // Return CKEditor callback with the URL of the uploaded image
            echo "<script>window.parent.CKEDITOR.tools.callFunction($func_num, '$url', '');</script>";
        }
    }
}



 ?>