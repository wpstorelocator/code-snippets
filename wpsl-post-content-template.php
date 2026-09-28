// The post content, only for stores that have one.
$listing_template .= "\t\t" . '<% if ( typeof description !== "undefined" && description ) { %>' . "\r\n";
$listing_template .= "\t\t" . '<div class="wpsl-description"><%= description %></div>' . "\r\n";
$listing_template .= "\t\t" . '<% } %>' . "\r\n";
