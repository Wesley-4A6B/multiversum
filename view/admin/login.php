<?php require_once('assets/custom/template/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mt-2">Login</h5>
                </div>
                <div class="card-body">
                    <form role="form" method="post" action="">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="email@example.com" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password">Wachtwoord</label>
                            <input type="password" name="password" class="form-control" placeholder="Wachtwoord" autocomplete="off">
                        </div>
                        <input type="submit" name="login" class="btn btn-success btn-lg btn-block" value="Log in">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('assets/custom/template/footer.php'); ?>