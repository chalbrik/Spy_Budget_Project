<?php include $this->resolve("partials/_header.php") ?>
<main>
    <div class="transaction-form">
        <h2>Add expense</h2>
        <form class="input-form" action="/add-expense" method="POST">
            <?php include $this->resolve('partials/_csrf.php'); ?>
            <input type="hidden" name="form_type" value="expense">
            <div class="form-amount-date">
                <div class="form-input">
                    <span>Amount</span>
                    <div class="amount-input-currency"><input class="amount-input <?php echo array_key_exists('amount', $errors) ? 'amount-input-error' : ''; ?>" type="number" name="amount"" type=" text" name="amount" />
                        <span class="currency <?php echo array_key_exists('amount', $errors) ? 'currency-error' : ''; ?>">pln</span>
                    </div>
                    <?php if (array_key_exists('amount', $errors)) : ?>
                        <span class="input-name validation-error-message">
                            <?php echo e($errors['amount'][0]); ?>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-input">
                    <span>Date</span>
                    <input class="date-input <?php echo array_key_exists('transaction-date', $errors) ? 'date-input-error' : ''; ?>" type="date" id="start" name="transaction-date" value="" min="" max="" />
                    <?php if (array_key_exists('transaction-date', $errors)) : ?>
                        <span class="input-name validation-error-message">
                            <?php echo e($errors['transaction-date'][0]); ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-input-category-container">
                <fieldset class="form-input category <?php echo array_key_exists('transaction-category', $errors) ? 'category-error' : ''; ?>">
                    <legend>Pick category:</legend>

                    <div class="radio-row">
                        <select class="category-data-input" name="transaction-category" id="<?php echo htmlspecialchars($incomeCategory['expense_category_name']); ?>">
                            <option></option>
                            <?php if (!empty($categories)) : ?>
                                <?php foreach ($categories as $expenseCategory) : ?>
                                    <option value="<?php echo htmlspecialchars($expenseCategory['expense_category_assigned_to_user_id']); ?>"><?php echo htmlspecialchars($expenseCategory['expense_category_name']); ?></option>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>No categories available.</p>
                            <?php endif; ?>
                        </select>
                    </div>
                </fieldset>
                <?php if (array_key_exists('transaction-category', $errors)) : ?>
                    <span class="input-name validation-error-message">
                        <?php echo e($errors['transaction-category'][0]); ?>
                    </span>
                <?php endif; ?>
            </div>
            <div class="limit-container">
                <div class="limit-card"><span class="limit-name">Limit info</span><span id="limit-info">Pick category to see the limit.</span></div>
                <div class="limit-card"><span class="limit-name">Limit value</span><span id="limit-value">Pick category to see how much money has been spent on this category.</span></div>
                <div class="limit-card"><span class="limit-name">Cash left</span><span id="cash-left">Set inputs to see how much cash you have left to spend this month.</span></div>
            </div>
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