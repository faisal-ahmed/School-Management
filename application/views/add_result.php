<div class="sidebar_content">
    <?php include_once 'error.php'; ?>
    <h1>Please download <a href="#" onclick="download_csv();">this</a> sample file to use for uploading the
        result. You must use the exact format of the sample file. Be informed that if any student could not be found in
        the database then the result for that student will be ignored.</h1> <br/><br/>
    <?php echo form_open_multipart('resultManagement/addResult', array('onsubmit' => "return confirm_update();")); ?>

    <p class="fileupload">
        <label>Student's Result:</label> <br/>
        <input type="file" id="fileupload"/>
        <span id="uploadmsg">Max file size depends on your server uploading configuration.</span>
    </p>

    <p>
        <input type="hidden" value="<?php echo base_url(); ?>" id="base_url" name="base_url"/>
        <input type="hidden" value="" id="uploaded_file_name" name="uploaded_file_name"/>
        <input type="submit" class="submit long" value="Upload Result"/>
    </p>
    <?php echo form_close() ?>
    <hr />
</div>        <!-- .sidebar_content ends -->
<script type="text/javascript">
    function confirm_update() {
        return confirm("Are you sure you want to upload the result?");
    }

    function download_csv() {
        var file_download = $.post("", {}, function (data) {
            var iframe = document.getElementById("download-container");
            if (iframe === null) {
                iframe = document.createElement('iframe');
                iframe.id = "download-container";
                iframe.style.visibility = 'hidden';
                document.body.appendChild(iframe);
            }
            iframe.src = "<?php echo base_url() . "index.php/resultManagement/downloadSampleResult" ?>";
        });
    }
</script>