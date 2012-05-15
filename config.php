<?php

//This is the title that will appear on your site
$siteTitle = "New Para CMS Install";

//This should be the name of the folder you'd like your site to default to
$defaultPage = "Welcome";

//If you want your email address to be visible on the site, uncomment this and put your email address in
//$contactAddress = "youremailaddress@domain.com";

//This is the time zone of your choosing, supported ones can be found here: http://php.net/manual/en/timezones.php
$timeZone="UTC";

//Don't edit the next line :3
date_default_timezone_set($timeZone);

//This is the location that para will look in for your folders and .txt files
$contentPath = "content/";

//This is what will immediately follow links in lists before any additional text
$linkSeparator = " ";

//If you want your twitter feed to be visible on the site, uncomment this and put your twitter username in
//$twitterAccount = "yourtwitteraccount";

//Don't edit the next line :3
$externalLinks = array();

//If you want to have links to external sites in your menu, add them here using the same format as the next line. You can comment out or delete this one if want.
$externalLinks["Source/Contribute"] = "https://github.com/Cheeseness/para-cms";

//This is the text that appears at the bottom of your site. Replace "yourname" with your name. Feel free to detele the "Powered by Para CMS" part if you don't want it.
$copyrightText = "&copy; " . date("Y") . " yourname! Powered by <a href = 'http://para.jbushproductions.com/'>Para CMS</a>.";

?>
