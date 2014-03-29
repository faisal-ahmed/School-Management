<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Victoryland
 * Date: 3/22/14
 * Time: 4:20 PM
 * To change this template use File | Settings | File Templates.
 */

require_once 'controller_helper.php';

class notificationManagement extends controller_helper{
    function __construct() {
        parent::__construct();
        $this->checkLogin();
        $this->addViewData('active_menu', 'notification');
        $this->load->model('notification_persistance');
    }

    function index(){
        redirect('notificationManagement/notifyClass', 'refresh');
    }

    function notifyClass(){
        $class = $this->uri->segment(3);
        $section = $this->uri->segment(4);
        $class_id = $this->uri->segment(5);
        $this->addViewData('class', array('One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'SSC', 'Eleven', 'Twelve', 'HSC'));
        $this->addViewData('classSelected', $class);
        $this->addViewData('sectionSelected', $section);
        $this->addViewData('class_id', $class_id);
        $this->addViewData('tab_menu', 'notifyClass');
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            if ($this->notification_persistance->notifyClass()) {
                $this->addViewData('success', array('Notification sent!'));
            } else {
                $this->addViewData('error', array('An error occurred, please try again!'));
            }
        }
        $this->loadview('notify_class');
    }

    function notifyStudent(){
        $student_id = $this->uri->segment(3);
        $student_name = urldecode($this->uri->segment(4));
        $this->addViewData('student_id', $student_id);
        $this->addViewData('student_name', $student_name);
        $this->addViewData('tab_menu', 'notifyStudent');
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            if ($this->notification_persistance->notifyStudent()) {
                $this->addViewData('success', array('Notification sent!'));
            } else {
                $this->addViewData('error', array('An error occurred, please try again!'));
            }
        }
        $this->loadview('notify_student');
    }
}