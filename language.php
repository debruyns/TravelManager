<!-- Include template header -->
<?php include_once('includes/template/header.tpl.php'); ?>

<h1 class="page-title"><?= $i18n['LANGUAGE_TITLE']; ?></h1>

<div class="form-container">
  <div id="error-message" class="error-message"></div>
  <div class="language-selection">
    <?php
      $languages = LanguageDAO::getActive();
      foreach ($languages as $language){

        if ($auth_user->getLanguage() == $language->getCode()){
          echo "<div><div class='active'>".$language->getName()."</div></div>";
        } else {
          echo "<div><div>".$language->getName()."</div></div>";
        }

      }
    ?>
  </div>
  <button class="save" id="profile_button"><?= $i18n['FORM_SAVE_CHANGES']; ?></button>
  <a href="/account" class="cancel"><?= $i18n['FORM_CANCEL']; ?></a>
</div>

<form class="no-display" id="success-post" method="POST" action="/account">
  <input type="hidden" name="SUCCESS_MESSAGE" value="LANGUAGE_CHANGE_SUCCESS" />
</form>

<!-- Include template footer -->
<?php include_once('includes/template/footer.tpl.php'); ?>
