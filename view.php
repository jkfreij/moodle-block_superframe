<?php
/**
 * Created by PhpStorm.
 * User: jfreij
 * Date: 7/9/2019
 * Time: 12:59 PM
 */

require('../../config.php');

require_login();

$PAGE->set_course($COURSE);
$PAGE->set_url('/blocks/superframe/view.php');
$PAGE->set_heading($SITE->fullname);
$PAGE->set_pagelayout(course);
$PAGE->set_title(get_string('pluginname','block_superframe'));
$PAGE->navbar->add(get_string('pluginname','block_superframe'));


echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('pluginname','block_superframe'),5);

global $USER, $OUTPUT;
$parameters = array('size' => 50);
echo $OUTPUT->user_picture($USER, $parameters);

echo '<br>' . fullname($USER) . '<br>';
//echo 'This is a test view.php';

// Build and display an iframe.
$url = 'https://quizlet.com/132695231/scatter/embed';
$width = '600px';
$height = '400px';
$attributes = ['src' => $url,
    'width' => $width,
    'height' => $height];
echo html_writer::start_tag('iframe', $attributes);
echo html_writer::end_tag('iframe');


echo $OUTPUT->footer();
