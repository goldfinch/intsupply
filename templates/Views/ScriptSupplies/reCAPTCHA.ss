<% if GoogleRecaptchaOnPageLoad %>
  <% if AutomaticBind %>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <%--

      Automatically bind the challenge to a button
      refer: https://developers.google.com/recaptcha/docs/v3#programmatically_invoke_the_challenge

      <script>
        function onSubmit(token) {
          document.getElementById("demo-form").submit();
        }
      </script>

      <button class="g-recaptcha"
        data-sitekey="{$SiteKey}"
        data-callback='onSubmit'
        data-action='submit'>Submit</button>
    --%>
  <% else %>
    <script src="https://www.google.com/recaptcha/api.js?render={$SiteKey}"></script>
  <% end_if %>
<% end_if %>
