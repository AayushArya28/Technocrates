<?php
// Start the session at the top of the file
session_start();
?>

<nav>
    <div class="nav-container">
        <div class="nav-left">
            <img src="book_icon.png" alt="Logo" class="logo-nav">
            <h2 class="nav-title">Technocrates</h2>
        </div>
        
        <div class="nav-right">
            <a href="index.html">Home</a>
            <a href="bharatiAI.html">BharatiAI <img src="ai.png" alt="ai" width="38px" class="nav-icon"></a>
            <a href="wallet.html">Wallet</a>
            <a href="support.html">Support</a>
            <a href="contact.html">Contact Us</a>
            
            <!-- Check if user is logged in -->
            <?php if (isset($_SESSION['username'])): ?>
                <span>Welcome, <?php echo $_SESSION['username']; ?>!</span>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.html" class="sign-in-btn">Sign In</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
