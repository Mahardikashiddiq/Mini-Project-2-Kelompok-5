<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Profil Pengguna | Cloud</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS - Animate On Scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Hover.css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css" rel="stylesheet">
    <!-- Sweetalert2 -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Lightbox -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(('css/profil.css')); ?>">

</head>
<body>
    <!-- Background blobs -->
    <div class="blob-bg">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top py-3">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-store-alt me-2"></i>CloudProject
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <?php
                            $user = session('user') ?? session('admin');
                            $homeRoute = $user && $user['role'] === 'admin' ? route('admin') : route('user');
                        ?>

                        <a class="nav-link mx-2" href="<?php echo e($homeRoute); ?>"><i class="fas fa-home me-1"></i> Beranda</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <div class="dropdown">
                        <button class="btn btn-light rounded-circle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-bell"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                3
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><h6 class="dropdown-header">Notifikasi</h6></li>
                            <li><a class="dropdown-item" href="#">Admin Dashboard Pro terjual</a></li>
                            <li><a class="dropdown-item" href="#">Anda memiliki ulasan baru</a></li>
                            <li><a class="dropdown-item" href="#">Anda memiliki pesan baru</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-center" href="#">Lihat Semua</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="profile-container" data-aos="fade-up">
            <div class="profile-header">
                <img src="assets/banner.jpg" alt="Profile Banner" class="profile-banner">
                <div class="profile-avatar-container" data-aos="fade-up" data-aos-delay="200">
                    <img src="assets/4.jpg" alt="Profile Picture" id="profileAvatar" class="profile-avatar">
                    <div class="profile-pic-upload" title="Ubah foto profil">
                        <i class="fas fa-camera"></i>
                        <input type="file" id="profile-pic-input" accept="image/*">
                    </div>
                </div>
                
                <div class="container mt-3">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="profile-info">
                                <?php
                                    $user = session('user') ?? session('admin');
                            
                                    $username = $user && !empty($user['nama']) ? $user['nama'] : 'User';
                                    $bio = $user && !empty($user['bio']) ? $user['bio'] : 'No bio yet.';
                                    $address = $user && !empty($user['address']) ? $user['address'] : 'Add location';
                                ?>
                                
                                <h3 id="profileName" class="mb-1"><?php echo e($username); ?></h3>

                                <div class="mb-2">
                                    <span class="profile-badge badge-verified"><i class="fas fa-check-circle me-1"></i> Terverifikasi</span>
                                    <span class="profile-badge badge-seller"><i class="fas fa-award me-1"></i> Pro Seller</span>
                                </div>

                                <p class="text-muted">
                                    <i class="fas fa-map-marker-alt me-2"></i><?php echo e($address); ?>

                                </p>

                                <p id="profileBio" class="mt-3">
                                    <?php echo e($bio); ?>

                                </p>
                                
                                <div class="profile-stats">
                                    <div class="stat-item hvr-grow">
                                        <div class="stat-value">48</div>
                                        <div class="stat-label">Produk</div>
                                    </div>
                                    <div class="stat-item hvr-grow">
                                        <div class="stat-value">2.4k</div>
                                        <div class="stat-label">Pengikut</div>
                                    </div>
                                    <div class="stat-item hvr-grow">
                                        <div class="stat-value">156</div>
                                        <div class="stat-label">Mengikuti</div>
                                    </div>
                                    <div class="stat-item hvr-grow">
                                        <div class="stat-value">4.9</div>
                                        <div class="stat-label">Rating</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-md-end mt-3 mt-md-0">
                            <div class="profile-actions">
                                <button class="btn btn-primary hvr-float" data-bs-toggle="tooltip" title="Edit profile information">
                                    <i class="fas fa-edit me-2"></i>Edit Profil
                                </button>
                                <button class="btn btn-outline-primary hvr-float" data-bs-toggle="tooltip" title="Change account settings">
                                    <i class="fas fa-cog me-2"></i>Pengaturan
                                </button>
                                <button class="btn btn-light hvr-float mt-2" data-bs-toggle="tooltip" title="Share profile with others">
                                    <i class="fas fa-share-alt me-2"></i>Bagikan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Profile Navigation -->
            <ul class="nav nav-pills nav-fill mb-4" id="profileTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="products-tab" data-bs-toggle="tab" data-bs-target="#products" type="button" role="tab">
                        <i class="fas fa-boxes me-2"></i>Produk Saya
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="transactions-tab" data-bs-toggle="tab" data-bs-target="#transactions" type="button" role="tab">
                        <i class="fas fa-exchange-alt me-2"></i>Transaksi
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab">
                        <i class="fas fa-star me-2"></i>Ulasan
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="wishlist-tab" data-bs-toggle="tab" data-bs-target="#wishlist" type="button" role="tab">
                        <i class="fas fa-heart me-2"></i>Wishlist
                    </button>
                </li>
            </ul>
            
            <!-- Tab Content -->
            <div class="tab-content" id="profileTabContent">
                <!-- Products Tab -->
                <div class="tab-pane fade show active" id="products" role="tabpanel" aria-labelledby="products-tab">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4>Produk Saya <span class="badge bg-primary">48</span></h4>
                        <div>
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProductModal">
                                <i class="fas fa-plus me-2"></i>Tambah Produk
                            </button>
                            <div class="dropdown d-inline-block ms-2">
                                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-filter me-1"></i> Filter
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item active" href="#"><i class="fas fa-clock me-2"></i>Terbaru</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-fire me-2"></i>Terlaris</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-arrow-up me-2"></i>Harga Tertinggi</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-arrow-down me-2"></i>Harga Terendah</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Products Grid -->
                    <div class="row g-4">
                        <!-- Product 1 -->
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up">
                            <div class="card product-card h-100">
                                <div class="product-img-container">
                                    <img src="assets/produk1.jpg" class="card-img-top product-img" alt="Modern UI Kit">
                                    <div class="product-overlay">
                                        <div class="product-overlay-content">
                                            <a href="#" class="product-overlay-btn hvr-grow" data-bs-toggle="tooltip" title="Edit Product">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="product-overlay-btn hvr-grow" data-bs-toggle="tooltip" title="View Analytics">
                                                <i class="fas fa-chart-line"></i>
                                            </a>
                                            <a href="#" class="product-overlay-btn hvr-grow" data-bs-toggle="tooltip" title="Preview">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <span class="badge bg-info product-badge badge-new">Baru</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title mb-1">Modern UI Kit Premium</h5>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="product-price">Rp 799.000</span>
                                        <div class="product-rating">
                                            <i class="fas fa-star"></i>
                                            <span>4.8</span>
                                        </div>
                                    </div>
                                    <p class="card-text small text-muted">400+ komponen UI, responsif, kompatibel dengan Figma & Sketch</p>
                                    <div class="product-sales small">
                                        <i class="fas fa-shopping-cart me-1"></i> 345 terjual
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product 2 -->
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                            <div class="card product-card h-100">
                                <div class="product-img-container">
                                    <img src="assets/produk2.jpg" class="card-img-top product-img" alt="Admin Dashboard">
                                    <div class="product-overlay">
                                        <div class="product-overlay-content">
                                            <a href="#" class="product-overlay-btn hvr-grow" data-bs-toggle="tooltip" title="Edit Product">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="product-overlay-btn hvr-grow" data-bs-toggle="tooltip" title="View Analytics">
                                                <i class="fas fa-chart-line"></i>
                                            </a>
                                            <a href="#" class="product-overlay-btn hvr-grow" data-bs-toggle="tooltip" title="Preview">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <span class="badge bg-warning product-badge badge-bestseller">Terlaris</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title mb-1">Admin Dashboard Pro</h5>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="product-price">Rp 1.299.000</span>
                                        <div class="product-rating">
                                            <i class="fas fa-star"></i>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <p class="card-text small text-muted">Template dashboard admin dengan 10+ halaman, grafik dinamis, dan tema gelap</p>
                                    <div class="product-sales small">
                                        <i class="fas fa-shopping-cart me-1"></i> 1.2k terjual
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product 3 -->
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                            <div class="card product-card h-100">
                                <div class="product-img-container">
                                    <img src="assets/produk3.jpg" class="card-img-top product-img" alt="Icon Pack">
                                    <div class="product-overlay">
                                        <div class="product-overlay-content">
                                            <a href="#" class="product-overlay-btn hvr-grow" data-bs-toggle="tooltip" title="Edit Product">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="product-overlay-btn hvr-grow" data-bs-toggle="tooltip" title="View Analytics">
                                                <i class="fas fa-chart-line"></i>
                                            </a>
                                            <a href="#" class="product-overlay-btn hvr-grow" data-bs-toggle="tooltip" title="Preview">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title mb-1">Minimalist Icon Pack</h5>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="product-price">Rp 349.000</span>
                                        <div class="product-rating">
                                            <i class="fas fa-star"></i>
                                            <span>4.1</span>
                                        </div>
                                    </div>
                                    <p class="card-text small text-muted">500+ ikon minimalis dengan berbagai kategori, dalam format SVG & PNG</p>
                                    <div class="product-sales small">
                                        <i class="fas fa-shopping-cart me-1"></i> 678 terjual
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product 4 -->
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                            <div class="card product-card h-100">
                                <div class="product-img-container">
                                    <img src="assets/produk4.jpg" class="card-img-top product-img" alt="3D Device Mockups">
                                    <div class="product-overlay">
                                        <div class="product-overlay-content">
                                            <a href="#" class="product-overlay-btn hvr-grow" data-bs-toggle="tooltip" title="Edit Product">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="product-overlay-btn hvr-grow" data-bs-toggle="tooltip" title="View Analytics">
                                                <i class="fas fa-chart-line"></i>
                                            </a>
                                            <a href="#" class="product-overlay-btn hvr-grow" data-bs-toggle="tooltip" title="Preview">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title mb-1">3D Device Mockups</h5>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="product-price">Rp 599.000</span>
                                        <div class="product-rating">
                                            <i class="fas fa-star"></i>
                                            <span>4.7</span>
                                        </div>
                                    </div>
                                    <p class="card-text small text-muted">Mockup perangkat 3D realistis untuk smartphone, laptop, dan tablet</p>
                                    <div class="product-sales small">
                                        <i class="fas fa-shopping-cart me-1"></i> 421 terjual
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Button to view more -->
                        <div class="col-12 text-center mt-4">
                            <button class="btn btn-outline-primary px-4 py-2">
                                <i class="fas fa-plus-circle me-2"></i>Lihat Lebih Banyak
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Transactions Tab -->
                <div class="tab-pane fade" id="transactions" role="tabpanel" aria-labelledby="transactions-tab">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4>Riwayat Transaksi</h4>
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="transactionRadio" id="transactionAll" checked>
                            <label class="btn btn-outline-primary" for="transactionAll">Semua</label>
                            
                            <input type="radio" class="btn-check" name="transactionRadio" id="transactionCompleted">
                            <label class="btn btn-outline-primary" for="transactionCompleted">Selesai</label>
                            
                            <input type="radio" class="btn-check" name="transactionRadio" id="transactionProcessing">
                            <label class="btn btn-outline-primary" for="transactionProcessing">Diproses</label>
                            
                            <input type="radio" class="btn-check" name="transactionRadio" id="transactionCancelled">
                            <label class="btn btn-outline-primary" for="transactionCancelled">Dibatalkan</label>
                        </div>
                    </div>
                    
                    <!-- Transaction List -->
                    <div class="transaction-list">
                        <!-- Transaction 1 -->
                        <div class="transaction-item" data-aos="fade-right">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5 class="mb-1">Admin Dashboard Pro</h5>
                                    <div class="transaction-date mb-2">
                                        <i class="far fa-calendar-alt me-1"></i> 20 Mar 2025, 14:35
                                    </div>
                                    <div>
                                        <span class="badge bg-light text-dark me-2">ID: #TRX92847</span>
                                        <span class="badge bg-light text-dark">Pembeli: Jonathan Lee</span>
                                    </div>
                                </div>
                                <div class="col-md-2 text-md-end mt-3 mt-md-0">
                                    <div class="transaction-status status-completed">
                                        <i class="fas fa-check-circle me-1"></i> Selesai
                                    </div>
                                </div>
                                <div class="col-md-2 text-md-end mt-3 mt-md-0">
                                    <div class="product-price mb-2">Rp 1.299.000</div>
                                    <button class="btn btn-sm btn-outline-primary w-100">Detail</button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Transaction 2 -->
                        <div class="transaction-item" data-aos="fade-right" data-aos-delay="100">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5 class="mb-1">Premium Font Collection</h5>
                                    <div class="transaction-date mb-2">
                                        <i class="far fa-calendar-alt me-1"></i> 18 Mar 2025, 09:12
                                    </div>
                                    <div>
                                        <span class="badge bg-light text-dark me-2">ID: #TRX92803</span>
                                        <span class="badge bg-light text-dark">Pembeli: Dewi Anggraini</span>
                                    </div>
                                </div>
                                <div class="col-md-2 text-md-end mt-3 mt-md-0">
                                    <div class="transaction-status status-completed">
                                        <i class="fas fa-check-circle me-1"></i> Selesai
                                    </div>
                                </div>
                                <div class="col-md-2 text-md-end mt-3 mt-md-0">
                                    <div class="product-price mb-2">Rp 899.000</div>
                                    <button class="btn btn-sm btn-outline-primary w-100">Detail</button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Transaction 3 -->
                        <div class="transaction-item" data-aos="fade-right" data-aos-delay="200">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5 class="mb-1">Modern UI Kit Premium</h5>
                                    <div class="transaction-date mb-2">
                                        <i class="far fa-calendar-alt me-1"></i> 15 Mar 2025, 16:48
                                    </div>
                                    <div>
                                        <span class="badge bg-light text-dark me-2">ID: #TRX92756</span>
                                        <span class="badge bg-light text-dark">Pembeli: Sarah Williams</span>
                                    </div>
                                </div>
                                <div class="col-md-2 text-md-end mt-3 mt-md-0">
                                    <div class="transaction-status status-processing">
                                        <i class="fas fa-spinner fa-spin me-1"></i> Diproses
                                    </div>
                                </div>
                                <div class="col-md-2 text-md-end mt-3 mt-md-0">
                                    <div class="product-price mb-2">Rp 799.000</div>
                                    <button class="btn btn-sm btn-outline-primary w-100">Detail</button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Transaction 4 -->
                        <div class="transaction-item" data-aos="fade-right" data-aos-delay="300">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5 class="mb-1">3D Device Mockups</h5>
                                    <div class="transaction-date mb-2">
                                        <i class="far fa-calendar-alt me-1"></i> 10 Mar 2025, 11:20
                                    </div>
                                    <div>
                                        <span class="badge bg-light text-dark me-2">ID: #TRX92689</span>
                                        <span class="badge bg-light text-dark">Pembeli: Michael Chen</span>
                                    </div>
                                </div>
                                <div class="col-md-2 text-md-end mt-3 mt-md-0">
                                    <div class="transaction-status status-cancelled">
                                        <i class="fas fa-times-circle me-1"></i> Dibatalkan
                                    </div>
                                </div>
                                <div class="col-md-2 text-md-end mt-3 mt-md-0">
                                    <div class="product-price mb-2">Rp 599.000</div>
                                    <button class="btn btn-sm btn-outline-primary w-100">Detail</button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Button to view more -->
                        <div class="col-12 text-center mt-4">
                            <button class="btn btn-outline-primary px-4 py-2">
                                <i class="fas fa-plus-circle me-2"></i>Lihat Lebih Banyak
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Reviews Tab -->
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4>Ulasan Saya</h4>
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="reviewsRadio" id="reviewsAll" checked>
                            <label class="btn btn-outline-primary" for="reviewsAll">Semua Rating</label>
                            
                            <input type="radio" class="btn-check" name="reviewsRadio" id="reviews5">
                            <label class="btn btn-outline-primary" for="reviews5">5 <i class="fas fa-star"></i></label>
                            
                            <input type="radio" class="btn-check" name="reviewsRadio" id="reviews4">
                            <label class="btn btn-outline-primary" for="reviews4">4 <i class="fas fa-star"></i></label>
                            
                            <input type="radio" class="btn-check" name="reviewsRadio" id="reviews3">
                            <label class="btn btn-outline-primary" for="reviews3">3 <i class="fas fa-star"></i></label>
                            
                            <input type="radio" class="btn-check" name="reviewsRadio" id="reviewsLow">
                            <label class="btn btn-outline-primary" for="reviewsLow">< 3 <i class="fas fa-star"></i></label>
                        </div>
                    </div>
                    
                    <!-- Reviews List -->
                    <div class="reviews-list">
                        <!-- Review 1 -->
                        <div class="review-item" data-aos="fade-up">
                            <div class="d-flex justify-content-between align-items-top mb-2">
                                <div>
                                    <h5 class="review-product mb-1">Modern UI Kit Premium</h5>
                                    <div>
                                        <span class="review-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="review-date">19 Mar 2025</span>
                                    </div>
                                </div>
                                <span class="badge bg-light text-dark">Pembeli: David Kumar</span>
                            </div>
                            <p class="mb-0">UI Kit yang sangat lengkap dan profesional. Semua komponen sangat mudah digunakan dan dokumentasinya jelas. Saya sangat merekomendasikan produk ini untuk para desainer UI/UX!</p>
                            <div class="mt-3 text-end">
                                <button class="btn btn-sm btn-outline-primary">Balas</button>
                            </div>
                        </div>
                        
                        <!-- Review 2 -->
                        <div class="review-item" data-aos="fade-up" data-aos-delay="100">
                            <div class="d-flex justify-content-between align-items-top mb-2">
                                <div>
                                    <h5 class="review-product mb-1">Admin Dashboard Pro</h5>
                                    <div>
                                        <span class="review-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>
                                        <span class="review-date">15 Mar 2025</span>
                                    </div>
                                </div>
                                <span class="badge bg-light text-dark">Pembeli: Amanda Tan</span>
                            </div>
                            <p class="mb-0">Dashboard admin terbaik yang pernah saya gunakan. Fitur grafik sangat interaktif dan tema gelapnya juga sangat elegan. Satu-satunya masalah adalah responsivitasnya di layar yang sangat kecil.</p>
                            <div class="mt-3 text-end">
                                <button class="btn btn-sm btn-outline-primary">Balas</button>
                            </div>
                        </div>
                        
                        <!-- Review 3 -->
                        <div class="review-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="d-flex justify-content-between align-items-top mb-2">
                                <div>
                                    <h5 class="review-product mb-1">Minimalist Icon Pack</h5>
                                    <div>
                                        <span class="review-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>
                                        <span class="review-date">10 Mar 2025</span>
                                    </div>
                                </div>
                                <span class="badge bg-light text-dark">Pembeli: Ricky Wijaya</span>
                            </div>
                            <p class="mb-0">Koleksi ikon yang bagus dengan desain minimalis. Sayangnya, beberapa kategori ikon masih kurang lengkap seperti ikon kesehatan dan pendidikan. Tapi secara keseluruhan kualitasnya bagus.</p>
                            <div class="mt-3 text-end">
                                <button class="btn btn-sm btn-outline-primary">Balas</button>
                            </div>
                        </div>
                        
                        <!-- Button to view more -->
                        <div class="col-12 text-center mt-4">
                            <button class="btn btn-outline-primary px-4 py-2">
                                <i class="fas fa-plus-circle me-2"></i>Lihat Lebih Banyak
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Wishlist Tab -->
                <div class="tab-pane fade" id="wishlist" role="tabpanel" aria-labelledby="wishlist-tab">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4>Wishlist Saya</h4>
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-sort me-1"></i> Urutkan
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item active" href="#"><i class="fas fa-clock me-2"></i>Terbaru</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-history me-2"></i>Terlama</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-arrow-up me-2"></i>Harga Tertinggi</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-arrow-down me-2"></i>Harga Terendah</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Wishlist Items -->
                    <div class="row">
                        <!-- Wishlist Item 1 -->
                        <div class="col-12 mb-3" data-aos="fade-up">
                            <div class="wishlist-item">
                                <img src="https://source.unsplash.com/random/300x300/?ecommerce" alt="Product" class="wishlist-img">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">E-commerce UI Template</h5>
                                    <p class="mb-2 text-muted small">Template UI lengkap untuk toko online dengan 20+ halaman</p>
                                    <div class="product-price">Rp 1.499.000</div>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                    <button class="btn btn-primary mb-2">
                                        <i class="fas fa-shopping-cart me-1"></i> Beli
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-trash me-1"></i> Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Wishlist Item 2 -->
                        <div class="col-12 mb-3" data-aos="fade-up" data-aos-delay="100">
                            <div class="wishlist-item">
                                <img src="https://source.unsplash.com/random/300x300/?illustration" alt="Product" class="wishlist-img">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">Flat Illustrations Pack</h5>
                                    <p class="mb-2 text-muted small">100+ ilustrasi vektor dalam berbagai tema dan kategori</p>
                                    <div class="product-price">Rp 699.000</div>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                    <button class="btn btn-primary mb-2">
                                        <i class="fas fa-shopping-cart me-1"></i> Beli
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-trash me-1"></i> Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Wishlist Item 3 -->
                        <div class="col-12 mb-3" data-aos="fade-up" data-aos-delay="200">
                            <div class="wishlist-item">
                                <img src="https://source.unsplash.com/random/300x300/?learning" alt="Product" class="wishlist-img">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">LMS Website Template</h5>
                                    <p class="mb-2 text-muted small">Template website pembelajaran online dengan sistem manajemen kursus</p>
                                    <div class="product-price">Rp 1.899.000</div>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                    <button class="btn btn-primary mb-2">
                                        <i class="fas fa-shopping-cart me-1"></i> Beli
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-trash me-1"></i> Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editProfileForm">
                        <div class="text-center mb-4">
                            <div class="position-relative d-inline-block">
                                <img src="assets/4.jpg" alt="Profile Picture" id="previewProfileImage" class="rounded-circle" width="120" height="120" style="object-fit: cover;">
                                <div class="profile-pic-upload" style="bottom: 5px; right: 5px; width: 35px; height: 35px;">
                                    <i class="fas fa-camera"></i>
                                    <input type="file" name="profile_picture" id="profileImageInput" accept="image/*" style="opacity: 0; position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="role" value="<?php echo e($user['role'] ?? 'user'); ?>">
                        <div class="mb-3">
                            <label for="profileNameInput" class="form-label">Nama Lengkap</label>
                            
                            <input type="text" class="form-control" id="profileNameInput" name="nama" value="<?php echo e(old('nama', $user['nama'] ?? '')); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="profileLocationInput" class="form-label">Alamat</label>
                            
                            <input type="text" class="form-control" id="profileLocationInput" name="address" value="<?php echo e(old('address', $user['address'] ?? '')); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="profileBioInput" class="form-label">Bio</label>
                            
                            <textarea class="form-control" id="profileBioInput" name="bio" rows="3"> <?php echo e(old('bio', $user['bio'] ?? '')); ?> </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="profilePhoneInput" class="form-label">Nomor Telepon</label>
                            
                            <input type="tel" class="form-control" id="profilePhoneInput" name="phone" value="<?php echo e(old('phone', $user['phone'] ?? '')); ?>">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="saveProfile()">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
    
    <script src="<?php echo e(asset('js/profil.js')); ?>"></script>
</body>
</html><?php /**PATH D:\sem4\pbw\Kel5_PBW\resources\views/profil.blade.php ENDPATH**/ ?>