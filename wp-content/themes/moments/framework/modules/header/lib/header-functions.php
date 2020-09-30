<?php
use MomentsQodef\Modules\Header\Lib;

if(!function_exists('moments_qodef_set_header_object')) {
    function moments_qodef_set_header_object() {
        $header_type = moments_qodef_get_meta_field_intersect('header_type', moments_qodef_get_page_id());

        $object = Lib\HeaderFactory::getInstance()->build($header_type);

        if(Lib\HeaderFactory::getInstance()->validHeaderObject()) {
            $header_connector = new Lib\HeaderConnector($object);
            $header_connector->connect($object->getConnectConfig());
        }
    }

    add_action('wp', 'moments_qodef_set_header_object', 1);
}