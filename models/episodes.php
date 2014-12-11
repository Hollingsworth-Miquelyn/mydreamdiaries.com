<?php
/// Deletes an item from the database.
/// $itemId - The Id of the item to delete.
function DeleteItem($itemId)
{ 
	if ($itemId)
	{echo 2;
		$query = "DELETE FROM episodes WHERE ID=:id";
		$result = DbExecute($query, array(':id' => $itemId));
	}
}

// Save a new Episode
// $type - the type of the episode - Grower or Pirate
// $title - the title of the episode.
// $episode - the episode text.
function addNewEpisode($type, $title, $episode)
{
       	$query = "INSERT INTO episodes VALUES (null, :type, :title, :episode)";
	$id = DbInsert($query, array(':type' => $type, ':title' => $title, ':episode' => $episode));
	return $id;
}

/// Retrieves an episode from the database.
/// $id - the ID of the episode to retrieve.
function GetItemById($id)
{
	$query = "SELECT * FROM episodes WHERE ID=:id";
	$result = DbSelect($query, array(':id' => $id));
	
	if (array_key_exists(0, $result))
	{
		return $result[0];
	}
	
	return false;
}

function LastEpisode()
{
    $query = "SELECT * FROM episodes ORDER BY id DESC LIMIT 1";
    $result = DbSelect($query);
    
    if ($result)
	{
		return $result;
	}
	
	return false;
}

function MostRecentEpisodes()
{
    $query = "SELECT * FROM episodes ORDER BY id DESC LIMIT 2";
    $result = DbSelect($query);
    
    if ($result)
	{
		return $result;
	}
	
	return false;
}

function getGrowerEpisodes()
{
    $query = "SELECT * FROM episodes WHERE type = 'Grower' ORDER BY id DESC";
    $result = DbSelect($query);
    
    if ($result)
	{
		return $result;
	}
	
	return false;
}

function getPirateEpisodes()
{
    $query = "SELECT * FROM episodes WHERE type = 'Pirate' ORDER BY id DESC";
    $result = DbSelect($query);
    
    if ($result)
	{
		return $result;
	}
	
	return false;
}

function getAllEpisodes()
{
    $query = "SELECT * FROM episodes";
    $result = DbSelect($query);
    
    if ($result)
	{
		return $result;
	}
	
	return false;
}

function editEpisode($id, $type, $title, $episode)
{
    $query = "UPDATE episodes SET episode = :episode, title = :title, type = :type WHERE id = :id";
    $result = DbExecute($query, array(':type' => $type, ':title' => $title, ':episode' => $episode, ':id' => $id));
    
    if ($result)
	{
		return true;
	}
	
	return false;
}