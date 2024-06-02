<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo e($title); ?> - Spy Budget</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="/assets/style.css" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark custom-bg-color custom-position">
            <!-- <button class="navbar-toggler navbar-toggler-custom" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <div class="collapse navbar-collapse justify-content-md-center custom-position" id="navbarsExample08">
                <?php if (isset($_SESSION['user'])) : ?>
                    <ul class="navbar-nav custom-width">
                        <li class="nav-item active custom-layout-logo">
                            <img class="logo" src="/assets/icons/pie-chart-logo.svg" alt="Logo" />
                            <a class="nav-link custom-font-logo" href="/userpage">spy <br />budget</span> </a>
                        </li>
                        <li class="nav-item-add nav-item dropdown nav-item-custom-postion">
                            <img id="add" class="nav-icon" src="/assets/icons/plus-lg.svg" alt="Add" />
                            <a class="nav-link custom-font nav-name-add" href="/add-income">Income</a>
                            <p class="custom-font"> / </p>
                            <a class="nav-link custom-font nav-name-add" href="/add-expense">Expense</a>
                        </li>
                        <li class="nav-item nav-item-custom-postion">
                            <img id="check-balance" class="nav-icon" src="/assets/icons/graph-up-arrow.svg" alt="Check balance" />
                            <a class="nav-link custom-font nav-link-check-balance nav-name-check-balance" href="/check-balance">Check balance</a>
                        </li>
                        <li class="nav-item nav-item-custom-postion">
                            <img id="track-expenses" class="nav-icon" src="/assets/icons/calculator.svg" alt="Track expenses" />
                            <a class="nav-link custom-font nav-link-check-balance nav-name-check-balance" href="/track-expenses">Track expenses</a>
                        </li>
                        <li class="nav-item nav-item-custom-postion">
                            <img id="settings" class="nav-icon" src="/assets/icons/gear.svg" alt="Settings" />
                            <a class="nav-link custom-font nav-name-settings" href="/settings">Settings</a>
                        </li>
                        <li class="nav-item nav-item-custom-postion">
                            <img id="log-out" class="nav-icon" src="/assets/icons/box-arrow-right.svg" alt="Log out" />
                            <a class="nav-link custom-font nav-name-log-out" href="/logout">Log out</a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </nav>
    </header>