<!-- Include template header -->
<?php include_once('includes/template/header.tpl.php'); ?>

<h1 class="account-title"><?= $i18n['ACCOUNT_TITLE']; ?></h1>

<div class="all-settings">

  <div class="account-setting">
    <div class="setting-name"><?= $i18n['ACCOUNT_PROFILE']; ?></div>
    <div class="setting-action"><button class="green"><?= $i18n['ACCOUNT_EDIT']; ?></button></div>
  </div>

  <div class="account-setting">
    <div class="setting-name"><?= $i18n['ACCOUNT_LANGUAGE']; ?></div>
    <div class="setting-action"><button class="green"><?= $i18n['ACCOUNT_EDIT']; ?></button></div>
  </div>

  <div class="account-setting">
    <div class="setting-name"><?= $i18n['ACCOUNT_PASSWORD']; ?></div>
    <div class="setting-action"><button class="green"><?= $i18n['ACCOUNT_CHANGE']; ?></button></div>
  </div>

  <div class="account-setting">
    <div class="setting-name"><?= $i18n['ACCOUNT_PREMIUM']; ?></div>
    <div class="setting-action"><button class="green"><?= $i18n['ACCOUNT_CHANGE']; ?></button></div>
  </div>

  <div class="account-setting">
    <div class="setting-name"><?= $i18n['ACCOUNT_DUALSTEP']; ?></div>
    <div class="setting-action"><button class="green"><?= $i18n['ACCOUNT_ENABLE']; ?></button></div>
  </div>

</div>

<!-- Include template footer -->
<?php include_once('includes/template/footer.tpl.php'); ?>
