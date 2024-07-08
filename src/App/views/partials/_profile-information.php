<div class="settings-data change-username">
    <span>Your current user name - <?php echo e($username) ?></span>
    <div>
        <span class="input-name">Change user name</span>
        <form action="">
            <?php include $this->resolve('partials/_csrf.php'); ?>
            <input type="text" name="new-username" class="settings-data-input">
            <input type="submit" value="Accept">
        </form>

    </div>

</div>
<div class="settings-data">
    <span>Change password</span>
    <form action="">
        <?php include $this->resolve('partials/_csrf.php'); ?>
        <div>
            <label for="">Type old password:</label>
            <input type="text">
        </div>

        <div><label for="">Type new password: </label>
            <input type="text">
            <label for="">Type new password again: </label>
            <input type="text">
        </div>
        <input type="submit" value="Change password">

    </form>


</div>
<div class="settings-data">
    <form action="">
        <input type="submit" value="Delete account">
    </form>

</div>