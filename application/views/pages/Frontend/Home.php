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
    <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/style.css?v=2.0.0">
    <script>
        // Anti-FOUC: apply theme before CSS paints
        (function(){
            var t = localStorage.getItem('muledraws-theme');
            if (!t) t = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            document.documentElement.setAttribute('data-theme', t);
        })();
    </script>
</head>

<body>
    <?php $this->load->view('partials/FrontendNav/index', ['activePage' => 'work', 'listSocmed' => $listSocmed]); ?>
    
    <div class="container-fluid-grid">
        <main>
            <!-- Works Grid (Dense) -->
            <div id="works" class="animate-fade-up">
                <?php foreach ($listWork as $index => $row) { ?>
                <div class="work-cell">
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
