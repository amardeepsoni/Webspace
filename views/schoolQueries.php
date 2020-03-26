<style>
    table {
        width: 100%;
        border: none;
    }

    td {
        text-align: left;
        /*color: white !important; *!*/
        font-size: 15px;
        font-size: 800;
        border: none;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .dataTables_filter {
        margin: 2%;
    }

    img {
        height: 20px;
        width: 20px;
    }

    @media screen and (max-width:500px) {
        .modal-content {
            width: 350px;
        }
    }
</style>

<div id="page-content-wrapper">
    <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
    <!-- <div class="demo-parallax parallax section looking-photo nopadbot" data-stellar-background-ratio="0.5" style="background-image:url('<?php echo base_url(); ?>schoolassest/upload/demo_02.jpg');"> -->
    <div>
        <div class="page-title section nobg">
            <div class="container-fluid">
                <div class="clearfix">
                    <div class="title-area pull-left">
                        <h2> <?php echo $heading; ?> </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container-fluid">

        <table>
            <tr>
                <th>S.No</th>
                <th>Subject</th>
                <th>Queries</th>
                <th>Answer</th>
            </tr>
            <?php
            $i = 1;
            foreach ($queries as $query) {  ?>
            <tr>
                <td><?php echo  $i++ ?></td>
                <td><?php echo  $query->subject ?></td>
                <td><?php echo  $query->query ?></td>
                <td><?php echo  $query->answer ?></td>
            </tr>
            <?php } ?>
        </table>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" style="border-radius:3px !important;">Add Query</button>
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ask Question.</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form class="defaultform row" id="askForm" method="post" action="<?php echo $action ?>" target="mainIf">
                            <div class="form-group col-lg-12">
                                <label>Subject</label>
                                <input name="subject" required type="text" id="subject" class="form-control">
                                <label>Mobile No.(optional)</label>
                                <input name="mobile" type="number" id="mobile" class="form-control">
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Query</label>
                                <!-- <input name="query" required type="text" id="query"
                                    class="form-control"> -->
                                <textarea name="query" placeholder="Your Query" id="say" style="Width:100%"></textarea>
                            </div>
                            <div class="form-group col-lg-6">
                                <button type="button" onClick="onFormClick()" class="btn btn-primary">ADD</button>
                            </div>

                        </form>
                        <div style="display:none;">
                            <iframe id="mainIf"></iframe>
                            <form action="https://formspree.io/avinash@intellify.in" method="POST" id="emailQ">
                                <input type="text" name="School Name" value="<?php echo $name ?>">
                                <input type="email" name="email" value="<?php echo $email ?>">
                                <input type="text" id="qSub" name="Subject" value="">
                                <input type="text" id="qMob" name="Mobile" value="">
                                <input type="text" id="qQuery" name="Query" value="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    function onFormClick() {

        document.getElementById("qSub").value = document.getElementById("subject").value;
        document.getElementById("qMob").value = document.getElementById("mobile").value;
        document.getElementById("qQuery").value = document.getElementById("say").value;
        document.getElementById("emailQ").submit();
        document.getElementById("askForm").submit();
        // window.close();

    }
</script>