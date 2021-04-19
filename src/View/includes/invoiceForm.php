<section class="invoice-form">
    <h2>Create a new invoice : </h2>
    <form action="" method="post">
        <label for="invoiceNumber" class="label-desktop-one">Invoice number</label>
        <input type="text" name="invoiceNumber" value="<?= $invoice['invoiceNumber'] ?>">

        <label for="invoiceDate" class="label-desktop-two">Invoice date</label>
        <input type="date" name="invoiceDate" value="<?= $invoice['invoiceDate'] ?>">

        <label for="company" class="label-desktop-three">Company</label>
        <select name="company" id="company">
            <?php foreach ($companies as $company) : ?>
                <option value="<?= $company['companyID'] ?>" <?php if ($invoice['company'] == $company['companyID']) : echo 'selected';
                                                                endif; ?>><?= $company['companyName'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="contact" class="label-desktop-four">Contact for the invoice</label>
        <select name="contact" id="contact">
            <?php foreach ($contacts as $contact) : ?>
                <option value="<?= $contact['peopleID'] ?>" <?php if ($invoice['employee'] == $contact['peopleID']) : echo 'selected';
                                                            endif; ?>><?= $contact['firstName'] . " " . $contact['lastName'] ?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit" value="create">
    </form>
</section>