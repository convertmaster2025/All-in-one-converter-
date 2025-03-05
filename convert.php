<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_FILES['file'];
    $conversion_type = $_POST['conversion_type'];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Error uploading file.");
    }

    $file_path = 'uploads/' . basename($file['name']);
    move_uploaded_file($file['tmp_name'], $file_path);

    if ($conversion_type === 'pdf_to_word') {
        $converted_file = pdfToWord($file_path);
    } elseif ($conversion_type === 'image_compression') {
        $converted_file = compressImage($file_path);
    } elseif ($conversion_type === 'currency_conversion') {
        $converted_file = convertCurrency();
    } else {
        die("Invalid conversion type.");
    }

    echo "<a href='$converted_file' download>Download Converted File</a>";
}

function pdfToWord($file_path) {
    return "https://api.example.com/pdf-to-word?file=$file_path";
}

function compressImage($file_path) {
    return "https://api.example.com/compress-image?file=$file_path";
}

function convertCurrency() {
    return "https://api.example.com/currency-convert";https://api.example.com/pdf-to-word?file=$file_pathhttps://api.example.com/compress-image?file=$file_pathhttps://api.example.com/currency-convert
}
?>
