<?php include $this->resolve("partials/_header.php") ?>

<main>
    <div class="log-in-sign-up-main-container">
        <div class="left-side">
            <div class="logo-and-header">
                <img class="logo" src="/assets/icons/pie-chart-logo.svg" alt="Logo" />

                <h1>budget</h1>
            </div>
            <p class="description">
                Our budget app is an intuitive tool designed to assist users in
                effectively managing their personal finances. With it, you can
                easily track your expenses, both daily and larger planned
                investments.<br><br> It is a simple-to-use yet powerful financial tool that
                supports users in making informed decisions about their money. The
                app provides quick access to financial summaries, expenditure
                analysis, and budget forecasts, helping to maintain a healthy
                financial balance.<br><br> Whether you are an experienced financier or just
                starting your journey in budget management, our app is the perfect
                tool to help you achieve your financial goals!
            </p>
        </div>
        <div class="right-side">
            <div class="box">
                <div class="log-in">
                    <h2 class="log-in-title">Log in</h2>
                    <form action="./login.php" method="post" class="input-table">
                        <div class="input-field">
                            <span class="input-name">E-mail address</span>
                            <input type="text" name="email-login" />
                        </div>
                        <div class="input-field">
                            <span class="input-name">Password</span>
                            <input type="text" name="password-login" />
                        </div>
                        <button class="log-in-button button-form" type="submit">Log in</button>
                    </form>
                </div>
            </div>

            <div class="box">
                <div class="sign-up">
                    <h2 class="sign-up-title">Sign up</h2>
                    <form method="POST" class="input-table">
                        <div class="input-field">
                            <span class="input-name">Name</span>
                            <input type="text" name="username" />
                            <?php if (array_key_exists('username', $errors)) : ?>
                                <span class="input-name validation-error-message">
                                    <?php echo e($errors['username'][0]); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <span class="input-name">E-mail address</span>
                            <input type="text" name="email" />
                            <?php if (array_key_exists('email', $errors)) : ?>
                                <span class="input-name validation-error-message">
                                    <?php echo e($errors['email'][0]); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <span class="input-name">Password</span>
                            <input type="text" name="password" />
                            <?php if (array_key_exists('password', $errors)) : ?>
                                <span class="input-name validation-error-message">
                                    <?php echo e($errors['password'][0]); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <span class="input-name">Repeat password</span>
                            <input type="text" name="password-repeat" />
                            <?php if (array_key_exists('password-repeat', $errors)) : ?>
                                <span class="input-name validation-error-message">
                                    <?php echo e($errors['password-repeat'][0]); ?>
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