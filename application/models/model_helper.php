<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Victoryland
 * Date: 3/22/14
 * Time: 1:56 AM
 * To change this template use File | Settings | File Templates.
 */

class model_helper  extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }

    function debug($debugArray){
        echo "<pre>";
        print_r($debugArray);
        echo "</pre>";
    }

    function getPost($attr) {
        $return = trim($this->input->get_post($attr, true));
        return $return;
    }
}