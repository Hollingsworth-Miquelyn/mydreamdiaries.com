<?php
/*
 * Author: Miquelyn Hollingsworth
 */


session_start();

require 'models/database.php';
require 'models/db.php';
require 'models/users.php';
require 'models/episodes.php';
require 'models/navigation.php';
require 'models/roles.php';

include 'views/header.php';

if(isset($_POST['action'])) {                        
   $action = strtolower(filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING));
} elseif(isset($_GET['action'])) {
$action = strtolower(filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING));
   
}



switch ($action)
{      
    case 'about':
      include  'views/bio.php';
      break;
  
    case 'audiobooks':
        include 'views/audiobooks.php';
        break;   
   
    case 'blog':
        $episodes = MostRecentEpisodes();
        include 'views/blog.php';
        break;
    
    case 'changerole':
        $userid = (int) filter_input(INPUT_GET, 'userid', FILTER_SANITIZE_NUMBER_INT);
        $role = filter_input(INPUT_GET, 'role', FILTER_SANITIZE_STRING);
        
        if (LoggedInUserIsAdmin() && $userid && $role)
        {
            UpdateUserRole($userid, $role);
        }
        
        header('Location: /?action=editusers');
        exit();

    case 'characters':
        include 'views/characters.php';
        break;
    
    case 'contact':
       include 'views/contact.php';
        break;
              
    case 'deleteuser':
        $id = (int) filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        
        if (LoggedInUserIsAdmin() && $id)
        {
            DeleteUser($id);
        }
        
        header('Location: /?action=editusers.php');
        exit();
        break;
       
    case 'deleteepisode':
             
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        
        $delete = DeleteItem($id);
        
        $episodes = getAllEpisodes();
        include 'views/viewepisodes.php';
        break;
             
    case 'editepisode':
         $id = (int) filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $episode = GetItemById($id);
    include 'views/editepisode.php';
        break;
    
    case 'editepisodessubmit':
        
        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
	$episode = htmlentities($_POST['episode']);
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

        if (ValidateTitleLength($title, $message) && ValidateEpisodeLength($episode, $message)) {
        $edit = editEpisode($id, $type, $title, $episode);
        $episodes = getAllEpisodes();
        }
        include 'views/viewepisodes.php';
        break; 
    
    case 'editusers':
        $page = (LoggedInUserIsAdmin()) ? 'views/editusers.php' : 'views/login.php';
        $users = GetAllUsers();
        include $page;
        break;
    
    case 'growercharacters':
        include 'views/growercharacters.php';
        break;
        
    case 'growerepisodes':
        $episodes = getGrowerEpisodes();
        
        include 'views/blog.php';
        break;
        
    case 'home':
        include 'views/home.php';
        break;
    
    case 'inspiration':
        include 'views/inspiration.php';
        break;
    
    case 'login':
        include 'views/login.php';
        break;
    
        case 'loginsubmit':
        $email = filter_input(INPUT_POST, 'emaillogin', FILTER_SANITIZE_EMAIL);
	    $password = filter_input(INPUT_POST, 'passwordlogin', FILTER_SANITIZE_STRING);
        if (LoginUser($email, $password)) {
            header('Location: /?action=menu');
            exit();
        }else {
            echo "There was an error. Please try again.";
        }
        
        include 'views/login.php';
        break;
        
    case 'logout':
        session_destroy();
        $_SESSION = array();
        header('Location: /');
        exit();
        break;    
    
     case 'menu':
        $page = (CheckSession()) ? 'views/menu.php': 'views/login.php';
        include $page;
        break;
        
    case 'myinfo':
        $page = 'views/login.php';
        
        if ($userId = GetLoggedInUserId()) 
        {
            $page = 'views/myinfo.php';
            $user = GetUser($userId);
        }
        
        include $page;
        break;
        
    case 'newepisode':
        include 'views/newepisode.php';
        break;
  
    case 'newepisodesubmit':
        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
	$episode = htmlentities($_POST['episode']);
       
        if (ValidateTitleLength($title, $message) && ValidateEpisodeLength($episode, $message)) {
        if ($type && $title && $episode && $itemId = addNewEpisode($type, $title, $episode))
        {
            
            $item = GetItemById($itemId);
            $episodes = LastEpisode();
            include 'views/episodedetails.php';
        }
        else
        {
            echo"There was an error while posting. Please try again. ";
            include 'views/newepisode.php';
        }}
               
        break;  
    
    case 'otherworks':
        include 'views/otherworks.php';
        break;
    
    case 'piratecharacters':
        include 'views/piratecharacters.php';
        break;
    
    case 'pirateepisodes':
        $episodes = getPirateEpisodes();
        include 'views/blog.php';
        break;
      
    case 'presentation':
        include 'views/presentation.php';
        break;
    
    case 'registersubmit':
        $regFirst = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $regLast = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $regmail = filter_input(INPUT_POST, 'emailreg', FILTER_SANITIZE_EMAIL);
        $regpass1 = filter_input(INPUT_POST, 'passwordreg1', FILTER_SANITIZE_STRING);
        $regpass2 = filter_input(INPUT_POST, 'passwordreg2', FILTER_SANITIZE_STRING);
        $message = '';
        
        if (RegisterUser($regFirst, $regLast, $regmail, $regpass1, $regpass2, $message)) {
            header('Location: /?action=menu');
            exit();
        }
                
        include 'views/login.php';
        break;
    
    case 'releaseinfo':
        include 'views/releaseinfo.php';
        break;
    
    case 'showepisode':
        //it's not getting the right id
        $id = (int) filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        
        $episode = GetItemById($id);
        
        include 'views/blog.php';
        break;
    
    case 'similarbooks':
        include 'views/similarbooks.php';
        break;
    
    case 'siteplan':
        include 'views/siteplan.php';
        break;
    
    case 'thedreamdiaries':
        include 'views/thedreamdiaries.php';
        break;
    
    case 'updatepassword':
        $oldpassword = $_POST['currentpassword'];
        $newpassword = $_POST['newpassword'];
        $newpassword2 = $_POST['repeatpassword'];
        $message = '';
        
        if ($newpassword == $newpassword2)
        {
            $validMessage = '';
            if (ValidatePassword($newpassword, $validMessage))
            {
                if (ValidateOldPassword($oldpassword))
                {
                    UpdateUserPassword($newpassword);
                    $message = 'Password Updated';
                }
                else
                {
                    $message = 'The old password did not match.';
                }
            }
            else
            {
                $message = $validMessage;
            }
        }
        else
        {
            $message = "The new passwords do not match";
        }
        
        if ($userId = GetLoggedInUserId()) 
        {
            $page = 'views/myinfo.php';
            $user = GetUser($userId);
        }
  
        include 'views/myinfo.php';
        break;
    
    case 'viewallepisodes':
        $episodes = getAllEpisodes();
        include 'views/viewepisodes.php';
        break;
  
    case 'worldbuilding':
        include 'views/worldbuilding.php';
        break;
    
    default:
        include 'views/home.php';
}
include 'views/footer.php';

?>