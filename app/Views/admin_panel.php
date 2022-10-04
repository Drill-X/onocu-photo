<?php /* View for the admin index display panel */ ?>

<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?><?= lang('Auth.login') ?> <?= $this->endSection() ?>

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


    <section class="user-list">
    <h3>User list:</h3>
    <ul>
        <?php foreach ($user_list as $user): ?>
            <li>
                <p>Id: <?= esc($user->id) ?></p>
                <p>Email: <?= esc($user->email) ?></p>
                <p>Username: <?= esc($user->username) ?></p>
                <form action="/admin/deluser" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="userId" value="<?= esc($user->id) ?>">
                    <input type="submit" name="submit" value="Delete user">
                </form>
            </li>
        <?php endforeach ?>
    </ul>
    </section>


    <section class="add-user">
        <form action="/admin/adduser" method="post">
            <?= csrf_field() ?>
            <label for="username">Username</label>
            <input type="input" name="username">

            <label for="password">Password</label>
            <input type="input" name="password">

            <label for="password_confirm">Confirm password</label>
            <input type="input" name="password_confirm">

            <input type="submit" name="submit" value="Create user">
        </form>
    </section>

<?= $this->endSection() ?>