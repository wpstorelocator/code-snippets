$listing_template .= "\t\t\t" . '<% if ( extra_phone ) { %>' . "\r\n";  
$listing_template .= "\t\t\t" . '<p><%= formatPhoneNumber( extra_phone ) %></p>' . "\r\n";
$listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
