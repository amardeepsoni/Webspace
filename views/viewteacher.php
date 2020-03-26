<div class="container">
    <br>
    <h3 style="padding: 10px;"><u>Teachers List:</u></h3><br>
    <?php if ($teacher_list) {
        $count = 1;
    ?>
        <div class="" style="margin-top: 20px; ">

            <div class="col-md-10 boarder">
                <table class=" mt-2 p-2 table table-hover" style="text-align: center;  overflow: scroll;">
                    <tr style="text-align: center;">
                        <th scope="col" style="text-align: center;">S. No.</th>
                        <th scope="col" style="text-align: center;">Teacher Name</th>
                        <th scope="col" style="text-align: center;">Contact</th>
                        <th scope="col" style="text-align: center;">Email Address</th>
                        <th scope="col" style="text-align: center;">Gender</th>
                        <th scope="col" style="text-align: center;">Type</th>
                    </tr>
                    <?php foreach ($teacher_list as $teacher) { ?>
                        <tr>
                            <td scope="row"><?php echo $count++; ?></td>
                            <td><?php echo $teacher['name']; ?></td>
                            <td><?php echo $teacher['contact']; ?></td>
                            <td><?php echo $teacher['email']; ?></td>
                            <td><?php echo $teacher['gender']; ?></td>
                            <td><?php echo $teacher['type']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    <?php } else {
        echo '<h3>Add some records at <a href="' . base_url() . 'addteacher"><u> Teacher list</u></a></h3>';
    } ?>
</div>