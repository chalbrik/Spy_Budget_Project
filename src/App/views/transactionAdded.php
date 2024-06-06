<?php include $this->resolve("partials/_header.php") ?>

<main class="user-page">


    <div class="registered-page-position">
        <p class="custom-font">You have succsessfully added a transaction to your account!</p>
        <a class="custom-font main-userpage-header-button" href="/check-balance" style="margin-bottom: 10px;">Go to main user page.</a>
        <a class="custom-font main-userpage-header-button" href="/add-income" style="margin-bottom: 10px;">Add another income.</a>
        <a class="custom-font main-userpage-header-button" href="/add-expense" style="margin-bottom: 10px;">Add another expense.</a>
    </div>

</main>

<?php include $this->resolve("partials/_footer.php") ?>