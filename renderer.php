<?php
/**
 * Created by PhpStorm.
 * User: jfreij
 * Date: 7/24/2019
 * Time: 12:24 PM
 */

class block_superframe_renderer extends plugin_renderer_base {

    function display_view_page($url,$width,$height,$fullname){

     $data= new stdClass();


        $data->heading = get_string('pluginname', 'block_superframe');
        $data->url = $url;
        $data->height = $height;
        $data->width = $width;
        $data->fullname = $fullname;

        // Start output to browser.
        echo $this->output->header();

        // Render the data in a Mustache template.
        echo $this->render_from_template('block_superframe/frame', $data);

        // Finish the page.
        echo $this->output->footer();




    }
}