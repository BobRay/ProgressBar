<?php

/**
 * properties for ProgressBar properteyset2
 * @author Bob Ray <http://bobsguides.com>
 * 1/1/2012
 *
 * @package progressbar
 * @subpackage build
 */

/* These are example properties for a property set.
 * The description fields should match
 * keys in the lexicon property file
 *
 * Change propertyset1, propertyset2 to the name of your property set.
 * Change property1, property2 to the name of the property.
 * */


$properties = array(
    array(
        'name' => 'property1',
        'desc' => 'pb_propertyset1_property1_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => '1',
        'lexicon' => 'progressbar:properties',
    ),
     array(
        'name' => 'property2',
        'desc' => 'pb_propertyset1_property2_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'Value of property 2',
        'lexicon' => 'progressbar:properties',
    ),
    array(
        'name' => 'property4',
        'desc' => 'pb_propertyset1_property4_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'This property is not in the default properties',
        'lexicon' => 'progressbar:properties',
    ),
);


return $properties;