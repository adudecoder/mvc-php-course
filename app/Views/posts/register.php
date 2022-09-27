<div class="col-md-8 mx-auto p-5">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= URL ?>/posts">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page">Register</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body bg-light">

            <div class="card-header bg-secondary text-white input-group-text d-flex justify-content-center">
                Register Post
            </div>

            <form name="resgiter" method="POST" action="<?= URL ?>/posts/register" class="mt-4">
                <div class="form-group">
                    <label for="title">title: <sup class="text-danger">*</sup> </label>
                    <input type="text" name="title" id="title" value="<?= $dados['title'] ?>" class="form-control <?= $dados['error_title'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $dados['error_title'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text">text: <sup class="text-danger">*</sup> </label>
                    <textarea name="text" id="text" class="form-control <?= $dados['error_text'] ? 'is-invalid' : '' ?>" rows="5"><?= $dados['text'] ?></textarea>
                    <div class="invalid-feedback">
                        <?= $dados['error_text'] ?>
                    </div>
                </div>

                <input type="submit" value="Register" class="btn btn-info btn-block">

            </form>
        </div>
    </div>
</div>