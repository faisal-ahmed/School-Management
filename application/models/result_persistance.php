<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Victoryland
 * Date: 3/26/14
 * Time: 12:49 AM
 * To change this template use File | Settings | File Templates.
 */

require_once 'model_helper.php';

class Result_persistance extends model_helper
{
    function __construct()
    {
        parent::__construct();
    }

    function publishResult()
    {
        $data = array(
            'class' => $this->getPost('class'),
            'section' => $this->getPost('section'),
        );
        $this->db->where('class', $data['class']);
        $this->db->where('section', $data['section']);
        if ($this->db->count_all_results('class') == 0) {
            return 'Class or section doesn\' exist!';
        }

        //TODO: Selects all results with that class_id and send sms here

        return true;
    }

    function addNewResult()
    {
        $fileName = $this->getPost('uploaded_file_name');
        if (!($fp = fopen(base_url() . 'uploads/' . $fileName, 'r'))){
            return false;
        }
        $data = array();

        $resultsIgnored = array();
        $column = array();
        $count = 0;
        while ($csv_line = fgetcsv($fp)) {
            if ($count++ == 0) {
                for ($i = 0, $j = count($csv_line); $i < $j; $i++) {
                    $string = trim($csv_line[$i]);
                    $string = str_replace(' ', '_', strtolower($string));
                    $column[] = $string;
                }
                $resultsIgnored[] = $column;
            } else {
                $temp = array();
                for ($i = 0, $j = count($csv_line); $i < $j; $i++) {
                    $temp[$column[$i]] = trim($csv_line[$i]);
                }
                $data[] = $temp;
            }
        }

        fclose($fp);

        foreach ($data as $key => $result) {
            $this->db->select('*');
            $this->db->from('student');
            $this->db->join('class', 'student.class_id = class.class_id', 'left');
            $this->db->where('student.student_name', $result['student_name']);
            $this->db->where('student.student_roll', $result['student_roll']);
            $this->db->where('class.class', $result['class']);
            $this->db->where('class.section', $result['section']);
            $classes = $this->db->get();

            if ($classes->result()) {
                foreach ($classes->result() as $key2 => $value) {
                    $resultPacket = array(
                        'student_id' => $value->student_id,
                        'subject' => $result['subject'],
                        'total_marks' => $result['total_marks'],
                        'exam' => $result['exam'],
                        'objective' => $result['objective'],
                        'subjective' => $result['subjective'],
                        'practical' => $result['practical'],
                    );

                    $this->db->insert('result', $resultPacket);
                }
            } else {
                $resultsIgnored[] = $result;
            }
        }

        if (count($resultsIgnored) > 1) {
            $this->array_to_csv_report_file($resultsIgnored);
        }

        return true;
    }

    public function array_to_csv_report_file(array $data){
        $report_file_name = "ignored_results.csv";
        if (count($data) == 0) {
            return;
        }

        $csv = '';
        $csv_handler = fopen ( dirname(__FILE__) . '/../../static/' . $report_file_name, 'w');
        foreach ($data as $key => $value){
            $count = 0;
            foreach ($value as $key1 => $value1){
                $value1 = '"' . $value1 . '"';
                if (!$count) $csv .= $value1;
                else $csv .= ",$value1";
                $count++;
            }
            $csv .= "\n";
        }

        fwrite ($csv_handler, $csv);
        fclose ($csv_handler);
    }
}