// The opening hours, only for stores that have them.
$listing_template .= "\t\t" . '<% if ( typeof hours !== "undefined" && hours ) { %>' . "\r\n";
$listing_template .= "\t\t" . '<div><%= hours %></div>' . "\r\n";
$listing_template .= "\t\t" . '<% } %>' . "\r\n";
