<?php
/**
 * Template Part: Navigation avec effet glassmorphisme
 * Design System: Digital Archivist
 */
?>

<nav class="main-nav" id="mainNav">
    <div class="nav-container">
        <!-- Logo avec SVG -->
        <a href="<?= esc_url(home_url('/')); ?>" class="nav-logo" aria-label="Retour à l'accueil">
            <svg preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32" height="48" width="48" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Logo Histoire Association" class="nav-logo-svg">
                <path fill="#0447e7" d="M31.802 15.988c0 8.726-7.08 15.8-15.813 15.8S.176 24.713.176 15.987 7.256.188 15.989.188c8.734 0 15.813 7.074 15.813 15.8z"/>
                <path d="M12.334.511c3.168-.701 4.88-.552 8.042.18 1.273.296 2.613.958 4.13 1.853v26.849c-1.304.768-3.32 1.728-4.621 2.058-1.698.431-4.6.463-7.305.112-1.333-.173-3.66-1.287-5.1-2.075V2.544C8.52 1.81 11.229.756 12.334.511z" fill="#e60003"/>
                <path fill="none" stroke="#000" stroke-width="1.142" d="M186.169 103.5c0 52.88-41.49 95.747-92.669 95.747C42.32 199.247.831 156.38.831 103.5S42.321 7.753 93.5 7.753c51.18 0 92.669 42.867 92.669 95.747z" transform="matrix(.17155 0 0 .16607 -.047 -1.194)"/>
            </svg>
            <span class="nav-site-name">Histoire Association</span>
        </a>

        <!-- Menu Principal -->
        <div class="nav-menu-wrapper">
            <?php
            // Récupérer le menu WordPress ou afficher menu par défaut
            if (has_nav_menu('main-menu')) :
                wp_nav_menu([
                    'theme_location' => 'main-menu',
                    'container' => false,
                    'menu_class' => 'nav-menu',
                    'fallback_cb' => false,
                ]);
            else :
                // Menu par défaut si aucun menu configuré
                ?>
                <ul class="nav-menu">
                    <li class="menu-item"><a href="<?= esc_url(home_url('/')); ?>">Accueil</a></li>
                    <li class="menu-item"><a href="<?= esc_url(home_url('/actualites')); ?>">Toutes les infos</a></li>
                    <li class="menu-item"><a href="<?= esc_url(home_url('/evenements')); ?>">Agenda</a></li>
                    <li class="menu-item"><a href="<?= esc_url(home_url('/recrutement')); ?>">Recrutement</a></li>
                    <li class="menu-item"><a href="<?= esc_url(home_url('/contact')); ?>">Contact</a></li>
                </ul>
            <?php endif; ?>
        </div>

        <!-- Burger Menu (Mobile) -->
        <button class="nav-burger" aria-label="Menu de navigation" aria-expanded="false" id="navBurger">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</nav>
