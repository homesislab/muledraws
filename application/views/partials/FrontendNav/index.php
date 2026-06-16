<?php
/**
 * Frontend Navbar Partial — Premium Design
 *
 * @var string $activePage  'work' | 'about' | 'contact'
 * @var array  $listSocmed  Social media rows from DB
 */
$listSocmed = $listSocmed ?? [];
if (empty($listSocmed)) {
    $CI = get_instance();
    if (!isset($CI->profileBusinessModel)) {
        $CI->load->model('Setting/ProfileBusinessModel', 'profileBusinessModel');
    }
    $listSocmed = $CI->profileBusinessModel->getListSocmed();
}
$activePage = $activePage ?? 'work';
$CI         = get_instance();
$isLoggedIn = $CI->session->userdata('loggedIn');
$logoSrc    = base_url() . 'assets/media/uploads/logos/default.png';
?>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid px-0">

        <!-- Logo -->
        <a class="navbar-brand" href="<?= base_url('work'); ?>">
            <img src="<?= $logoSrc; ?>" alt="Muledraws" height="44">
        </a>

        <!-- Mobile toggle -->
        <button class="navbar-toggler border-0 shadow-none" type="button"
            data-bs-toggle="collapse" data-bs-target="#navMain"
            aria-controls="navMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMain">
            <!-- Primary links — centred -->
            <ul class="navbar-nav mx-auto gap-1">
                <li class="nav-item">
                    <a class="nav-link <?= $activePage === 'work'    ? 'active' : ''; ?>"
                       <?= $activePage === 'work' ? 'aria-current="page"' : ''; ?>
                       href="<?= base_url('work'); ?>">Work</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $activePage === 'about'   ? 'active' : ''; ?>"
                       <?= $activePage === 'about' ? 'aria-current="page"' : ''; ?>
                       href="<?= base_url('about'); ?>">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $activePage === 'contact' ? 'active' : ''; ?>"
                       <?= $activePage === 'contact' ? 'aria-current="page"' : ''; ?>
                       href="<?= base_url('contact'); ?>">Contact</a>
                </li>
            </ul>

            <!-- Right side: social icons + night mode toggle -->
            <ul class="navbar-nav align-items-center gap-1 flex-row flex-wrap">
                <?php foreach ($listSocmed as $row) : ?>
                <li class="nav-item">
                    <a class="nav-link px-2" href="<?= $row->url; ?>" target="_blank" rel="noopener"
                       title="<?= $row->name; ?>">
                        <?= iconSocmed($row->name); ?>
                    </a>
                </li>
                <?php endforeach; ?>

                <!-- Night Mode Toggle -->
                <li class="nav-item d-flex align-items-center">
                    <button id="theme-toggle" aria-label="Toggle night mode" title="Toggle night mode">
                        <!-- Moon icon (shown in light mode) -->
                        <svg class="icon-moon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                        </svg>
                        <!-- Sun icon (shown in dark mode) -->
                        <svg class="icon-sun" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="5"/>
                            <line x1="12" y1="1" x2="12" y2="3"/>
                            <line x1="12" y1="21" x2="12" y2="23"/>
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
                            <line x1="1" y1="12" x2="3" y2="12"/>
                            <line x1="21" y1="12" x2="23" y2="12"/>
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
                        </svg>
                    </button>
                </li>
            </ul>
        </div>

    </div>
</nav>

<script>
(function () {
    'use strict';
    var KEY   = 'muledraws-theme';
    var root  = document.documentElement;

    // Apply saved or system preference immediately (before paint)
    var saved = localStorage.getItem(KEY);
    if (saved) {
        root.setAttribute('data-theme', saved);
    } else if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        root.setAttribute('data-theme', 'dark');
    } else {
        root.setAttribute('data-theme', 'light');
    }

    document.addEventListener('DOMContentLoaded', function () {
        var btn = document.getElementById('theme-toggle');
        if (!btn) return;

        btn.addEventListener('click', function () {
            var current = root.getAttribute('data-theme');
            var next    = current === 'dark' ? 'light' : 'dark';
            root.setAttribute('data-theme', next);
            localStorage.setItem(KEY, next);
        });
    });
})();
</script>
