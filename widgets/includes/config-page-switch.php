<?php
//config-page-switch.php assings page specific values to variables for rendering on the page
switch(THIS_PAGE){
 
    case "index.php":
            $config->pageHeader="Coffee at its best";
            $config->slogan="An adventure in caffinated experience";
            $config->title="Wild Duck Home";
            $config->pageImage="images/wildDuckLogo.jpg";
            $config->className="bg-faded-contrast";
            $config->subHeader="";
            $config->randomSH="";
            $config->rotatePlanets="";
            break;
            
        case "about.php":
            $config->pageHeader="About Wild Duck Coffee";
            $config->slogan="This is what we do.";
            $config->title="About Wild Duck";
            $config->pageImage="images/about-bg.jpg";
            $config->className="bg-faded-contrast";
            $config->subHeader="";
            $config->randomSH="";
            $config->rotatePlanets="";
            break;
        case "engagement_list.php":
            $config->pageHeader="We are here to tell the coffee story!";
            $config->slogan="Here is the list of our followers!";
            $config->title="Engagements";
            $config->pageImage="images/post-bg.jpg";
            $config->className="bg-faded-contrast";
            $config->subHeader="";
            $config->randomSH="y";
            $config->rotatePlanets="";
            break;
        case "engagement_view.php":
            $config->pageHeader="A coffee story telling engagement!";
            $config->slogan=" Here are details ...";
            $config->title="Engagement Detail";
            $config->pageImage="images/post-bg.jpg";
            $config->className="bg-faded-contrast";
            $config->subHeader="";
            $config->randomSH="";
            $config->rotatePlanets="y";
            break;
        case "post.php":
            $config->pageHeader="Man must explore, and this is exploration at its greatest";
            $config->slogan=" Coffee to the max expands all horizons!";
            $config->title="The Coffee Blog";
            $config->pageImage="images/post-bg.jpg";
            $config->className="bg-faded-contrast";
            $config->subHeader="";
            $config->randomSH="";
            $config->rotatePlanets="";
            break;
        case "dailyspecials.php":
            $config->pageHeader="Good coffee is what life's about.";
            $config->slogan=" Take time to enjoy and treat yourself!";
            $config->title="Daily Specials";
            $config->pageImage="images/specials-bg.jpg";
            $config->className="bg-faded-contrast";
            $config->subHeader="";
            $config->randomSH="";
            $config->rotatePlanets="";
            break;       
        case "travel.php":
            $config->pageHeader="Fabulous Adventures";
            $config->slogan="Exotic Coffee Lands";
            $config->title="Travel Inquiries";
            $config->pageImage="images/travel.jpg";
            $config->className="bg-faded-contrast";
            $config->subHeader="";
            $config->randomSH="";
            $config->rotatePlanets="";
            break;
        case "contact.php":
            $config->pageHeader="Contact the Duck";
            $config->slogan="Have questions? I have answers.";
            $config->title="Contact Wild Duck";
            $config->pageImage="images/contact-bg.jpg";
            $config->className="bg-faded-contrast";
            $config->subHeader="";
            $config->randomSH="";
            $config->rotatePlanets="";
            break;
        case "template.php":
            $config->pageHeader="Wild Duck Coffee Template";    
            $config->slogan="Make it what it needs to be.";
            $config->Title="Template Only";
            $config->pageImage="images/contact-bg.jpg";
            $config->className="bg-faded-contrast";
            $config->subHeader="Go for it!";
            $config->randomSH="";
            $config->rotatePlanets="";
            break;
        case "db_test.php":
            $config->pageHeader="Database Test Page";
            $config->slogan="Use this page for testing the db";
            $config->title="Template Only";
            $config->pageImage="images/contact-bg.jpg";
            $config->className="bg-faded-contrast";
            $config->subHeader="Go for it!";
            $config->randomSH="";
            $config->rotatePlanets="";
            break;
            
        default:
            $config->pageHeader="";
            $config->slogan="";
            $config->title="";
            $config->pageImage="";
            $config->className="";
            $config->subHeader="";
            $config->randomSH="";
            $config->rotatePlanets="";
    }
        

?>