<?php

if(!function_exists('moments_qodef_is_responsive_on')) {
    /**
     * Checks whether responsive mode is enabled in theme options
     * @return bool
     */
    function moments_qodef_is_responsive_on() {
        return moments_qodef_options()->getOptionValue('responsiveness') !== 'no';
    }
}