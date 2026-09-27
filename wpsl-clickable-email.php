$listing_template .= '<% if ( typeof extra_email !== "undefined" && extra_email ) { %>' . "\r\n";
$listing_template .= '<p><a href="mailto:<%= extra_email %>"><%= extra_email %></a></p>' . "\r\n";
$listing_template .= '<% } %>' . "\r\n";
