<?php
/**
 * New custom code snippet (replace this with snippet description).
 */

toolset_snippet_security_check() or die( 'Direct access is not allowed' );

// Put the code of your snippet below this comment.

$field_slugs = array(
    'stm_lms_bundle_price',
    //here add more field slugs
);
foreach($field_slugs as $field_slug){
    add_filter( 'wpcf_fields_slug_' . $field_slug . '_value_get', 'Decimal_Places_func');
}
function Decimal_Places_func($value){
    return number_format($value, 2, '.', '');
}