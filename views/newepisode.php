<?php
   
?>

<div id="newepisode">
    <form action="/?action=newepisodesubmit" method="POST" id="newepisodeform">
        <input type="hidden" name="actiontype" id="actiontype" value="" />
        <fieldset>
            <legend>Add a new episode</legend>
            <p>Please choose what type this episode belongs in:</p>
            <select name="type" id="type">
                <option value="Grower">Grower</option>
                <option value="Pirate">Pirate</option>
            </select><br><br>
            Title: <input type="text" name="title" id="title"/><br />
            <p>Episode Text:</p>
            <textarea name="episode" id="episode" rows="30" cols="80" required></textarea>
            <!--when text displays, new paragraphs are not displayed.-->
            <input type="submit" name="Submit" value="Post" />
        </fieldset>        
    </form>
</div>
