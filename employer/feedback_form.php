

<br><br>
        <center><form action="<?php echo htmlspecialchars('finish_contract_parse.php');?>" method='post'>
        <br>

        <h3>How do you rate your overall experience?</h3>
                <p><br>
                    
                    <input type="radio" name="app_experience" id="radio_experience" value="1" required>
                    Bad
                                       
                    <input type="radio" name="app_experience" id="radio_experience" value="2" >
                    Average                  

                    <input type="radio" name="app_experience" id="radio_experience" value="3" >
                    Good
                    
                    <input type="radio" name="app_experience" id="radio_experience" value="4" >
                    Very Good

                    <input type="radio" name="app_experience" id="radio_experience" value="5">
                    excellent
                </p>

        <textarea id="description" name="app_summary" placeholder="Write a few words here." wrap="hard" required></textarea>

          <input type="hidden" name="tid" value="<?php echo $tid; ?>"/>
          <input type="hidden" name="aid" value="<?php echo $aid; ?>"/>
        <input type="hidden" name="contract_id" value="<?php echo $contract_id; ?>"/>
        <br><br>
        <input type='submit' name='submit' value='Give Feedback'>
    </center><br><br>