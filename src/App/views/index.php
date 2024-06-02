<?php include $this->resolve("partials/_header.php") ?>

<main>
    <div class="log-in-sign-up-main-container">
        <div class="left-side">
            <div class="logo-and-header">
                <img class="logo" src="/assets/icons/pie-chart-logo.svg" alt="Logo" />

                <h1>budget</h1>
            </div>
            <div class="home-page-description">
                <p class="description">Manage your personal finances.</p>
            </div>
            <div class="home-page-description">
                <p class="description">Track your expenses and plan investments.</p>
            </div>
            <div class="home-page-description">
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
                            <input type="text" name="email-login" value="<?php echo e($oldFormData['email-login'] ?? ''); ?>" />
                            <?php if (array_key_exists('email-login', $errors)) : ?>
                                <span class="input-name validation-error-message">
                                    <?php echo e($errors['email-login'][0]); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <span class="input-name">Password</span>
                            <input type="text" name="password-login" />
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
                            <input type="text" name="username-register" value="<?php echo e($oldFormData['username-register'] ?? ''); ?>" />
                            <?php if (array_key_exists('username-register', $errors)) : ?>
                                <span class="input-name validation-error-message">
                                    <?php echo e($errors['username-register'][0]); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <span class="input-name">E-mail address</span>
                            <input type="text" name="email-register" value="<?php echo e($oldFormData['email-register'] ?? ''); ?>" />
                            <?php if (array_key_exists('email-register', $errors)) : ?>
                                <span class="input-name validation-error-message">
                                    <?php echo e($errors['email-register'][0]); //tu jest jakiś błąd z przekazywaniem błedów do zmiennej errors 
                                    ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <span class="input-name">Password</span>
                            <input type="text" name="password-register" />
                            <?php if (array_key_exists('password-register', $errors)) : ?>
                                <span class="input-name validation-error-message">
                                    <?php echo e($errors['password-register'][0]); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <span class="input-name">Repeat password</span>
                            <input type="text" name="password-repeat-register" />
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