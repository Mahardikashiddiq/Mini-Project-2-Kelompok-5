<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Admin Dashboard - Manajemen Pengguna | CloudProject</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="<?php echo e(('css/tambah_user.css')); ?>">

</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-brand">
                    <i class="fas fa-store"></i>
                    <h3>CloudProject</h3>
                </div>
                <button class="sidebar-toggle" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a href="<?php echo e(route('admin')); ?>" class="sidebar-menu-link">
                        <div class="sidebar-menu-icon">
                            <i class="fas fa-sign-out-alt"></i>
                        </div>
                        <span class="sidebar-menu-text">Keluar</span>
                    </a>
                </li>
            </ul>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content" id="mainContent">
            <!-- Header -->
            <header class="header">
                <div class="header-search">
                    <i class="fas fa-search header-search-icon"></i>
                    <input type="text" class="header-search-input" placeholder="Cari...">
                </div>
                
                <div class="header-actions">
                    <button class="header-action-btn">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">5</span>
                    </button>
                    <button class="header-action-btn">
                        <i class="fas fa-envelope"></i>
                        <span class="notification-badge">3</span>
                    </button>>
                    <div class="admin-profile" id="adminProfile">
                        <img src="assets/4.jpg" class="admin-avatar">
                        <div class="admin-info">
                            <h6 class="admin-name">Mahardika</h6>
                            <p class="admin-role">Super Admin</p>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <h1 class="page-title">Manajemen Pengguna</h1>
                
                <!-- Stats Cards -->
                <div class="stats-cards">
                    <div class="stats-card">
                        <div class="stats-card-icon bg-primary-light">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stats-card-info">
                            <h4>8,249</h4>
                            <p>Total Pengguna</p>
                        </div>
                    </div>
                    
                    <div class="stats-card">
                        <div class="stats-card-icon bg-success-light">
                            <i class="fas fa-store"></i>
                        </div>
                        <div class="stats-card-info">
                            <h4>1,823</h4>
                            <p>Penjual Aktif</p>
                        </div>
                    </div>
                    
                    <div class="stats-card">
                        <div class="stats-card-icon bg-warning-light">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="stats-card-info">
                            <h4>142</h4>
                            <p>Pengguna Baru</p>
                        </div>
                    </div>
                    
                    <div class="stats-card">
                        <div class="stats-card-icon bg-danger-light">
                            <i class="fas fa-user-slash"></i>
                        </div>
                        <div class="stats-card-info">
                            <h4>24</h4>
                            <p>Pengguna Ditangguhkan</p>
                        </div>
                    </div>
                </div>
                
                <!-- Charts Section -->
                <div class="row mb-4">
                    <div class="col-md-6 mb-4 mb-md-0">
                        <div class="content-card">
                            <div class="content-card-header">
                                <h5 class="content-card-title">Pertumbuhan Pengguna</h5>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="userGrowthDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        6 Bulan Terakhir
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="userGrowthDropdown">
                                        <li><a class="dropdown-item" href="#">30 Hari Terakhir</a></li>
                                        <li><a class="dropdown-item" href="#">3 Bulan Terakhir</a></li>
                                        <li><a class="dropdown-item" href="#">1 Tahun Terakhir</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="content-card-body">
                                <div class="chart-container">
                                    <canvas id="userGrowthChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="content-card">
                            <div class="content-card-header">
                                <h5 class="content-card-title">Distribusi Pengguna</h5>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="userDistributionDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        Peran
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="userDistributionDropdown">
                                        <li><a class="dropdown-item" href="#">Status</a></li>
                                        <li><a class="dropdown-item" href="#">Lokasi</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="content-card-body">
                                <div class="chart-container">
                                    <canvas id="userDistributionChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Users Table Section -->
                <div class="content-card">
                    <div class="content-card-header">
                        <h5 class="content-card-title">Daftar Pengguna</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                            <i class="fas fa-plus me-2"></i> Tambah Pengguna
                        </button>
                    </div>
                    <div class="content-card-body">
                        <div class="table-responsive">
                            <table id="usersTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Alamat</th>
                                        <th>Bio</th>
                                        <th>No Telepon</th>
                                        <th>Terdaftar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td>
                                                <div class="user-info">
                                                    <img src="assets/avatar.jpg" alt="User" class="user-avatar">
                                                    <div>
                                                        <h6 class="user-name"><?php echo e($user->nama ?? 'null'); ?></h6>
                                                        <p class="user-email"><?php echo e($user->email ?? 'null'); ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="user-address"><?php echo e($user->address ?? 'null'); ?></td> <!-- Alamat -->
                                            <td class="user-bio"><?php echo e($user->bio ?? 'null'); ?></td> <!-- Bio -->
                                            <td class="user-phone"><?php echo e($user->phone ?? 'null'); ?></td> <!-- No Telepon -->
                                            <td><?php echo e($user->created_at ? \Carbon\Carbon::parse($user->created_at)->format('d M Y') : 'null'); ?></td> <!-- Tanggal Terdaftar -->
                                            <td>
                                                <div class="table-actions"> 
                                                    <button class="action-btn action-btn-edit" title="Edit Pengguna"
                                                        data-id="<?php echo e($user->id); ?>"
                                                        data-nama="<?php echo e($user->nama); ?>"
                                                        data-email="<?php echo e($user->email); ?>"
                                                        data-address="<?php echo e($user->address); ?>"
                                                        data-phone="<?php echo e($user->phone); ?>"
                                                        data-bio="<?php echo e($user->bio); ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="action-btn action-btn-delete" title="Hapus Pengguna" data-id="<?php echo e($user->id); ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada user</td>
                                        </tr>
                                    <?php endif; ?>            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Tambah Pengguna Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm" method="POST" action="<?php echo e(route('user.store')); ?>" enctype="multipart/form-data" class="needs-validation" novalidate>
                        <?php echo csrf_field(); ?>
                        <div class="row mb-4">
                            <div class="col-12 text-center">
                                <div class="position-relative d-inline-block">
                                    <img src="assets/avatar.jpg" alt="User Avatar" class="rounded-circle border" width="120" height="120" id="previewAvatar">
                                    <label for="avatarUpload" class="position-absolute bottom-0 end-0 bg-primary text-white rounded-circle p-2 cursor-pointer" style="cursor: pointer;">
                                        <i class="fas fa-camera"></i>
                                        <input type="file" id="avatarUpload"  name="avatar" class="d-none" accept="image/*">
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row g-3">
                            <!-- Personal Information -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                                    <label for="email">Email</label>
                                    <div class="invalid-feedback">
                                        Email wajib diisi.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" name="nama" class="form-control" id="lastName" placeholder="Nama Belakang">
                                    <label for="lastName">Nama</label>
                                    <div class="invalid-feedback">
                                        Opsional.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Alamat">
                                    <label for="email">Alamat</label>
                                    <div class="invalid-feedback">
                                        Opsional.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="tel" name="phone" class="form-control" id="phone" placeholder="Nomor Telepon">
                                    <label for="phone">Nomor Telepon</label>
                                    <div class="invalid-feedback">
                                        Opsional.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="bio" id="address" placeholder="Alamat" style="height: 100px"></textarea>
                                    <label for="address">Bio</label>
                                </div>
                            </div>
                            
                            <hr class="my-4">
                            
                            <!-- Account Information -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="role" name="role">
                                        <option value="" selected disabled>Pilih role...</option>
                                        <option value="customer">User</option>
                                    </select>
                                    <label for="role">Role Pengguna</label>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="password" id="Password" placeholder="Password" required>
                                    <label for="Password">Password</label>
                                    <div class="invalid-feedback">
                                        Password Wajib diisi.
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="saveUserBtn">Simpan Pengguna</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit User -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <input type="hidden" id="editUserId" name="userId"> <!-- Menyimpan ID user -->
                        <div class="mb-3">
                            <label for="editNama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="editNama" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="editPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="editPassword" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="editAddress" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="editAddress" name="address">
                        </div>
                        <div class="mb-3">
                            <label for="editPhone" class="form-label">Telepon</label>
                            <input type="text" class="form-control" id="editPhone" name="phone">
                        </div>
                        <div class="mb-3">
                            <label for="editBio" class="form-label">Bio</label>
                            <textarea class="form-control" id="editBio" name="bio"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    
    <script src="<?php echo e(asset('js/tambah_user.js')); ?>"></script>
</body>
</html><?php /**PATH D:\laravel11\resources\views/tambah_user.blade.php ENDPATH**/ ?>