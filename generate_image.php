<?php
// Check if the license was submitted
if (isset($_GET['license'])) {
    // Get the entered license
    $license = strtoupper($_GET['license']);

    // Load the patent template (make sure the file is .jpg)
    $template = imagecreatefromjpeg('patente_template.jpg'); // Use the relative path

    if (!$template) {
        die('Error opening template file. Make sure the file exists and is in the correct format.');
    }

    // Define the text color (black)
    $text_color = imagecolorallocate($template, 0, 0, 0);

    // Define the font (change this path to a valid TTF font)
    $font = 'FE-FONT.TTF'; // Use the relative path

    // Text positions and size (adjust according to your image)
    $font_size = 115; // Font size
    $x = 120; 
    $y = 205; 

    // Add the text to the image (the amateur radio license)
    imagettftext($template, $font_size, 0, $x, $y, $text_color, $font, $license);

    // Set the header to display the image in the browser
    header('Content-Type: image/jpeg');
    imagejpeg($template);

    // Free memory
    imagedestroy($template);
} else {
    echo "No license was entered.";
}
