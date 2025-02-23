import './bootstrap';
// Der import.meta.glob Befehl ist notwendig bei 'npm run build', da:
// 1. Vite (das Build-Tool) dadurch alle Bilder im images-Verzeichnis während des Build-Prozesses erfasst
// 2. Ohne diese Zeile würden die Bilder nicht in das public/build Verzeichnis kopiert werden
// 3. Der Glob-Pattern '../images/**' scannt rekursiv alle Dateien im images-Ordner
// 4. Dies ist besonders wichtig wenn Bilder dynamisch in JavaScript/Vue Components geladen werden
import.meta.glob([
    '../images/**'
]);