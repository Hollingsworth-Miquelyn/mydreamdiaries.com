<?php
    $nav = GetPrimaryNavigationItems();
    $subNav = GetSubNavigationItems();
?>
<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
    <title>My Dream Diaries</title>
    <meta name="description" content="My Dream Diaires is an episodic fiction blog that
          features stories from the world of The Dream Diaries, a Young Adult Fantasy Action/Adventure
          book. It also introduces information about up and coming novel, The Dream Diaries.">
    <meta name="keywords" content="Young Adult fiction, YA fantasy, YA fiction, Young Adult action adventure, 
          YA action adventure, episodic fiction, episodic Young Adult fiction">
    <link href="/css/screen.css" type="text/css" rel="stylesheet" media="screen">
    <meta name="viewport" content="width=device-width,
          initial-scale=1.0, maximum-scale=1.0">
    
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js" ></script>
    </head>    

    <body>
        <div id="header">
           
            <a href="/index.php" title="Go to the mydreamdiaries.com home page"><img src="/modules/mydreamdiarieslogo.png" class="logo" alt="My Dream Diaries logo"></a>
            <nav id="navbar">
                <ul>
                    <?php foreach ($nav as $action => $link){ ?>
    <li><a href="?action=<?php echo rawurlencode($action); ?>"><?php echo $link; ?></a>  
        <ul class="subNav">
            <?php 
                foreach ($subNav as $sub){
                    if ($sub[1]== $link){
            ?>
            <li><a href="?action=<?php echo rawurlencode($sub[2]); ?>"><?php echo $sub[0]; ?></a></li>
               <?php   
              }
          } 
          ?>
        </ul>
     </li>
    <?php } ?>
                </ul>
            </nav>
        </div>
        <div id="content">