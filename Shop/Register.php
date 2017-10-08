<?php include 'php/include/head.php' ?>
<div class="container">
    <?php include '../php/script/UserReg.php'; ?>
</div>
<div class="content login-box">
    <div class="login-main">
        <div class="wrap">
            <h1>CREATE AN ACCOUNT</h1>
            <div class="register-grids">
                <form  method="post" action="register.php">
                        <div class="register-top-grid">
                                <h3>PERSONAL INFORMATION</h3>
                                <div>
                                    <span>Full Name<label>*</label></span>
                                    <input type="text" name="fn" required>
                                </div>
                                <div>
                                    <span>Email Address<label>*</label></span>
                                    <input type="email" name="em" required>
                                </div>
                                <div class="clear"> </div>
                                <div>
                                    <span>Gender<label>*</label></span>
                                    <select class="" name="gd" required>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                        </div>
                        <div class="clear"> </div>
                        <div class="register-bottom-grid">
                                <h3>LOGIN INFORMATION</h3>
                                <div>
                                    <span>Password<label>*</label></span>
                                    <input type="password" name="ps" required>
                                </div>
                                <div>
                                    <span>Confirm Password<label>*</label></span>
                                    <input type="password" name="cn" required>
                                </div>
                                <div class="clear"> </div>
                        </div>
                        <div class="clear"> </div>
                        <input type="submit" value="submit" name="reg"/>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'php/include/foot.php' ?>
