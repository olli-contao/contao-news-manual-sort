<?php

// Modify sorting
$GLOBALS['TL_DCA']['tl_news']['list']['sorting']['fields'] = ['sorting'];

// Add field
$GLOBALS['TL_DCA']['tl_news']['fields']['sorting'] = [
    'sql' => "int(10) unsigned NOT NULL default '0'",
]; 