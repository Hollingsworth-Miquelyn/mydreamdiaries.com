<?php
?>
<div id="contactus">
        <h1>Contact Me</h1>
        <?php 
          if(!empty($reply)){
              echo "<p class='notify'>$reply</p>";
          }
          unset($reply);
        ?>
        <p>All fields are required.</P>
        <form action="/?action=contact" method="POST" id="contactform">
        
  <fieldset>

   <label for="firstname">First Name:</label>

   <input type="text" name="firstname" id="firstname" size="10" required> <br>

   <label for="lastname">Last Name:</label>

   <input type="text" name="lastname" id="lastname" size="15" required> <br>

   <label for="email">Email Address:</label>

   <input type="email" name="email" id="email" size="30" required> <br>

   <label for="subject">Subject:</label>

   <input type="text" name="subject" id="subject" size="60" required> <br>

   <label for="message">Message</label>

   <textarea name="message" id="message" rows="10" cols="60" required> </textarea>
                
   <p>Answer the following CAPTCHA question in the box below.</p>

   <label for="captcha">What color is a red apple?</label>

   <input type="text" name="captcha" id="captcha" size="5" required><br> 
   
   <label for="action">&nbsp;</label>

   <input type="submit" name="action" id="action" value="Send">

  </fieldset>

</form> 
</div>
   
