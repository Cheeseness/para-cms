<?php
/*
Copyright 2012 Para CMS contributors (see AUTHORS)

This file is part of Para CMS.

Para CMS is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Para CMS is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Para CMS.  If not, see <http://www.gnu.org/licenses/>.
*/

//This is a variable referenced in config.php. Don't play with it :3
$externalLinks = array();


//To make upgrading easier, let's move all of Para's default settings out to a base file which will only be used if custom settings are not found. Site maintainers will still need to copy new config options across though.
//Longer term, we may want to look at including this by default and having the custom file's variable assignments override the defaults
if (!file_exists("config.php"))
{
	include_once("config_default.php");
}
else
{
	include_once("config.php");
}

include_once("functions.php");

$localeStrings = genLocaleStrings($locale);

$currentPage = $defaultPage;
if (isset($_GET['page']))
{
	//TODO: Some sanitising please
	$currentPage = $_GET['page'];
	// de-traverse
	$currentPage = deTraverse($currentPage);
}

$pageTitle = getPageTitle($currentPage);

$errorState = 0;

?>
<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='<?php echo str_replace("_", "-", $locale); ?>'>
<head>
	<meta charset='utf-8' />
	<meta name='viewport' content='width=device-width' />

	<title><?php echo $pageTitle; ?> » <?php echo $siteTitle; ?></title>

	<link rel='shortcut icon' href='images/fav.png' type='image/x-icon' />
	<?php
	if (isset($customCSS))
	{
		foreach ($customCSS as $cssFile)
		{
			echo "\t<link rel='stylesheet' href='" . $cssFile . "' type='text/css' />\n";
		}
	}
	?>

	<?php
	if (isset($customJS))
	{
		foreach ($customJS as $jsFile)
		{
			echo "\t<script type='text/javascript' src='" . $jsFile . "'></script>\n";
		}
	}
	?>
</head>
<body>
<div id = 'wrapper'>
<?php
echo "<hgroup>\n";
echo "\t<h1><a href = 'index.php'>" . $siteTitle . "</a></h1>\n";
echo "</hgroup>\n";

echo getNavMenu($externalLinks, $pageTitle);

echo getContentsMenu($currentPage);
?>

<div id = 'content'>
<?php

if ($errorState > 0)
{
	echo getArticleError("flagrantError", getLocaleString("flagranterrortitle"), getLocaleString("flagranterrortext"), getLocaleString("flagranterrordetails"));
}
else
{
	//TODO: Pagination?
	$articleList = getArticleList($currentPage);
	foreach ($articleList as $article)
	{
		echo getArticleContent($currentPage, $article);
	}
}
?>
</div>
<?php
if (isset($twitterWidgetID))
{
?>
<div id = 'twitterWidget'>
<h1><?php echo $twitterHeading; ?></h1>
<a class="twitter-timeline" href="https://twitter.com/twitterapi" data-widget-id="<?php echo $twitterWidgetID; ?>" data-chrome="<?php echo $twitterChromeOpts; ?>" data-theme="<?php echo $twitterTheme; ?>" data-link-color="<?php echo $twitterLinkColour; ?>" data-tweet-limit="<?php echo $twitterTweetLimit; ?>" data-border-color="<?php echo $twitterBorderColour; ?>"></a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>
<?php
}
?>
<footer>
<?php
echo $copyrightText;
?>
</footer>
</div>
</body>
</html>
