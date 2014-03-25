<div class="sidebar_content">
    <table cellpadding="0" cellspacing="0" width="100%" class="sortable">
        <thead>
        <tr>
            <th style="width: 200px;border-left: 1px solid; border-left-color: #dddddd;">Student Name</th>
            <th>Class</th>
            <th>Section</th>
            <th>Roll</th>
            <th>Student's Mobile</th>
            <th>Parent's Mobile</th>
            <th>Date created</th>
            <th class="delete">Action</th>
        </tr>
        </thead>

        <tbody>
        <?php if (isset($students)) { foreach ($students as $key => $value) { ?>
            <tr>
                <td style="border-left: 1px solid; border-left-color: #dddddd;"><a href="<?php echo base_url() ?>index.php/studentManagement/studentProfile/<?php echo $value['student_id'] ?>"><?php echo $value['student_name'] ?></a></td>
                <td><?php echo $value['class'] ?></td>
                <td><?php echo $value['section'] ?></td>
                <td><?php echo $value['student_roll'] ?></td>
                <td><?php echo $value['students_mobile'] ?></td>
                <td><?php echo $value['parents_mobile'] ?></td>
                <td><?php echo date("F j, Y", $value['student_created']); ?></td>
                <td class="delete"><a href="#">Send Notification</a></td>
            </tr>
        <?php } } ?>
        </tbody>

    </table>
    <?php echo $pagination; ?>
</div>        <!-- .sidebar_content ends -->
