<?php

?>

<div id="editepisode">
    <form action="/?action=editepisodessubmit" method="POST" id="editepisodeform">
        <input type="hidden" name="id" id="actiontype" value="<?php echo $episode["id"];?>" />
        <fieldset>
            <legend>Edit Episode</legend>
            <p>Please choose what type this episode belongs in:</p>
            <select name="type" id="type">
                <option value="Grower" <?php if ($episode["type"] == 'Grower') echo 'selected';?>>Grower</option>
                <option value="Pirate" <?php if ($episode["type"] == 'Pirate') echo 'selected';?>>Pirate</option>
            </select><br><br>
            
            Title: <input type="text" name="title" id="title" value="<?php echo $episode["title"]; ?>"/><br />
            <p>Episode Text:</p>
            <textarea name="episode" id="episode" rows="30" cols="80" required><?php echo $episode["episode"]; ?></textarea>
            <!--when text displays, new paragraphs are not displayed.-->
            <input type="submit" name="Submit" value="Post" />
        </fieldset>        
    </form>
</div>
