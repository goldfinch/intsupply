<% cached 'SupplierState', $SupplierState %>
  <% if $SupplierState == 'HEAD' %>
    $GTMHead
    $GTAG
    $FacebookPixel
    $reCAPTCHAmeta
    $GoogleCloudMeta
  <% else_if $SupplierState == 'BODY' %>
    $GTMBody
  <% else_if $SupplierState == 'FOOTER' %>
    $reCAPTCHA
    <%-- $GoogleMap --%>
    <%-- $HubSpot --%>
  <% end_if %>
  <% end_cached %>
