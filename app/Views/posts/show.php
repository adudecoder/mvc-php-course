<div class="container my-5">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= URL ?>/posts">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $dados['post']->title ?></li>
        </ol>
    </nav>

    <div class="card text-center">
        <div class="card-header">
            <?= $dados['post']->title ?>
        </div>
        <div class="card-body">
            <p class="card-text"><?= $dados['post']->text ?></p>
        </div>
        <div class="card-footer text-muted">
            <small><?= $dados['user']->name ?> <?= Check::dateBr($dados['post']->created_in) ?></small>
        </div>

        <?php if ($dados['post']->id_user == $_SESSION['user_id']) : ?>

            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="<?= URL . '/posts/edit/' . $dados['post']->id ?>" class="btn btn-sm btn-primary">Editar</a>
                </li>
                <li class="list-inline-item">
                    <form action="<?= URL . '/posts/delete/' . $dados['post']->id ?>" method="POST">
                        <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                    </form>
                </li>
            </ul>

        <?php endif ?>

    </div>

</div>