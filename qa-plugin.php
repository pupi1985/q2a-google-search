<?php

if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
    header('Location: ../../');
    exit;
}

qa_register_plugin_layer('GSearch_Layer.php', 'GSearch Layer');
qa_register_plugin_module('process', 'GSearch_Admin.php', 'GSearch_Admin', 'GSearch Admin');
