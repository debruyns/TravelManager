<!-- Include template header -->
<?php include_once('includes/template/header.tpl.php'); ?>

<h1 class="page-title"><?= $i18n['LANGUAGE_TITLE']; ?></h1>

<div class="form-container">
  <div id="error-message" class="error-message"></div>
  <table class="language-selection">
    <?php
      $count_languages = 0;
      $count_row = 0;
      $languages = LanguageDAO::getActive();
      foreach ($languages as $language){

        $count_languages++;
        $count_row++;

        if ($count_row == 1){
          echo "<tr>";
        }

        echo "<td>".$language->getName()."</td>";

        if ($count_row == 2 || $count_languages == count($languages)){
          echo "</tr>";
          $count_row = 0;
        }

      }
    ?>
  </table>
  <button class="save" id="profile_button"><?= $i18n['FORM_SAVE_CHANGES']; ?></button>
  <a href="/account" class="cancel"><?= $i18n['FORM_CANCEL']; ?></a>
</div>

<form class="no-display" id="success-post" method="POST" action="/account">
  <input type="hidden" name="SUCCESS_MESSAGE" value="LANGUAGE_CHANGE_SUCCESS" />
</form>

<!-- Include template footer -->
<?php include_once('includes/template/footer.tpl.php'); ?>
