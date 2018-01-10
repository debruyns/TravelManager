<!-- Include template header -->
<?php include_once('includes/template/header.tpl.php'); ?>

<h1 class="page-title"><?= $i18n['PROFILE_TITLE']; ?></h1>

<div class="form-container">
  <div id="error-message" class="error-message"></div>
  <div class="form-element">
      <label><?= $i18n['LABEL_FIRSTNAME']; ?></label>
      <input type="text" id="profile_firstname" placeholder="<?= $i18n['PLACEHOLDER_FIRSTNAME']; ?>" value="<?= $auth_user->getFirstname(); ?>" />
  </div>
  <div class="form-element">
      <label><?= $i18n['LABEL_LASTNAME']; ?></label>
      <input type="text" id="profile_lastname" placeholder="<?= $i18n['PLACEHOLDER_LASTNAME']; ?>" value="<?= $auth_user->getLastname(); ?>" />
  </div>
  <div class="form-element">
      <label><?= $i18n['LABEL_EMAIL']; ?></label>
      <input type="email" id="profile_email" placeholder="<?= $i18n['PLACEHOLDER_EMAIL']; ?>" value="<?= $auth_user->getEmail(); ?>" />
  </div>
  <button class="save" id="profile_button"><?= $i18n['FORM_SAVE_CHANGES']; ?></button>
  <a href="/account" class="cancel"><?= $i18n['FORM_CANCEL']; ?></a>
</div>

<form class="no-display" id="success-post" method="POST" action="/account">
  <input type="hidden" name="SUCCESS_MESSAGE" value="PROFILE_CHANGE_SUCCESS" />
</form>

<!-- Include template footer -->
<?php include_once('includes/template/footer.tpl.php'); ?>
