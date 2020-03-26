helolo quiz id is : <?php echo $quizid ?>
<br>
qmcq is :<br>
<?php print_r($qMCQ[1]) ?>
<?php print_r($qMCQ[1]['qnstext']) ?>
<hr>
bhanu :::::::::::::::::::::::<?php print_r($qMCQ[1]['option']) ?>
<hr>
<?php foreach ($qMCQ[1]['option'] as $a) {
    echo $a['text'];
}
?>

<h1>testing</h1>

<?php foreach ($qMCQ as $question) {
    print_r($question);
    echo '<hr>';
    if (array_key_exists('option', $question)) {
        echo 'ayesha hai ';
        foreach ($question['option'] as $ayesha) {
            if ($ayesha) {
                echo 'ayesha aa gayi';
                print_r($ayesha);
                echo '<br>';
            }
        }
    }
    else    
        echo 'ayesha hai hi nahi <br>';
        
} ?>