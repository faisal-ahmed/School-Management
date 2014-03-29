<div class="sidebar_content">
    <?php include_once 'error.php'; ?>
    <?php echo form_open_multipart('notificationManagement/notifyClass'); ?>

    <p>
        <label>Class:</label> <br/>
        <select class="styled" name="class" value="<?php echo $classSelected; ?>" disabled="disabled">
            <?php foreach ($class as $key => $value) { ?>
                <option value="<?php echo $value ?>" <?php if ($value == $classSelected) echo 'selected="selected"'; ?>><?php echo $value ?></option><?php } ?>
        </select>
    </p>

    <input type="hidden" name="class_id" value="<?php echo $class_id; ?>"/>

    <p>
        <label>Section:</label> <br/>
        <input type="text" name="section" value="<?php echo $sectionSelected; ?>" class="text" disabled="disabled"/>
    </p>

    <p>
        <label>Message:</label> <br/>
        <textarea rows="5" cols="50" name="message"></textarea>
    </p>

    <p>
        <input type="submit" class="submit long" value="Notify Class"/>
    </p>
    <?php echo form_close() ?>
    <hr/>
</div>        <!-- .sidebar_content ends -->