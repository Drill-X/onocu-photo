<?php /* View for the admin index display panel */ ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Onocu | Admin Panel</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href= "css/index_style.css">
    </head>

    <body>
        <h3>User list:</h3>

        <ul class="user-list">
            <?php foreach ($user_list as $user): ?>
                <li>
                    <p>Id: <?= esc($user->id) ?></p>
                    <p>Email: <?= esc($user->email) ?></p>
                    <p>Username: <?= esc($user->username) ?></p>
                </li>
            <?php endforeach ?>
        </ul>

        <!-- TODO: Create user -->
    </body>
</html>