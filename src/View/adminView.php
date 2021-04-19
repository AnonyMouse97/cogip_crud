<?php
require 'includes/header.php';
?>

<div class="admin-view">
    <a href="index.php?page=admin&session=destroy" id="disconnect">Disconnect</a>

    <h3 class="welcome-message">Welcome <?= $_SESSION['userName'] ?> !</h3>

    <?php if (isset($_GET['mode']) && $_GET['mode'] == 'invoice') : ?>
        <?php require 'includes/invoiceForm.php'; ?>

    <?php elseif (isset($_GET['mode']) && $_GET['mode'] == 'contact') : ?>
        <?php require 'includes/contactForm.php'; ?>

    <?php elseif (isset($_GET['mode']) && $_GET['mode'] == 'company') : ?>
        <?php require 'includes/companyForm.php'; ?>

    <?php elseif (isset($_GET['mode']) && $_GET['mode'] == 'user' && isset($_GET['id']) && isset($_GET['userName']) && $_SESSION['admin']) : ?>
        <?php require 'includes/userForm.php'; ?>

    <?php elseif (isset($_GET['mode']) && $_GET['mode'] == 'user' && $_SESSION['admin']) : ?>
        <?php require 'includes/user.php'; ?>


    <?php else : ?>
        <ul class="new-icc">
            <li><a href="index.php?page=admin&mode=invoice">New invoice</a></li>
            <li><a href="index.php?page=admin&mode=contact">New contact</a></li>
            <li><a href="index.php?page=admin&mode=company">New company</a></li>
        </ul>
    <?php
        require 'includes/lastInvoices.php';
        require 'includes/lastContacts.php';
        require 'includes/lastCompanies.php';
    endif; ?>
</div>

<?php
require 'includes/footer.php';
?>