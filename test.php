<form action="submit-form.php" method="post">
  <!-- Your existing fields -->
  <input type="text" name="fullname" required>
  <input type="email" name="email" required>
  <textarea name="message" required></textarea>

  <!-- reCAPTCHA Widget -->
  <div class="g-recaptcha" data-sitekey="6Ld0Z0krAAAAAFCwIDiunmU9l68kT4Vm2cB7U7px"></div>

  <button type="submit">Send</button>
</form>

<!-- Load reCAPTCHA -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
