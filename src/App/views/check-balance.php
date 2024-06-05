<?php include $this->resolve("partials/_header.php") ?>

<main class="check-balance-page">
    <div class="check-balance-main-container">
        <div class="period-for-data">
            <div class="check-balance-description-button">
                <span class="user-greeting">Hello </span>
                <span class="user-greeting user-name"><?php echo e($username) ?></span>
                <span class="user-greeting">, click here and see what you can do over here! </span>

            </div>
            <form id="time-frame-form" action="/check-balance" method="POST">
                <?php include $this->resolve('partials/_csrf.php'); ?>
                <label for="time-period">Select desired period for data</label>
                <select id="time-period" name="date" onchange="submitForm()">
                    <option value="all-history" <?php echo (isset($_SESSION['selectedTimePeriod']) && $_SESSION['selectedTimePeriod'] == 'all-history') ? 'selected' : ''; ?>>All history</option>
                    <option value="current-month" <?php echo (isset($_SESSION['selectedTimePeriod']) && $_SESSION['selectedTimePeriod'] == 'current-month') ? 'selected' : ''; ?>>Current month</option>
                    <option value="previous-month" <?php echo (isset($_SESSION['selectedTimePeriod']) && $_SESSION['selectedTimePeriod'] == 'previous-month') ? 'selected' : ''; ?>>Previous month</option>
                    <!-- <option value="current-year">Current year</option> -->
                    <!-- <option value="custom-date">Custom date</option> -->
                </select>
            </form>
        </div>
        <!-- <div class="check-balance-description-button"></div> -->
        <div class="check-balance-description">
            <p class="">1. Track your income and expenses -><span class=""> Pie charts visualize your income and expenses for the selected period.</span></p>
            <p>2. Select the analysis period -><span> Choose the period you are interested in from the dropdown menu to see data from the current month, previous month, or entire history.</span></p>
            <p>3. Analyze your financial balance -><span> Check how much you earn and spend to better manage your budget.</span></p>
        </div>
        <div class="incomes-expenses-charts">
            <div class="incomes-charts">
                <div class="chart-name">Incomes</div>
                <div class="chart">
                    <canvas id="incomeDoughnutChart" class="incomes-doughnut-chart"></canvas>
                </div>
                <div class="chart-sum-value">Total : <?php echo e($totalIncomesAmount); ?> pln</div>
            </div>
            <div class="expenses-charts">
                <div class="chart-name">Expenses</div>
                <div class="chart">
                    <canvas id="expensesDoughnutChart" class="expenses-doughnut-chart"></canvas>
                </div>
                <div class="chart-sum-value">Total : <?php echo e($totalExpensesAmount); ?> pln</div>
            </div>
        </div>
        <div class="bilans-score <?php echo ($totalIncomesAmount - $totalExpensesAmount >= 0) ? 'bilans-plus' : 'bilans-minus' ?>">
            <span>Your bilans score : </span>
            <span class="bilans-score-value"><?php echo e($totalIncomesAmount - $totalExpensesAmount); ?></span>
            <span class="bilans-score-value">pln</span>
        </div>
        <div class="savings-chart">
            <canvas id="savingsLineChart" class="savings-line-chart"></canvas>
        </div>
    </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    //tworze zmienną globalną dla nazw kategorii moich wykresów
    var incomesLabels = <?php echo json_encode($incomesLabels); ?>;
    var incomesValues = <?php echo json_encode($incomesValues); ?>;
    var expensesLabels = <?php echo json_encode($expensesLabels); ?>;
    var expensesValues = <?php echo json_encode($expensesValues); ?>;
</script>



<?php include $this->resolve("partials/_footer.php") ?>