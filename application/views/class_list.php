<div class="sidebar_content">
    <table cellpadding="0" cellspacing="0" width="100%" class="sortable">
        <thead>
        <tr>
            <th style="border-left: 1px solid; border-left-color: #dddddd;">Class Name</th>
            <th>Section</th>
            <th>Total Student</th>
            <th>Date created</th>
            <th class="delete">Action</th>
        </tr>
        </thead>

        <tbody>
        <?php if (isset($classes)) { foreach ($classes as $key => $value) { ?>
        <tr>
            <td style="border-left: 1px solid; border-left-color: #dddddd;"><?php echo $value['class'] ?></td>
            <td><?php echo $value['section'] ?></td>
            <td><?php echo $value['total_student'] ?></td>
            <td><?php echo date("F j, Y", $value['created']); ?></td>
            <td class="delete"><a href="#">Send Notification</a></td>
        </tr>
        <?php } } ?>
        </tbody>

    </table>
</div>        <!-- .sidebar_content ends -->
