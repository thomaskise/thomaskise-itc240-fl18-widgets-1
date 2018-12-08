<?php
/**
 * $admin_edit_engagements.php is a single page web application that allows an admin to 
 * edit some of their personal data
 *
 * This page is an addition to the application started as the nmAdmin package
 * 
 * @package nmAdmin
 * @author Bill Newman <williamnewman@gmail.com>
 * @version 2.21 2015/12/07
 * @link http://www.newmanix.com/  
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see admin_add.php 
 * @see admin_reset.php
 * @see admin_only_inc.php
 * @todo Add ability to change privilege level of admin by developer - add ability of SuperAdmin to change priv. level
 */

require '../includes/config.php'; #provides configuration, pathing, error handling, db credentials
$titleTag = 'Edit Engagements'; #Fills <title> tag. If left empty will fallback to $titleTag in config_inc.php
$metaRobots = 'no index, no follow';#never index admin pages  

//END CONFIG AREA ----------------------------------------------------------

$access = "admin"; #admins can edit themselves, developers can edit any - don't change this var or no one can edit their own data
include_once INCLUDE_PATH . 'admin_only_inc.php'; #session protected page - level is defined in $access var

# Read the value of 'action' whether it is passed via $_POST or $_GET with $_REQUEST
if(isset($_REQUEST['act'])){$config->myAction = (trim($_REQUEST['act']));}else{$config->myAction = "";}
switch ($config->myAction) 
{//check for type of process
	case "update": # 3) execute update SQL, redirect
		updateExecute($config->nav1);
		break; 
	default: # 1)Select Administrator
	 	editDisplay($config->nav1);
//        selectAdmin($config->nav1);
}

function editDisplay($nav1='')
{
    if(isset($_SESSION['EngagementID']) && (int)$_SESSION['EngagementID'] > 0)
    {
        $myID = (int)$_SESSION['EngagementID']; #Convert to integer, will equate to zero if fails
    }else{
        header('Location:' . ADMIN_PATH . THIS_PAGE);
        die;
    }

	$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
    $sql = sprintf("select EngagementID,OrganizationName,ContactLastName,ContactFirstName,ContactEmailAddress,TrainingSiteName,TrainingSiteAddress1,TrainingSiteCity,TrainingSiteStateCode,TrainingZip,PreferredTrainingDate,Trainer from " . PREFIX . "engagements WHERE EngagementID=%d",$myID);
	$result = @mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
	if(mysqli_num_rows($result) > 0)//at least one record!
	{//show results
		while ($row = mysqli_fetch_array($result))
		{//dbOut() function is a 'wrapper' designed to strip slashes, etc. of data leaving db
		     $OrganizationName = dbOut($row['OrganizationName']);
		     $ContactLastName = dbOut($row['ContactLastName']);
             $ContactFirstName = dbOut($row['ContactFirstName']);
		     $ContactEmailAddress = dbOut($row['ContactEmailAddress']);
		     $TrainingSiteName = dbOut($row['TrainingSiteName']);
		     $TrainingSiteAddress1 = dbOut($row['TrainingSiteAddress1']);
		     $TrainingSiteCity = dbOut($row['TrainingSiteCity']);
		     $TrainingSiteStateCode = dbOut($row['TrainingSiteStateCode']);
		     $TrainingZip = dbOut($row['TrainingZip']);
		     $PreferredTrainingDate = dbOut($row['PreferredTrainingDate']);
		     $Trainer = dbOut($row['Trainer']);
		}
	}else{//no records
      //put links on page to reset form, exit
      echo '
      <p align="center"><h3>No such engagement.</h3></p>
      <p align="center"><a href="' . ADMIN_PATH . 'engagement_dashboard.php">Exit To Engagement</a></p>
      ';
	}
	$loadhead = '
	<script type="text/javascript" src="' . INCLUDE_PATH . 'include/util.js"></script>
	<script type="text/javascript">
			function checkForm(thisForm)
			{//check form data for valid info
				if(empty(thisForm.OrganizationName,"Please enter Organization Name.")){return false;}
				if(empty(thisForm.ContactLastName,"Please enter Contact Last Name.")){return false;}
                if(empty(thisForm.ContactFirstName,"Please enter Contact First Name.")){return false;}
				if(!isContactEmailAddress(thisForm.ContactEmailAddress,"Please enter a valid Contact Email Address")){return false;}
				if(empty(thisForm.TrainingSiteName,"Please enter the training site.")){return false;}
				if(empty(thisForm.TrainingSiteAddress1,"Please enter the training site address.")){return false;}
				if(empty(thisForm.TrainingSiteCity,"Please enter City.")){return false;}
				if(empty(thisForm.TrainingSiteStateCode,"Please enter the State Code.")){return false;}
				if(empty(thisForm.TrainingZip,"Please enter the Zip Code.")){return false;}
				if(empty(thisForm.PreferredTrainingDate,"Please enter the training date.")){return false;}
				if(empty(thisForm.Trainer,"Please enter the assigned trainer name.")){return false;}
				return true;//if all is passed, submit!
			}
	</script>
	';
	get_header();
	echo '
	<h1>Edit Engagement</h1>
	<form action="' . ADMIN_PATH .  THIS_PAGE . '" method="post" onsubmit="return checkForm(this);">
	<table align="center">
		<tr>
			<td align="right">Organization</td>
			<td>
				<input type="text" required name="OrganizationName" value="' . $OrganizationName . '" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>		
        <tr>
			<td align="right">Contanct Last Name</td>
			<td>
				<input type="text" autofocus required name="ContactLastName" value="' . $ContactLastName . '" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<td align="right">Contact First Name</td>
			<td>
				<input type="text" required name="ContactFirstName" value="' . $ContactFirstName . '" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<td align="right">Email</td>
			<td>
				<input type="email" required name="ContactEmailAddress" value="' . $ContactEmailAddress . '" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
        <tr>
			<td align="right">Training Site</td>
			<td>
				<input type="text" required name="TrainingSiteName" value="' . $TrainingSiteName . '" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
        <tr>
			<td align="right">Address</td>
			<td>
				<input type="text" required name="TrainingSiteAddress1" value="' . $TrainingSiteAddress1 . '" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
        <tr>
			<td align="right">City</td>
			<td>
				<input type="text" required name="TrainingSiteCity" value="' . $TrainingSiteCity . '" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
        <tr>
			<td align="right">State</td>
			<td>
				<input type="text" required name="TrainingSiteStateCode" value="' . $TrainingSiteStateCode . '" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
        <tr>
			<td align="right">Zip code</td>
			<td>
				<input type="number" required name="TrainingZip" value="' . $TrainingZip . '" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
        <tr>
			<td align="right">Date</td>
			<td>
				<input type="date" required name="PreferredTrainingDate" value="' . $PreferredTrainingDate . '" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
        <tr>
			<td align="right">Trainer</td>
			<td>
				<input type="text" required name="Trainer" value="' . $Trainer . '" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
	';
	echo '
	   <input type="hidden" name="EngagementID" value="' , $myID . '" />
	   <input type="hidden" name="act" value="update" />
	   <tr>
			<td align="center" colspan="2">
				<input type="submit" value="Update Engagement" />
				<em>(<font color="red"><b>*</b> required field</font>)</em>
			</td>
       </tr>
	</table>    
	</form>
	<p align="center"><a href="' . ADMIN_PATH . 'engagement_dashboard.php">Exit To Engagement</a></p>
	';
	@mysqli_free_result($result);
    @mysqli_close($iConn);
	get_footer();
}

