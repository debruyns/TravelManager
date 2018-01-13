<!-- Include template header -->
<?php include_once('includes/template/header.tpl.php'); ?>

<h1 class="page-title"><?= $i18n['PASSWORD_TITLE']; ?></h1>

<div class="form-container">
  <div id="error-message" class="error-message"></div>
  <div class="form-element">
      <label><?= $i18n['LABEL_CURRENT_PASSWORD']; ?></label>
      <input type="password" id="password_current" placeholder="<?= $i18n['PLACEHOLDER_CURRENT_PASSWORD']; ?>" />
  </div>
  <div class="form-element">
      <label><?= $i18n['LABEL_NEW_PASSWORD']; ?></label>
      <input type="password" id="password_new" placeholder="<?= $i18n['PLACEHOLDER_NEW_PASSWORD']; ?>" />
  </div>
  <div class="form-element">
      <label><?= $i18n['LABEL_CONFIRM_PASSWORD']; ?></label>
      <input type="password" id="password_confirm" placeholder="<?= $i18n['PLACEHOLDER_CONFIRM_PASSWORD']; ?>" />
  </div>
  <button class="save" id="password_button"><?= $i18n['FORM_SAVE_CHANGES']; ?></button>
  <a href="/account" class="cancel"><?= $i18n['FORM_CANCEL']; ?></a>
</div>

<form class="no-display" id="success-post" method="POST" action="/account">
  <input type="hidden" name="SUCCESS_MESSAGE" value="PASSWORD_CHANGE_SUCCESS" />
</form>

<!-- Include template footer -->
<?php include_once('includes/template/footer.tpl.php'); ?>
