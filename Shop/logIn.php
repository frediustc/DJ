
<?php include 'php/include/head.php' ?>
<div class="container">
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger" role="alert"><strong>Error</strong> Email or password is wrong</div>
    <?php endif; ?>
</div>
<div class="content login-box">
    <div class="login-main">
        <div class="wrap">
            <h1>LOGIN OR CREATE AN ACCOUNT</h1>
            <div class="login-left">
                <h3>NEW CUSTOMERS</h3>
                <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                <a class="acount-btn" href="register.php">Creat an Account</a>
            </div>
            <div class="login-right">
                <h3>REGISTERED CUSTOMERS</h3>
                <p>If you have an account with us, please log in.</p>
                <form method="post" action="../php/script/UserReg.php">
                    <div>
                        <span>Email Address<label>*</label></span>
                        <input type="email" required name="em">
                    </div>
                    <div>
                        <span>Password<label>*</label></span>
                        <input type="password" required name="ps">
                    </div>
                    <input type="submit" value="Login" name="log"/>
                </form>
            </div>
            <div class="clear"> </div>
        </div>
    </div>
</div>
<?php include 'php/include/foot.php' ?>
