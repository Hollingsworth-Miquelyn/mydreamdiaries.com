<?php
?>

<ul>
	<li><a href="/?action=myinfo">Update my info</a></li>
	<li><a href="/?action=blog">See new episodes</a></li>
</ul>


<?php if(LoggedInUserIsAdmin()) : ?>

	Admin Items:<br />
	<ul>
            <li><a href="/?action=newepisode">Add New Episode</a></li>
            <li><a href="/?action=viewallepisodes">Edit Episodes</a></li>
            <li><a href="/?action=editusers">Edit Users</a></li>
	</ul>

<?php endif; ?>
		