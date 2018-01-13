<!-- Include template header -->
<?php include_once('includes/template/header.tpl.php'); ?>

<h1 class="page-title"><?= $i18n['TWOSTEP_TITLE']; ?></h1>

<div class="form-container">
  <div id="error-message" class="error-message"></div>
  <div class="form-element">
      <label><?= $i18n['LABEL_TWOSTEP_CODE']; ?></label>
      <input type="text" id="twostep_code" mawlength="6" placeholder="<?= $i18n['PLACEHOLDER_TWOSTEP_CODE']; ?>" />
  </div>
  <button class="save" id="twostep_button"><?= $i18n['FORM_SAVE_CHANGES']; ?></button>
  <a href="/account" class="cancel"><?= $i18n['FORM_CANCEL']; ?></a>
</div>

<form class="no-display" id="success-post" method="POST" action="/account">
  <input type="hidden" name="SUCCESS_MESSAGE" value="PASSWORD_CHANGE_SUCCESS" />
</form>

<!-- Include template footer -->
<?php include_once('includes/template/footer.tpl.php'); ?>
