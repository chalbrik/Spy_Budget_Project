<?php include $this->resolve("partials/_header.php") ?>

<main class="check-balance-page">
    <div class="check-balance-main-container">

        <form id="time-frame-form" class="period-for-data" action="./check-balance.php" method="post">
            <label for="time-period">Select desired period for data</label>
            <select id="time-period" name="date" onchange="submitForm()">
                <option value="all-history">All history</option>
                <option value="current-month">Current month</option>
                <option value="previous-month">Previous month</option>
                <!-- <option value="current-year">Current year</option> -->
                <!-- <option value="custom-date">Custom date</option> -->
            </select>
        </form>
        <div class="incomes-expenses-charts">
            <div class="incomes-charts">
                <div class="chart-name">Incomes</div>
                <div class="chart">
                    <canvas id="incomeDoughnutChart" class="incomes-doughnut-chart"></canvas>
                </div>
                <div class="chart-sum-value">Total: pln</div>
            </div>
            <div class="expenses-charts">
                <div class="chart-name">Expenses</div>
                <div class="chart">
                    <canvas id="expensesDoughnutChart" class="expenses-doughnut-chart"></canvas>
                </div>
                <div class="chart-sum-value">Total: pln</div>
            </div>
        </div>
        <div class="bilans-chart">
            <canvas id="bilansLineChart" class="bilans-line-chart"></canvas>
        </div>
    </div>
    </div>
</main>

<?php include $this->resolve("partials/_footer.php") ?>