<h1>Login</h1>
<?php
  if (isset($renderOptions['error'])) { ?>
    <p class="msg error"><?php echo $renderOptions['error']; ?></p>
<?php } ?>
<form class="login"  method="POST" action="index.php?action=Login" >
  <!-- <label>Name :</label> -->
  <input type='text' name='name' placeholder="Your Name" autofocus required />
  <br/>
  <!-- <label>Password :</label> -->
  <input type="password" name="password" placeholder="Your password" required />
  <br/>
  <input type='hidden' name="lastPage" value="<?php echo $renderOptions['lastPage']; ?>" />
  <input type="submit" value="Connection" />
</form>
