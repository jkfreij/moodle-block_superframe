<?php
/**
 * Created by PhpStorm.
 * User: jfreij
 * Date: 7/9/2019
 * Time: 12:59 PM
 */





require('../../config.php');



//$config = get_config('block_superframe');
$blockid = required_param('blockid',PARAM_INT);
$def_config = get_config('block_superframe');
$PAGE->set_course($COURSE);
$PAGE->set_url('/blocks/superframe/view.php');
$PAGE->set_heading($SITE->fullname);

//$PAGE-> set_pagelayout($config->pagelayout);
$PAGE ->set_pagelayout($def_config->pagelayout);
//$PAGE->set_pagelayout(course);
$PAGE->set_title(get_string('pluginname','block_superframe'));
$PAGE->navbar->add(get_string('pluginname','block_superframe'));
require_login();
$usercontext = context_user::instance($USER->id);
require_capability('block/superframe:seeviewpage', $usercontext);

$configdata = $DB->get_field('block_instances', 'configdata', ['id' => $blockid]);

// If an entry exists, convert to an object.
if ($configdata) {
    $config = unserialize(base64_decode($configdata));
} else {
    // No instance data, use admin settings.
    // However, that only specifies height and width, not size.
    $config = $def_config;
    $config->size = 'custom';
}




// URL - comes either from instance or admin.
$url = $config->url;
// Let's set up the iframe attributes.
switch ($config->size) {
    case 'custom':
        $width = $def_config->width;
        $height = $def_config->height;
        break;
    case 'small' :
        $width = 360;
        $height = 240;
        break;
    case 'medium' :
        $width = 600;
        $height = 400;
        break;
    case 'large' :
        $width = 1024;
        $height = 720;
        break;
}


echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('pluginname','block_superframe'),5);

global $USER, $OUTPUT;
$parameters = array('size' => 50);
echo $OUTPUT->user_picture($USER, $parameters);

echo '<br>' . fullname($USER) . '<br>';
//echo 'This is a test view.php';

// Build and display an iframe.
/*$url = 'https://quizlet.com/132695231/scatter/embed';
$width = '600px';
$height = '400px';
$attributes = ['src' => $url,
    'width' => $width,
    'height' => $height];
echo html_writer::start_tag('iframe', $attributes);
echo html_writer::end_tag('iframe');
*/

// Build and display an iframe.
//$attributes = ['src' => $config->url,
$attributes = ['src'=> $url,
    'width' => $width,
    'height' => $height];
echo html_writer::start_tag('iframe', $attributes);
echo html_writer::end_tag('iframe');

echo $OUTPUT->footer();
