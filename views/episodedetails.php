<?php

?>


<div class="episodes">
    <?php 
   
    if ($action == 'showepisode') {
        echo '<article class="episodes">';
        echo "<h1>{$episode["title"]}</h1>";
        echo html_entity_decode($episode["episode"]);
        echo '</article>';
        
    } else {
    foreach ($episodes as $episode) { 
       
        if ($action == 'newepisodesubmit' ) {?>
 
    <article class="episodes">
        <h1><?php echo $episode["title"]; ?></h1>
        <?php echo html_entity_decode($episode["episode"]); ?>
        
       
    </article>
    
    <?php } 
    }
    }
    ?>
</div>

