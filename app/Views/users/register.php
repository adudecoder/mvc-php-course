<div class="col-xl-4 col-md-6 mx-auto p-5">
    <div class="card">
        <div class="card-body">
            <div class="card-header bg-secondary text-white input-group-text d-flex justify-content-center">
                <h2>Register</h2>
            </div>
            <p class="card-text"> <small class="text-muted">Fill in the form below to register</small> </p>
            <form name="resgiter" method="POST" action="<?= URL ?>/users/register" class="mt-4">
                <div class="form-group">
                    <label for="name">Name: <sup class="text-danger">*</sup> </label>
                    <input type="text" name="name" id="name" value="<?= $dados['name'] ?>" class="form-control <?= $dados['error_name'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $dados['error_name'] ?>
                    </div>
                </div>
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
                <div class="form-group">
                    <label for="password_confirm">Confirm the Password: <sup class="text-danger">*</sup> </label>
                    <input type="password" name="password_confirm" id="password_confirm" value="<?= $dados['password_confirm'] ?>" class="form-control <?= $dados['error_password_confirm'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $dados['error_password_confirm'] ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <input type="submit" value="Register" class="btn btn-info btn-block">
                    </div>
                    <div class="col-md-6">
                        <a href="<?= URL ?>/users/login">Do you have an account? login</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>