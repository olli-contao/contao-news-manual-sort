<?php
// Registrieren im Hooks replaceInsertTags
$GLOBALS['TL_HOOKS']['newsListFetchItems'][] = array('NewsManualSort\ModuleNewsList','fetchItems');

