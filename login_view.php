<form action="inc/login_script.php" method="post">
   <div style="margin: 0 auto; max-width: 500px; margin-top: 50px; margin-bottom: 5px;">
      <table class="form-group">
         <label>Email :</label>
         <input id="name" class="form-control" name="email" placeholder="john.doe@email.com" type="text">
         <label style="margin-top: .5rem;">Password :</label>
         <input id="password" style="margin-bottom: 1rem;" class="form-control" name="password" placeholder="**********" type="password">
         <div align="center"><input name="submit" class="btn btn-secondary" type="submit" value="Login"></div>
         <span><?php
               echo $error;
               ?></span>
      </table>
   </div>
</form>