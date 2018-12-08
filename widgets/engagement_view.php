<?php include 'includes/config.php';?>
<?php include 'includes/db_functions/initialize.php';?>
<?php
//process querystring here
if(isset($_GET['id']))
{//process data
    //cast the data to an integer, for security purposes
    $id = (int)$_GET['id'];
}else{//redirect to safe page
    header('Location:ngagement_list.php');
}

//for this page we'll request no caching to see the latest image
if(isset($_SESSION["AdminID"]))
{//don't cache uploaded images
    $_SESSION['EngagementID'] = (int)$_GET['id'];
    $config->loadhead .='
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
    ';
    
}

$sql = "select * from " . PREFIX . "engagements where EngagementID = $id";

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {

        $OrganizationName = stripslashes($row['OrganizationName']);
        $ContactLastName = stripslashes($row['ContactLastName']);
        $ContactFirstName = stripslashes($row['ContactFirstName']);
        $ContactEmailAddress = stripslashes($row['ContactEmailAddress']);
        $TrainingSiteName = stripslashes($row['TrainingSiteName']);
        $TrainingSiteAddress1 = stripslashes($row['TrainingSiteAddress1']);
        $TrainingSiteCity = stripslashes($row['TrainingSiteCity']);
        $TrainingSiteStateCode = stripslashes($row['TrainingSiteStateCode']);
        $TrainingZip = stripslashes($row['TrainingZip']);
        $PreferredTrainingDate = stripslashes($row['PreferredTrainingDate']);
        $Trainer = stripslashes($row['Trainer']);
        $Title = "Title Page for " . $OrganizationName;
        $pageID = $OrganizationName;
        $Feedback = '';//no feedback necessary
    }    

}else{//inform there are no records
    $Feedback = '<p>This engagement does not exist</p>';
}
?>

<?php get_header()?>

<?php
if($Feedback == '')
{//data exists, show it

    echo '<h2>Event: ' . $OrganizationName . ' Orientation</h2>';
    echo '<p>';
    echo 'Organization: <b>' . $OrganizationName . '</b>' . '<br />';
    echo 'Contact: <b>' . $ContactFirstName . ' ' . $ContactLastName . '</b>' . '<br />';
    echo 'Email: <b>' . $ContactEmailAddress . '</b>' . '<br />';
    echo 'Training site: <b>' . $TrainingSiteName . '</b>' . '<br />';
    echo 'Address: <b>' .  $TrainingSiteAddress1 . '</b>' . '<br />';
    echo 'City, State Zip: <b>' .  $TrainingSiteCity . ',' . ' ' . $TrainingSiteStateCode . ' ' . $TrainingZip . '</b>' . '<br />';
    echo 'Preferred training date: <b>' . $PreferredTrainingDate . '</b>' . '<br />';
    echo 'Trainer: <b>' . $Trainer . '</b>' . '<br />' . '<br />';
    
    echo '<img src="uploads/engagement' . $id . '.jpg" />';
    
    echo '</p>'; 
}else{//warn user no data
    echo $Feedback;
}    

if(startSession() && isset($_SESSION["AdminID"]))
    {# only admins can see 'peek a boo' link:
        echo '<p align="center"><a href="' . $config->virtual_path . '/upload_form.php?' . $_SERVER['QUERY_STRING'] . '">Change or Add Image</a></p>';
        /*
        # if you wish to overwrite any of these options on the view page, 
        # you may uncomment this area, and provide different parameters:						
        echo '<div align="center"><a href="' . VIRTUAL_PATH . 'upload_form.php?' . $_SERVER['QUERY_STRING']; 
        echo '&imagePrefix=customer';
        echo '&uploadFolder=upload/';
        echo '&extension=.jpg';
        echo '&createThumb=TRUE';
        echo '&thumbWidth=50';
        echo '&thumbSuffix=_thumb';
        echo '&sizeBytes=100000';
        echo '">UPLOAD IMAGE</a></div>';
        */
        echo '<p align="center"><a href="' . $config->virtual_path . 'admin/engagement_edit.php?' . $_SERVER['QUERY_STRING'] . '">Update Engagement information</a></p>';
        echo '<p align="center"><a href="' . ADMIN_PATH . 'engagement_dashboard.php">Return To Engagement Dashboard</a></p>
		';	
    }


    echo '<p><a href="engagement_list.php">Return to Engagement List</a></p>';

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php get_footer()?>