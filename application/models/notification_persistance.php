<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Victoryland
 * Date: 3/29/14
 * Time: 6:47 PM
 * To change this template use File | Settings | File Templates.
 */

require_once 'model_helper.php';

class Notification_persistance extends model_helper
{
    function __construct()
    {
        parent::__construct();
    }

    function notifyClass(){
        $class_id = $this->getPost('class_id');
        $message = $this->getPost('message');

        $this->db->select('*');
        $this->db->from('student');
        $this->db->join('class', 'student.class_id = class.class_id', 'left');
        $this->db->where('class.class_id', $class_id);
        $students = $this->db->get();

        foreach ($students->result() as $key => $value) {
            $this->sendSMS($value->parents_mobile, $message);
        }

        return true;
    }

    function notifyStudent(){
        $student_id = $this->getPost('student_id');
        $message = $this->getPost('message');

        $this->db->select('*');
        $this->db->from('student');
        $this->db->where('student_id', $student_id);
        $students = $this->db->get();

        foreach ($students->result() as $key => $value) {
            $this->sendSMS($value->parents_mobile, $message);
        }

        return true;
    }
}