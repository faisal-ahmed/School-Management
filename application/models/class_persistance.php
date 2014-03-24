<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Victoryland
 * Date: 3/25/14
 * Time: 12:58 AM
 * To change this template use File | Settings | File Templates.
 */

require_once 'model_helper.php';

class Class_persistance  extends model_helper
{
    function __construct()
    {
        parent::__construct();
    }

    function createClass()
    {
        $data = array(
            'class' => $this->getPost('class'),
            'section' => $this->getPost('section'),
        );
        $this->db->where('class', $data['class']);
        $this->db->where('section', $data['section']);
        if ($this->db->count_all_results('class')) {
            return false;
        }

        $this->db->insert('class', $data);

        return true;
    }
}

?>