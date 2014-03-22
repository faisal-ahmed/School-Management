<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Victoryland
 * Date: 3/22/14
 * Time: 4:19 PM
 * To change this template use File | Settings | File Templates.
 */

require_once 'controller_helper.php';

class resultManagement extends controller_helper{
    function __construct() {
        parent::__construct();
        $this->checkLogin();
        $this->addViewData('username', $this->getSessionAttr('username'));
        $this->addViewData('active_menu', 'result');
    }

    function index(){
        redirect('resultManagement/addResult', 'refresh');
    }

    function addResult(){
        $this->addViewData('tab_menu', 'addResult');
        $this->loadview('add_result');
    }

    function searchResult(){
        $this->addViewData('tab_menu', 'searchResult');
        $this->loadview('search_result');
    }

    function publishResult(){
        $this->addViewData('tab_menu', 'publishResult');
        $this->loadview('publish_result');
    }
}