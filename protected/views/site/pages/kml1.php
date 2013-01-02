<?php

Yii::import('ext.kml.*');
$kml = new EGMapKMLFeed();
 
// add one Icon style to the generator
$iconStyle = new EGMapKMLIconStyle('testStyle', 'iconID', 'http://maps.google.com/mapfiles/ms/icons/purple-pushpin.png');
 
$kml->addTag($iconStyle);
 
// create one marker placemark
$placemark = new EGMapKMLPlacemark('Another Marker');
// tell which style we are going to use
$placemark->styleUrl = '#testStyle';
// the following will be displayed on its bubble info window
$placemark->description = 'This marker has <b>HTML</b>';
// add a tag child EGMapKMLPoint which will tell the
// latitude and longitude of the marker
// *Note that for KML the lat and lon are the other way around
// should be lon - lat
$placemark->addChild(new EGMapKMLPoint('39.718762871171776', '2.903637075424208'));
 
$kml->addTag($placemark);
 
// generate feed
$kml->generateFeed();
?>
