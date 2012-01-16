<?php
/** Array of system settings for the ProgressBar package
 * @package progressbar
 * @subpackage build
 */


/* This section is ONLY for new System Settings to be added to
 * The System Settings grid. If you include existing settings,
 * they will be removed on uninstall. Existing setting can be
 * set in a script resolver (see install.script.php).
 */
$settings = array();

/* These are new settings */
$settings['pb_authorized_users']= $modx->newObject('modSystemSetting');
$settings['pb_authorized_users']->fromArray(array (
    'key' => 'pb_authorized_users',
    'value' => '0',
    'xtype' => 'textfield',
    'namespace' => 'progressbar',
    'area' => '',
), '', true, true);

$settings['pb_process_id']= $modx->newObject('modSystemSetting');
$settings['pb_process_id']->fromArray(array (
    'key' => 'pb_process_id',
    'value' => '',
    'xtype' => 'textfield',
    'namespace' => 'progressbar',
    'area' => '',
), '', true, true);

$settings['pb_status_id']= $modx->newObject('modSystemSetting');
$settings['pb_status_id']->fromArray(array (
    'key' => 'pb_status_id',
    'value' => '',
    'xtype' => 'textfield',
    'namespace' => 'progressbar',
    'area' => '',
), '', true, true);

return $settings;