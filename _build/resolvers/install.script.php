<?php

/**
 * ProgressBar resolver script - runs on install.
 *
 * Copyright 2012 Bob Ray <http://bobsguides.com>
 * @author Bob Ray <http://bobsguides.com>
 * 1/1/2012
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
 * Description: Resolver script for ProgressBar package
 * @package progressbar
 * @subpackage build
 */


/* The $modx object is not available here. In its place we
 * use $object->xpdo
 */

$modx =& $object->xpdo;

/* Remember that the files in the _build directory are not available
 * here and we don't know the IDs of any objects, so resources,
 * elements, and other objects must be retrieved by name with
 * $modx->getObject().
 */

$modx->log(xPDO::LOG_LEVEL_INFO,'Running PHP Resolver.');
switch($options[xPDOTransport::PACKAGE_ACTION]) {
    /* This code will execute during an install */
    case xPDOTransport::ACTION_INSTALL:
        $success = true;
        /* Get ID of process resource */
        $settings = array();
        $settings['pb_status_id'] = '';
        $settings['pb_process_id'] = '';
        $r = $modx->getObject('modResource', array('alias'=> 'pb-process'));
        if ($r) {
            $processId = $r->get('id');
            $settings['pb_process_id'] = $r->get('id');
        } else {
            $modx->log(xPDO::LOG_LEVEL_INFO,'Could not get PB_Process resource - setting will be set on first run');
        }

        $r = $modx->getObject('modResource', array('alias'=> 'pb-status'));


        if ($r) {
            $modx->log(xPDO::LOG_LEVEL_ERROR,'Retrieved PB_Status resource');
            $processId = $r->get('id');
            $settings['pb_status_id'] = $r->get('id');
        } else {
            $modx->log(xPDO::LOG_LEVEL_INFO,'Could not get PB_Status resource - setting will be set on first run');
        }

        /* This section will set any System Settings in the variables at the top of this section. */

            $modx->log(xPDO::LOG_LEVEL_INFO,'Attempting to set System Settings');
            foreach($settings as $key=>$value) {
                $setting = $modx->getObject('modSystemSetting',array('key'=>$key));
                if ($setting) {
                    $setting->set('value',$value);
                    if ($setting->save()){
                        $value = $value? $value : '0'; /* make false values show in msg */
                        $modx->log(xPDO::LOG_LEVEL_INFO,'Updated System Setting: ' . $key . ' to ' . $value );
                    }
                } else {
                    $modx->log(xPDO::LOG_LEVEL_INFO,'Could not retrieve setting: ' . $key);
                }
            }

        break;

    /* This code will execute during an upgrade */
    case xPDOTransport::ACTION_UPGRADE:

        /* put any upgrade tasks (if any) here such as removing
           obsolete files, settings, elements, resources, etc.
        */

        $success = true;
        break;

    /* This code will execute during an uninstall */
    case xPDOTransport::ACTION_UNINSTALL:
        $modx->log(xPDO::LOG_LEVEL_INFO,'Uninstalling . . .');
        $success = true;
        break;

}
$modx->log(xPDO::LOG_LEVEL_INFO,'Script resolver actions completed');
return $success;