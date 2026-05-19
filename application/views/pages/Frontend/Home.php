<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Muledraws by Gunali Rezqi Mauludi — a graphic designer and illustrator portfolio showcasing branding, illustration, editorial design, packaging, and contemporary art." />
    <meta name="keywords" content="graphic designer, illustrator, portfolio, branding, editorial design, packaging design, contemporary art, Muledraws" />
    <meta name="author" content="Gunali Rezqi Mauludi">
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Muledraws | Graphic Designer & Illustrator" />
    <meta property="og:description" content="Muledraws by Gunali Rezqi Mauludi — bespoke brand identities, illustration, and contemporary art direction." />
    <meta property="og:url" content="<?= base_url('work'); ?>" />
    <meta property="og:image" content="<?= base_url(); ?>assets/media/uploads/logos/default.png" />
    <meta property="og:site_name" content="Muledraws" />
    <meta name="twitter:card" content="summary_large_image" />
    <title>Muledraws | Work</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/media/logos/favicon.ico">
    <link href="<?= base_url(); ?>assets/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/style.css">
</head>

<body>
    <div class="container">
        <?php $this->load->view('partials/FrontendNav/index', ['activePage' => 'work', 'listSocmed' => $listSocmed]); ?>

        <main>
            <!-- Premium Welcome -->
            <header class="welcome-header animate-fade-up">
                <p class="welcome-eyebrow">Portfolio — Graphic Design & Illustration</p>
                <h1 class="welcome-title">
                    <?= !empty($profileBusiness->name) ? $profileBusiness->name : 'Muledraws'; ?>
                </h1>
                <p class="welcome-subtitle animate-fade-up-delay">
                    <?= !empty($profileBusiness->bio) ? $profileBusiness->bio : 'Graphic designer &amp; illustrator crafting bespoke brand identities, hand-drawn logos, and contemporary art packaging.'; ?>
                </p>
            </header>

            <!-- Hero Carousel -->
            <?php if (!empty($listCarousel)) : ?>
            <div id="carousel" class="carousel slide carousel-premium-wrapper" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <?php foreach ($listCarousel as $index => $row) { ?>
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="<?= $index; ?>"
                        <?= $index === 0 ? 'class="active" aria-current="true"' : ''; ?>
                        aria-label="Slide <?= $index + 1; ?>"></button>
                    <?php } ?>
                </div>
                <div class="carousel-inner">
                    <?php foreach ($listCarousel as $index => $row) { ?>
                    <div class="carousel-item <?= ($index == 0 ? 'active' : ''); ?>">
                        <img src="<?= base_url(); ?>assets/media/uploads/carousel/<?= $row->image; ?>" alt="<?= $row->description ?? 'Muledraws'; ?>">
                    </div>
                    <?php } ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <?php endif; ?>

            <!-- Works Grid -->
            <p class="section-label">Selected Work</p>
            <div id="works" class="row m-0">
                <?php foreach ($listWork as $index => $row) { ?>
                <div class="col-12 col-sm-6 work-cell animate-fade-up-delay">
                    <a href="<?= base_url('artwork/view/' . $row->id); ?>">
                        <div class="hover-zoom">
                            <img src="<?= base_url(); ?>assets/media/uploads/work/<?= $row->image; ?>" alt="<?= $row->name; ?>">
                            <div class="work-title-overlay">
                                <?= $row->name; ?>
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>
            </div>
        </main>

        <footer class="text-center">
            <p>© <?= date('Y'); ?> Muledraws — All Rights Reserved</p>
        </footer>
    </div>
    <script src="<?= base_url(); ?>assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
