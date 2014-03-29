<div class="sidebar_content">
    <?php include_once 'error.php'; ?>
    <?php echo form_open_multipart('user/updateProfile'); ?>
    <p>
        <label>Current Password:</label> <br/>
        <input type="password" name="current_password" class="text"/>
    </p>

    <p>
        <label>Choose New Password:</label> <br/>
        <input type="password" name="new_password" class="text"/>
    </p>

    <input type="hidden" name="user_id" value="<?php echo $user_id ?>" class="text"/>

    <p>
        <label>Choose New Username:</label> <br/>
        <input type="text" name="username" class="text"/>
    </p>

    <p>
        <input type="submit" class="submit" value="Login"/>
    </p>
    <?php echo form_close() ?>
    <hr/>
</div>        <!-- .sidebar_content ends -->