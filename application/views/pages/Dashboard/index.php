<!-- Custom Premium CSS for Designer Dashboard -->
<style>
    /* Premium Font Import */
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap');

    .designer-dashboard {
        font-family: 'Outfit', 'Poppins', sans-serif;
        color: #1e1e2d;
    }

    /* Welcome Banner */
    .premium-welcome-card {
        background: linear-gradient(135deg, #111116 0%, #1e1e2f 100%);
        border-radius: 16px;
        padding: 35px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        color: #ffffff;
        position: relative;
        overflow: hidden;
        margin-bottom: 30px;
        border: 1px solid rgba(255, 255, 255, 0.05);
    }

    .premium-welcome-card::after {
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(108, 92, 231, 0.15) 0%, transparent 70%);
        top: -100px;
        right: -50px;
        pointer-events: none;
    }

    .premium-welcome-card h1 {
        font-weight: 700;
        font-size: 2.2rem;
        margin-bottom: 8px;
        background: linear-gradient(45deg, #ffffff 30%, #a29bfe 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .premium-welcome-card p {
        color: #b5b5c3;
        font-size: 1.05rem;
        font-weight: 300;
        margin-bottom: 0;
    }

    .last-login-badge {
        background: rgba(255, 255, 255, 0.08);
        padding: 6px 14px;
        border-radius: 30px;
        font-size: 0.85rem;
        display: inline-block;
        margin-top: 15px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #a29bfe;
    }

    /* Stats Grid */
    .stat-card-premium {
        background: #ffffff;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.02);
        border: 1px solid #ebedf3;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        margin-bottom: 25px;
    }

    .stat-card-premium:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(108, 92, 231, 0.08);
        border-color: rgba(108, 92, 231, 0.2);
    }

    .stat-icon-wrapper {
        width: 60px;
        height: 60px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
        font-size: 1.8rem;
    }

    /* Gradient colors for stats icon wrapper */
    .icon-works { background: linear-gradient(135deg, rgba(108, 92, 231, 0.1) 0%, rgba(108, 92, 231, 0.2) 100%); color: #6c5ce7; }
    .icon-carousels { background: linear-gradient(135deg, rgba(0, 206, 201, 0.1) 0%, rgba(0, 206, 201, 0.2) 100%); color: #00cec9; }
    .icon-clients { background: linear-gradient(135deg, rgba(253, 121, 168, 0.1) 0%, rgba(253, 121, 168, 0.2) 100%); color: #fd79a8; }
    .icon-awards { background: linear-gradient(135deg, rgba(250, 177, 160, 0.1) 0%, rgba(250, 177, 160, 0.2) 100%); color: #e17055; }

    .stat-info h3 {
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
        line-height: 1;
        color: #111116;
    }

    .stat-info span {
        font-size: 0.9rem;
        color: #7e8299;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 500;
        display: block;
        margin-top: 4px;
    }

    /* Section Headers */
    .section-title-premium {
        font-weight: 600;
        font-size: 1.35rem;
        margin-bottom: 20px;
        color: #111116;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .section-title-premium i {
        color: #6c5ce7;
    }

    /* Quick Actions */
    .action-card-premium {
        background: #ffffff;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.02);
        border: 1px solid #ebedf3;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
        display: block;
        text-decoration: none !important;
        margin-bottom: 25px;
    }

    .action-card-premium:hover {
        border-color: #6c5ce7;
        background: linear-gradient(180deg, #ffffff 0%, rgba(108, 92, 231, 0.02) 100%);
        transform: translateY(-3px);
    }

    .action-card-premium i {
        font-size: 2.2rem;
        color: #6c5ce7;
        margin-bottom: 12px;
        display: inline-block;
    }

    .action-card-premium h5 {
        font-size: 1.05rem;
        font-weight: 600;
        color: #111116;
        margin-bottom: 6px;
    }

    .action-card-premium p {
        font-size: 0.85rem;
        color: #7e8299;
        margin: 0;
    }

    /* Showcase Cards */
    .showcase-card-premium {
        background: #ffffff;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid #ebedf3;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.02);
        transition: all 0.3s ease;
        margin-bottom: 25px;
    }

    .showcase-card-premium:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
    }

    .showcase-image-wrapper {
        position: relative;
        height: 180px;
        overflow: hidden;
        background: #f8f9fa;
    }

    .showcase-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.5s ease;
    }

    .showcase-card-premium:hover .showcase-image-wrapper img {
        transform: scale(1.08);
    }

    .showcase-content {
        padding: 16px;
    }

    .showcase-title {
        font-size: 1rem;
        font-weight: 600;
        color: #111116;
        margin-bottom: 4px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .showcase-subtitle {
        font-size: 0.8rem;
        color: #7e8299;
        margin-bottom: 10px;
        height: 34px;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .showcase-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid #f3f6f9;
        padding-top: 12px;
    }
</style>

<div class="designer-dashboard container-fluid p-0">
    <!-- Welcome Header -->
    <div class="row">
        <div class="col-12">
            <div class="premium-welcome-card">
                <h1>Halo, <?= $this->session->userdata('userName'); ?>! ✨</h1>
                <p>Selamat datang kembali di workspace kreatif Anda. Saatnya merancang identitas visual yang memukau hari ini.</p>
                <div class="last-login-badge">
                    <i class="flaticon-calendar-3 mr-1"></i> Login Terakhir Anda: <strong><?= lastLoginDate($this->session->userdata('lastLoggedIn') ?? date('Y-m-d H:i:s')); ?></strong>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="row">
        <div class="col-6 col-lg-3">
            <div class="stat-card-premium">
                <div class="stat-icon-wrapper icon-works">
                    <i class="flaticon2-cube-1"></i>
                </div>
                <div class="stat-info">
                    <h3><?= $totalWorks; ?></h3>
                    <span>Karya Logo</span>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="stat-card-premium">
                <div class="stat-icon-wrapper icon-carousels">
                    <i class="flaticon2-image-file"></i>
                </div>
                <div class="stat-info">
                    <h3><?= $totalCarousels; ?></h3>
                    <span>Carousel</span>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="stat-card-premium">
                <div class="stat-icon-wrapper icon-clients">
                    <i class="flaticon2-avatar"></i>
                </div>
                <div class="stat-info">
                    <h3><?= $totalClients; ?></h3>
                    <span>Klien Studio</span>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="stat-card-premium">
                <div class="stat-icon-wrapper icon-awards">
                    <i class="flaticon-medal"></i>
                </div>
                <div class="stat-info">
                    <h3><?= $totalAwards; ?></h3>
                    <span>Penghargaan</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mt-4">
        <div class="col-12">
            <h4 class="section-title-premium"><i class="flaticon2-console"></i> Akses Pintasan Kreatif</h4>
        </div>
        <div class="col-6 col-lg-3">
            <a href="<?= base_url('master/works/create'); ?>" class="action-card-premium">
                <i class="flaticon2-add-1"></i>
                <h5>Tambah Logo</h5>
                <p>Upload karya logo baru</p>
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <a href="<?= base_url('master/carousels/create'); ?>" class="action-card-premium">
                <i class="flaticon2-image-file"></i>
                <h5>Hero Banner</h5>
                <p>Kelola carousel beranda</p>
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <a href="<?= base_url('setting/profilebusiness'); ?>" class="action-card-premium">
                <i class="flaticon2-settings"></i>
                <h5>Profil Bisnis</h5>
                <p>Edit bio, sosial media & logo</p>
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <a href="<?= base_url(); ?>" target="_blank" class="action-card-premium">
                <i class="flaticon2-website"></i>
                <h5>Lihat Website</h5>
                <p>Buka galeri frontend</p>
            </a>
        </div>
    </div>

    <!-- Latest Showcase -->
    <div class="row mt-4">
        <div class="col-12 d-flex justify-content-between align-items-center mb-3">
            <h4 class="section-title-premium m-0"><i class="flaticon2-architecture-and-city"></i> Karya Terbaru Anda</h4>
            <a href="<?= base_url('master/works'); ?>" class="btn btn-sm btn-link text-primary font-weight-bold" style="font-family: 'Outfit';">Lihat Semua <i class="la la-angle-right"></i></a>
        </div>
        
        <?php if (!empty($latestWorks)) : ?>
            <?php foreach ($latestWorks as $row) : ?>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="showcase-card-premium">
                    <div class="showcase-image-wrapper">
                        <img src="<?= base_url(); ?>assets/media/uploads/work/<?= $row->image; ?>" alt="<?= $row->name; ?>">
                    </div>
                    <div class="showcase-content">
                        <h5 class="showcase-title"><?= $row->name; ?></h5>
                        <p class="showcase-subtitle"><?= !empty($row->description) ? strip_tags($row->description) : 'Desain identitas brand premium yang unik dan fungsional.'; ?></p>
                        <div class="showcase-footer">
                            <span class="badge badge-inline badge-light-primary" style="font-family: 'Outfit';">Logo Brand</span>
                            <a href="<?= base_url('master/works/upload/' . $row->id); ?>" class="btn btn-sm btn-clean btn-icon" title="Upload Details"><i class="la la-upload"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-12 text-center py-5">
                <p class="text-muted">Belum ada karya yang diupload. Mulai dengan menambahkan logo pertama Anda!</p>
            </div>
        <?php endif; ?>
    </div>
</div>