<h3 style="text-align:center"> The Number of students qualified per school for level <?= $level?> are:  </h3>
<table style="margin:10%;">
    
    <th>School</th>
    <th>Registration Number</th>
    <th>Count</th>
    
    
<?php foreach($remarks as $remark) { ?>
    <tr>
        <td>
            <?= $remark->name;?>
        </td>
        <td>
            <?= $remark->category_id;?>
        </td>
        <td>
            <?= $remark->count ?>

        </td>
    </tr>
<?php } ?>

</table>
