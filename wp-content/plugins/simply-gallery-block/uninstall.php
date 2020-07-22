<?php
if (!defined('WP_UNINSTALL_PLUGIN')) {
  die;
}
delete_option("pgc_sgb_global_lightbox_use");
delete_site_option('pgc_sgb_global_lightbox_use');
