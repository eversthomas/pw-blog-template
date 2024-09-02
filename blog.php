<?php namespace ProcessWire;

// Template file for “blog list” template used by the homepage
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
        // ID der Blog-Seite
        $blogPageID = 1017;
        // Aktuelle Seite und Artikel pro Seite
        $pageNumber = max(1, intval($input->get('page')));
        $perPage = 4;
        // Artikel und Seiteninformationen abrufen
        $articles = $pages->get($blogPageID)->children("limit=$perPage, start=" . ($pageNumber - 1) * $perPage . ", sort=-created");
        $totalPages = ceil($articles->getTotal() / $perPage);

        // Artikel ausgeben
        foreach ($articles as $article) {
            echo "<h2><a href='{$article->url}'>{$article->title}</a></h2>";
            echo "<p>{$article->summary}</p>";
            echo "<hr>";
        }

        // Paginierung ausgeben, falls erforderlich
        if ($totalPages > 1) {
            echo "<div class='pagination'>";

            echo $pageNumber > 1 ? "<a href='?page=" . ($pageNumber - 1) . "'> &laquo; Vorherige </a>&nbsp;" : "";

            for ($i = 1; $i <= $totalPages; $i++) {
                $activeClass = ($i == $pageNumber) ? "active" : "";
                echo "<a href='?page=$i' class='$activeClass'> $i </a>&nbsp;";
            }

            echo $pageNumber < $totalPages ? "<a href='?page=" . ($pageNumber + 1) . "'> Nächste </a>&nbsp;" : "";

            echo "</div>";
        }
    ?>
</article>
    
    
</main>	