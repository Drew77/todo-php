<h1>User Registration</h1>


<?php if(isset($error)){ ?>
    <h3 style="background: red"> <?php echo $error; ?> </h3>
    <?php } ?>

<form class="register" method="POST" action="register.php">
    <input type="text" maxlength="15" name="username" placeholder="username">
    <input type="password" name="password" placeholder="password">
    <input type="password" name="confirmation" placeholder="confirm password">
    <button>Register</button>
</form>

<p>Or <a href="/todo/login.php?">Login</a></p>
