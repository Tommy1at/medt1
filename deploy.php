<?php
// Setze den Pfad zu deinem Git-Repository auf dem Server
$repo_dir = '/home/freizeit/bulme.cpc.co.at'; // <--- ÄNDERN!

// Gehe ins Verzeichnis und führe Git Pull aus
exec("cd {$repo_dir} && git pull origin main 2>&1", $output);

// Zeige das Ergebnis
echo "<pre>" . implode("\n", $output) . "</pre>";
?>
