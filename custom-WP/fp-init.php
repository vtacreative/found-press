<?php
include "wp-load.php";

/* DELETE HELLO DOLLY PLUGIN */
require_once(ABSPATH . 'wp-admin/includes/plugin.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
if (file_exists(WP_PLUGIN_DIR . '/hello.php'))
  delete_plugins(array('hello.php'));