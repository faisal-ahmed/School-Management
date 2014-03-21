<div class="block withsidebar">

    <div class="block_head">
        <div class="bheadl"></div>
        <div class="bheadr"></div>

        <h2><?php echo $active_menu ?></h2>

        <?php if ($active_menu == 'class') { ?>
        <ul>
            <li><a href="#">Add Class</a></li>
            <li><a href="#">Class List</a></li>
        </ul>
        <?php } else if ($active_menu == 'student') { ?>
            <ul>
                <li><a href="#">Add Student</a></li>
                <li><a href="#">Student List</a></li>
            </ul>
        <?php } else if ($active_menu == 'result') { ?>
        <ul>
            <li><a href="#">Add Result</a></li>
            <li><a href="#">Current Results</a></li>
            <li><a href="#">Publish Result (SMS)</a></li>
        </ul>
        <?php } else if ($active_menu == 'notification') { ?>
        <ul>
            <li><a href="#">Notify Class</a></li>
            <li><a href="#">Notify Student</a></li>
        </ul>
        <?php } ?>

    </div>
    <!-- .block_head ends -->

    <div class="block_content">