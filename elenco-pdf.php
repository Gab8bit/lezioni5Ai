<?php
$directory = 'pdf'; // Nome della directory dei file PDF
$pdfFiles = array();

if (is_dir($directory)) {
    if ($handle = opendir($directory)) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != ".." && pathinfo($file, PATHINFO_EXTENSION) == 'pdf') {
                $pdfFiles[] = array('name' => $file);
            }
        }
        closedir($handle);
    }
}

header('Content-Type: application/json');
echo json_encode($pdfFiles);
?>