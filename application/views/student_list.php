<div class="sidebar_content">
    <table cellpadding="0" cellspacing="0" width="100%" class="sortable">
        <thead>
        <tr>
            <th width="10"><input disabled="disabled" type="checkbox" class="check_all" /></th>
            <th style="width: 200px;">Student Name</th>
            <th>Class</th>
            <th>Section</th>
            <th>Roll</th>
            <th>Student's Mobile</th>
            <th>Parent's Mobile</th>
            <th>Date created</th>
        </tr>
        </thead>

        <tbody>
        <?php if (isset($students)) { foreach ($students as $key => $value) { ?>
            <tr>
                <td><input disabled="disabled" type="checkbox" /></td>
                <td><?php echo $value['student_name'] ?></td>
                <td><?php echo $value['class'] ?></td>
                <td><?php echo $value['section'] ?></td>
                <td><?php echo $value['student_roll'] ?></td>
                <td><?php echo $value['students_mobile'] ?></td>
                <td><?php echo $value['parents_mobile'] ?></td>
                <td><?php echo date("F j, Y", $value['student_created']); ?></td>
            </tr>
        <?php } } ?>
        </tbody>

    </table>
    <?php echo $pagination; ?>
</div>        <!-- .sidebar_content ends -->
