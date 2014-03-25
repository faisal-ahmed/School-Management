<div class="sidebar_content">
    <table cellpadding="0" cellspacing="0" width="100%" class="sortable">
        <thead>
        <tr>
            <th width="10"><input disabled="disabled" type="checkbox" class="check_all" /></th>
            <th>Class Name</th>
            <th>Section</th>
            <th>Total Student</th>
            <th>Date created</th>
        </tr>
        </thead>

        <tbody>
        <?php if (isset($classes)) { foreach ($classes as $key => $value) { ?>
        <tr>
            <td><input disabled="disabled" type="checkbox" /></td>
            <td><?php echo $value['class'] ?></td>
            <td><?php echo $value['section'] ?></td>
            <td><?php echo $value['total_student'] ?></td>
            <td><?php echo date("F j, Y", $value['created']); ?></td>
        </tr>
        <?php } } ?>
        </tbody>

    </table>
</div>        <!-- .sidebar_content ends -->
