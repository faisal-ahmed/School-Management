<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Victoryland
 * Date: 3/22/14
 * Time: 4:19 PM
 * To change this template use File | Settings | File Templates.
 */

require_once 'controller_helper.php';

class resultManagement extends controller_helper
{
    function __construct()
    {
        parent::__construct();
        $this->checkLogin();
        $this->addViewData('username', $this->getSessionAttr('username'));
        $this->addViewData('active_menu', 'result');
        $this->load->model('result_persistance');
    }

    function index()
    {
        redirect('resultManagement/addResult', 'refresh');
    }

    function addResult()
    {
        $this->addViewData('tab_menu', 'addResult');
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            if ($result = $this->result_persistance->addNewResult()) {
                $this->addViewData('success', array('Results have been added successfully! Please visit reports to see ignored results.'));
            } else {
                $this->addViewData('error', array('File does not exist or cannot be opened'));
            }
        }
        $this->loadview('add_result');
    }

    function uploadReport()
    {
        $this->addViewData('tab_menu', 'uploadReport');
        $this->loadview('upload_report');
    }

    function publishResult()
    {
        $this->addViewData('tab_menu', 'publishResult');
        $this->addViewData('class', array('One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'SSC', 'Eleven', 'Twelve', 'HSC'));
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->form_validation->set_rules('section', 'Section', 'required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $this->addViewData('error', array('Section is required to publish the result'));
            } else if ($result = $this->result_persistance->publishResult()) {
                $this->addViewData('success', array('All the results have been published successfully.'));
            } else {
                $this->addViewData('error', array($result));
            }
        }
        $this->loadview('publish_result');
    }

    function downloadSampleResult()
    {
        $this->load->helper('download');
        $data = file_get_contents(base_url() . 'static/sample_result.csv'); // Read the file's contents
        $name = date("Y-m-d_H.i.s_") . 'sample_result.csv';

        force_download($name, $data);
        exit();
    }
}