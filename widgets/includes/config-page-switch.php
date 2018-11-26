<?php
//config-page-switch.php assings page specific values to variables for rendering on the page
switch(THIS_PAGE){
   case 'template.php':    
        $config->title = 'Template Page';    
    break;    
          case "index.php":
            $config->pageHeader="Wild Duck Coffee";
            $config->slogan="An adventure in caffinated experience";
            $config->Title="Wild Duck Home";
            $config->pageImage="img/wildDuckLogo.jpg";
            $config->className="site-heading";
            $config->subHeader="";
            $config->randomSH="";
            $config->rotatePlanets="";
            break;
            
        case "about.php":
            $config->pageHeader="About Wild Duck Coffee";
            $config->slogan="This is what we do.";
            $config->Title="About Wild Duck";
            $config->pageImage="img/about-bg.jpg";
            $config->className="page-heading";
            $config->subHeader="";
            $config->randomSH="";
            $config->rotatePlanets="";
            break;
        case "engagement_list.php":
            $config->pageHeader="We are here to tell the coffee story!";
            $config->slogan=" Here is the list of our followers!";
            $config->Title="Engagements";
            $config->pageImage="img/post-bg.jpg";
            $config->className="post-heading";
            $config->subHeader="";
            $config->randomSH="y";
            $config->rotatePlanets="";
            break;
        case "engagement_view.php":
            $config->pageHeader="A coffee story telling engagement!";
            $config->slogan=" Here are details ...";
            $config->Title="Engagement Detail";
            $config->pageImage="img/post-bg.jpg";
            $config->className="post-heading";
            $config->subHeader="";
            $config->randomSH="";
            $config->rotatePlanets="y";
            break;
        case "post.php":
            $config->pageHeader="Man must explore, and this is exploration at its greatest";
            $config->slogan=" Coffee to the max expands all horizons!";
            $config->Title="The Coffee Blog";
            $config->pageImage="img/post-bg.jpg";
            $config->className="post-heading";
            $config->subHeader="";
            $config->randomSH="";
            $config->rotatePlanets="";
            break;
        case "dailyspecials.php":
            $config->pageHeader="No one said life would be easy. If we work hard, it IS rewarding";
            $config->slogan=" Take time to enjoy and treat yourself!";
            $config->Title="Daily Specials";
            $config->pageImage="img/specials-bg.jpg";
            $config->className="post-heading";
            $config->subHeader="";
            $config->randomSH="";
            $config->rotatePlanets="";
            break;       
        case "travel.php":
            $config->pageHeader="Fabulous Adventures";
            $config->slogan="Exotic Coffee Lands";
            $config->Title="Travel Inquiries";
            $config->pageImage="img/travel.jpg";
            $config->className="page-heading";
            $config->subHeader="";
            $config->randomSH="";
            $config->rotatePlanets="";
            break;
        case "contact.php":
            $config->pageHeader="Contact the Duck";
            $config->slogan="Have questions? I have answers.";
            $config->Title="Contact Wild Duck";
            $config->pageImage="img/contact-bg.jpg";
            $config->className="page-heading";
            $config->subHeader="";
            $config->randomSH="";
            $config->rotatePlanets="";
            break;
        case "template.php":
            $config->pageHeader="Wild Duck Coffee Template";
            $config->slogan="Make it what it needs to be.";
            $config->Title="Template Only";
            $config->pageImage="img/contact-bg.jpg";
            $config->className="page-heading";
            $config->subHeader="Go for it!";
            $config->randomSH="";
            $config->rotatePlanets="";
            break;
        case "db_test.php":
            $config->pageHeader="Database Test Page";
            $config->slogan="Use this page for testing the db";
            $config->Title="Template Only";
            $config->pageImage="img/contact-bg.jpg";
            $config->className="page-heading";
            $config->subHeader="Go for it!";
            $config->randomSH="";
            $config->rotatePlanets="";
            break;
            
        default:
            $config->pageHeader="";
            $config->slogan="";
            $config->Title="";
            $config->pageImage="";
            $config->className="";
            $config->subHeader="";
            $config->randomSH="";
            $config->rotatePlanets="";
    }
        

?>