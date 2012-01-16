<?php
/**
 * Resource objects for the ProgressBar package
 * @author Bob Ray <http://bobsguides.com>
 * 1/1/2012
 *
 * @package progressbar
 * @subpackage build
 */

$resources = array();

$modx->log(modX::LOG_LEVEL_INFO,'Packaging resource: ProgressBarDemo<br />');
$resources[1]= $modx->newObject('modDocument');
$resources[1]->fromArray(array(
    'id' => 1,
    'class_key' => 'modDocument',
    'context_key' => 'web',
    'type' => 'document',
    'contentType' => 'text/html',
    'pagetitle' => 'ProgressBarDemo',
    'longtitle' => 'Progress Bar Demo',
    'description' => 'Demonstrates Progress Bar. Should have a normal template.',
    'alias' => 'progress-bar-demo',
    'uri' => 'progress-bar-demo/',
    'uri_override' => '0',
    'published' => '1',
    'parent' => '0',
    'isfolder' => '0',
    'richtext' => '0',
    'menuindex' => '',
    'searchable' => '0',
    'cacheable' => '0',
    'template' => '1',
    'menutitle' => 'ProgressBarDemo',
    'hidemenu' => '0',
),'',true,true);
$resources[1]->setContent(file_get_contents($sources['build'] . 'data/resources/progressbardemo.content.html'));

$modx->log(modX::LOG_LEVEL_INFO,'Packaging resource: PB_Process<br />');
$resources[2]= $modx->newObject('modDocument');
$resources[2]->fromArray(array(
    'id' => 2,
    'template' => 0,
    'class_key' => 'modDocument',
    'context_key' => 'web',
    'type' => 'document',
    'contentType' => 'text/html',
    'pagetitle' => 'PB_Process',
    'longtitle' => '',
    'description' => 'Do not visit this page directly. It is started by the JS code triggered when you click the button on the ProgressBarDemo page. The snippet on this page should perform the work and send updates to the progress bar.',
    'alias' => 'pb-process',
    'uri' => 'pb-process/',
    'uri_override' => '0',
    'published' => '1',
    'parent' => '0',
    'isfolder' => '0',
    'richtext' => '0',
    'menuindex' => '',
    'searchable' => '0',
    'cacheable' => '1',
    'menutitle' => '',
    'hidemenu' => '1',
),'',true,true);
$resources[2]->setContent(file_get_contents($sources['build'] . 'data/resources/pb_process.content.html'));

$modx->log(modX::LOG_LEVEL_INFO,'Packaging resource: PB_Status<br />');
$resources[3]= $modx->newObject('modDocument');
$resources[3]->fromArray(array(
    'id' => 3,
    'template' => 0,
    'class_key' => 'modDocument',
    'context_key' => 'web',
    'type' => 'document',
    'contentType' => 'text/html',
    'pagetitle' => 'PB_Status',
    'longtitle' => '',
    'description' => 'This resource will contain one line with the info for the current Progess Bar status and messages. The line is in the chunk, which is updated by the PB_Process snippet. This page should not be cacheable and should have an empty template.',
    'alias' => 'pb-status',
    'uri' => 'pb-status/',
    'uri_override' => '0',
    'published' => '1',
    'parent' => '0',
    'isfolder' => '0',
    'richtext' => '0',
    'menuindex' => '',
    'searchable' => '0',
    'cacheable' => '0',
    'menutitle' => '',
    'hidemenu' => '1',
),'',true,true);
$resources[3]->setContent(file_get_contents($sources['build'] . 'data/resources/pb_status.content.html'));





return $resources;
