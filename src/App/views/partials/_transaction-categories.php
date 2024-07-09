<div class="settings-data" style="margin: 0px 5px 0px 5px;">
    <h2 class="settings-data-title">Income categories</h2>
    <div>
        <span>All income categories</span>
        <div id="settings-income-categories-list" class="settings-category-list">
            <?php if (!empty($incomeCategories)) : ?>
                <?php foreach ($incomeCategories as $incomeCategory) : ?>
                    <span class="settings-single-category"><?php echo $incomeCategory['income_category_name'] ?></span>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No categories available</p>
            <?php endif; ?>
        </div>
    </div>
    <form action="/settings-add-new-income-category" method="POST" class="settings-add-new-category">
        <?php include $this->resolve('partials/_csrf.php'); ?>
        <div style="display: flex; flex-direction:column;">
            <span>Add new income category</span>
            <div style="display: flex; flex-direction:row;">
                <input type="text" name="new-income-category" class="settings-data-input">
                <input type="submit" value="Add" class="settings-data-button">

            </div>
            <?php if (array_key_exists('new-income-category', $errors)) : ?>
                <span class="input-name validation-error-message">
                    <?php echo e($errors['new-income-category'][0]); ?>
                </span>
            <?php endif; ?>
        </div>
    </form>
</div>

<div class="settings-data" style="margin: 0px 5px 0px 5px;">
    <h2 class="settings-data-title">Expense categories</h2>
    <div>
        <span>All expense categories</span>
        <div id="settings-expense-categories-list" class="settings-category-list">
            <?php if (!empty($expensesCategories)) : ?>
                <?php foreach ($expensesCategories as $expenseCategory) : ?>
                    <form action="/settings/category/<?php echo e($expenseCategory['expense_category_assigned_to_user_id']); ?>" method="POST">
                        <input type="hidden" name="_METHOD" value="DELETE" />
                        <?php include $this->resolve('partials/_csrf.php'); ?>
                        <div style="display: flex; flex-direction:row; align-items:center">
                            <span class="settings-single-category"><?php echo $expenseCategory['expense_category_name'] ?></span>
                            <button class="settings-category-delete-button" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                </svg>
                            </button>
                        </div>
                    </form>


                <?php endforeach; ?>
            <?php else : ?>
                <p>No categories available</p>
            <?php endif; ?>
        </div>
    </div>
    <form action="/settings-add-new-expense-category" method="POST" class="settings-add-new-category">
        <?php include $this->resolve('partials/_csrf.php'); ?>

        <div style="display: flex; flex-direction:column;">
            <span>Add new expense category</span>
            <div style="display: flex; flex-direction:row;">
                <input type="text" name="new-expense-category" class="settings-data-input">
                <input type="submit" value="Add" class="settings-data-button">
            </div>
            <?php if (array_key_exists('new-expense-category', $errors)) : ?>
                <span class="input-name validation-error-message">
                    <?php echo e($errors['new-expense-category'][0]); ?>
                </span>
            <?php endif; ?>
        </div>
    </form>
</div>