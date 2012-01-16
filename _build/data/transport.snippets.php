<?php
/**
 * ProgressBar transport snippets
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
 * Description:  Array of snippet objects for ProgressBar package
 * @package progressbar
 * @subpackage build
 */

if (! function_exists('getSnippetContent')) {
    function getSnippetContent($filename) {
        $o = file_get_contents($filename);
        $o = str_replace('<?php','',$o);
        $o = str_replace('?>','',$o);
        $o = trim($o);
        return $o;
    }
}
$snippets = array();

$snippets[1]= $modx->newObject('modSnippet');
$snippets[1]->fromArray(array(
    'id' => 1,
    'name' => 'ProgressBar',
    'description' => 'ProgressBar Snippet',
    'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/progressbar.snippet.php'),
),'',true,true);
//$properties = include $sources['data'].'/properties/properties.mysnippet1.php';
//$snippets[1]->setProperties($properties);
//unset($properties);


$snippets[2]= $modx->newObject('modSnippet');
$snippets[2]->fromArray(array(
    'id' => 2,
    'name' => 'PB_Process',
    'description' => 'Processing snippet for ProgressBar.',
    'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/process.snippet.php'),
),'',true,true);
//$properties = include $sources['data'].'/properties/properties.mysnippet2.php';
//$snippets[2]->setProperties($properties);
//unset($properties);

return $snippets;