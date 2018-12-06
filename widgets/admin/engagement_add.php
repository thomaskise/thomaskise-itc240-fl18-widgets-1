<?php
/**
 * admin_add_engagements.php is a single page web application that adds an administrator 
 * to the admin database table
 * 
 * @package nmAdmin
 * @author Bill Newman <williamnewman@gmail.com>
 * @version 2.21 2015/12/07
 * @link http://www.newmanix.com/
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see admin_only_inc.php 
 * @todo none
 */

require '../includes/config.php'; #provides configuration, pathing, error handling, db credentials 
$title = 'Add Administrator'; #Fills <title> tag 
//END CONFIG AREA ----------------------------------------------------------

$access = "superadmin"; #superadmin or above can add new administrators
include_once INCLUDE_PATH . 'admin_only_inc.php'; #session protected page - level is defined in $access var

if (isset($_POST['ContactEmailAddress']))
{# if Email is set, check for valid data
	if(!onlyEmail($_POST['ContactEmailAddress']))
	{//data must be valid email	
		feedback("Data entered for email is not valid", "error");
		header('Location:' . ADMIN_PATH . THIS_PAGE);
        die;
	}
		
     $params = array('OrganizationName','ContactLastName','ContactFirstName','ContactEmailAddress','TrainingSiteName','TrainingSiteAddress1','TrainingSiteCity','TrainingSiteStateCode','TrainingZip','PreferredTrainingDate','Trainer');#required fields
    if(!required_params($params))
    {//abort - required fields not sent
        feedback("Data not entered/updated. (error code #" . createErrorCode(THIS_PAGE,__LINE__) . ")","error");
        header('Location:' . ADMIN_PATH . THIS_PAGE);
        die;	    
    }

	$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));

	$OrganizationName = dbIn($_POST['OrganizationName'],$iConn);
    $ContactLastName = dbIn($_POST['ContactLastName'],$iConn);
	$ContactFirstName = dbIn($_POST['ContactFirstName'],$iConn);
	$ContactEmailAddress = strtolower(dbIn($_POST['ContactEmailAddress'],$iConn));
	$TrainingSiteName = dbIn($_POST['TrainingSiteName'],$iConn);
	$TrainingSiteAddress1 = dbIn($_POST['TrainingSiteAddress1'],$iConn);
	$TrainingSiteCity = dbIn($_POST['TrainingSiteCity'],$iConn);
	$TrainingSiteStateCode = dbIn($_POST['TrainingSiteStateCode'],$iConn);
	$TrainingZip = dbIn((int)$_POST['TrainingZip'],$iConn);
	$PreferredTrainingDate = dbIn($_POST['PreferredTrainingDate'],$iConn);
	$Trainer = dbIn($_POST['Trainer'],$iConn);

    #sprintf() function allows us to filter data by type while inserting DB values.
	$sql = sprintf("INSERT into " . PREFIX . "engagements set OrganizationName='%s',ContactLastName='%s',ContactFirstName='%s',ContactEmailAddress='%s',TrainingSiteName='%s',TrainingSiteAddress1='%s',TrainingSiteCity='%s',TrainingSiteStateCode='%s',TrainingZip='%s',PreferredTrainingDate='%s',Trainer='%s'",$OrganizationName,$ContactLastName,$ContactFirstName,$ContactEmailAddress,$TrainingSiteName,$TrainingSiteAddress1,$TrainingSiteCity,$TrainingSiteStateCode,$TrainingZip,$PreferredTrainingDate,$Trainer);
    
    # insert is done here
	@mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
	
	# feedback success or failure of insert
	if (mysqli_affected_rows($iConn) > 0){
		feedback("Engagement Added!","notice");
	}else{
	 	feedback("Engagement NOT Added!", "error");
	}
	get_header();
	echo '
		<p><h1>Add Engagement</h1></p>
		<p align="center"><a href="' . ADMIN_PATH . THIS_PAGE . '">Add More</a></p>
		<p align="center"><a href="' . ADMIN_PATH . 'engagement_dashboard.php">Exit To Engagement</a></p>
		';	
	get_footer();
}else{ //show form - provide feedback
	$config->loadhead .= '
	<script type="text/javascript" src="' . $config->virtual_path . 'includes/util.js"></script>
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
	<h1>Add New Engagement</h1>
	<form action="' . ADMIN_PATH . THIS_PAGE . '" method="post" onsubmit="return checkForm(this);">
	<table align="center">
		<tr>
			<td align="right">Organization</td>
			<td>
				<input type="text" autofocus required name="OrganizationName" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>	
        <tr>
			<td align="right">Contanct First Name</td>
			<td>
				<input type="text" autofocus required name="ContactLastName" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<td align="right">Contact Last Name</td>
			<td>
				<input type="text" required name="ContactFirstName" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<td align="right">Email</td>
			<td>
				<input type="email" required name="ContactEmailAddress" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
        <tr>
			<td align="right">Training Site</td>
			<td>
				<input type="text" required name="TrainingSiteName" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
        <tr>
			<td align="right">Address</td>
			<td>
				<input type="text" required name="TrainingSiteAddress1" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
        <tr>
			<td align="right">City</td>
			<td>
				<input type="text" required name="TrainingSiteCity" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
        <tr>
			<td align="right">State</td>
			<td>
				<input type="text" required name="TrainingSiteStateCode" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
        <tr>
			<td align="right">Zip code</td>
			<td>
				<input type="number" required name="TrainingZip" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
        <tr>
			<td align="right">Date</td>
			<td>
				<input type="date" required name="PreferredTrainingDate" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
        <tr>
			<td align="right">Trainer</td>
			<td>
				<input type="text" required name="Trainer" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>

	   <tr>
	   		<td align="center" colspan="2">
	   			<input type="submit" value="Add-Engagement!" />
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

?>
