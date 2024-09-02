<?php namespace ProcessWire;

header("Content-Type: application/rss+xml; charset=utf-8");

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<rss version=\"2.0\">";
echo "<channel>";
echo "<title>{$pages->get('/')->title}</title>";
echo "<link>{$pages->get('/')->httpUrl}</link>";
echo "<description>Die neuesten Artikel von {$pages->get('/')->title}</description>";

$articles = $pages->find("template=article, limit=10, sort=-created");

foreach($articles as $article) {
    echo "<item>";
    echo "<title>{$article->title}</title>";
    echo "<link>{$article->httpUrl}</link>";
    echo "<description><![CDATA[{$article->summary}]]></description>";
    echo "<pubDate>" . date(DATE_RSS, $article->created) . "</pubDate>";
    echo "<guid>{$article->httpUrl}</guid>";
    echo "</item>";
}

echo "</channel>";
echo "</rss>";

exit(); // Beende die Ausführung, um doppelte Ausgaben zu verhindern
