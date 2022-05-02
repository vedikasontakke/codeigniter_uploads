<?php echo $this->session->flashdata('success_msg'); ?>
<?php echo $this->session->flashdata('error_msg'); ?>
<form role="form" method="post" enctype="multipart/form-data">
    <div class="panel">
        <div class="panel-body">
            <div class="dsp form-group">
                <label>Member Profile Images</label>
                <input class="form-control" type="file" name="profile_img" />
            </div>
            <div class="dsp form-group">
                <label>Member Name</label>
                <input class="form-control" type="text" name="name" />
            </div>
            <div class="dsp form-group">
                <label>Member Email</label>
                <input class="form-control" type="text" name="email" />
            </div>
             <div class="dsp form-group">
                <input type="submit" class="btn btn-warning" name="membersubmit" value="Add">
            </div>
        </div>
    </div>
</form>
    