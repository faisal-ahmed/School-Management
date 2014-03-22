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
    }

    function index(){
        redirect('classManagement/addClass', 'refresh');
    }

    function addClass(){
        $this->addViewData('tab_menu', 'addClass');
        $this->loadview('add_class');
    }

    function classList(){
        $this->addViewData('tab_menu', 'classList');
        $this->loadview('class_list');
    }
}