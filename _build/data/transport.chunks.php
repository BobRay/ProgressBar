<?php
/**
 * ProgressBar transport chunks
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
 * Description: Array of chunk objects for ProgressBar package
 * @package progressbar
 * @subpackage build
 */

$chunks = array();

$chunks[1]= $modx->newObject('modChunk');
$chunks[1]->fromArray(array(
    'id' => 1,
    'name' => 'ProgressBar_header',
    'description' => 'Header stuff for Progress Bar',
    'snippet' => file_get_contents($sources['source_core'].'/elements/chunks/progressbar_header.html'),
    'properties' => '',
),'',true,true);

$chunks[2]= $modx->newObject('modChunk');
$chunks[2]->fromArray(array(
    'id' => 2,
    'name' => 'ProgressBar_html',
    'description' => 'HTML for ProgressBar',
    'snippet' => file_get_contents($sources['source_core'].'/elements/chunks/progressbar.html'),
    'properties' => '',
),'',true,true);

$chunks[3]= $modx->newObject('modChunk');
$chunks[3]->fromArray(array(
    'id' => 3,
    'name' => 'ProgressBar_js',
    'description' => 'JavaScript for ProgressBar',
    'snippet' => file_get_contents($sources['source_core'].'/elements/chunks/progressbar_js.html'),
    'properties' => '',
),'',true,true);

$chunks[4]= $modx->newObject('modChunk');
$chunks[4]->fromArray(array(
    'id' => 4,
    'name' => 'PB_Status',
    'description' => 'Status info for ProgressBar',
    'snippet' => file_get_contents($sources['source_core'].'/elements/chunks/status.html'),
    'properties' => '',
),'',true,true);




return $chunks;