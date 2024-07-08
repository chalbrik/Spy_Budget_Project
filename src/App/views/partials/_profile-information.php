<div class="settings-data">
    <h2 class="settings-data-title">Change your user name</h2>
    <div>
        <div class="change-username">
            <span>Your current user name is <span style="font-weight: 500;"><?php echo e($username) ?></span></span>
            <div>
                <span class="input-name">Type your new user name</span>
                <form action="/settings-change-username" method="POST">
                    <?php include $this->resolve('partials/_csrf.php'); ?>

                    <input type="text" name="new-username" class="settings-data-input <?php echo array_key_exists('new-username', $errors) ? 'settings-data-input-error' : ''; ?>">
                    <input type="submit" value="Accept" class="settings-data-button">

                </form>
                <?php if (array_key_exists('new-username', $errors)) : ?>
                    <span class="input-name validation-error-message">
                        <?php echo e($errors['new-username'][0]); ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>


    </div>

</div>
<div class="settings-data">
    <h2 class="settings-data-title">Change password</h2>
    <div class="change-password">
        <form action="/settings-change-password" method="POST">
            <?php include $this->resolve('partials/_csrf.php'); ?>
            <div class="change-password-line">
                <label class="change-password-input-label" for="old-password">Type old password:</label>
                <div style="display: flex; flex-direction:column;">
                    <input id="old-password" type="text" name="old-password" class="change-password-input settings-data-input">
                    <?php if (array_key_exists('old-password', $errors)) : ?>
                        <span class="input-name validation-error-message">
                            <?php echo e($errors['old-password'][0]); ?>
                        </span>
                        <div></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="change-password-line">
                <label class="change-password-input-label" for="new-password">Type new password: </label>
                <div style="display: flex; flex-direction:column;">
                    <input id="new-password" type="text" name="new-password" class="change-password-input settings-data-input">
                    <?php if (array_key_exists('new-password', $errors)) : ?>
                        <span class="input-name validation-error-message">
                            <?php echo e($errors['new-password'][0]); ?>
                        </span>
                        <div></div>
                    <?php endif; ?>
                </div>

            </div>
            <div class="change-password-line">
                <label class="change-password-input-label" for="new-password-repeat">Type new password again: </label>
                <div style="display: flex; flex-direction:column;">
                    <input id="new-password-repeat" type="text" name="new-password-repeat" class="change-password-input settings-data-input">
                    <?php if (array_key_exists('new-password-repeat', $errors)) : ?>
                        <span class="input-name validation-error-message">
                            <?php echo e($errors['new-password-repeat'][0]); ?>
                        </span>
                        <div></div>
                    <?php endif; ?>
                </div>
            </div>
            <input type="submit" value="Change password" class="settings-data-button change-password-button">

        </form>
    </div>


</div>
<div class="settings-data">
    <h2 class="settings-data-title">Delete account</h2>
    <form action="">
        <input type="submit" value="Delete account">
    </form>

</div>