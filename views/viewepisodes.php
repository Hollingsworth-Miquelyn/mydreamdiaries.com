<?php

foreach ($episodes as $episode) { ?>
    <p><?php echo $episode["title"]; ?></p>
    <a href="/?action=editepisode&id=<?php echo $episode['id'];?>">Edit Episode</a>
    <a href="/?action=deleteepisode&id=<?php echo $episode['id'];?>">Delete Episode</a><br>
        
<?php
}
?>