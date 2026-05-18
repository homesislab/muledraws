<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Muledraws by Gunali Rezqi Mauludi — a graphic designer and illustrator portfolio showcasing branding, illustration, editorial design, packaging, and contemporary art." />
    <meta name="keywords" content="graphic designer, illustrator, portfolio, branding, editorial design, packaging design, contemporary art, Muledraws" />
    <meta name="author" content="Gunali Rezqi Mauludi">
    <link rel="canonical" href="<?= base_url('work'); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Muledraws | Graphic Designer & Illustrator Portfolio" />
    <meta property="og:description" content="Muledraws by Gunali Rezqi Mauludi — a graphic designer and illustrator portfolio showcasing branding, illustration, editorial design, packaging, and contemporary art." />
    <meta property="og:url" content="<?= base_url('work'); ?>" />
    <meta property="og:image" content="<?= base_url(); ?>assets/media/uploads/logos/default.png" />
    <meta property="og:site_name" content="Muledraws" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Muledraws | Graphic Designer & Illustrator Portfolio" />
    <meta name="twitter:description" content="Muledraws by Gunali Rezqi Mauludi — a graphic designer and illustrator portfolio showcasing branding, illustration, editorial design, packaging, and contemporary art." />
    <meta name="twitter:image" content="<?= base_url(); ?>assets/media/uploads/logos/default.png" />
    <title>Muledraws | Work</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/media/logos/favicon.ico">
    <link href="<?= base_url(); ?>assets/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/style.css">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg py-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= base_url('work'); ?>">
                    <img src="<?= base_url(); ?>assets/media/uploads/logos/default.png" alt="Logo" width="100"
                        class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav m-auto text-uppercase">
                        <li class="nav-item p-1">
                            <a class="nav-link active" aria-current="page" href="<?= base_url('work'); ?>">Work</a>
                        </li>
                        <li class="nav-item p-1">
                            <a class="nav-link" href="<?= base_url('about'); ?>">About</a>
                        </li>
                        <li class="nav-item p-1">
                            <a class="nav-link" href="<?= base_url('contact'); ?>">Contact</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav flex-row flex-wrap">
                        <?php foreach ($listSocmed as $index => $row) { ?>
                        <li class="nav-item col-6 col-lg-auto">
                            <a class="nav-link py-2 px-0 px-lg-2" href="<?= $row->url; ?>"
                                target="_blank"
                                rel="noopener">
                                <?= iconSocmed($row->name); ?>
                                <small class="d-lg-none ms-2"><?= $row->name; ?></small>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <div id="carousel" class="carousel slide mb-4" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <?php foreach ($listCarousel as $index => $row) { ?>
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="<?= $index; ?>" class="active" aria-current="true" aria-label="Slide <?= $index; ?>"></button>
                    <?php } ?>
                </div>
                <div class="carousel-inner p-1">
                    <?php foreach ($listCarousel as $index => $row) { ?>
                    <div class="carousel-item <?= ($index == 0 ? "active":""); ?>">
                        <img src="<?= base_url(); ?>assets/media/uploads/carousel/<?= $row->image; ?>"
                            class="d-block w-100" alt="...">
                    </div>
                        <?php } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <div id="works" class="row m-0">
                    <?php foreach ($listWork as $index => $row) { ?>
                    <div class="col-6 col-sm-3 p-1">
                        <a href="<?= base_url('artwork/view/' . $row->id); ?>">
                        <div class="hover-zoom">
                            <img src="<?= base_url(); ?>assets/media/uploads/work/<?= $row->image; ?>" class="img-fluid" alt="...">
                        </div>
                    </a>
                    </div>
                    <?php } ?>
                </div>
        </main>

        <footer class="py-5 text-center">
            <p class="">©️ COPYRIGHT MULEDRAWS 2023</p>
        </footer>
    </div>
    <script src="<?= base_url(); ?>assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
