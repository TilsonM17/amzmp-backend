<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<h3 class="text-center pt-5">Login form</h3>
<div class="container">
    <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
            <div id="login-box" class="col-md-12">
                <form id="login-form" class="form" action="<?= url_to('login_submit') ?>" method="post">
                    <h3 class="text-center text-info">Login</h3>
                    <div class="form-group">
                        <label for="email" class="text-info">Email:</label><br>
                        <input type="email" name="email" id="email" class="form-control">
                        <span class="text text-danger"><?= session()->getFlashdata('errors')['email'] ?? '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-info">Password:</label><br>
                        <input type="text" name="password" id="password" class="form-control">
                        <span class="text text-danger"><?= session()->getFlashdata('errors')['password'] ?? '' ?></span>
                    </div>
                    <div class="mt-3 form-group">
                        <input type="submit" name="submit" class="btn btn-info btn-md" value="Submit">
                    </div>

                    <div class=" mt-4 text-right">
                        <a href="#" class="text-info">Register here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>