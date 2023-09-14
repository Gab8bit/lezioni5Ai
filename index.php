<!DOCTYPE html>
<html>
<head>
    <title>Lezioni 5Ai</title>
</head>
<body>
    <h1>Elenco delle lezioni</h1>
    <ul id="fileList">
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

        // Elenca i file iniziali
        listFiles($directory);
        ?>
    </ul>

    <script>
        // Funzione per aggiornare l'elenco dei file
        function updateFileList() {
            const fileList = document.getElementById('fileList');
            fetch('/update-file-list.php') // Invia una richiesta al server per aggiornare l'elenco
                .then(response => response.text())
                .then(data => {
                    fileList.innerHTML = data; // Aggiorna l'elenco dei file
                });
        }

        // Aggiorna automaticamente ogni 5 secondi (puoi impostare un intervallo diverso)
        setInterval(updateFileList, 60000);
    </script>
</body>
</html>