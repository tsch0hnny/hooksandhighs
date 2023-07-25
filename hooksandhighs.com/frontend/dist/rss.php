<?php

$url = "https://admin.hooksandhighs.cyon.site/api/content/items/episodes";

// fetch data from url
$json = file_get_contents($url);
$data = json_decode($json, true);

header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" ?>';

?>

<rss version="2.0">
    <channel>
        <title>Hooks and Highs</title>
        <link>https://www.hooksandhighs.com/episodes/</link>
        <description>Your description here</description>
        <language>en-us</language>

        <?php foreach ($data as $episode): ?>
        <item>
            <title><?php echo htmlspecialchars($episode['title']); ?></title>
            <link>https://www.hooksandhighs.com/episodes/<?php echo htmlspecialchars($episode['_id']); ?></link>
            <guid>https://www.hooksandhighs.com/episodes/<?php echo htmlspecialchars($episode['_id']); ?></guid>
            <pubDate><?php echo date(DATE_RSS, strtotime($episode['releasedate'])); ?></pubDate>
            <description><?php echo htmlspecialchars($episode['description']); ?></description>
            <enclosure url="https://admin.hooksandhighs.cyon.site<?php echo $episode['audio']['path']; ?>" length="<?php echo $episode['audio']['size']; ?>" type="<?php echo $episode['audio']['mime']; ?>" />
        </item>
        <?php endforeach; ?>

    </channel>
</rss>

<?php
