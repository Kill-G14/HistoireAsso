<?php
/**
 * Template Part: Navigation (TopAppBar)
 * Navigation principale avec effect glassmorphisme au scroll
 */
?>

<nav class="navbar">
    <div class="navbar-container container1400px">
        <!-- Logo -->
        <div class="navbar-brand">
            <a href="<?= esc_url(home_url('/')); ?>" class="navbar-logo">
                <span class="navbar-logo-text">Histoire Association</span>
            </a>
        </div>

        <!-- Menu Toggle (Mobile) -->
        <button class="menu-toggle" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <!-- Menu Principal -->
        <?php
        wp_nav_menu([
            'theme_location' => 'main-menu',
            'container' => 'div',
            'container_class' => 'navbar-menu',
            'menu_class' => 'navbar-nav',
            'fallback_cb' => false,
        ]);
        ?>
    </div>
</nav>

<style>
/* Navigation Styles */
.navbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    background-color: transparent;
    transition: all 0.4s ease;
    padding: var(--spacing-6) 0;
}

/* Glassmorphisme au scroll */
.navbar.scrolled {
    background-color: rgba(19, 19, 19, 0.9);
    backdrop-filter: blur(16px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
}

.navbar.hidden {
    transform: translateY(-100%);
}

.navbar-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.navbar-logo-text {
    font-family: var(--font-serif);
    font-size: var(--headline-md);
    color: var(--primary);
    font-weight: 700;
}

.navbar-menu {
    display: flex;
    align-items: center;
}

.navbar-nav {
    display: flex;
    list-style: none;
    gap: var(--spacing-8);
    margin: 0;
    padding: 0;
}

.navbar-nav li a {
    color: var(--primary);
    font-family: var(--font-sans);
    font-size: var(--body-md);
    font-weight: 500;
    transition: color 0.3s ease;
    position: relative;
}

.navbar-nav li a:hover,
.navbar-nav li.current-menu-item a {
    color: var(--primary-container);
}

/* Underline effect */
.navbar-nav li a::after {
    content: '';
    position: absolute;
    bottom: -4px;
    left: 0;
    width: 0;
    height: 2px;
    background-color: var(--primary-container);
    transition: width 0.3s ease;
}

.navbar-nav li a:hover::after,
.navbar-nav li.current-menu-item a::after {
    width: 100%;
}

/* Menu Toggle (Mobile) */
.menu-toggle {
    display: none;
    flex-direction: column;
    gap: 6px;
    background: none;
    border: none;
    cursor: pointer;
    padding: var(--spacing-3);
}

.menu-toggle span {
    display: block;
    width: 28px;
    height: 3px;
    background-color: var(--primary-container);
    transition: all 0.3s ease;
    border-radius: 2px;
}

.menu-toggle.active span:nth-child(1) {
    transform: rotate(45deg) translate(8px, 8px);
}

.menu-toggle.active span:nth-child(2) {
    opacity: 0;
}

.menu-toggle.active span:nth-child(3) {
    transform: rotate(-45deg) translate(7px, -7px);
}

/* ========================================
   RESPONSIVE MOBILE
   ======================================== */

@media (max-width: 768px) {
    .menu-toggle {
        display: flex;
    }

    .navbar-menu {
        position: fixed;
        top: 80px;
        left: 0;
        right: 0;
        background-color: rgba(19, 19, 19, 0.98);
        backdrop-filter: blur(20px);
        padding: var(--spacing-8);
        transform: translateX(100%);
        transition: transform 0.3s ease;
    }

    .navbar-menu.active {
        transform: translateX(0);
    }

    .navbar-nav {
        flex-direction: column;
        gap: var(--spacing-5);
    }

    .navbar-nav li a {
        font-size: var(--body-lg);
    }
}
</style>
