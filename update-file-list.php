<?php
// Percorso alla directory dei file
$directory = '/pdf/';

// Funzione per elencare i file
function listFiles($directory) {
    $files = scandir($directory);
    foreach ($files as $file) {
        // Ignora le directory e i file nascosti
        if ($file != "." && $file != ".." && !is_dir($directory . '/' . $file)) {
            echo "<li><a href='$directory/$file' download>$file</a></li>";
        }
    }
}

// Elenca i file attuali
listFiles($directory);
?>