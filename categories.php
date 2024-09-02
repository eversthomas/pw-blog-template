<?php namespace ProcessWire;

// Template file for “blog post” template used by the homepage
// ------------------------------------------------------
// The #content div in this file will replace the #content div in _main.php
// when the Markup Regions feature is enabled, as it is by default. 
// You can also append to (or prepend to) the #content div, and much more. 
// See the Markup Regions documentation:
// https://processwire.com/docs/front-end/output/markup-regions/



?>

<main id="content">
    <article>
        <?php
            // Hole alle Artikel, die dieser Kategorie zugeordnet sind
            $articles = $pages->find("template=43, categories=$page, sort=-created");

            if ($articles->count()) {
                echo "<h2>Artikel in der Kategorie: {$page->title}</h2>";
                echo "<ul>";
                
                foreach ($articles as $article) {
                    echo "<li><a href='{$article->url}'>{$article->title}</a></li>";
                }
                
                echo "</ul>";
            } else {
                // Falls keine Artikel in dieser Kategorie vorhanden sind
                echo "<p>Es gibt noch keine Artikel in dieser Kategorie.</p>";
            }
        ?>
    </article>
    
</main>