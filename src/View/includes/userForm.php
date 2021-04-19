<section class="user-form">
    <h2>Update an user : </h2>
    <form action="" method="post">
        <label for="admin">Set <?= $_GET['userName'] ?> role :</label>

        <select name="admin" id="admin">
            <option value="0">Moderator</option>
            <option value="1">Administrator</option>
        </select>

        <input type="submit" value="update">
    </form>
</section>