<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Victoryland
 * Date: 3/22/14
 * Time: 4:19 PM
 * To change this template use File | Settings | File Templates.
 */

require_once 'controller_helper.php';

class studentManagement extends controller_helper{
    function __construct() {
        parent::__construct();
        $this->checkLogin();
        $this->addViewData('active_menu', 'student');
        $this->load->model('student_persistance');
    }

    function index(){
        redirect('studentManagement/studentList', 'refresh');
    }

    function addStudent(){
        $this->addViewData('tab_menu', 'addStudent');
        $this->addViewData('info', array('Be careful when adding parents mobile number!!!'));
        $this->addViewData('class', array('One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'SSC', 'Eleven', 'Twelve', 'HSC'));
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->form_validation->set_rules('section', 'Section', 'required|xss_clean');
            $this->form_validation->set_rules('student_name', 'Student Name', 'required|xss_clean');
            $this->form_validation->set_rules('student_roll', 'Roll Number', 'required|numeric|xss_clean');
            $this->form_validation->set_rules('parents_mobile', 'Parents Mobile Number', 'required|regex_match[/^[0-9().-]+$/]|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $this->addViewData('error', $this->getErrors(validation_errors()));
            } else if (($result = $this->student_persistance->createStudent()) === true) {
                $this->addViewData('success', array('Congrats! A student has been added successfully.'));
                redirect('studentManagement/addStudent', 'refresh');
                exit();
            } else {
                $this->addViewData('error', array($result));
            }
        }
        $this->loadview('add_student');
    }

    function studentList(){
        $this->addViewData('tab_menu', 'studentList');
        $perPage = 50;
        $currentPage = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
        $this->addViewData('students', $this->student_persistance->studentList($perPage, $currentPage));
        $this->addViewData('pagination', $this->loadPagination('studentManagement/studentList', $this->student_persistance->totalStudentCount(), $perPage));
        $this->loadview('student_list');
    }

    function studentProfile(){
        $this->addViewData('tab_menu', 'studentList');
        $student_id = $this->uri->segment(3);
        $this->addViewData('profile', $this->student_persistance->studentDetail($student_id));
        $this->loadview('student_profile');
    }
}