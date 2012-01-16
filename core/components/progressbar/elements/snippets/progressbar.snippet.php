<?php
$props =& $scriptProperties;

/* The next three settings are System Settings, not properties,
 * but they can be overridden in the properties of the snippet
 * tags if you need more than one progress bar on the site.
 * Be sure to set them in both the ProgressBar and PB_Process
 * snippet tags. */





$pb_status_id = $modx->getOption('pb_status_id');

/* set these if they didn't get set during the install */
if (empty($pb_status_id)) {
    $r = $modx->getObject('modResource', array('alias' => 'pb-status'));
    $s = $modx->getObject('modSystemSetting', array('key'=>'pb_status_id'));
    $s->set('value',$r->get('id'));
    $s->save();
    $r = $modx->getObject('modResource', array('alias' => 'pb-process'));
    $s = $modx->getObject('modSystemSetting', array('key'=>'pb_process_id'));
    $s->set('value',$r->get('id'));
    $s->save();
    unset( $r, $s);
}

$pb_status_id = $modx->getOption('pb_status_id',$props);


$pb_process_id = $modx->getOption('pb_process_id', $props);

$pb_authorizedUsers = explode(',', $modx->getOption('pb_authorized_users',$props));

/* check for authorized users if pb_authorized_users is set to anything but 0 */
if (!empty($pb_authorizedUsers)) {
    if (! in_array($modx->user->get('id'),$pb_authorizedUsers)) {
        return 'Unauthorized User';
    }
}

/* check the other settings */
if (empty($pb_status_id)) {
    die('pb_status_id System Setting is not set');
}

/* Make sure pb_status_id points to a real resource */
$pb_status_url = $modx->makeUrl($pb_status_id,"","","full");
if (empty($pb_status_url)) {
    die('pb_status_id is set to a nonexistent resource');
}

if (empty($pb_process_id)) {
    die('pb_process_id System Setting is not set');
}
/* This can be set in the ProgressBar snippet tag to override
   the default (800). The value is in milliseconds (1000 = 1 sec.)*/
$pb_interval = $modx->getOption('pb_set_interval', $props);
$pb_interval = empty($pb_interval)? 800 : $pb_interval;

/* make sure pb_process_id points to a real resource */
$pb_process_url=$modx->makeUrl($pb_process_id,"","","full");
if (empty($pb_process_url)) {
    die('pb_process_id is set to a nonexistent resource');
}
/* This can be overridden in the ProgressBar snippet tag */
$pb_css = $modx->getOption('pb_css_url', $props);
$pb_css = empty($pb_css) ? MODX_ASSETS_URL . 'components/progressbar/css/progressbar.css' : $pb_css;

$modx->regClientCss($pb_css);

/* You can speed things up and make them more reliable by downloading
 * these files to assets/components/progressbar/js/ and modifying these
 * three URLs accordingly in the properties of the ProgressBar snippet tag.
*/
$fields = array();
$fields['pb_jquery_js_path'] = !empty($props['jquery_js_url'])? $props['jquery_js_url'] : 'http://code.jquery.com/jquery-latest.js';

$fields['pb_jquery_ui_css_path'] = !empty($props['jquery_ui_css_path'])? $props['jquery_ui_css_path'] : 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css';

$fields['pb_jquery_ui_js_path'] = !empty($props['jquery_ui_js_path'])? $props['jquery_ui_js_path'] : 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js';

$headStuff = $modx->getChunk('ProgressBar_header', $fields);
$modx->regClientStartupHTMLBlock($headStuff);
unset($headStuff);

$fields = array();

$fields['pb_set_interval'] = $pb_interval;


$fields['pb_process_url'] = $pb_process_url;
$fields['pb_status_url'] = $pb_status_url;

$src2 = $modx->getChunk('ProgressBar_js', $fields);
$modx->regClientStartupScript($src2);
unset($fields, $src2, $interval, $process_url, $status_url);
return '';