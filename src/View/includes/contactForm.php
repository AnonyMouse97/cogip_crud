<section class="contact-form">
    <h2>Create a new contact : </h2>
    <form action="" method="post">
        <label for="lastName">Last name</label>
        <input type="text" name="lastName" value="<?= $contact['lastName'] ?>">

        <label for="firstName">First name</label>
        <input type="text" name="firstName" value="<?= $contact['firstName'] ?>">

        <label for="phone">Phone number</label>
        <input type="text" name="phone" value="<?= $contact['phone'] ?>">

        <label for="email">Email</label>
        <input type="text" name="email" value="<?= $contact['email'] ?>">

        <label for="company">Company</label>
        <select name="company" id="company">
            <?php foreach ($companies as $company) : ?>
                <option value="<?= $company['companyID'] ?>" <?php if ($contact['company'] == $company['companyID']) : echo 'selected';
                                                                endif; ?>><?= $company['companyName'] ?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit" value="create">
    </form>
</section>