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
            Written by: <?= $dados['user']->name ?> <?= Check::dateBr($dados['post']->created_in) ?>
        </div>
    </div>

</div>