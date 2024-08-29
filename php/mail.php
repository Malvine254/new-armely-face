<?php 
// function sendEmail($sender, $name, $phone, $country, $subject) {
//     $to = $sender;
//     $subject = $subject;

//     // Create the HTML email content
//     $message = "
//     <html>
//     <head>
//         <style>
//             body {
//                 font-family: Arial, sans-serif;
//                 color: #333;
//                 line-height: 1.6;
//             }
//             .container {
//                 width: 100%;
//                 max-width: 600px;
//                 margin: 0 auto;
//                 padding: 20px;
//                 border: 1px solid #ddd;
//                 background-color: #f9f9f9;
//             }
//             .header {
//                 background-color: #007bff;
//                 color: white;
//                 padding: 10px;
//                 text-align: center;
//             }
//             .content {
//                 padding: 20px;
//             }
//             .content h2 {
//                 color: #007bff;
//             }
//             .content p {
//                 margin-bottom: 10px;
//             }
//             .footer {
//                 text-align: center;
//                 padding: 10px;
//                 font-size: 12px;
//                 color: #777;
//             }
//         </style>
//     </head>
//     <body>
//         <div class='container'>
//             <div class='header'>
//                 <h1>New Inquiry from $name</h1>
//             </div>
//             <div class='content'>
//                 <h2>Hello, Admin</h2>
//                 <p>You have received a new inquiry with the following details:</p>
//                 <p><strong>Name:</strong> $name</p>
//                 <p><strong>Phone:</strong> $phone</p>
//                 <p><strong>Email:</strong> $sender</p>
//                 <p><strong>Country:</strong> $country</p>
               
              
//             </div>
//             <div class='footer'>
//                 <p>&copy; " . date("Y") . " Armely. All rights reserved.</p>
//             </div>
//         </div>
//     </body>
//     </html>
//     ";

//     // Headers
//     $headers = "From: ".$sender."\r\n";
//     $headers .= "Reply-To: ".$sender."\r\n";
//     $headers .= "MIME-Version: 1.0\r\n";
//     $headers .= "Content-type: text/html; charset=UTF-8\r\n";
//     $headers .= "X-Mailer: PHP/" . phpversion();

//     // Send the email
//     if (mail($to, $subject, $message, $headers)) {
//         echo 1;
//     } else {
//         echo 'Failed to send email.';
//     }
// }
function sendDownloadLink($sender, $subject,$name) {
    $to = $sender;
    $subject = $subject;

    // Create the HTML email content
    $message = "
    <html>
    <head>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>
        <style>
            body {
                font-family: Arial, sans-serif;
                color: #333;
                line-height: 1.6;
            }
            .container {
                width: auto;
                min-width: 600px;
                margin: 0 auto;
                padding: 20px;
                border: 1px solid #ddd;
                background-color: #f9f9f9;
            }
            .header {
                background-color: #007bff;
                color: white;
                padding: 10px;
                text-align: center;
            }
            .content {
                padding: 20px;
            }
            .content h2 {
                color: #007bff;
            }
            .content p {
                margin-bottom: 10px;
            }
            .footer {
                text-align: center;
                padding: 10px;
                font-size: 12px;
                color: #777;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>Download link</h1>
            </div>
            <div class='content'>
                <h2>Hello, ".htmlspecialchars($name)."</h2>
                <p>Click the download link below:</p>
               <p>File 1: <a class='btn btn-info' href='https://armely.com/downloads/ActivityTemplate_v2.pbit' download>Click to download ActivityTemplate_v2 file</a></p>
            <p>File 2: <a class='btn btn-info' href='https://armely.com/downloads/PowerBI_Activity_v2.ps1' download>Click to download PowerBI_Activity_v2 file</a></p>  
              
            </div>
            <div class='footer'>
                <p>&copy; " . date("Y") . " Armely. All rights reserved.</p>
            </div>
        </div>
    </body>
    </html>
    ";

    // Headers
    $headers = "From: info@armely.com\r\n";
    $headers .= "Reply-To: info@armely.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($to, $subject,$message, $headers)) {
        echo 1;
    } else {
        echo 'Failed to send email.';
    }
}
 ?>