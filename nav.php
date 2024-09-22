<?php session_start(); ?>

<nav>
    <div class="nav-container">
        <div class="nav-left">
            <img src="book_icon.png" alt="Logo" class="logo-nav">
            <h2 class="nav-title">Technocrates</h2>
        </div>

        <div class="nav-right">
            <!-- Home button based on login status -->
            <?php if (isset($_SESSION['username'])): ?>
                <a href="landing.php">Home</a>
            <?php else: ?>
                <a href="index.html">Home</a>
            <?php endif; ?>

            <a href="bharatiAI.html">BharatiAI <img src="ai.png" alt="ai" width="38px" class="nav-icon"></a>
            <a href="wallet.html">Wallet</a>
            <a href="support.html">Support</a>
            <a href="contact.html">Contact Us</a>

            <!-- User Login/Logout based on session -->
            <?php if (isset($_SESSION['username'])): ?>
                <span>Welcome, <?php echo $_SESSION['username']; ?>!</span>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.html" class="sign-in-btn">Sign In</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

