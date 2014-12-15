<?php
?>
<div class="episodes">
    <h1>Edit Episodes</h1>
    <?php
foreach ($episodes as $episode) { ?>
    <p><?php echo $episode["title"]; ?></p>
    <a href="/?action=editepisode&amp;id=<?php echo $episode['id'];?>">Edit Episode</a>
    <a href="/?action=deleteepisode&amp;id=<?php echo $episode['id'];?>">Delete Episode</a><br>
        
<?php
}
?>
</div>