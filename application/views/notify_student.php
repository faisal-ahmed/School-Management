<div class="sidebar_content">
    <?php include_once 'error.php'; ?>
    <?php echo form_open_multipart('notificationManagement/notifyStudent'); ?>

    <input type="hidden" name="student_id" value="<?php echo $student_id; ?>"/>

    <p>
        <label>Student Name:</label> <br/>
        <input type="text" name="name" value="<?php echo $student_name; ?>" class="text" disabled="disabled"/>
    </p>

    <p>
        <label>Message:</label> <br/>
        <textarea rows="5" cols="50" name="message"></textarea>
    </p>

    <p>
        <input type="submit" class="submit long" value="Notify Student"/>
    </p>
    <?php echo form_close() ?>
    <hr/>
</div>        <!-- .sidebar_content ends -->