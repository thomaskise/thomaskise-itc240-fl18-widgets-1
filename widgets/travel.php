<?php include 'includes/config.php'?>
<?php get_header()?>
<?php
    if(isset($_POST['FirstName']))
    {//data is submitted show it
       // echo $_POST['FirstName'];
        /*
        echo '<pre>';
        var_dump($_POST);
        echo '</pre>';
        die;
        */
        $to      = 'thomas.harrington@seattlecentral.edu';
        $subject = 'Travel Planning';
        //$message = 'hello from ' . $_POST['Name'];
        $message = process_post();
        $replyTo = 'thom@queerduck.net';
        $headers = 'From: noreply@kiseharrington.com' . PHP_EOL .
            'Reply-To: ' . $replyTo . PHP_EOL .
            'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
        
        //START CODE TO ADD TO CONTACT PAGE!-----------------

        //connect to the database in order to add contact data
        $iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));

        //process each post var, adding slashes, using mysqli_real_escape(), etc.
        $FirstName = dbIn($_POST['FirstName'],$iConn);
        $LastName = dbIn($_POST['LastName'],$iConn);
        $Email = dbIn($_POST['Email'],$iConn);
        $Family = dbIn($_POST['Family'],$iConn);
        $Epicurean = dbIn($_POST['Epicurean'],$iConn);
        $Coffee = dbIn($_POST['Coffee'],$iConn);
        $Message = dbIn($_POST['Message'],$iConn);
        $ContactPreference = dbIn($_POST['ContactPreference'],$iConn);

        //place question marks in place of each item to be inserted
        $sql = "INSERT INTO widgets_fl18_Contacts (FirstName,LastName,Email,Family,Epicurean,Coffee,Message,ContactPreference,DateAdded) VALUES(?,?,?,?,?,?,?,?,NOW())";
        $stmt = @mysqli_prepare($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));

        /*
         * second parameter of the mysqli_stmt_bind_param below 
         * identifies each data type inserted: 
         *
         * i == integer
         * d == double (floating point)
         * s == string
         * b == blob (file/image)
         *
         *example: an integer, 2 strings, then a double would be: "issd"
         */

        mysqli_stmt_bind_param($stmt, 'sssiiiss',$FirstName,$LastName,$Email,$Family,$Epicurean,$Coffee,$Message,$ContactPreference);

        //execute sql command
        mysqli_stmt_execute($stmt) or die();

        //close statement
        @mysqli_stmt_close($stmt);

        //close connection
        @mysqli_close($iConn);

    //END CODE TO ADD TO CONTACT PAGE!-----------------
        echo '<p>Thanks for getting in touch!</p>
              <p><a href="">BACK</a></p>';
        
    }else{//show a form
        echo '
                  <form action="" method="post" name="sentMessage" id="contactForm">
                        <div class="control-group">
                          <div class="form-group floating-label-form-group controls">
                            <label>First Name</label>
                            <input type="text" class="form-control" placeholder="FirstName" id="firstname" name="FirstName" required data-validation-required-message="Please enter your first name.">
                            <p class="help-block text-danger"></p>
                          </div>
                        </div>
                        <div class="control-group">
                          <div class="form-group floating-label-form-group controls">
                            <label>Last Name</label>
                            <input type="text" class="form-control" placeholder="Last Name" id="lastname" name="LastName" required data-validation-required-message="Please enter your last name.">
                            <p class="help-block text-danger"></p>
                          </div>
                        </div>
                        <div class="control-group">
                          <div class="form-group floating-label-form-group controls">
                            <label>Email Address</label>
                            <input type="email" class="form-control" placeholder="Email Address" id="email" name="Email" required data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                          </div>
                        </div>                       
                        <div class="control-group">
                          <div class="container"> 
                              <label>What interests you?</label>
                                <div class="form-check">
                                    <input type="hidden" name="Family" value="0">
                                    <input class="form-check-label" type="checkbox" name="Family" id="Family" value="1">
                                    Fabulous family vacation!<br />
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="Epicurean" value="0">
                                    <input class="form-check-label" type="checkbox" name="Epicurean" id="Food" value="1">
                                    Outstanding epicurean experiences!<br />
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="Coffee" value="0">
                                    <input class="form-check-label" type="checkbox" name="Coffee" id="Coffee" value="1">
                                    Coffee! Coffee! Coffee!<br />
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                          <div class="form-group floating-label-form-group controls">
                            <label>How else may we help you?</label>
                            <textarea rows="5" class="form-control" placeholder="How else can we help you?" id="message" name="Message" data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                          </div>
                        </div>
                        <div class="form-check">
                              <label>How do you prefer to be contacted?</label><br />
                              <input class="form-check-label" type="radio" name="ContactPreference" id="interest1" value="phone" checked>
                                    Call me!<br />
                        </div>
                        <div class="form-check">
                              <input class="form-check-label" type="radio" name="ContactPreference" id="exampleRadios2" value="email">
                                    Email me the information.
                               <br /><br />
                        </div>
                        <br />
                        <div id="success">
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
                        </div>
                        
                    </form>
        ';
    }
?>
<?php get_footer()?>

<?php // place functions here.

        function process_post()
        {//loop through POST vars and return a single string
            $myReturn = ''; //set to initial empty value

            foreach($_POST as $varName=> $value)
            {#loop POST vars to create JS array on the current page - include email
                 $strippedVarName = str_replace("_"," ",$varName);#remove underscores
                if(is_array($_POST[$varName]))
                 {#checkboxes are arrays, and we need to collapse the array to comma separated string!
                     $myReturn .= $strippedVarName . ": " . implode(",",$_POST[$varName]) . PHP_EOL;
                 }else{//not an array, create line
                     $myReturn .= $strippedVarName . ": " . $value . PHP_EOL;
                 }
            }
            return $myReturn;
        }
?>