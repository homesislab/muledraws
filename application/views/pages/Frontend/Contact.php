<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contact Muledraws — reach out to graphic designer and illustrator Gunali Rezqi Mauludi for branding, editorial, packaging, and illustration projects." />
    <meta property="og:title" content="Muledraws | Contact" />
    <meta property="og:url" content="<?= base_url('contact'); ?>" />
    <meta name="author" content="Gunali Rezqi Mauludi">
    <title>Muledraws | Contact</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/media/logos/favicon.ico">
    <link href="<?= base_url(); ?>assets/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/style.css?v=2.0.0">
    <script>
        (function(){
            var t = localStorage.getItem('muledraws-theme');
            if (!t) t = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            document.documentElement.setAttribute('data-theme', t);
        })();
    </script>
</head>

<body>
    <?php $this->load->view('partials/FrontendNav/index', ['activePage' => 'contact', 'listSocmed' => $listSocmed ?? []]); ?>

    <main>
        <section id="contact">
            <div class="row g-5">

                <!-- Left: Form -->
                <div class="col-12 col-md-6 animate-fade-up">
                    <h1 class="contact-page-title">Start a<br>Project</h1>
                    <p class="contact-page-lead">Tell me about your project — I'll get back to you within 24 hours.</p>

                    <form action="mailto:<?= $profileBusiness->email; ?>" method="post" enctype="text/plain" class="contact-form">
                        <div>
                            <label class="contact-field-label" for="inputName">Name</label>
                            <input class="contact-input" type="text" id="inputName" name="name" placeholder="Your full name" required>
                        </div>
                        <div>
                            <label class="contact-field-label" for="inputEmail">Email</label>
                            <input class="contact-input" type="email" id="inputEmail" name="email" placeholder="your@email.com" required>
                        </div>
                        <div>
                            <label class="contact-field-label" for="inputSubject">Subject</label>
                            <input class="contact-input" type="text" id="inputSubject" name="subject" placeholder="Project brief, collab, etc." required>
                        </div>
                        <div>
                            <label class="contact-field-label" for="inputMessage">Message</label>
                            <textarea class="contact-input" id="inputMessage" name="message" placeholder="Describe your project or idea..." required></textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn-submit">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Right: Info Block -->
                <div class="col-12 col-md-6 animate-fade-up-delay">
                    <div class="contact-info-block">
                        <p class="about-section-title" style="margin-bottom:28px;">Contact Details</p>
                        <p class="contact-info-name"><?= $profileBusiness->name ?? 'Muledraws'; ?></p>

                        <?php if (!empty($profileBusiness->email)) : ?>
                        <div class="contact-info-item">
                            <p class="contact-info-item-label">Email</p>
                            <p class="contact-info-item-value">
                                <a href="mailto:<?= $profileBusiness->email; ?>"><?= $profileBusiness->email; ?></a>
                            </p>
                        </div>
                        <?php endif; ?>

                        <?php if (!empty($profileBusiness->phone)) : ?>
                        <div class="contact-info-item">
                            <p class="contact-info-item-label">Phone</p>
                            <p class="contact-info-item-value"><?= $profileBusiness->phone; ?></p>
                        </div>
                        <?php endif; ?>

                        <?php if (!empty($profileBusiness->whatsapp)) : 
                            $waClean = preg_replace('/[^0-9]/', '', $profileBusiness->whatsapp);
                            if (strpos($waClean, '0') === 0) {
                                $waClean = '62' . substr($waClean, 1);
                            }
                        ?>
                        <div class="contact-info-item">
                            <p class="contact-info-item-label">WhatsApp</p>
                            <p class="contact-info-item-value">
                                <a href="https://wa.me/<?= $waClean; ?>" target="_blank" rel="noopener">
                                    <?= $profileBusiness->whatsapp; ?>
                                </a>
                            </p>
                        </div>
                        <?php endif; ?>

                        <?php if (!empty($profileBusiness->address)) : ?>
                        <div class="contact-info-item">
                            <p class="contact-info-item-label">Studio</p>
                            <p class="contact-info-item-value"><?= $profileBusiness->address; ?></p>
                        </div>
                        <?php endif; ?>

                        <!-- Mini Works Grid -->
                        <?php if (!empty($listWork)) : ?>
                        <p class="about-section-title mt-4">Recent Work</p>
                        <div class="row g-2">
                            <?php foreach (array_slice((array)$listWork, 0, 8) as $row) { ?>
                            <div class="col-3">
                                <a href="<?= base_url('artwork/view/' . $row->id); ?>">
                                    <div class="hover-zoom" style="border-radius:10px; aspect-ratio:1/1;">
                                        <img src="<?= base_url(); ?>assets/media/uploads/work/<?= $row->image; ?>" alt="<?= $row->name; ?>">
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                        <?php endif; ?>
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
