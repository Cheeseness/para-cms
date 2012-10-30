para-cms v 0.2
========

A PHP based light weight CMS built around parsing (mostly) human readable text files and released under the GPL (see the COPYING file).

Follow the brief instructions below, or the more detailed ones in content/Welcome/welcome.txt to get started.
There's more information at http://para.jbushproductions.com/



Notable features of 0.2
=========

Below is a list of key features of the 0.2 release. For a full list of changes, see the CHANGES file.

* Fixed XSS vulnerability
* Added localisation support for all internal strings
* Added English and Finnish localisations
* Improved XHTML compliance 



Brief Installation Instructions
=========

1. Extract para-cms
2. Copy config_default.php to config.php
3. Edit config.php to suit
4. Create folder structure and .txt files in the content path as desired



Brief Upgrade Instructions (from v 0.1  to v 0.2)
=========

1. Rename styles/default.css if it has been modified at all (this will be used in step 4)
2. Extract para-cms over the top of the previous para-cms install, excluding the content folder
3. Copy new configuration options (see below) from config_default.php to config.php, or alternatively, copy config_default.php to config.php and edit as needed
4. Add the renamed CSS file to $customCSS[] in config.php

New config.php settings:
a.  $timeZone
b.  $locale
c.  $showSource
d.  $showPostLink
e.  $showTimestamp
f.  $trimPageTitle
g.  $showParentInMenu
h.  $twitterBackgroundColour
i.  $twitterTextColour
j.  $twitterLinkColour
k.  $customCSS[]
l.  $customJS[]

    
The following two lines are required in config.php and must be present after $timeZone and $locale have been set, but before $copyrightText
    a.  if( isset($timeZone) ) date_default_timezone_set($timeZone);
    b.  setlocale(LC_ALL, $locale);

