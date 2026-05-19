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

            <!-- Right side: social icons + login/dashboard -->
            <ul class="navbar-nav align-items-center gap-1 flex-row flex-wrap">
                <?php foreach ($listSocmed as $row) : ?>
                <li class="nav-item">
                    <a class="nav-link px-2" href="<?= $row->url; ?>" target="_blank" rel="noopener"
                       title="<?= $row->name; ?>">
                        <?= iconSocmed($row->name); ?>
                    </a>
                </li>
                <?php endforeach; ?>

                <li class="nav-item ms-2">
                    <a href="<?= base_url($isLoggedIn ? 'master/works' : 'login'); ?>"
                       class="nav-link"
                       style="background:var(--ink); color:var(--bg-dark) !important; border-radius:40px; padding:7px 20px !important; font-size:0.78rem; font-weight:700; letter-spacing:1px; text-transform:uppercase;">
                        <?= $isLoggedIn ? 'Dashboard' : 'Login'; ?>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>
