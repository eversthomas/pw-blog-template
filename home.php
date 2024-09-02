<?php namespace ProcessWire;

// Template file for “home” template used by the homepage
// ------------------------------------------------------
// The #content div in this file will replace the #content div in _main.php
// when the Markup Regions feature is enabled, as it is by default. 
// You can also append to (or prepend to) the #content div, and much more. 
// See the Markup Regions documentation:
// https://processwire.com/docs/front-end/output/markup-regions/

?>

<main id="content">
    <article>
        <h2><?php echo $page->title; ?></h2>
	    <?php echo $page->body; ?>
    </article>
    
    <div class="video-placeholder" style="background-color: #000; color: #fff; width: 560px; height: 315px; display: flex; align-items: center; justify-content: center;">
        <p>Klicken Sie hier, um das YouTube-Video zu laden.</p>
    </div>
    <iframe width="560" height="315" data-src="https://www.youtube.com/embed/49zSAEd7FUU" frameborder="0" allowfullscreen style="display: none;"></iframe>



</main>