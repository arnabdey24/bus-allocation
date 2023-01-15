<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/theme.css">

</head>

<body>

<div id="page-container">
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark">
        <div class="container">
            <a href="<?php echo URLROOT; ?>" class="navbar-brand"><img src="<?php echo URLROOT; ?>/img/logo.png"
                                                                       style="width:30px;border-radius:50%"><?php echo SITENAME; ?>
            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarcollapseCMS">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarcollapseCMS">
                <ul class="navbar-nav ms-auto">

                    <?php if (isset($_SESSION['user_id'])) : ?>

                        <?php if ($_SESSION['is_admin']) : ?>
                            <li class="nav-item">
                                <a href="<?php echo URLROOT; ?>/admins/index" class="nav-link"><i
                                            class="fas fa-house-user"></i> Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo URLROOT; ?>/admins/manageSchedule" class="nav-link"><i
                                            class="fa-solid fa-file-pen"></i> Bus Schedule</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a href="<?php echo URLROOT; ?>/pages/home" class="nav-link"><i
                                            class="fas fa-house-user"></i> Home</a>
                            </li>
                        <?php endif; ?>


                        <li class="nav-item">
                            <a href="<?php echo URLROOT; ?>/users/profile" class="nav-link"><i class="fas fa-user"></i>
                                Profile</a>
                        </li>

                    <?php else : ?>
                        <li class="nav-item">
                            <a href="<?php echo URLROOT; ?>/pages/index" class="nav-link"><i
                                        class="fas fa-house-user"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo URLROOT; ?>/pages/about" class="nav-link"><i class="fas fa-user"></i>
                                About</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout"><i
                                        class="fa-solid fa-right-from-bracket"></i>
                                Logout(<?php echo $_SESSION['user_name']; ?>)</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a href="<?php echo URLROOT; ?>/users/register" class="nav-link "><i
                                        class="fa-solid fa-user-plus"></i> Register</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo URLROOT; ?>/users/login" class="nav-link "><i
                                        class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" id="content-wrap">