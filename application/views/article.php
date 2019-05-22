<form action="?c=crawler&a=saveArticle" method="post">
    <!-- Post URL to save data into database. -->
    <input type="hidden" name="url" value="<?php echo $url; ?>">
    <input type="submit" name="save" value="Save Article To Database">
</form>
<div>
    <h1 id="title">
        <?php echo $title; ?>
    </h1>
    <p id="time">
        <?php echo $time; ?>
    </p>
    <p id="content">
        <?php echo $content; ?>
    </p>
</div>