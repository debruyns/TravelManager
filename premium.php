<!-- Include template header -->
<?php include_once('includes/template/header.tpl.php'); ?>

<h1 class="page-title"><?= $i18n['PREMIUM_TITLE']; ?></h1>

<div class="form-container">
  <?php
    if ($auth_user->getPremium() == "1"){
      echo "<h3>".$i18n['PREMIUM_YES']."</h3>";
    } else {
      echo "<h3>".$i18n['PREMIUM_NO']."</h3>";
    }
  ?>
  <button class="save" id="profile_button"><?= $i18n['FORM_SAVE_CHANGES']; ?></button>
  <a href="/account" class="cancel"><?= $i18n['FORM_CANCEL']; ?></a>
</div>

<form class="no-display" id="success-post" method="POST" action="/account">
  <input type="hidden" name="SUCCESS_MESSAGE" value="PROFILE_CHANGE_SUCCESS" />
</form>

<!-- Include template footer -->
<?php include_once('includes/template/footer.tpl.php'); ?>
