<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="About Muledraws — portfolio of graphic designer and illustrator Gunali Rezqi Mauludi, working across branding, editorial, packaging, and contemporary art." />
    <meta property="og:title" content="Muledraws | About" />
    <meta property="og:url" content="<?= base_url('about'); ?>" />
    <meta name="author" content="Gunali Rezqi Mauludi">
    <title>Muledraws | About</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/media/logos/favicon.ico">
    <link href="<?= base_url(); ?>assets/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/style.css?v=1.0.2">
</head>

<body>
    <?php
    $CI = get_instance();
    $navSocmed = [];
    if (isset($CI->profileBusinessModel)) {
        $navSocmed = $CI->profileBusinessModel->getListSocmed();
    }
    $this->load->view('partials/FrontendNav/index', ['activePage' => 'about', 'listSocmed' => $navSocmed]);
    ?>

    <main>
        <section id="about">
            <div class="row g-5">

                <!-- Left col: photo -->
                <div class="col-12 col-md-5 animate-fade-up">
                    <?php if (!empty($listWork[0]->image)) : ?>
                    <div class="about-photo-wrapper">
                        <img src="<?= base_url() . 'assets/media/uploads/work/' . $listWork[0]->image; ?>" alt="<?= $profileBusiness->name ?? 'Muledraws'; ?>">
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Right cols: bio + info lists -->
                <div class="col-12 col-md-7">
                    <p class="about-bio mb-5 animate-fade-up-delay">
                        <?= !empty($profileBusiness->bio) ? $profileBusiness->bio : 'Graphic designer & illustrator crafting bespoke brand identities, editorial imagery, and contemporary art packaging.'; ?>
                    </p>
                    <div class="row g-4 animate-fade-up-delay">

                        <div class="col-12 col-sm-4">
                            <p class="about-section-title">Selected Clients</p>
                            <ul>
                                <?php foreach ($listClient as $row) { ?>
                                <li><?= $row->name; ?></li>
                                <?php } ?>
                            </ul>
                        </div>

                        <div class="col-12 col-sm-4">
                            <p class="about-section-title">Awards</p>
                            <ul>
                                <?php foreach ($listAwward as $row) { ?>
                                <li><?= $row->name; ?></li>
                                <?php } ?>
                            </ul>
                        </div>

                        <div class="col-12 col-sm-4">
                            <p class="about-section-title">Features</p>
                            <ul>
                                <?php foreach ($listFeature as $row) { ?>
                                <li><?= $row->name; ?></li>
                                <?php } ?>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </section>
    </main>

    <footer class="text-center">
        <p>© <?= date('Y'); ?> Muledraws — All Rights Reserved</p>
    </footer>
    <script src="<?= base_url(); ?>assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
