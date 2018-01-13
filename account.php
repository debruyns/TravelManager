<!-- Include template header -->
<?php include_once('includes/template/header.tpl.php'); ?>

<h1 class="page-title"><?= $i18n['ACCOUNT_TITLE']; ?></h1>

<?php
  if (isset($_POST['SUCCESS_MESSAGE'])) {
    echo '<div class="top-success-message">'.$i18n[$_POST['SUCCESS_MESSAGE']].'</div>';
  }
?>

<div class="all-settings">

  <div class="account-setting">
    <div class="setting-name"><?= $i18n['ACCOUNT_PROFILE']; ?></div>
    <div class="setting-action"><a href="/account/profile" class="green-button"><?= $i18n['ACCOUNT_EDIT']; ?></a></div>
  </div>

  <div class="account-setting">
    <div class="setting-name"><?= $i18n['ACCOUNT_LANGUAGE']; ?></div>
    <div class="setting-action"><a href="account/language" class="green-button"><?= $i18n['ACCOUNT_EDIT']; ?></a></div>
  </div>

  <div class="account-setting">
    <div class="setting-name"><?= $i18n['ACCOUNT_PASSWORD']; ?></div>
    <div class="setting-action"><a href="account/password" class="green-button"><?= $i18n['ACCOUNT_EDIT']; ?></a></div>
  </div>

  <div class="account-setting">
    <div class="setting-name"><?= $i18n['ACCOUNT_PREMIUM']; ?></div>
    <div class="setting-action"><a href="#" class="green-button"><?= $i18n['ACCOUNT_EDIT']; ?></a></div>
  </div>

  <div class="account-setting">
    <div class="setting-name"><?= $i18n['ACCOUNT_DUALSTEP']; ?></div>
    <div class="setting-action">
      <?php if ($auth_user->getDualStep() == "1") { ?>
        <a href="account/verification" class="red-button"><?= $i18n['ACCOUNT_DISABLE']; ?></a>
      <?php } else { ?>
        <a href="account/verification" class="green-button"><?= $i18n['ACCOUNT_ENABLE']; ?></a>
      <?php } ?>
    </div>
  </div>

</div>

<!-- Include template footer -->
<?php include_once('includes/template/footer.tpl.php'); ?>
