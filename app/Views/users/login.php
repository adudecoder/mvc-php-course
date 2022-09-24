<div class="col-xl-4 col-md-6 mx-auto p-5">
    <div class="card">
        <div class="card-body">

            <?= Session::msgAlert('user') ?>

            <div class="card-header bg-secondary text-white input-group-text d-flex justify-content-center">
                <h2>Login</h2>
            </div>
            <p class="card-text"> <small class="text-muted">Enter your details to login!</small> </p>
            
            <form name="resgiter" method="POST" action="<?= URL ?>/users/login" class="mt-4">
                <div class="form-group">
                    <label for="email">Email: <sup class="text-danger">*</sup> </label>
                    <input type="text" name="email" id="email" value="<?= $dados['email'] ?>" class="form-control <?= $dados['error_email'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $dados['error_email'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup class="text-danger">*</sup> </label>
                    <input type="password" name="password" id="password" value="<?= $dados['password'] ?>" class="form-control <?= $dados['error_password'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $dados['error_password'] ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <input type="submit" value="Login" class="btn btn-info btn-block">
                    </div>
                    <div class="col-md-6">
                        <a href="<?= URL ?>/users/register">Don't have an account? Register</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>