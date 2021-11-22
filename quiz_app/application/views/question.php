<?php 
    $this->load->view('header');
?>

<div class="container justify-content-center">
    <form method="POST" id="userForm">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <h2 class="question"></h2>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-check">
                    <input type="radio" class="form-check-input answer" name="answer" id="option_a" onclick="enable_next_btn()">
                  <label class="form-check-label" id="option1">
                  </label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input answer" name="answer" id="option_b" onclick="enable_next_btn()">
              <label class="form-check-label" id="option2">
              </label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input answer" name="answer" id="option_c" onclick="enable_next_btn()">
              <label class="form-check-label" id="option3">
              </label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input answer" name="answer" id="option_d" onclick="enable_next_btn()">
              <label class="form-check-label" id="option4">
              </label>
            </div>
            </div>
        </div>
        <button id="submit" class="btn btn-primary" disabled>Next</button> <br><br>
    </form>
</div>

<div id="show_score" class="show_score"></div>

<?php 
    $this->load->view('footer');
?>

<script type="text/javascript">
    let user_id = <?= $this->session->userdata('user_id'); ?>;

    var quizDB = '';
    
    function get_db(){
        $.ajax({
            type: "GET",
            datatype: "json",
            async:false,
            url: "<?= base_url(); ?>quiz/get_questions/",
            success: function (response) {
                    quizDB = JSON.parse(response);
                }
            });
        // console.log("End Get_DB()...");
    }
    window.onload = get_db();

    const question = document.querySelector('.question');
    const option1 = document.querySelector('#option1');
    const option2 = document.querySelector('#option2');
    const option3 = document.querySelector('#option3');
    const option4 = document.querySelector('#option4');
    const submit = document.querySelector('#submit');

    const answers = document.querySelector("input[name='answer']");

    let question_count = 0;
    let score=0;

    const load_question = () => {
        const question_list = quizDB[question_count];
        console.log(question_list);
        question.innerHTML = question_list.question;

        option1.innerHTML = question_list.option_a;
        option2.innerHTML = question_list.option_b;
        option3.innerHTML = question_list.option_c;
        option4.innerHTML = question_list.option_d;

        setTimeout(function() {
            ans_submit();
        }, 30000);
    }

    load_question();

    const get_selected_answer = () => {
        let selected_answer;
        $("input[name='answer']").each(function() {
            if(this.checked){
                selected_answer = this.id;
            }
        });
        $('#submit').attr('disabled',true);
        return selected_answer;
    };

    const deselect_all = () => {
        $("input[name='answer']").each(function() {
            this.checked = false;
        });
    }

    function enable_next_btn(){
         $('#submit').attr('disabled',false);
    }


    function ans_submit(){
        const checked_answer = get_selected_answer();

        if(checked_answer == quizDB[question_count].answer){
            score++;
        }

        question_count++;

        deselect_all();

        if(question_count < quizDB.length){
            load_question();
        }else{
            /* Add data */
            var data_to_send = JSON.stringify({
                'user_id': user_id,
                'score': score
            });
            $.ajax({
                url: "<?= base_url(); ?>quiz/answer/",
                type: "POST",
                data:data_to_send,
                contentType: false,
                cache: false,
                processData: false,
                success: function(JSON) {
                    //result
                    window.location.href="<?php echo base_url(); ?>quiz/result";
                }
            });
        }
    }
    
    submit.addEventListener('click', (e) => {
        e.preventDefault();
        ans_submit();
    });
</script>