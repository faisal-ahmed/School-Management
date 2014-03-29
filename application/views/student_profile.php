<div class="sidebar_content">
    <hr/>
    <table cellpadding="0" cellspacing="0" width="100%">
        <tr class="even">
            <td><h3>Student Name: </h3></td>
            <td colspan="5"><?php echo $profile['student_info'][0]->student_name; ?></td>
        </tr>
        <tr class="odd">
            <td><h3>Student Roll: </h3></td>
            <td colspan="5"><?php echo $profile['student_info'][0]->student_roll; ?></td>
        </tr>
        <tr class="even">
            <td><h3>Student Mobile: </h3></td>
            <td colspan="5"><?php echo $profile['student_info'][0]->students_mobile; ?></td>
        </tr>
        <tr class="odd">
            <td><h3>Parents Mobile: </h3></td>
            <td colspan="5"><?php echo $profile['student_info'][0]->parents_mobile; ?></td>
        </tr>
        <tr class="even">
            <td><h3>Class: </h3></td>
            <td colspan="5"><?php echo $profile['student_info'][0]->class; ?></td>
        </tr>
        <tr class="odd">
            <td><h3>Section: </h3></td>
            <td colspan="5"><?php echo $profile['student_info'][0]->section; ?></td>
        </tr>
        <tr class="even">
            <td><h3>Student Created: </h3></td>
            <td colspan="5"><?php echo date("F j, Y", $profile['student_info'][0]->student_created); ?></td>
        </tr>
        <tr class="odd">
            <td>&nbsp;</td>
            <td colspan="5">&nbsp;</td>
        </tr>

        <tr class="even">
            <td><h3>Exam</h3></td>
            <td><h3>Subject</h3></td>
            <td><h3>Total Marks Achieved</h3></td>
            <td><h3>Objective</h3></td>
            <td><h3>Subjective</h3></td>
            <td><h3>Practical</h3></td>
        </tr>

        <?php foreach ($profile['result_info'] as $key => $value) { ?>
            <tr class="<?php if ($key % 2 != 0) { echo 'even'; } else { echo 'odd'; } ?>">
                <td><?php echo $value->exam ?></td>
                <td><?php echo $value->subject ?></td>
                <td><?php echo $value->total_marks ?></td>
                <td><?php echo $value->objective ?></td>
                <td><?php echo $value->subjective ?></td>
                <td><?php echo $value->practical ?></td>
            </tr>
        <?php } ?>

    </table>

    <hr/>
    <!--
        --><?php /*echo "<pre>"; print_r($profile); */?>
</div>        <!-- .sidebar_content ends -->
