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
    <div class=''>
        <div class="page-title section nobg">
            <div class="container-fluid">
                <div class="clearfix">
                    <div class="title-area pull-left">
                        <h2>Study Material</h2>
                    </div>
                    <!-- /.pull-right -->
                    <div class="pull-right hidden-xs">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url(); ?>schooldashboard/">Home</a></li>
                                <li class="active">Study Material</li>
                            </ol>
                        </div><!-- end bread -->
                    </div><!-- /.pull-right -->
                </div><!-- end clearfix -->
            </div><!-- end container -->
        </div><!-- end page-title -->
    </div><!-- end parallax -->
    <!-- </div>end page -->
</div>
<div class="section">
<div class="container-fluid" style="height:100%">
    <table class="table" id="myTable">
        <thead>
        <tr>
            <th>S.no</th>
            <th>Chapter Name</th>
            <th>Class</th>
            <th>Subject</th>
            <th>Action</th>
            <th>Additional Resources</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i=1;
        foreach ($studyMaterial as $item) { ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $item->chapter ?></td>
                <td><?php echo $item->class ?></td>
                <?php
                if($item->subject == 'Math') {?>
                    <td>Math</td>
                <?php } else if($item->subject == 'Science') { ?>
                    <td>Science</td>
                <?php } else { ?>
                    <td>Resources</td>
                <?php } ?>
                <td>
            <?php if ($item->url!="") { ?>
                <a class="btn btn-success" role="button" href="<?php echo $item->url ?>" download="">Download</a>
                <?php }?>
            </td>
            <td>
                <?php if ($item->contentUrl!="") { ?>
                <a class="btn btn-success" role="button" href="<?php echo $item->contentUrl ?>" target = "_blank">Go to link</a>
                <?php }?>

            
            </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


</div>
