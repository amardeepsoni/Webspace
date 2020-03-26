<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<div class="container p-2">
    <h3>Add Quiz</h3>
    <div class="card bg-info text-white p-2 m-3">
        <h5>Create Quiz</h5>
        <form action="addquiz/setquiz" method="POST" class="form-inline p-2">
            <div class="input-group col-md-3 m-2">
                <select id="class" class="form-control" required name="class">
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>
            <div class="input-group col-md-3 m-2">
                <select id="class" class="custom-select" required name="board">
                    <option selected value="cbse">CBSE</option>
                    <option value="nscp">nscp</option>
                </select>
            </div>
            <div class="form-check mb-2 mr-sm-2">
                <input class="form-check-input" type="checkbox" id="inlineFormCheck" required>
                <label class="form-check-label" for="inlineFormCheck">
                    Check me
                </label>
            </div>

            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
        <div class="float-right" style="float: right;">
            <a href="<?php echo base_url(); ?>teacherlogin/dashboard" class="btn btn-danger float-right btn-lg">Back</a>
        </div>
    </div>
    <?php if (isset($this->session->flashdata('quiz_form')['q_id'])) {
    ?>
        <div class="card border-danger m-3">
            <form id="ajax-contact" action="addquiz/addquestion" method="POST">
                <div class="card-header">
                    <div class="form-group text-danger  ">
                        <p class="px-2 mx-3">Quiz &nbsp;<b class="px-2">#<?php echo $this->session->flashdata('quiz_form')['q_id'];  ?></b>
                            &nbsp;Class &nbsp;<b class="px-2">#<?php echo $this->session->flashdata('quiz_form')['class'];  ?></b>
                            Board &nbsp;<b class="px-2">#<?php echo $this->session->flashdata('quiz_form')['board'];  ?></b></p>
                        <input name="q_id" value="<?php echo $this->session->flashdata('quiz_form')['q_id'];  ?>" hidden>
                        <input name="type" value="<?php echo $this->session->flashdata('quiz_form')['board'];  ?>" hidden>
                        <label for="quizQuestion"> Question:</label>
                        <textarea class="form-control" id="quizQuestion" name="mcq_question" placeholder="Enter your question here!!" required aria-required="Eveter the Question" rows="3"></textarea>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class=" mb-3">
                            <label for="optionsInput">Options:</label>
                            <div class="input-group m-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="mcqOption">A</span>
                                </div>
                                <input type="text" class="form-control" id="optionsInputa" name="option_a" placeholder="Option A" aria-describedby="mcqOption" required>
                                <div class="invalid-tooltip">
                                    Please enter option text.
                                </div>
                            </div>
                            <div class="input-group m-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="mcqOption">B</span>
                                </div>
                                <input type="text" class="form-control" id="optionsInputb" name="option_b" placeholder="Option B" aria-describedby="mcqOption" required>
                                <div class="invalid-tooltip">
                                    Please enter option text.
                                </div>
                            </div>
                            <div class="input-group m-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="mcqOption">C</span>
                                </div>
                                <input type="text" class="form-control" id="optionsInputc" name="option_c" placeholder="Option C" aria-describedby="mcqOption" required>
                                <div class="invalid-tooltip">
                                    Please enter option text.
                                </div>
                            </div>
                            <div class="input-group m-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="mcqOption">D</span>
                                </div>
                                <input type="text" class="form-control" id="optionsInputd" name="option_d" placeholder="Option D" aria-describedby="mcqOption" required>
                                <div class="invalid-tooltip">
                                    Please enter option text.
                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="optionsInput">Solution:</label>
                    <div class="input-group col-md-3 m-2">
                        <select id="solution" class="form-control" name="solution">
                            <option selected>Select an option</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                            <option value="d">D</option>
                        </select>
                    </div>
                    <div class="input-group col-md-8 px-4 mx-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="mcqOption">Solution Link</span>
                        </div>
                        <input type="text" class="form-control" id="optionsInputd" name="solution_link" placeholder="Enter solution link if any" aria-describedby="mcqOption">
                        <div class="invalid-tooltip">
                            Please enter option text.
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <button class="btn btn-primary btn-lg" type="submit">Save</button>
                    <a href="<?php echo base_url(); ?>teacherlogin/dashboard" class="btn btn-danger btn-lg">Finish Quiz</a>
                </div>
            </form>
        </div>
    <?php
    } ?>
</div>
<script>
    $(function() {
        var form = $('#ajax-contact');
        $(form).submit(function(event) {
            event.preventDefault();
            var formData = $(form).serialize();
            // Submit the form using AJAX.
            $.ajax({
                    type: 'POST',
                    url: $(form).attr('action'),
                    data: formData
                })
                .done(function(response) {
                    // Clear the form.
                    $('#quizQuestion').val('');
                    $('#optionsInputa').val('');
                    $('#optionsInputb').val('');
                    $('#optionsInputc').val('');
                    $('#optionsInputd').val('');
                    $('#solution').val('');
                    swal({
                        icon: "success",
                        title: "Record added successfully!",
                        text: "Add next Question...",
                        type: "Success",
                        showConfirmButton: false,
                    })
                });
        });
    });
</script>