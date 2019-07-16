<?php
/**
 * Created by PhpStorm.
 * User: jfreij
 * Date: 7/10/2019
 * Time: 11:17 AM
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

// Default values;
    $defaulturl = 'https://www.qou.edu';
    $defaultheight = '400';
    $defaultwidth = '600';

    $settings->add(new admin_setting_heading('sampleheader',
        get_string('headerconfig', 'block_superframe'),
        get_string('headerconfigdesc', 'block_superframe')));


// The url to be displayed.
    $settings->add(new admin_setting_configtext('block_superframe/url',
        get_string('url', 'block_superframe'),
        get_string('url_details', 'block_superframe'),
        $defaulturl, PARAM_RAW));

// The iframe height and width.
    $settings->add(new admin_setting_configtext('block_superframe/height',
        get_string('height', 'block_superframe'),
        get_string('height_details', 'block_superframe'),
        $defaultheight, PARAM_INT));
    $settings->add(new admin_setting_configtext('block_superframe/width',
        get_string('width', 'block_superframe'),
        get_string('width_details', 'block_superframe'),
        $defaultwidth, PARAM_INT));
    $options = array();
    $options['course'] = get_string('course');
    $options['popup'] = get_string('popup');
    $settings->add(new admin_setting_configselect(
        'block_superframe/pagelayout',
        get_string('pagelayout', 'block_superframe'),
        get_string('pagelayout_details', 'block_superframe'),'course',
        $options));
}