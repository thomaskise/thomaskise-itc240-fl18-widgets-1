<?php
/**
 * demo_list_pager.php demonstrates a list page that paginates data across 
 * multiple pages
 * 
 * This page uses a Pager class which processes a mysqli SQL statement 
 * and spans records across multiple pages. 
 * 
 * @package nmPager
 * @author Bill Newman <williamnewman@gmail.com>
 * @version 3.2 2015/11/24
 * @link http://www.newmanix.com/
 * @license http://www.apache.org/licenses/LICENSE-2.0 v. 3.0
 * @see MyAutoLoader.php
 * @see Pager.php 
 * @todo none
 */

require 'includes/config.php'; #provides configuration, pathing, error handling, db credentials 
require 'includes/Pager.php'; #allows pagination 

//for this page we'll request no caching to see the latest image

if(isset($_SESSION["AdminID"]))
{//don't cache uploaded images
    $config->loadhead .='
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
    ';
    
}

# SQL statement
$sql = "select * from " . PREFIX . "engagements";

#Fills <title> tag  
$config->title = 'Engagement List Pager';
$config->loadhead .= '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';

# END CONFIG AREA ---------------------------------------------------------- 

get_header(); #header must appear before any HTML is printed by PHP
//include 'includes/header.php';
?>

<h3 class="post-title">Select the company name for engagement details</h3>

<?php
#reference images for pager
//$prev = '<img src="images/arrow_prev.gif" border="0" />';
//$next = '<img src="images/arrow_next.gif" border="0" />';

$prev = '<i class="fa fa-chevron-circle-left"></i>';
$next = '<i class="fa fa-chevron-circle-right"></i>';

#Create a connection
# connection comes first in mysqli (improved) function
$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));


# Create instance of new 'pager' class
$myPager = new Pager(5,'',$prev,$next,'');
$sql = $myPager->loadSQL($sql,$iConn);  #load SQL, pass in existing connection, add offset
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));

if(mysqli_num_rows($result) > 0)
{#records exist - process
    echo $myPager->showNAV();//show pager if enough records 
	if($myPager->showTotal()==1){$itemz = "engagement";}else{$itemz = "engagements";}  //deal with plural
    echo '<p align="center">We have ' . $myPager->showTotal() . ' ' . $itemz . '!</p>';
	while($row = mysqli_fetch_assoc($result))
	{# process each row
         echo '<p align="left">' .
            '<img src="uploads/engagement' . (int)$row['EngagementID'] . '_thumb' . '.jpg" />' . ' ' .
            '<a href="engagement_view_alpha.php?id=' . (int)$row['EngagementID'] . '">' . $row['OrganizationName'] . '</a>
            </p>';
	}
	//the showNAV() method defaults to a div, which blows up in our design
    echo $myPager->showNAV();//show pager if enough records 

/*    echo '<img src="uploads/engagement' . (int)$row['EngagementID'] . '.png" />';    */
    
    //the version below adds the optional bookends to remove the div design problem
    //echo $myPager->showNAV('<p align="center">','</p>');
}else{#no records
    echo "<p align=center>What! No Engagements?  There must be a mistake!!</p>";	
}
@mysqli_free_result($result);
@mysqli_close($iConn);

//include 'includes/footer.php';
get_footer();
?>
