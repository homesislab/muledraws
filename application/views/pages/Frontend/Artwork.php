<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Muledraws artwork gallery — curated illustration and design work by graphic designer Gunali Rezqi Mauludi." />
    <meta property="og:title" content="Muledraws | Artwork" />
    <meta property="og:url" content="<?= base_url('artwork'); ?>" />
    <meta name="author" content="Gunali Rezqi Mauludi">
    <title>Muledraws | Artwork</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/media/logos/favicon.ico">
    <link href="<?= base_url(); ?>assets/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/style.css?v=1.0.2">
</head>

<body>
    <?php $this->load->view('partials/FrontendNav/index', ['activePage' => 'work', 'listSocmed' => $listSocmed ?? []]); ?>

    <main>
        <section id="artwork">
            <div class="row">

                <!-- Gallery Grid -->
                <div class="col-12 col-md-8 animate-fade-up">
                    <?php if (!empty($galleryArtwork)) : ?>
                    <p class="section-label">Artwork Gallery</p>
                    <div class="artwork-gallery row g-2">
                        <?php foreach ($galleryArtwork as $index => $row) { ?>
                        <div class="col-6">
                            <div class="hover-zoom" style="border-radius:16px; aspect-ratio:1/1;">
                                <img src="<?= base_url(); ?>assets/media/uploads/work/<?= $row->image; ?>"
                                     alt="<?= $row->name ?? 'Artwork'; ?>">
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <?php else : ?>
                    <div class="d-flex align-items-center justify-content-center" style="min-height:340px; background:var(--subtle); border-radius:18px;">
                        <p style="color:var(--muted); font-size:0.9rem; letter-spacing:1px; text-transform:uppercase;">No gallery images yet</p>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Info Panel -->
                <div class="col-12 col-md-4 animate-fade-up-delay">
                    <div class="artwork-info-panel">
                        <a href="<?= base_url('work'); ?>" class="artwork-back-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                            </svg>
                            Back to Work
                        </a>

                        <?php if (!empty($descriptionArtwork)) : ?>
                        <p class="artwork-description"><?= $descriptionArtwork; ?></p>
                        <?php else : ?>
                        <p class="artwork-description" style="color:#bbb;">No description available.</p>
                        <?php endif; ?>

                        <div>
                            <span class="artwork-meta-tag">Graphic Design</span>
                            <span class="artwork-meta-tag">Branding</span>
                            <span class="artwork-meta-tag">Muledraws</span>
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
