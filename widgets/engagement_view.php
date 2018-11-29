<?php include 'includes/config.php';?>
<?php include 'includes/db_functions/initialize.php';?>
<?php
//process querystring here
if(isset($_GET['id']))
{//process data
    //cast the data to an integer, for security purposes
    $id = (int)$_GET['id'];
}else{//redirect to safe page
    header('Location:engagement_list.php');
}


$sql = "select * from engagements where EngagementID = $id";

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
    
    echo '<img src="uploads/engagement' . $id . '.png" />';
    
    echo '</p>'; 
}else{//warn user no data
    echo $Feedback;
}    

    echo '<p><a href="engagement_list.php">Go Back</a></p>';

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php get_footer()?>