<div id="page-content-wrapper">
    <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
    <div class="page-title section nobg">
        <div class="container-fluid">
            <div class="clearfix">
            </div>
        </div>
        <!-- end Menu -->
    </div>
    <!-- end-->
</div>
<!-- Section for main Content -->
<!-- <i class="fas fa-cogs"></i> -->
<div class="section">
    <div class="container-fluid">
        <div class="row">
            <label> You have selected the following slots for Round 2:</label>
        </div>
        <div class="row">
            <table>
                <th>Date</th>
                <th>Start</th>
                <th>End</th>
                <th>Number of students</th>

                <?php foreach ($selectedslots as $slot) { ?>
                    <tr>
                        <td><?php echo $slot->date ?></td>
                        <td><?php echo $slot->start ?></td>
                        <td><?php echo $slot->end ?></td>
                        <td><?php echo $slot->regcount ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

    </div>
</div>