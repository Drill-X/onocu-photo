<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= service('validation')->listErrors() ?>

<form action="/login" method="post">
    <?= csrf_field() ?>

    <label for="username">Username</label>
    <input type="input" name="username" /><br />

    <label for="password">Password</label>
    <input type="password" name="password"><br />

    <input type="submit" name="submit" value="Login" />
</form>