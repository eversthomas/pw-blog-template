<?php
$repeaterItems = $page->image_repeater; // Greift auf das Repeater-Feld zu

foreach ($repeaterItems as $item) {
    $imageFileName = $item->image_name; // Nehme an, das Feld heißt 'image_filename'
    $useThumbnail = $item->thumbnail; // Checkbox-Feld, das bestimmt, ob ein Thumbnail ausgegeben werden soll

    if ($imageFileName) {
        // Hole die Mediathek-Seite
        $mediathekPage = $pages->get('/mediathek/');

        // Suche nach dem Bild mit dem entsprechenden Dateinamen
        $image = $mediathekPage->images->get("name=$imageFileName");

        if ($image) {
            $thumbnailPath = $image->size(150, 150)->url; // Erstelle ein Thumbnail (150x150 Pixel)
            $imagePath = $image->url;
            $altText = $image->description ? $image->description : $image->name;
            $description = $image->description;

            // Ausgabe des Thumbnails mit Link zum Originalbild
            if ($useThumbnail) {
                echo "<a href='{$imagePath}' target='_blank'><img src='{$thumbnailPath}' alt='{$altText}'></a>";
            } else {
                echo "<img src='{$imagePath}' alt='{$altText}'>";
            }

            if ($description) {
                echo "<p>{$description}</p>";
            }
        } else {
            echo "<p>Bild nicht gefunden: {$imageFileName}</p>";
        }
    }
}
?>
