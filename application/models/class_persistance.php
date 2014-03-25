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
            'created' => time(),
        );
        $this->db->where('class', $data['class']);
        $this->db->where('section', $data['section']);
        if ($this->db->count_all_results('class')) {
            return false;
        }

        $this->db->insert('class', $data);

        return true;
    }

    function classList(){
        $return = array();

        $this->db->select('class, section, created, COUNT(student.student_id) total_student');
        $this->db->from('class');
        $this->db->join('student', 'student.class_id = class.class_id', 'left');
        $this->db->group_by("class.class_id");

        $classes = $this->db->get();

        foreach ($classes->result() as $key => $value) {
            $return[] = (array)$value;
        }

        return $return;
    }
}

?>