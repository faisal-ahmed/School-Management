<div class="block small center login">
    <div class="block_head">
        <div class="bheadl"></div>
        <div class="bheadr"></div>
        <h2>PTH Coaching Center</h2>
    </div>
    <!-- .block_head ends -->
    <div class="block_content">
        <?php if (isset($info)) { ?>
            <div class="message info"><p><?php echo $info ?></p></div><?php } ?>
        <?php if (isset($error)) { ?>
            <div class="message errormsg"><p><?php echo $error ?></p></div><?php } ?>
        <?php if (isset($warning)) { ?>
            <div class="message warning"><p><?php echo $warning ?></p></div><?php } ?>
        <?php echo form_open_multipart('user'); ?>
        <p>
            <label>Username:</label> <br/>
            <input type="text" name="username" class="text"/>
        </p>

        <p>
            <label>Password:</label> <br/>
            <input type="password" name="password" class="text"/>
        </p>

        <p>
            <input type="submit" class="submit" value="Login"/><!-- &nbsp;
            <input type="checkbox" class="checkbox" checked="checked" id="rememberme"/> <label for="rememberme">Remember
                me</label>-->
        </p>
        </form>
    </div>
    <!-- .block_content ends -->
    <div class="bendl"></div>
    <div class="bendr"></div>
</div>        <!-- .login ends -->
