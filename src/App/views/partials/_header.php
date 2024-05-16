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
            <button class="navbar-toggler navbar-toggler-custom" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-md-center custom-position" id="navbarsExample08">
                <ul class="navbar-nav custom-width">
                    <li class="nav-item active custom-layout-logo">
                        <img class="logo" src="./assets/pie-chart-logo.svg" alt="Logo" />
                        <a class="nav-link custom-font-logo" href="./userpage.php">spy <br />budget</span> </a>
                    </li>
                    <li class="nav-item dropdown nav-item-custom-postion">
                        <img id="add" class="nav-icon" src="./assets/plus-lg.svg" alt="Add" />
                        <a class="nav-link dropdown-toggle custom-font nav-name-add" href="#" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" hidden>Add</a>
                        <div class="dropdown-menu dropdown-menu-custom-bg-color dropdown-menu-custom-position custom-font" aria-labelledby="dropdown08">
                            <a class="dropdown-item custom-font" href="./add-income.php">Add income</a>
                            <a class="dropdown-item custom-font" href="./add-expense.php">Add expense</a>
                        </div>
                    </li>
                    <li class="nav-item nav-item-custom-postion">
                        <img id="check-balance" class="nav-icon" src="./assets/graph-up-arrow.svg" alt="Check balance" />
                        <a class="nav-link custom-font nav-link-check-balance nav-name-check-balance" href="./check-balance.php" hidden>Check balance</a>
                    </li>
                    <li class="nav-item nav-item-custom-postion">
                        <img id="track-expenses" class="nav-icon" src="./assets/calculator.svg" alt="Track expenses" />
                        <a class="nav-link custom-font nav-link-check-balance nav-name-check-balance" href="./check-balance.php" hidden>Track expenses</a>
                    </li>
                    <li class="nav-item nav-item-custom-postion">
                        <img id="settings" class="nav-icon" src="./assets/gear.svg" alt="Settings" />
                        <a class="nav-link custom-font nav-name-settings" href="./settings.html" hidden>Settings</a>
                    </li>
                    <li class="nav-item nav-item-custom-postion">
                        <img id="log-out" class="nav-icon" src="./assets/box-arrow-right.svg" alt="Log out" />
                        <a class="nav-link custom-font nav-name-log-out" href="./log-out.php" hidden>Log out</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>