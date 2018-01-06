<!-- Include template header -->
<?php include_once('includes/template/header.tpl.php'); ?>

<h1 class="page-title"><?= $i18n['PROFILE_TITLE']; ?></h1>

<div class="form-container">
  <div class="form-element">
      <label><?= $i18n['LABEL_FIRSTNAME']; ?></label>
      <input type="email" id="profile_firstname" placeholder="<?= $i18n['PLACEHOLDER_FIRSTNAME']; ?>" />
  </div>
  <div class="form-element">
      <label><?= $i18n['LABEL_LASTNAME']; ?></label>
      <input type="email" id="profile_lastname" placeholder="<?= $i18n['PLACEHOLDER_LASTNAME']; ?>" />
  </div>
  <div class="form-element">
      <label><?= $i18n['LABEL_EMAIL']; ?></label>
      <input type="email" id="profile_email" placeholder="<?= $i18n['PLACEHOLDER_EMAIL']; ?>" />
  </div>
</div>

<!-- Include template footer -->
<?php include_once('includes/template/footer.tpl.php'); ?>
