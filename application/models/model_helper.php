<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Victoryland
 * Date: 3/22/14
 * Time: 1:56 AM
 * To change this template use File | Settings | File Templates.
 */

class model_helper  extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }

    function debug($debugArray){
        echo "<pre>";
        print_r($debugArray);
        echo "</pre>";
    }

    function getPost($attr) {
        $return = trim($this->input->get_post($attr, true));
        return $return;
    }

    function sendSMS($number, $text) {
        $link = "http://sms.bitbirds.com:8080/bulksms/bulksms?username=bts-codeheaven&password=code@hea&type=0&dlr=1&destination=$number&source=PTH&message=$text";
        try {
            /* initialize curl handle */
            $ch = curl_init();
            /* set url to send request */
            curl_setopt($ch, CURLOPT_URL, $link);
            /* allow redirects */
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            /* return a response into a variable */
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            /* times out after 30s */
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            /* set POST method */
/*            curl_setopt($ch, CURLOPT_POST, 1);*/
            /* execute the cURL */
            $response = curl_exec($ch);

            if (FALSE === $response) {
                throw new Exception(curl_error($ch), curl_errno($ch));
            }

            curl_close($ch);
        } catch (Exception $exception) {
            $response = $exception;
            echo 'Exception Message: ' . $exception->getMessage() . '<br/>';
            echo 'Exception Trace: ' . $exception->getTraceAsString();
        }

        echo "SMS Response Start";
        $this->debug($response);
    }
}