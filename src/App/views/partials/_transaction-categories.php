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
        <span>Add new income category</span>
        <div>
            <input type="text" class="settings-data-input">
            <input type="submit" value="Add" class="settings-data-button">
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
                    <span class="settings-single-category"><?php echo $expenseCategory['expense_category_name'] ?></span>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No categories available</p>
            <?php endif; ?>
        </div>
    </div>
    <form action="/settings-add-new-expense-category" method="POST" class="settings-add-new-category">
        <span>Add new expense category</span>
        <div>
            <input type="text" class="settings-data-input">
            <input type="submit" value="Add" class="settings-data-button">
        </div>
    </form>
</div>