<section class="company-form">
    <h2>Create a new company : </h2>
    <form action="" method="post">
        <label for="companyName">Company name</label>
        <input type="text" name="companyName" value="<?= $company['companyName'] ?>">

        <label for="vatNumber">VAT</label>
        <input type="text" name="vatNumber" value="<?= $company['vatNumber'] ?>">

        <label for="country">Country</label>
        <input type="text" name="country" value="<?= $company['country'] ?>">

        <label for="type">Type</label>
        <select name="type" id="type">
            <option value="client" <?php if ($company['type'] == 'client') : echo 'selected';
                                    endif; ?>>Client</option>
            <option value="provider" <?php if ($company['type'] == 'provider') : echo 'selected';
                                        endif; ?>>Supplier</option>
        </select>

        <input type="submit" value="create">
    </form>
</section>