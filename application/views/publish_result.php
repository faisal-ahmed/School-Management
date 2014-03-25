<div class="sidebar_content">
    <?php include_once 'error.php'; ?>
    <?php echo form_open_multipart('resultManagement/publishResult'); ?>

    <p>
        <label>Class:</label> <br/>
        <select class="styled" name="class" value="<?php echo set_value('class'); ?>">
            <?php foreach ($class as $key => $value) { ?>
                <option value="<?php echo $value ?>"><?php echo $value ?></option><?php } ?>
        </select>
    </p>

    <p>
        <label>Section:</label> <br/>
        <input type="text" name="section" value="<?php echo set_value('section'); ?>" class="text"/>
    </p>

    <p>
        <input type="submit" class="submit long" value="Publish Result"/>
    </p>
    <?php echo form_close() ?>
    <hr/>
</div>        <!-- .sidebar_content ends -->