<!-- Include template header -->
<?php include_once('includes/template/header.tpl.php'); ?>

<h1 class="page-title"><?= $i18n['TWOSTEP_TITLE']; ?></h1>

<div class="form-container">
  <?php
    if ($auth_user->getDualStep() == "1"){
      echo "<h3>".$i18n['TWOSTEP_DISABLE_TEXT']."</h3>";
    } else {
      echo "<h3>".$i18n['TWOSTEP_ENABLE_TEXT']."</h3>";
      $auth = new Authenticator();
      $new_secret = $auth->generateRandomSecret();
      $new_QR = $auth->getQR($auth_user->getEmail(), $new_secret, "TravelManager");
      unset($_SESSION['DUALSTEP_NEW_CODE']);
      $_SESSION['DUALSTEP_NEW_CODE'] = $new_secret;
      echo "<img src='{$new_QR}' />";
    }
  ?>
  <div id="error-message" class="error-message"></div>
  <div class="form-element">
      <label><?= $i18n['LABEL_TWOSTEP_CODE']; ?></label>
      <input type="text" id="twostep_code" maxlength="6" placeholder="<?= $i18n['PLACEHOLDER_TWOSTEP_CODE']; ?>" />
  </div>
  <button class="save" id="twostep_button"><?= $i18n['FORM_SAVE_CHANGES']; ?></button>
  <a href="/account" class="cancel"><?= $i18n['FORM_CANCEL']; ?></a>
</div>

<form class="no-display" id="success-post" method="POST" action="/account">
  <input type="hidden" name="SUCCESS_MESSAGE" value="TWOSTEP_CHANGE_SUCCESS" />
</form>

<!-- Include template footer -->
<?php include_once('includes/template/footer.tpl.php'); ?>