function updateExecute($nav1='')
{

	$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));

    
     $params = array('OrganizationName','ContactLastName','ContactFirstName','ContactEmailAddress','TrainingSiteName','TrainingSiteAddress1','TrainingSiteCity','TrainingSiteStateCode','TrainingZip','PreferredTrainingDate','Trainer');#required fields
    if(!required_params($params))
    {//abort - required fields not sent
        feedback("Data not entered/updated. (error code #" . createErrorCode(THIS_PAGE,__LINE__) . ")","error");
        header('Location:' . ADMIN_PATH . THIS_PAGE);
        die;	    
    }
    
	if(isset($_POST['EngagementID']) && (int)$_POST['EngagementID'] > 0)
	{
	 	$EngagementID = (int)$_POST['EngagementID']; #Convert to integer, will equate to zero if fails
	}else{
		feedback("EngagementID not numeric","warning");
		header('Location:' . ADMIN_PATH . THIS_PAGE);
        die;
	}
    
	$OrganizationName = dbIn($_POST['OrganizationName'],$iConn);
    $ContactLastName = dbIn($_POST['ContactLastName'],$iConn);
    $ContactFirstName = dbIn($_POST['ContactFirstName'],$iConn);
	$ContactEmailAddress = strtolower(dbIn($_POST['ContactEmailAddress'],$iConn));
	$TrainingSiteName = dbIn($_POST['TrainingSiteName'],$iConn);
	$TrainingSiteAddress1 = dbIn($_POST['TrainingSiteAddress1'],$iConn);
	$TrainingSiteCity = dbIn($_POST['TrainingSiteCity'],$iConn);
	$TrainingSiteStateCode = dbIn($_POST['TrainingSiteStateCode'],$iConn);
	$TrainingZip = dbIn($_POST['TrainingZip'],$iConn);
	$PreferredTrainingDate = dbIn($_POST['PreferredTrainingDate'],$iConn);
	$Trainer = dbIn($_POST['Trainer'],$iConn);
	
	#check for duplicate email
	$sql = sprintf("select EngagementID from " . PREFIX . "engagements WHERE (ContactEmailAddress='%s') and EngagementID != %d",$ContactEmailAddress,$EngagementID);
	$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
	if(mysqli_num_rows($result) > 0)//at least one record!
	{# someone already has email!
		feedback("Email already exists - please choose a different email.");
		header('Location:' . ADMIN_PATH . THIS_PAGE);
        die;
	}

	#sprintf() function allows us to filter data by type while inserting DB values.  Illegal data is neutralized, ie: numerics become zero

	$sql = sprintf("UPDATE " . PREFIX . "engagements set OrganizationName='%s',ContactLastName='%s',ContactFirstName='%s',ContactEmailAddress='%s',TrainingSiteName='%s',TrainingSiteAddress1='%s',TrainingSiteCity='%s',TrainingSiteStateCode='%s',TrainingZip='%s',PreferredTrainingDate='%s',Trainer='%s' WHERE EngagementID=%d",$OrganizationName,$ContactLastName,$ContactFirstName,$ContactEmailAddress,$TrainingSiteName,$TrainingSiteAddress1,$TrainingSiteCity,$TrainingSiteStateCode,$TrainingZip,$PreferredTrainingDate,$Trainer,$EngagementID);
  
    @mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
	
	//feedback success or failure of insert
	if (mysqli_affected_rows($iConn) > 0){
         feedback("Successfully Updated!","notice");
	}else{
	 	feedback("Data NOT Updated! (or not changed from original values)");
	}
	header('Location:../engagement_view.php?id=' . $_SESSION['EngagementID']);

}
