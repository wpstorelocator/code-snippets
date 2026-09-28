<% var parkingLabels = {}; %>
<% parkingLabels["street-parking"] = "Street parking"; %>
<% parkingLabels["parking-lot"] = "Parking lot"; %>
<% parkingLabels["garage"] = "Garage"; %>
<% if ( typeof parking !== "undefined" && parkingLabels[ parking ] ) { %>
<p class="wpsl-parking"><%= parkingLabels[ parking ] %></p>
<% } %>
