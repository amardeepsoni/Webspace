<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
    <style>
        body {
            font-family: "Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size: 15px;
        }
        form {
            display: block;
            margin-top: 0em;
            text-align:center;
        }
    </style>
    <script>
        function copy_to_clipboard_email()
        {
            document.getElementById('outputEmail').select();
            document.execCommand('copy');
        }
        function copy_to_clipboard_mobile()
        {
            document.getElementById('outputMobile').select();
            document.execCommand('copy');
        }
    </script>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" name="form" id="form" method="post" enctype="multipart/form-data">           
        <div class="row">
            <div class="col-xs-12 col-md-4 col-lg-3">
                <label for="field_text"><strong>Input data<strong></label>
            </div>
            <div class="col-xs-12 col-md-8 col-lg-9">
                <textarea class="lookafter constheight" id="field_text" name="form_text" style="width:50%;height:200px"></textarea>
                <br>
                <button name="btnSubmit" type="submit">Submit</button>
            </div>
        </div>
		<div class="row">
            <div class="col-xs-12 col-md-4 col-lg-3">
                <br><label for="output"><strong>Output<strong></label>
            </div>
			<div class="col-xs-12 col-md-8 col-lg-9">
                <textarea id="outputEmail" name="out" readonly="readonly" style="width:25%;height:200px">
                <?php
                    if(isset($_POST["btnSubmit"])){
                        $string = $_POST["form_text"];
                        $pattern = '/[a-z0-9_\-\+]+@[a-z0-9\-]+\.([a-z]{2,3})(?:\.[a-z]{2})?/i';
                        preg_match_all($pattern, $string, $matches);
                        echo implode("\n",$matches[0]);
                    }
                ?>
                </textarea>
                <textarea id="outputMobile" name="out" readonly="readonly" style="width:25%;height:200px">
                <?php
                    if(isset($_POST["btnSubmit"])){
                        $string = $_POST["form_text"];
                        $no = '([7,8,9][0-9]{9})';
                        preg_match_all($no, $string, $matching);
                        echo implode("\n",$matching[0]);
                    }
                ?>
                </textarea> 
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-8 col-lg-9">
                <input type="button" value="Copy Email" onclick="copy_to_clipboard_email();">
                <input type="button" value="Copy Mobile" onclick="copy_to_clipboard_mobile();">
            </div>
        </div>   
    </form>
</body>
</html>