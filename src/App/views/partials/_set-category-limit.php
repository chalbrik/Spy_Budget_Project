<div class="settings-data" style="margin: 0px 5px 0px 5px;">

    <div class="settings-data-limit" style="margin: 0px 5px 0px 5px;">
        <h2 class="settings-data-title">Set limits for expenses categories</h2>
        <div>
            <div id="settings-expense-categories-list" class="settings-category-list-limit">
                <?php if (!empty($expensesCategories)) : ?>
                    <?php foreach ($expensesCategories as $expenseCategory) : ?>
                        <form action="/settings/category-limit/<?php echo e($expenseCategory['expense_category_assigned_to_user_id']); ?>" method="POST">
                            <input type="hidden" name="_METHOD" value="POST" />
                            <?php include $this->resolve('partials/_csrf.php'); ?>
                            <?php include $this->resolve('partials/_csrf.php'); ?>
                            <div class="settings-single-category-limit" style="display: flex; flex-direction:row; align-items:center">
                                <span class="settings-single-category"><?php echo $expenseCategory['expense_category_name'] ?> - </span>
                                <input class="settings-category-list-limit-input" type="number" name="category_limit" value="<?php echo $expenseCategory['category_limit'] ?>">
                                <span>pln</span>
                                <input type="submit" value="Update" class="settings-data-button-limit">
                            </div>

                        </form>


                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No categories available</p>
                <?php endif; ?>
            </div>
        </div>
    </div>