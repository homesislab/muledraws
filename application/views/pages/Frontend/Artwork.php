<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Muledraws artwork gallery — curated illustration and design work by graphic designer Gunali Rezqi Mauludi." />
    <meta property="og:title" content="Muledraws | <?= htmlspecialchars($artwork->name ?? 'Artwork'); ?>" />
    <meta property="og:url" content="<?= base_url('artwork/view/' . ($artwork->id ?? '')); ?>" />
    <meta name="author" content="Gunali Rezqi Mauludi">
    <title>Muledraws | <?= htmlspecialchars($artwork->name ?? 'Artwork'); ?></title>
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/media/logos/favicon.ico">
    <link href="<?= base_url(); ?>assets/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/style.css?v=1.0.4">
</head>

<body class="artwork-detail-page">
    <?php $this->load->view('partials/FrontendNav/index', ['activePage' => 'work', 'listSocmed' => $listSocmed ?? []]); ?>

    <main class="artwork-container">
        <section id="artwork">
            
            <!-- Artwork Header (Centered Top) -->
            <header class="artwork-header animate-fade-up">
                <h1 class="artwork-title"><?= htmlspecialchars($artwork->name ?? 'Artwork'); ?></h1>
                <?php if (!empty($artwork->description)) : ?>
                <p class="artwork-description"><?= htmlspecialchars($artwork->description); ?></p>
                <?php else : ?>
                <p class="artwork-description" style="color:var(--muted); font-style:italic;">No description available for this work.</p>
                <?php endif; ?>
            </header>

            <!-- Gallery Grid (Studio Muti Creative Works West layout: 1 hero followed by 3-column rows) -->
            <div class="animate-fade-up-delay">
                <?php if (!empty($galleryArtwork)) : ?>
                <div class="artwork-gallery">
                    <div class="artwork-row row g-4 justify-content-center">
                        <?php foreach ($galleryArtwork as $img) : ?>
                            <div class="col-12">
                                <div class="artwork-img-wrapper">
                                    <img src="<?= base_url(); ?>assets/media/uploads/work/<?= $img->image; ?>" 
                                         alt="<?= htmlspecialchars($artwork->name ?? 'Artwork'); ?> - Detail">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php else : ?>
                <div class="d-flex align-items-center justify-content-center" style="min-height:340px; background:#ffffff; border:1px dashed rgba(0,0,0,0.1); border-radius:18px;">
                    <p style="color:var(--muted); font-size:0.9rem; letter-spacing:1px; text-transform:uppercase; margin:0;">No gallery images uploaded yet</p>
                </div>
                <?php endif; ?>
            </div>

            <!-- Back Link and Back to Top -->
            <div class="artwork-footer animate-fade-up-delay">
                <a href="<?= base_url('work'); ?>" class="artwork-back-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                    Back to Work
                </a>
                <a href="#" class="artwork-back-to-top">
                    ↑ Back to Top
                </a>
            </div>

        </section>
    </main>

    <footer class="text-center">
        <p>© <?= date('Y'); ?> Muledraws — All Rights Reserved</p>
    </footer>
    <script src="<?= base_url(); ?>assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
