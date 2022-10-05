<?php /* View for the admin index display panel */ ?>

<?= $this->extend('App\Views\templates\skeleton') ?>

<?= $this->section('title') ?><?= $title ?> <?= $this->endSection() ?>

<?= $this->section('main') ?>
    <?php /* Alerts 'n stuff (copied from login.php) */ ?>
    <?php if (session('error') !== null) : ?>
        <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
    <?php elseif (session('errors') !== null) : ?>
        <div class="alert alert-danger" role="alert">
            <?php if (is_array(session('errors'))) : ?>
                <?php foreach (session('errors') as $error) : ?>
                    <?= $error ?>
                    <br>
                <?php endforeach ?>
            <?php else : ?>
                <?= session('errors') ?>
            <?php endif ?>
        </div>
    <?php endif ?>

    <?php if (session('message') !== null) : ?>
    <div class="alert alert-success" role="alert"><?= session('message') ?></div>
    <?php endif ?>


    <!-- TODO:
        - Preview in the middle of the screen (I'll leave it blank for now, but space should be reserved)
        - Upload photos 
        - Header with user management (logout, change password, change username?)
        - Footer with save option
    -->



<?= $this->endSection() ?>