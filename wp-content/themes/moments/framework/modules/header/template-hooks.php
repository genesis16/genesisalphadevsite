<?php

//top header bar
add_action('moments_qodef_before_page_header', 'moments_qodef_get_header_top');

//mobile header
add_action('moments_qodef_after_page_header', 'moments_qodef_get_mobile_header');