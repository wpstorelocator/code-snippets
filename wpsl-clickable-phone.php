$listing_template .= '<% if ( typeof extra_phone !== "undefined" && extra_phone ) { %>' . "\r\n";
$listing_template .= '<p><a href="tel:<%= formatClickablePhoneNumber( extra_phone ) %>"><%= extra_phone %></a></p>' . "\r\n";
$listing_template .= '<% } %>' . "\r\n";
