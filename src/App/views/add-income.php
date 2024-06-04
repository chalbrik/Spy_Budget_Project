<?php include $this->resolve("partials/_header.php") ?>

<main>
    <div class="transaction-form">
        <h2>Add income</h2>
        <form class="input-form" method="POST" action="/add-income">
            <?php include $this->resolve('partials/_csrf.php'); ?>
            <input type="hidden" name="form_type" value="income">
            <div class="form-amount-date">
                <div class="form-input">
                    <span>Amount</span>
                    <div class="amount-input-currency"><input class="amount-input" type="text" name="amount" />
                        <span class="currency">pln</span>
                    </div>
                    <?php if (array_key_exists('amount', $errors)) : ?>
                        <span class="input-name validation-error-message">
                            <?php echo e($errors['amount'][0]); ?>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-input">
                    <span>Date</span>
                    <input class="date-input" type="date" id="start" name="transaction-date" value="" min="" max="" />
                    <?php if (array_key_exists('transaction-date', $errors)) : ?>
                        <span class="input-name validation-error-message">
                            <?php echo e($errors['transaction-date'][0]); ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div>

            <fieldset class="form-input category">
                <legend>Pick category:</legend>

                <div class="radio-row">
                    <?php if (!empty($categories)) : ?>
                        <?php foreach ($categories as $incomeCategory) : ?>
                            <div class="form-check">
                                <input type="radio" id="<?php echo htmlspecialchars($incomeCategory['income_category_name']); ?>" name="transaction-category" value="<?php echo htmlspecialchars($incomeCategory['income_category_assigned_to_user_id']); ?>" class="form-check-input">
                                <label for="<?php echo htmlspecialchars($incomeCategory['income_category_name']); ?>" class="form-check-label"><?php echo htmlspecialchars($incomeCategory['income_category_name']); ?></label>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>No categories available.</p>
                    <?php endif; ?>
                </div>
            </fieldset>

            <div class="form-input-note">
                <span>Note</span>
                <textarea class="form-control" name="note" aria-label="With textarea"></textarea>
                <?php if (array_key_exists('note', $errors)) : ?>
                    <span class="input-name validation-error-message">
                        <?php echo e($errors['note'][0]); ?>
                    </span>
                <?php endif; ?>
            </div>

            <div class="form-button-action">
                <div class="done-button button-action"><img src="assets/icons/check-lg.svg" alt="Done"><button type="submit">Done</button></div>
            </div>

        </form>
    </div>

</main>

<?php include $this->resolve("partials/_footer.php") ?>