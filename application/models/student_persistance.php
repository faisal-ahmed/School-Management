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
            'student_created' => time(),
            'class_id' => '',
        );
        $this->db->select('*');
        $this->db->from('student');
        $this->db->where('student_roll', $data['student_roll']);
        if ($this->db->count_all_results() > 0) {
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

    function studentList($limit = 1, $start = 0){
        $return = array();

        $this->db->select('*');
        $this->db->from('student');
        $this->db->join('class', 'student.class_id = class.class_id', 'left');
        $this->db->limit($limit, $start);

        $classes = $this->db->get();

        foreach ($classes->result() as $key => $value) {
            $return[] = (array)$value;
        }

        return $return;
    }

    function totalStudentCount(){
        return $this->db->count_all('student');
    }

    function studentDetail($student_id){
        $return = array(
            'student_info' => array(),
            'payment_info' => array(),
            'result_info' => array(),
        );

        $this->db->select('*');
        $this->db->from('student');
        $this->db->join('class', 'student.class_id = class.class_id', 'left');
        $this->db->where('student.student_id', $student_id);

        $classes = $this->db->get();
        $return['student_info'] = (array)$classes->result();

        $this->db->select('*');
        $this->db->from('payment');
        $this->db->where('payment.student_id', $student_id);

        $classes = $this->db->get();
        $return['payment_info'] = (array)$classes->result();

        $this->db->select('*');
        $this->db->from('result');
        $this->db->where('result.student_id', $student_id);

        $classes = $this->db->get();
        $return['result_info'] = (array)$classes->result();

        return $return;
    }
}

?>