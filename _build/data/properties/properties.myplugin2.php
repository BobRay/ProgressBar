<?php

/**
 * Default properties for the ProgressBar snippet
 * @author Bob Ray <http://bobsguides.com>
 * 1/1/2012
 *
 * @package progressbar
 * @subpackage build
 */
/* These are example properties.
 * The description fields should match
 * keys in the lexicon property file
 *
 * Change plugin1, plugin2 to the name of your plugin.
 * Change property1 to the name of the property.
 * */

$properties = array(
    array(
        'name' => 'property1',
        'desc' => 'pb_plugin2_property1_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => '1',
        'lexicon' => 'progressbar:properties',
    ),
     array(
        'name' => 'property2',
        'desc' => 'pb_plugin2_property2_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'Some Text',
        'lexicon' => 'progressbar:properties',
    ),
    array(
        'name' => 'property3',
        'desc' => 'pb_plugin2_property3_desc',
        'type' => 'list',
        'options' => array(
            array(
                'name' => 'System Default',
                'value' => 'System Default',
                'menu' => '',
            ),
            array(
                'name' => 'Yes',
                'value' => 'Yes',
                'menu' => '',
            ),
            array(
                'name' => 'No',
                'value' => 'No',
                'menu' => '',
            ),
            array(
                'name' => 'Parent',
                'value' => 'Parent',
                'menu' => '',
            ),
        ),
        'value' => 'System Default',
        'lexicon' => 'progressbar:properties',
    ),
 );

return $properties;