<?php 
    $this->load->view('header');
?>

<div class="container justify-content-center//">
    <form method="POST" id="userForm">
        <h2>Registration </h2>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="first">Full Name</label>
                    <input type="text" class="form-control" placeholder=""  name="user_name" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="first">Email</label>
                    <input type="email" class="form-control" placeholder="" name="email_id" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="first">Mobile Number</label>
                    <input type="number" class="form-control" placeholder="" name="mobile_number" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Next</button> <br><br>
    </form>
</div>

<?php 
    $this->load->view('footer');
?>

<script type="text/javascript">
     /* Add data */
    /*Form Submit*/
    $("#userForm").submit(function(e) {
        var fd = new FormData(this);
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>quiz/add_user",
            type: "POST",
            data: fd,
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                const obj =JSON.parse(response);
                if (obj.error != '') {
                    alert(obj.error);
                } else {
                    if(obj.result == 'show_result'){
                        window.location.href="<?php echo base_url(); ?>quiz/result";
                    }else{
                        alert(obj.result);
                        window.location.href="<?php echo base_url(); ?>quiz/question";
                    }
                }
            }
        });
    });
</script>