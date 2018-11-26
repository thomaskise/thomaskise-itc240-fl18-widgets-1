<?php
/*
    Config.php
        stores configuration data for our application
*/
ob_start(); //prevents header errors
    
define('DEBUG',TRUE); #we want to see all errors

//include 'private/db_credentials.php';
define('THIS_PAGE', basename($_SERVER['PHP_SELF']));//two parms (NAME, value); 

$sitename = "Wild Duck Coffee"; //for future use

//here is the associtive array that defines the main navigation (the urls and page names)
    $nav1['index.php']= 'Home';
    $nav1['about.php']= 'About';
    $nav1['engagement_list.php']= 'Engagements';
    $nav1['dailyspecials.php']= 'Daily Specials';
    $nav1['travel.php']= 'Travel Inquiry';
    $nav1['contact.php']= 'General Inquiry';
    $nav1['db_test.php']= 'DB Template';

//var_dump($nav1);
 //   die;

//set-up heros
    include 'includes/random_rotate.php';

    $heros[] = '<img src="images/coulson.png" />';
    $heros[] = '<img src="images/fury.png" />';
    $heros[] = '<img src="images/hulk.png" />';
    $heros[] = '<img src="images/thor.png" />';
    $heros[] = '<img src="images/black-widow.png" />';
    $heros[] = '<img src="images/captain-america.png" />';
    $heros[] = '<img src="images/machine.png" />';
    $heros[] = '<img src="images/iron-man.png" />';
    $heros[] = '<img src="images/loki.png" />';
    $heros[] = '<img src="images/giant.png" />';
    $heros[] = '<img src="images/hawkeye.png" />';

//set-up planets
    include 'includes/planets.php';

    switch (THIS_PAGE) {
        case "index.php":
            $pageHeader="Wild Duck Coffee";
            $slogan="An adventure in caffinated experience";
            $Title="Wild Duck Home";
            $pageImage="img/wildDuckLogo.jpg";
            $className="site-heading";
            $subHeader="";
            $randomSH="";
            $rotatePlanets="";
            break;
            
        case "about.php":
            $pageHeader="About Wild Duck Coffee";
            $slogan="This is what we do.";
            $Title="About Wild Duck";
            $pageImage="img/about-bg.jpg";
            $className="page-heading";
            $subHeader="";
            $randomSH="";
            $rotatePlanets="";
            break;
        case "engagement_list.php":
            $pageHeader="We are here to tell the coffee story!";
            $slogan=" Here is the list of our followers!";
            $Title="Engagements";
            $pageImage="img/post-bg.jpg";
            $className="post-heading";
            $subHeader="";
            $randomSH="y";
            $rotatePlanets="";
            break;
        case "engagement_view.php":
            $pageHeader="A coffee story telling engagement!";
            $slogan=" Here are details ...";
            $Title="Engagement Detail";
            $pageImage="img/post-bg.jpg";
            $className="post-heading";
            $subHeader="";
            $randomSH="";
            $rotatePlanets="y";
            break;
        case "post.php":
            $pageHeader="Man must explore, and this is exploration at its greatest";
            $slogan=" Coffee to the max expands all horizons!";
            $Title="The Coffee Blog";
            $pageImage="img/post-bg.jpg";
            $className="post-heading";
            $subHeader="";
            $randomSH="";
            $rotatePlanets="";
            break;
        case "dailyspecials.php":
            $pageHeader="No one said life would be easy. If we work hard, it IS rewarding";
            $slogan=" Take time to enjoy and treat yourself!";
            $Title="Daily Specials";
            $pageImage="img/specials-bg.jpg";
            $className="post-heading";
            $subHeader="";
            $randomSH="";
            $rotatePlanets="";
            break;       
        case "travel.php":
            $pageHeader="Fabulous Adventures";
            $slogan="Exotic Coffee Lands";
            $Title="Travel Inquiries";
            $pageImage="img/travel.jpg";
            $className="page-heading";
            $subHeader="";
            $randomSH="";
            $rotatePlanets="";
            break;
        case "contact.php":
            $pageHeader="Contact the Duck";
            $slogan="Have questions? I have answers.";
            $Title="Contact Wild Duck";
            $pageImage="img/contact-bg.jpg";
            $className="page-heading";
            $subHeader="";
            $randomSH="";
            $rotatePlanets="";
            break;
        case "template.php":
            $pageHeader="Wild Duck Coffee Template";
            $slogan="Make it what it needs to be.";
            $Title="Template Only";
            $pageImage="img/contact-bg.jpg";
            $className="page-heading";
            $subHeader="Go for it!";
            $randomSH="";
            $rotatePlanets="";
            break;
        case "db_test.php":
            $pageHeader="Database Test Page";
            $slogan="Use this page for testing the db";
            $Title="Template Only";
            $pageImage="img/contact-bg.jpg";
            $className="page-heading";
            $subHeader="Go for it!";
            $randomSH="";
            $rotatePlanets="";
            break;
            
        default:
            $pageHeader="";
            $slogan="";
            $Title="";
            $pageImage="";
            $className="";
            $subHeader="";
            $randomSH="";
            $rotatePlanets="";
    }


function myerror($myFile, $myLine, $errorMsg)
{
    if(defined('DEBUG') && DEBUG)
    {
       echo "Error in file: <b>" . $myFile . "</b> on line: <b>" . $myLine . "</b><br />";
       echo "Error Message: <b>" . $errorMsg . "</b><br />";
       die();
    }else{
		echo "I'm sorry, we have encountered an error.  Would you like to buy some socks?";
		die();
    }
}

//makelinks() will create navigation from an assoc array
// echo makeLinks($nav1); 

function makelinks($nav) 
{
    $myReturn = '';
        foreach($nav as $key => $value){
            
            if(THIS_PAGE==$key)
            {//current page add active class
                $myReturn .= ' 
                <li class="nav-item">
                    <a class="nav-link active" href="'. $key . '">' . $value . '</a>
                </li>';  
                
            }else{//add no formating
                $myReturn .= ' 
                <li class="nav-item">
                    <a class="nav-link" href="' . $key . '">' . $value . '</a>
                </li>';               
            }
    } 
    return $myReturn;
}//end makeLinks()



?>