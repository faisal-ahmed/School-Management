<div class="sidebar_content">
    <?php include_once 'error.php'; ?>
    <?php echo form_open_multipart('studentManagement/addStudent'); ?>

    <p>
        <label>Student Name:</label> <br/>
        <input type="text" value="<?php echo set_value('student_name'); ?>" name="student_name" class="text"/>
    </p>

    <p>
        <label>Roll Number:</label> <br/>
        <input type="text" value="<?php echo set_value('student_roll'); ?>" name="student_roll" class="text"/>
    </p>

    <p>
        <label>Class:</label> <br/>
        <select class="styled" name="class">
            <?php foreach ($class as $key => $value) { ?>
                <option value="<?php echo $value ?>"><?php echo $value ?></option><?php } ?>
        </select>
    </p>

    <p>
        <label>Section:</label> <br/>
        <input type="text" value="<?php echo set_value('section'); ?>" name="section" class="text"/>
    </p>

    <p>
        <label>Student Mobile Number:</label> <br/>
        <input type="tel" pattern="[0-9]{7,13}" maxlength="13" value="<?php echo set_value('students_mobile'); ?>" name="students_mobile" class="text"/>
    </p>

    <p>
        <label>Parents Mobile Number:</label> <br/>
        <input type="tel" pattern="[0-9]{7,13}" maxlength="13" value="<?php echo set_value('parents_mobile'); ?>" name="parents_mobile" class="text"/>
    </p>

    <p>
        <input type="submit" class="submit long" value="Add Student"/>
    </p>
    <?php echo form_close() ?>
    <hr/>
</div>        <!-- .sidebar_content ends -->