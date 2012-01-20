<?php

/**
 * ProgressBar snippet
 *
 * Copyright 2011 Bob Ray
 *
 * @author Bob Ray
 * 1/17/12
 *
 * ProgressBar is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * ProgressBar is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * ProgressBar; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package progressbar
 */
/**
 * MODx ProgressBar Snippet
 *
 * Description Creates an Ajax/jQuery progress bar
  *
 * @package progressbar
 *
 * @property pb_process_resource_id (integer) (required) ID of the process
 * resource (containing the process snippet tag). When sent as a
 * property in the snippet tag, will override the System Setting
 *
 * @property pb_status_resource_id (integer) (required) ID of the status
 * resource (containing the status chunk tag). When sent as a
 * property in the snippet tag, will override the System Setting
 *
 * @property pb_authorized_users (string) (optional)
 * Comma-separated list of IDs of authorized users, or 0 to
 * indicate that everyone is authorized
 *
 * @property pb_set_interval (integer) (optional) Time between
 * each poll of the status in milliseconds (1000 = 1 sec.);
 * default: 800
 *
 * @property pb_css_url (string) (optional) URL of CSS file for
 * progress bar;
 * default: assets/components/progressbar/css/progressbar.css
 *
 * @property pb_jquery_js_path (string) (optional) Path to main
 * jQuery js file;
 * default: http://code.jquery.com/jquery-latest.js
 *
 *  @property pb_jquery_ui_css_path (string) (optional) Path
 * to jQuery CSS file;
 * default: http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css
 *
 *  @property pb_jquery_ui_js_path (string) (optional) Path
 * to jQuery UI JS file;
 * default: http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js
 *
 *
 */


$props =& $scriptProperties;

/* The next three settings are System Settings, not properties,
 * but they can be overridden in the properties of the snippet
 * tags if you need more than one progress bar on the site.
 * Be sure to set them in both the ProgressBar and PB_Process
 * snippet tags. */





$pb_status_resource_id = $modx->getOption('pb_status_resource_id');

/* set these System Settings if they didn't get set during the install */
if (empty($pb_status_resource_id)) {
    $r = $modx->getObject('modResource', array('alias' => 'pb-status'));
    $s = $modx->getObject('modSystemSetting', array('key'=>'pb_status_resource_id'));
    $s->set('value',$r->get('id'));
    $s->save();
    $pb_status_resource_id =$r->get('id');
    $r = $modx->getObject('modResource', array('alias' => 'pb-process'));
    $s = $modx->getObject('modSystemSetting', array('key'=>'pb_process_resource_id'));
    $s->set('value',$r->get('id'));
    $s->save();
    $pb_process_resource_id =$r->get('id');
    $r = $modx->getObject('modChunk', array('name'=>'PB_Status'));
    $s = $modx->getObject('modSystemSetting', array('key'=>'pb_status_chunk_id'));
    $s->set('value', $r->get('id'));
    $s->save();
    $pb_status_chunk_id =$r->get('id');
    unset( $r, $s);
    $cm = $modx->getCacheManager();
    $cm->refresh();
}
if (empty($pb_status_resource_id)) {
    $pb_status_resource_id = $modx->getOption('pb_status_resource_id',$props);
    if (empty($pb_status_resource_id)) {
        $pb_status_resource_id = $modx->getOption('pb_status_resource_id');
    }
}


    $pb_process_resource_id = $modx->getOption('pb_process_resource_id', $props);
    if (empty($pb_process_resource_id)) {
        $pb_process_resource_id = $modx->getOption('pb_process_resource_id');
    }


/* check for authorized users if pb_authorized_users is set to anything but 0 */
$authorizedUsers = $modx->getOption('pb_authorized_users',$props);
if (empty($authorized_users)) {
    $authorized_users = $modx->getOption('pb_authorized_users');
}
if ($authorizedUsers != '0') {
    $pb_authorizedUsers = explode(',',$authorizedUsers );
        if (! in_array($modx->user->get('id'),$pb_authorizedUsers)) {
            return '<h2>Unauthorized User</h2>';
    }
}
/* check the other settings */
if (empty($pb_status_resource_id)) {
    die('pb_status_resource_id System Setting is not set');
}

/* Make sure pb_status_resource_id points to a real resource */
$pb_status_url = $modx->makeUrl( (integer)$pb_status_resource_id,"","","full");
if (empty($pb_status_url)) {
    die('pb_status_resource_id is set to a nonexistent resource');
}

if (empty($pb_process_resource_id)) {
    die('pb_process_resource_id System Setting is not set');
}
/* This can be set in the ProgressBar snippet tag to override
   the default (800). The value is in milliseconds (1000 = 1 sec.)*/
$pb_interval = $modx->getOption('pb_set_interval', $props);
$pb_interval = empty($pb_interval)? 800 : $pb_interval;

/* make sure pb_process_resource_id points to a real resource */
$pb_process_url=$modx->makeUrl( (integer) $pb_process_resource_id,"","","full");
if (empty($pb_process_url)) {
    die('pb_process_resource_id is set to a nonexistent resource');
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
if (empty($headStuff)) {
    die('Could not get ProgressBar_header chunk');
}
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