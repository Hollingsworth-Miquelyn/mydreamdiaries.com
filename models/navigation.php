<?php


// Returns an array where the key is the Action and the value is the text for the link.
function GetPrimaryNavigationItems()
{
    $nav = array(
        'home' => 'Home',
        'blog' => 'Blog',
        'thedreamdiaries' => 'The Dream Diaries',
        'about' => 'About Me',
        'contact' => 'Contact Me'
        
    );
    
    if (CheckSession())
    {
        
        $nav['menu'] = 'Menu';
        $nav['logout'] = 'Log Out';
    }
    else
    {
        $nav['login'] = 'Log In/Register';
    }
    
    return $nav;
}

function GetSubNavigationItems() {
    $subNav = array(
        array('Grower Episodes','Blog', 'growerepisodes'),
        array('Grower Characters','Blog', 'growercharacters'),
        array('Pirate Episodes','Blog', 'pirateepisodes'),
        array('Pirate Characters','Blog', 'piratecharacters'),
        array('Audio Books','Blog', 'audiobooks'),
        array('Characters','The Dream Diaries', 'characters'),
        array('Inspiration','The Dream Diaries', 'inspiration'),
        array('Release Info','The Dream Diaries', 'releaseinfo'),
        array('World Building','The Dream Diaries', 'worldbuilding'),
        array('Other Works', 'About Me', 'otherworks'),
        array('Similar Books', 'About Me', 'similarbooks')
    );
    return $subNav;
}

function GetFooterItems() {
    $footer = array(
     'siteplan' => 'Site Plan',
     'presentation' => 'Presentation'   
    );
}