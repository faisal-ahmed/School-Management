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
        $this->addViewData('username', $this->getSessionAttr('username'));
        $this->addViewData('active_menu', 'student');
    }

    function index(){
        redirect('studentManagement/addStudent', 'refresh');
    }

    function addStudent(){
        $this->addViewData('tab_menu', 'addStudent');
        $this->loadview('add_student');
    }

    function studentList(){
        $this->addViewData('tab_menu', 'studentList');
        $this->loadview('student_list');
    }
}