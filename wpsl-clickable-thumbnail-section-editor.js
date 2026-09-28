<% var thumbLink = typeof url !== "undefined" ? url : ""; %>
<% if ( typeof permalink !== "undefined" && permalink ) { thumbLink = permalink; } %>
<% if ( typeof thumb !== "undefined" && thumb && thumbLink ) { %>
<a href="<%= thumbLink %>"><%= thumb %></a>
<% } else { %>
<%= typeof thumb !== "undefined" ? thumb : "" %>
<% } %>
