<?php namespace ProcessWire;

// Template file for “search” template used by the homepage
// ------------------------------------------------------
// The #content div in this file will replace the #content div in _main.php
// when the Markup Regions feature is enabled, as it is by default. 
// You can also append to (or prepend to) the #content div, and much more. 
// See the Markup Regions documentation:
// https://processwire.com/docs/front-end/output/markup-regions/

$q = $sanitizer->text($input->get('q')); // Sucht den Parameter 'q' und bereinigt ihn
$matches = $pages->find("title|body|summary|categories%=$q, limit=50"); // Suche nach dem Begriff in verschiedenen Feldern

?>

<main id="content">
    <article>
        <h2>Suchergebnisse für: "<?php echo $sanitizer->entities($q); ?>"</h2>

        <?php if($matches->count()): ?>
            <ul>
                <?php foreach($matches as $match): ?>
                    <li>
                        <a href="<?php echo $match->url; ?>">
                            <?php echo $match->title; ?>
                        </a>
                        <p><?php echo $match->summary ?: substr(strip_tags($match->body), 0, 150) . '...'; ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Keine Ergebnisse gefunden.</p>
        <?php endif; ?>
    </article>
</main>