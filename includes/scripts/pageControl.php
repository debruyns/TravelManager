<?php

  $page = strtoupper(substr(basename($_SERVER['PHP_SELF']), 0, -4));

  $page_title = $i18n['PAGE_TITLE_'.$page];

?>
