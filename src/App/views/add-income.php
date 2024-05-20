<?php include $this->resolve("partials/_header.php") ?>

<main>
    <div class="transaction-form">
        <h2>Add income</h2>
        <form class="input-form" action="add-income-to-database.php" method="post">

            <div class="form-amount-date">
                <div class="form-input">
                    <span>Amount</span>
                    <div class="amount-input-currency"><input class="amount-input" type="text" name="amount" />
                        <span class="currency">pln</span>
                    </div>
                </div>
                <div class="form-input">
                    <span>Date</span>
                    <input class="date-input" type="date" id="start" name="transaction-date" value="" min="" max="" />

                </div>
            </div>

            <fieldset class="form-input category">
                <legend>Pick category:</legend>

                <div class="radio-row">

                </div>
            </fieldset>

            <div class="form-input-note">
                <span>Note</span>
                <textarea class="form-control" name="note" aria-label="With textarea"></textarea>
            </div>

            <div class="form-button-action">
                <div class="cancel-button button-action"><img src="./assets/x-lg.svg" alt="Cancel"><a href="./userpage.php"><button>Cancel</button></a></div>
                <div class="done-button button-action"><img src="./assets/check-lg.svg" alt="Done"><button type="submit">Done</button></div>
            </div>

        </form>
    </div>

</main>

<?php include $this->resolve("partials/_footer.php") ?>