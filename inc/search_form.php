<form action="<?php echo $pages->get('template=search')->url; ?>" method="get">
    <input type="text" name="q" placeholder="Suche..." required>
    <button type="submit">Suchen</button>
</form>