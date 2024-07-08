<?php include $this->resolve("partials/_header.php") ?>

<main>
    <div class="settings-main-frame">
        <div class="settings-fields">
            <!-- mogę zrobić tutaj formularz i w zależności co jest kliknięte przez użtykownika to wyświeltam inny partial niżej -->
            <!-- <a class="settings-fields-name" href="/settings">Profile information</a> -->
            <!-- <a class="settings-fields-name" href="">Transaction Categories</a> -->
            <form action="/settings" method="POST">
                <?php include $this->resolve('partials/_csrf.php'); ?>
                <input class="settings-fields-name" type="submit" id="profile-information" name="settings-field-name" value="Profile information">
                <input class="settings-fields-name" type="submit" id="transaction-categories" name="settings-field-name" value="Transaction Categories">

            </form>
        </div>
        <div class="settings-options" style="<?php echo ($selectedSettingsFieldTab == 'Transaction Categories') ? 'flex-direction: row;' : ''; ?>">
            <!-- w zależności od tego jaka kategoria ustawień jest zaznaczona wyżej wyswietlam inny partial  -->
            <?php
            if ($selectedSettingsFieldTab == 'Profile information') {
                include $this->resolve('partials/_profile-information.php');
            } elseif ($selectedSettingsFieldTab == 'Transaction Categories') {
                include $this->resolve('partials/_transaction-categories.php');
            }
            ?>
        </div>
    </div>
</main>

<?php include $this->resolve("partials/_footer.php") ?>