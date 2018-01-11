<!-- Include template header -->
<?php include_once('includes/template/header.tpl.php'); ?>

<h1 class="page-title"><?= $i18n['LANGUAGE_TITLE']; ?></h1>

<div class="form-container">
  <div id="error-message" class="error-message"></div>
  <div class="form-element">
      <label><?= $i18n['LABEL_LANGUAGE']; ?></label>
      <select>
        <?php
          $languages = LanguageDAO::getActive();
          foreach ($languages as $language){
            if ($language->getCode() == $auth_user->getLanguage()){
              echo "<option value='".$language->getCode()."' selected>".$language->getName()."</option>";
            } else {
              echo "<option value='".$language->getCode()."'>".$language->getName()."</option>";
            }
          }
        ?>
      </select>
  </div>
  <button class="save" id="profile_button"><?= $i18n['FORM_SAVE_CHANGES']; ?></button>
  <a href="/account" class="cancel"><?= $i18n['FORM_CANCEL']; ?></a>
</div>

<form class="no-display" id="success-post" method="POST" action="/account">
  <input type="hidden" name="SUCCESS_MESSAGE" value="LANGUAGE_CHANGE_SUCCESS" />
</form>

<!-- Include template footer -->
<?php include_once('includes/template/footer.tpl.php'); ?>
