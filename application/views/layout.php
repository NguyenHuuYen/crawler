<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crawler Utility</title>
    <style>
        h2       {color: red;}
        #title   {font-weight: bold;}
        #time    {font-style: italic;}
        h1, h2, form {text-align: center;}
        div      {width: 1000px; margin: auto;}
        #content {
            text-indent: 20px;
            text-align: justify;
        }
        input[type="text"] {
            width: 600px;
            padding: 10px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>Crawler Utility Tool</h1>
    <!-- Print article after submit. -->
    <form action="?c=crawler&a=printArticle" method="post">
        <input type="text" name="url" id="url" value="<?php echo (isset($_POST['url'])) ? $_POST['url'] : ''; ?>" placeholder="Paste your URL"><br><br>
        <input type="submit" name="submit" onclick="change()" value="Submit">
    </form>
    <br><hr>

    <!-- Echo pages which function views direct to here. -->
    <?php echo $content; ?>

</body>
</html>