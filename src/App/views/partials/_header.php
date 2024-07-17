<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <title><?php echo e($title); ?> - Spy Budget</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="/assets/style.css" />
</head>

<body>
    <div class="custom-cursor" id="customCursor"></div>
    <header>

        <nav>
            <?php if (isset($_SESSION['user'])) : ?>
                <button class="navbar-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                    </svg>
                </button>
                <div class="mobile-navbar-panel mobile-navbar-panel-hidden"></div>
                <div class="navbar">
                    <button class="close-mobile-navbar-panel close-mobile-navbar-panel-hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                        </svg>
                    </button>
                    <ul class="navbar-nav">
                        <li class="nav-item active custom-layout-logo">
                            <img class="logo" src="/assets/icons/pie-chart-logo.svg" alt="Logo" />
                            <a class="nav-link custom-font-logo" href="/check-balance">spy <br />budget</span> </a>
                        </li>
                        <li class="nav-item nav-item-custom-postion">
                            <img id="check-balance" class="nav-icon" src="/assets/icons/graph-up-arrow.svg" alt="Check balance" />
                            <a class="nav-link custom-font nav-link-check-balance nav-name-check-balance" href="/check-balance">Check balance</a>
                        </li>
                        <li class="nav-item-add nav-item dropdown nav-item-custom-postion">
                            <img id="add" class="nav-icon" src="/assets/icons/plus-lg.svg" alt="Add" />
                            <a class="nav-link custom-font nav-name-add" href="/add-income">Income</a>
                        </li>
                        <li class="nav-item nav-item-custom-postion">
                            <img id="add" class="nav-icon" src="/assets/icons/plus-lg.svg" alt="Add" />
                            <a class="nav-link custom-font nav-name-add" href="/add-expense">Expense</a>
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
                </div>
            <?php endif; ?>
        </nav>


    </header>