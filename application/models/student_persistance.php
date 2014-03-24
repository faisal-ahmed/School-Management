<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Victoryland
 * Date: 3/25/14
 * Time: 12:58 AM
 * To change this template use File | Settings | File Templates.
 */

require_once 'model_helper.php';

class Student_persistance  extends model_helper
{
    function __construct()
    {
        parent::__construct();
    }

    function createStudent()
    {
        $class = $this->input->post('class');
        $section = trim($this->input->post('section'));
        $data = array(
            'student_roll' => (int)$this->getPost('student_roll'),
            'student_name' => $this->getPost('student_name'),
            'students_mobile' => $this->getPost('students_mobile'),
            'parents_mobile' => $this->getPost('parents_mobile'),
            'class_id' => '',
        );
        $this->db->where('student_roll', $data['student_roll']);
        if ($this->db->count_all_results('student')) {
            return 'A student already exist with that roll number!';
        }

        $this->db->where('class', $class);
        $this->db->where('section', $section);
        $student_class = $this->db->get('class');
        foreach ($student_class->result() as $row => $value) {
            $data['class_id'] = $value->class_id;
            break;
        }

        if ($data['class_id'] == '') {
            return 'The section is not listed in the class!';
        }

        $this->db->insert('student', $data);

        return true;
    }
}

?>