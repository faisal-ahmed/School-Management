<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Victoryland
 * Date: 3/22/14
 * Time: 4:18 PM
 * To change this template use File | Settings | File Templates.
 */

require_once 'controller_helper.php';

class classmanagement extends controller_helper{
    function __construct() {
        parent::__construct();
        $this->checkLogin();
        $this->addViewData('username', $this->getSessionAttr('username'));
        $this->addViewData('active_menu', 'class');
        $this->load->model('class_persistance');
    }

    function index(){
        redirect('classManagement/addClass', 'refresh');
    }

    function addClass(){
        $this->addViewData('tab_menu', 'addClass');
        $this->addViewData('class', array('One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'SSC', 'Eleven', 'Twelve', 'HSC'));
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->form_validation->set_rules('section', 'Section', 'required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $this->addViewData('error', array('Section is required to create a class'));
            } else if ($this->class_persistance->createClass()) {
                $this->addViewData('success', array('A class has been created successfully.'));
            } else {
                $this->addViewData('error', array('A class already exist with that name and section!'));
            }
        }
        $this->loadview('add_class');
    }

    function classList(){
        $this->addViewData('tab_menu', 'classList');
        $this->addViewData('classes', $this->class_persistance->classList());
        $this->loadview('class_list');
    }
}