    <div class="container body">
        <div class="main_container">
            <?php $this->load->view(adminpath . '/sidebar') ?>
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <?php
                                if ($this->session->flashdata('uploadSuccess'))
                                    echo '<div class="alert alert-success">' . $this->session->flashdata('uploadSuccess') . ' </div>';
                                else if ($this->session->flashdata('uploadFail'))
                                    echo '<div class="alert alert-danger">' . $this->session->flashdata('uploadFail') . ' </div>';
                                if ($this->session->flashdata('deleteSuccess'))
                                    echo '<div class="alert alert-success">' . $this->session->flashdata('deleteSuccess') . ' </div>';
                                else if ($this->session->flashdata('deleteFail'))
                                    echo '<div class="alert alert-danger">' . $this->session->flashdata('deleteFail') . ' </div>';
                                ?>
                                <div class="x_title">
                                    <table class="table table-dark" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>S.no</th>
                                                <th>Chapter Name</th>
                                                <th>Class</th>
                                                <th>Subject</th>
                                                <th>Category</th>
                                                <th>Content</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($studyMaterial as $item) { ?>
                                                <tr>
                                                    <td><?php echo $i++ ?></td>
                                                    <td><?php echo $item->chapter ?></td>
                                                    <td><?php echo $item->class ?></td>
                                                    <?php
                                                        if ($item->subject == 'Math') { ?>
                                                        <td>Math</td>
                                                    <?php } else if ($item->subject == 'Science') { ?>
                                                        <td>Science</td>
                                                    <?php } else { ?>
                                                        <td>Resources</td>
                                                    <?php } ?>
                                                    <td><?php echo $item->category ?></td>
                                                    <td style="display: flex;">
                                                        <?php if ($item->url != "") { ?>
                                                            <a class="btn btn-success" role="button" href="<?php echo $item->url ?>" download="">Download</a>
                                                        <?php } ?>
                                                        <?php if ($item->contentUrl != "") { ?>
                                                            <a class="btn btn-success" target="_blank" role="button" href="<?php echo $item->contentUrl ?>" download="">Go to link</a>
                                                        <?php } ?>

                                                        <form method="post" action="<?php echo base_url() . adminpath . '/StudyMaterial/delete' ?>">
                                                            <input type="hidden" name="id" value="<?php echo $item->id ?>">
                                                            <input type="hidden" name="url" value="<?php echo $item->url ?>">
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <button class="btn btn-info" data-toggle="modal" data-target="#myModal1">Upload</button>
                                    <div class="modal" id="myModal1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Upload New Item</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <form id="myform" method="post" enctype="multipart/form-data" action="<?php echo base_url() . adminpath . '/StudyMaterial/upload' ?>">
                                                        <div class="form-group col-lg-12">
                                                            <label>Chapter Name</label>
                                                            <input id="name" name="chapter" required type="text" class="form-control" />
                                                        </div>
                                                        <div class="form-group col-lg-12">
                                                            <label>Class</label>
                                                            <select name="class" required>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
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
                                                        <div class="form-group col-lg-12">
                                                            <label>Subject</label>
                                                            <select name="subject" required>
                                                                <option value="Math">Math</option>
                                                                <option value="Science">Science</option>
                                                                <option value="Resources">Resources</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-lg-12">
                                                            <label>Category</label>
                                                            <select name="category" required>
                                                                <option value="Study Material">Study Material</option>
                                                                <option value="Critical Thinking">Critical Thinking</option>
                                                                <option value="Resources">Resources</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-lg-12">
                                                            <input id="upfile" class='custom-file-input' type='file' required name='file' />
                                                        </div>
                                                        <div class="form-group col-lg-12">
                                                            <label>Resource Url</label>
                                                            <input id="ResUrl" name="contentUrl" type="text" class="form-control" />
                                                        </div>


                                                <div class="form-group col-lg-12">
                                                    <button class="btn btn-info" type="button" onclick="subm()">Submit</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /page content -->

    </div>
    </div>

    <script>
        function subm() {
            console.log("Submit called");
            var a = document.getElementById('ResUrl').value != "";
            var b = document.getElementById('upfile').value != "";
            var isNameEntered = document.getElementById('name').value != "";
            console.log(a);
            console.log(b);
            if (!isNameEntered) {
                window.alert("Please enter Chapter name");
            } else
            if (a || b) {
                console.log("it worksl");
                document.getElementById('myform').submit();
                console.log("it works");

            } else {
                window.alert("Please input atleast one of the two");
            }

        }
    </script>