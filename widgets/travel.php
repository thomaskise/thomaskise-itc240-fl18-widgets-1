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
                                    <input type="hidden" name="Vacation" value="Not selected">
                                    <input class="form-check-label" type="checkbox" name="Vacation" id="Family" value="family">
                                    Fabulous family vacation!<br />
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="Food" value="Not selected">
                                    <input class="form-check-label" type="checkbox" name="Food" id="Food" value="food">
                                    Outstanding epicurean experiences!<br />
                                </div>
                                <div class="form-check">
                                    <input type="hidden" name="Coffee" value="Not selected">
                                    <input class="form-check-label" type="checkbox" name="Coffee" id="Coffee" value="coffee">
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
                              <input class="form-check-label" type="radio" name="ContactPreference" id="interest1" value="call" checked>
                                    Call me!<br />
                        </div>
                        <div class="form-check">
                              <input class="form-check-label" type="radio" name="ContactPreference" id="exampleRadios2" value="email info">
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