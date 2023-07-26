<?php

$url = "https://admin.hooksandhighs.cyon.site/api/content/items/episodes";

// fetch data from url
$json = file_get_contents($url);
$data = json_decode($json, true);

header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" ?>';

?>

<rss
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:media="http://www.rssboard.org/media-rss" version="2.0">
	<channel>
		<title>Hooks and Highs</title>
		<link>https://hooksandhighs.com</link>
		<lastBuildDate>Thu, 26.07.2023 16:20:42 +0000</lastBuildDate>
		<language>en</language>
        <generator>hooksandhighs.com</generator>
		<itunes:author>Hooks and Highs</itunes:author>
		<itunes:explicit>yes</itunes:explicit>
		<itunes:owner>
			<itunes:name>Hooks and Highs</itunes:name>
			<itunes:email>high@hooksandhighs.com</itunes:email>
		</itunes:owner>
		<itunes:category text="Music">
			<itunes:category text="Music Commentary"/></itunes:category>
		<itunes:category text="Sports"/>
		<itunes:category text="Comedy"/>
		<copyright>We rely on the right of quotation mentioned in Art. 25 of the Federal Act on Copyright and Related Rights</copyright>
		<itunes:type>episodic</itunes:type>
		<itunes:image href="https://hooksandhighs.com/img/hooks-and-highs-logo-square.jpg"/>
		<description>
			<![CDATA[<p>In the contemporary ocean of available podcasts one thing is direly missing – the voice of insanity. Who really talks for the confused, drunk and poorly educated? – I guess it’s us then.</p>]]>
		</description>

        <?php foreach ($data as $episode): ?>
        <item>
			<title><?php echo htmlspecialchars($episode['title']); ?></title>
			<dc:creator>Yannick Owen</dc:creator>
			<pubDate><?php echo date(DATE_RSS, strtotime($episode['releasedate'])); ?></pubDate>
			<link>https://hooksandhighs.com</link>
			<guid isPermaLink="false">6089c5845f3b505341ea2083:6260429e55dd3035bba638cb:628b9826ad3dda556c9d62c7</guid>
			<description>
				<![CDATA[]]>
			</description>
			<itunes:author>Hooks and Highs</itunes:author>
			<itunes:explicit>yes</itunes:explicit>
			<itunes:duration></itunes:duration>
			<itunes:image href="https://hooksandhighs.com/img/hooks-and-highs-logo-square.jpg"/>
			<itunes:season>1</itunes:season>
			<itunes:episode>4</itunes:episode>
			<itunes:title><?php echo htmlspecialchars($episode['title']); ?></itunes:title>
			<itunes:episodeType>full</itunes:episodeType>
			<enclosure url="https://admin.hooksandhighs.cyon.site<?php echo $episode['audio']['path']; ?>" length="<?php echo $episode['audio']['size']; ?>" type="<?php echo $episode['audio']['mime']; ?>"/>
			<media:content url="https://admin.hooksandhighs.cyon.site<?php echo $episode['audio']['path']; ?>" length="<?php echo $episode['audio']['size']; ?>" type="<?php echo $episode['audio']['mime']; ?>" isDefault="true" medium="audio">
				<media:title type="plain"><?php echo htmlspecialchars($episode['title']); ?></media:title>
			</media:content>
		</item>
        <?php endforeach; ?>

    </channel>
</rss>

<?php

