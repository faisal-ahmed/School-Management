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
        $this->addViewData('username', $this->getSessionAttr('username'));
        $this->addViewData('active_menu', 'notification');
    }

    function index(){
        redirect('notificationManagement/notifyClass', 'refresh');
    }

    function notifyClass(){
        $this->addViewData('tab_menu', 'notifyClass');
        $this->loadview('notify_class');
    }

    function notifyStudent(){
        $this->addViewData('tab_menu', 'notifyStudent');
        $this->loadview('notify_student');
    }
}