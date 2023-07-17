<% if $SupplierState == 'HEAD' %>
  $GTMHead
  $GTAG
  $FacebookPixel
  $reCAPTCHAmeta
<% else_if $SupplierState == 'BODY' %>
  $GTMBody
<% else_if $SupplierState == 'FOOTER' %>
  $reCAPTCHA
  $GoogleMap
  <%-- $HubSpot --%>
<% end_if %>
