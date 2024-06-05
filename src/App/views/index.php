<?php include $this->resolve("partials/_header.php") ?>

<main>
    <div class="log-in-sign-up-main-container">
        <div class="left-side">
            <div class="logo-and-header">
                <img class="logo" src="/assets/icons/pie-chart-logo.svg" alt="Logo" />

                <h1>budget</h1>
            </div>
            <div class="home-page-description">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                    <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z" />
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12" />
                </svg>
                <p class="description">Manage your personal finances.</p>
            </div>
            <div class="home-page-description">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                </svg>
                <p class="description">Track your expenses and plan investments.</p>
            </div>
            <div class="home-page-description">
                <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" fill="currentColor" class="bi bi-clipboard-data" viewBox="0 0 16 16">
                    <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0z" />
                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z" />
                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z" />
                </svg>
                <p class="description">The app provides quick access to financial summaries, expenditure analysis, and budget forecasts, helping to maintain a healthy financial balance.</p>
            </div>

        </div>
        <div class="right-side">
            <div class="box">
                <div class="log-in">
                    <h2 class="log-in-title">Log in</h2>
                    <form action="/login" method="post" class="input-table">
                        <?php include $this->resolve('partials/_csrf.php'); ?>
                        <div class="input-field">
                            <span class="input-name">E-mail address</span>
                            <input type="text" name="email-login" value="<?php echo e($oldFormData['email-login'] ?? ''); ?>" class="single-form-input <?php echo array_key_exists('email-login', $errors) ? 'application-form-value-empty' : ''; ?>" />
                            <?php if (array_key_exists('email-login', $errors)) : ?>
                                <span class="input-name validation-error-message">
                                    <?php echo e($errors['email-login'][0]); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <span class="input-name">Password</span>
                            <input type="text" name="password-login" class="single-form-input <?php echo array_key_exists('password-login', $errors) ? 'application-form-value-empty' : ''; ?>" />
                            <?php if (array_key_exists('password-login', $errors)) : ?>
                                <span class="input-name validation-error-message">
                                    <?php echo e($errors['password-login'][0]); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <button class="log-in-button button-form" type="submit">Log in</button>
                    </form>
                </div>
            </div>

            <div class="box">
                <div class="sign-up">
                    <h2 class="sign-up-title">Sign up</h2>
                    <form action="/register" method="POST" class="input-table">
                        <?php include $this->resolve('partials/_csrf.php'); ?>
                        <div class="input-field">
                            <span class="input-name">Name</span>
                            <input type="text" name="username-register" value="<?php echo e($oldFormData['username-register'] ?? ''); ?>" class="single-form-input <?php echo array_key_exists('username-register', $errors) ? 'application-form-value-empty' : ''; ?>" />
                            <?php if (array_key_exists('username-register', $errors)) : ?>
                                <span class="input-name validation-error-message">
                                    <?php echo e($errors['username-register'][0]); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <span class="input-name">E-mail address</span>
                            <input type="text" name="email-register" value="<?php echo e($oldFormData['email-register'] ?? ''); ?>" class="single-form-input <?php echo array_key_exists('email-register', $errors) ? 'application-form-value-empty' : ''; ?>" />
                            <?php if (array_key_exists('email-register', $errors)) : ?>
                                <span class="input-name validation-error-message">
                                    <?php echo e($errors['email-register'][0]); //tu jest jakiś błąd z przekazywaniem błedów do zmiennej errors 
                                    ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <span class="input-name">Password</span>
                            <input type="text" name="password-register" class="single-form-input <?php echo array_key_exists('password-register', $errors) ? 'application-form-value-empty' : ''; ?>" />
                            <?php if (array_key_exists('password-register', $errors)) : ?>
                                <span class="input-name validation-error-message">
                                    <?php echo e($errors['password-register'][0]); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <span class="input-name">Repeat password</span>
                            <input type="text" name="password-repeat-register" class="single-form-input <?php echo array_key_exists('password-repeat-register', $errors) ? 'application-form-value-empty' : ''; ?>" />
                            <?php if (array_key_exists('password-repeat-register', $errors)) : ?>
                                <span class="input-name validation-error-message">
                                    <?php echo e($errors['password-repeat-register'][0]); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <button class="sign-up-button" type="submit">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>

<?php include $this->resolve("partials/_footer.php") ?>