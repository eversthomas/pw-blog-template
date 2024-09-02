<?php 
// Überprüfen, ob das aktuelle Template 'rss' ist
if($page->template != 'rss') {
    // Wenn es NICHT das RSS-Template ist, lade das Standard-Layout
    include 'inc/head.php'; 
    include '_header.php'; 
?>

<main id="content">
    <!-- Inhalt wird hier normalerweise ausgegeben -->
</main>

<aside>
    <h3>Kategorien</h3>
    <ul>
        <?php
        // Hole die Seite, die alle Kategorien enthält
        $categoriesPage = $pages->get('/Kategorien/'); // Passe den Pfad an, falls nötig

        // Debugging: Überprüfe, ob die categoriesPage korrekt abgerufen wird
        if($categoriesPage->id) {
            // Hole alle Kinderseiten (Kategorien) dieser Seite
            $categories = $categoriesPage->children();

            // Debugging: Überprüfe, ob Kategorien existieren
            if($categories->count()) {
                foreach ($categories as $category) {
                    // Hole die Anzahl der Artikel, die dieser Kategorie zugeordnet sind
                    $articleCount = $pages->count("template=43, categories=$category");

                    echo "<li><a href='{$category->url}'>{$category->title}</a> ({$articleCount})</li>";
                }
            } else {
                echo "<li>Keine Kategorien vorhanden.</li>";
            }
        } else {
            echo "<li>Kategorien-Seite nicht gefunden.</li>";
        }
        ?>
    </ul>
</aside>

<footer>
    <!-- Footer-Inhalte -->
</footer>

<?php 
    include 'inc/foot.php';
    include 'inc/osano_cookie.php';
} else {
    // Wenn es das RSS-Template ist, lade direkt die rss.php und beende die Ausführung
    include($config->paths->templates . 'rss.php');
    exit(); // Beendet die Ausführung der _main.php, damit kein HTML ausgegeben wird
}
?>
