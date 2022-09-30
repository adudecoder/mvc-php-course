<div class="container py-5">

    <?= Session::msgAlert('post') ?>

    <div class="card">

        <div class="card-header bg-info text-white">
            POSTAGENS
            <div class="float-end">
                <a href="<?= URL ?>/posts/register" class="btn btn-light">Write</a>
            </div>
        </div>

        <div class="card-body">
            <?php foreach ($dados['posts'] as $post) : ?>
                <div class="card my-5">
                    <div class="card-header">
                        <?= $post->title ?>
                    </div>
                    <div class="card-body">
                        <!-- <h5 class="card-title">Special title treatment</h5> -->
                        <p class="card-text"><?= $post->text ?></p>
                        <a href="#" class="btn btn-primary float-right">Read more</a>
                    </div>
                    <div class="card-footer text-muted">
                        Written by: <?= $post->name ?> <?= date('d/m/Y H:i', strtotime($post->postRegistrationDate)) ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

    </div>

</div>