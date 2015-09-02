<?php include_once('header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="page-header">
                <h1>Login</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">

            <?php if (isset($_GET['m'])): ?>
                <div class="alert alert-danger">
                    <?php echo $_GET['m']; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="login.php">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <input type="submit" value="Login" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

<?php include_once('footer.php'); ?>
