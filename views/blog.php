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
       
        if ($action == 'blog' ) {?>
 
    <article>
        <h1><?php echo $episode["title"]; ?></h1>
        <?php echo html_entity_decode($episode["episode"]); ?>     
    </article>
    
    <?php } elseif ($action == 'pirateepisodes' || $action == 'growerepisodes') {?>
        <a href="/?action=showepisode&amp;id=<?php echo $episode['id'];?>"><?php echo $episode["title"]; ?></a><br>
        
        <!--link goes  blank page-->
        <?php
        
    }
    }
    }
    ?>
</div>

