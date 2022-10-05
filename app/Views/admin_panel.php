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


    <section class="user-list">
        <h3>User list:</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Delete user?</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($user_list as $user): ?>
                <tr>
                    <th scope="row"><?= esc($user->id) ?></th>
                    <td>Email: <?= esc($user->email) ?></td>
                    <td>Username: <?= esc($user->username) ?></td>
                    <td>
                        <form action="/admin/deluser" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="userId" value="<?= esc($user->id) ?>">
                            <input type="submit" name="submit" value="Delete user">
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
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