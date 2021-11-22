<?php include('header.php'); ?>

<div class="container justify-content-center//">
    <h2 class="text-center">Result</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <h3 class="col-md-12"> Email Id  : <span id="email_id" class="text-warning"></span></h3>
                <h3 class="col-md-12"> Mobile No : <span id="mobile_number" class="text-warning"></span></h3>
                <h3 class="col-md-12"> Time : <span id="last_achieved_time" class="text-warning"></span></h3>
                <h3 class="col-md-12">Score : <span id="score" class="text-warning"></span></h3>
                <h1 class="text-success display-1 text-center" id="winner"></h1>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>



<script>
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            datatype: "json",
            url: "<?= base_url(); ?>quiz/get_result/",
            success: function (response) {
                const data = JSON.parse(response);
                $('#email_id').html(data.email_id);
                $('#mobile_number').html(data.mobile_number);
                $('#last_achieved_time').html(data.last_achieved_time);
                $('#score').html(data.score);
                if(data.score == 10){
                    $('#winner').html("Winner");
                }
            }
        });
    });

    
</script>