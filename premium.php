<!-- Include template header -->
<?php include_once('includes/template/header.tpl.php'); ?>
<script src="js/premium.js"></script>

<h1 class="page-title"><?= $i18n['PREMIUM_TITLE']; ?></h1>

<div class="form-container">
  <?php
    if ($auth_user->getPremium() == "1"){
      $expire = date('d-m-Y', strtotime($auth_user->getPremiumEnd() . ' +1 day'));
      echo "<h3>".$i18n['PREMIUM_YES']." ".$expire.")</h3>";
    } else {
      echo "<h3>".$i18n['PREMIUM_NO']."</h3>";
    }
  ?>
  <div id="dropin-container"></div>
  <button class="save" id="profile_button"><?= $i18n['FORM_PAY']; ?></button>
  <a href="/account" class="cancel"><?= $i18n['FORM_CANCEL']; ?></a>
</div>

<form class="no-display" id="success-post" method="POST" action="/account">
  <input type="hidden" name="SUCCESS_MESSAGE" value="PROFILE_CHANGE_SUCCESS" />
</form>

<!-- Include template footer -->
<?php include_once('includes/template/footer.tpl.php'); ?>
