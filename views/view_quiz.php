<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php

    if (isset($this->session->flashdata('register')['flag'])) {
        if ($this->session->flashdata('register')['flag'] == 1) {
            echo '<script type="text/javascript"> swal({
           icon : "success",
            title: "' . $this->session->flashdata('register')['message'] . '", 
            text: "' . $this->session->flashdata('register')['message'] . '",           
            type:"Success",
            showConfirmButton: false,
            })
        </script>';
        } else  if ($this->session->flashdata('register')['flag'] == 0) {
            echo '<script type="text/javascript"> swal({
           icon : "error",
            title: "' . $this->session->flashdata('register')['message'] . '",
            text: "' . $this->session->flashdata('register')['message'] . '",           
            type:"error",
            showConfirmButton: false,
            })
        </script>';
        }
    }
    ?>
</head>
<div class="container p-2">
    <h3>Add Quiz</h3>
    <div id="form-messages" class="error">Form data</div>
    <div class="card">
        <form id="ajax-contact" action="addquiz/addquestion" method="POST">
            <div class="card-header">
                <div class="form-group">
                    <label for="quizQuestion"> Question:</label>
                    <textarea class="form-control" id="quizQuestion" disabled value="mcq_question" placeholder="Enter your question here!!" required aria-required="Eveter the Question" rows="3"></textarea>
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
                            <input type="text" class="form-control" id="optionsInput" disabled value="option_a" placeholder="Option A" aria-describedby="mcqOption" required>
                            <div class="invalid-tooltip">
                                Please enter option text.
                            </div>
                        </div>
                        <div class="input-group m-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="mcqOption">B</span>
                            </div>
                            <input type="text" class="form-control" id="optionsInput" disabled value="option_b" placeholder="Option B" aria-describedby="mcqOption" required>
                            <div class="invalid-tooltip">
                                Please enter option text.
                            </div>
                        </div>
                        <div class="input-group m-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="mcqOption">C</span>
                            </div>
                            <input type="text" class="form-control" id="optionsInput" disabled value="option_c" placeholder="Option C" aria-describedby="mcqOption" required>
                            <div class="invalid-tooltip">
                                Please enter option text.
                            </div>
                        </div>
                        <div class="input-group m-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="mcqOption">D</span>
                            </div>
                            <input type="text" class="form-control" id="optionsInput" disabled value="option_d" placeholder="Option D" aria-describedby="mcqOption" required>
                            <div class="invalid-tooltip">
                                Please enter option text.
                            </div>
                        </div>
                    </div>
                </div>
                <label for="optionsInput">Solution:</label>
                <div class="input-group col-md-3 m-2">
                    <select class="custom-select" disabled value="solution">
                        <option selected>Select an option</option>
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary btn-lg" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>