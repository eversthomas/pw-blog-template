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
            // article.php
            
            // Zeige den Titel des Artikels
            echo "<h2>{$page->title}</h2>";
            
            // Zeige das Veröffentlichungsdatum
            echo "<p>Veröffentlicht am: " . date("d.m.Y", $page->created) . "</p>";
            
            // Zeige die Zusammenfassung des Artikels
            echo "<div>{$page->summary}</div><hr>";
            
            // Zeige den Inhalt des Artikels
            echo "<div>{$page->body}</div>";
            
            include 'inc/image_repeater.php';
            
        ?>
    </article>
    
    <div class="categories">
        <?php
            // Aufzählung der Kategorien
            if ($page->categories->count()) {
                echo "<p>Kategorien: ";
                foreach ($page->categories as $category) {
                    echo "<a href='{$category->url}'>{$category->title}</a> ";
                }
                echo "</p>";
            }
        ?>
    </div>
    
    <div class="interesse">
        <?php
            // Verwandte Artikel auf Basis gemeinsamer Kategorien finden
            $relatedArticles = $pages->find("template=article, categories={$page->categories}, id!={$page->id}, limit=5");
            
            if ($relatedArticles->count()) {
                echo "<h3>Das könnte Sie auch interessieren:</h3>";
                foreach ($relatedArticles as $related) {
                    echo "<a href='{$related->url}'>{$related->title}  </a>";
                }
            }
        ?>
    </div>
    
</main>	