<section class="users">
    <h2>All users :</h2>
    <table>
        <tr>
            <th>User name</th>
            <th>Admin</th>
        </tr>
        <?php foreach ($getUsers as $user) : ?>
            <tr>
                <td>
                    <a href="index.php?page=admin&mode=user&id=<?= $user['adminID'] ?>&userName=<?= $user['userName'] ?>"><?= $user['userName'] ?></a>
                </td>
                <td>
                    <?php if ($user['admin']) : ?>
                        administrator
                    <?php else : ?>
                        moderator
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>