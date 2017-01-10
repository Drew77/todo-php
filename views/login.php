<h3>Login</h3>

<?php if(isset($error)){ ?>
    <h3 style="background: red"> <?php echo $error; ?> </h3>
    <?php } ?>
    



<form  class="login" method="POST" action="login.php">
    <input type="text" name="username" placeholder="username">
    <input type="password" name="password" placeholder="password">
    <button>Login</button>
</form>
