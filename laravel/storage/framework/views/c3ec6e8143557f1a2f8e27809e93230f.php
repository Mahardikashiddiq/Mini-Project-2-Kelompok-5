<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="<?php echo e(('css/admin.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <nav>
        <div class="container">
            <h2 class="log">
                CloudProject
            </h2>
            <div class="search-bar">
                <img src="assets/search-interface-symbol.png" alt="search icon" style="width: 18px; height: 18px;">
                <input type="search" placeholder="search for product">
            </div>
            <div class="create">
                <label class="btn btn-primary" for="#create-post">Dashoard Admin</label>
                <div class="profile-photo">
                    <img src="assets/4.jpg" alt="profil">
                </div>
            </div>
        </div>
    </nav>

    <!--------------------------- MAIN --------------------------->
    <main class="full">
        <div class="container">
            <!--========================= LEFT =========================-->
            <div class="left">

                <?php
                    $user = session('admin');
                    $username = $user ? explode('@', $user['email'])[0] : 'Guest';
                ?>

                <a class="profile" href="<?php echo e(route('profil')); ?>">
                    <div class="profile-photo">
                        <img src="assets/4.jpg">
                    </div>
                    <div class="handle">
                        <h4><?php echo e($username); ?></h4>
                        <p class="text-muted">
                            @Admin
                        </p>
                    </div>
                </a>

                <!-- ======================== SIDEBAR ======================== -->
                 <div class="sidebar">
                    <a class="menu-item" href="<?php echo e(route('admin')); ?>">
                        <span><img src="assets/home.png" style="width: 18px; height: 18px; margin-left: 1.9rem;"></span> <h3>Home</h3>
                    </a>
                    <a class="menu-item" href="<?php echo e(route('produk')); ?>">
                        <span><img src="assets/website-building.png" style="width: 18px; height: 18; margin-left: 1.9rem;"></span> <h3>Product <br>Management</h3>
                    </a>
                    <a class="menu-item" id="notifications">
                        <span><img src="assets/notification.png" style="width: 18px; height: 18px; margin-left: 1.9rem;"></span> <h3>Notification</h3>
                        <!------------------------------------ POP UP -------------------------------------->
                        <div class="notifications-popup">
                            <div>
                                <div class="profile-photo">
                                    <img src="assets/2.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>John Eden</b> Has purchased a product
                                    <small class="text-muted">1 HOURS AGO</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="assets/8.jpg" width="150">
                                </div>
                                <div class="notification-body">
                                    <b>Chris Evan</b> Has purchased a product
                                    <small class="text-muted">6 HOURS AGO</small>
                                </div>
                             </div>
                             <div>
                                <div class="profile-photo">
                                    <img src="assets/9.jpg" width="150">
                                </div>
                                <div class="notification-body">
                                    <b>Cillian Murphy</b> Has purchased a product
                                    <small class="text-muted">2 DAYS AGO</small>
                                </div>
                             </div>
                         </div>
                         <!-- -----------------------------END OF POPUP ------------------------ -->
                    </a>
                    <a class="menu-item active">
                        <span><img src="assets/refund.png" style="width: 18px; height: 18px; margin-left: 1.9rem;"></span> <h3>Transaction <br>& Payment</h3>
                    </a>
                    <a class="menu-item" href="<?php echo e(route('statistik')); ?>">
                        <span><img src="assets/spreadsheet-app.png" style="width: 18px; height: 18px; margin-left: 1.9rem;"></span> <h3>Statistic</h3>
                    </a>
                    <a class="menu-item" href="<?php echo e(route('tambah.user')); ?>">
                        <span><img src="assets/setting.png" style="width: 18px; height: 18px; margin-left: 1.9rem;"></span> <h3>User Setting</h3>
                    </a>
                 </div>
                 <!-- ---------------------- END OF SIDEBAR ---------------------- -->
                 <a href="<?php echo e(route('logout')); ?>">
                    <label class="btn btn-primary">Logout</label>
                 </a>
            </div>


            <!--========================= MIDDLE =========================-->
            <div class="middle trans">
                <div class="products">
                    <h2 class="judul">Transaction</h2>
                    <div class="transactions">
                        <!-- --------------------------------------- TRANS 1 ---------------------------------------- -->
                        <div class="transaction">
                            <div class="trans-header">
                                <h2>Total Transaction</h2>
                                <div class="icon">
                                    <i class="fas fa-shopping-bag"></i>
                                </div>
                            </div>
                            <div class="t1">
                                <div class="info">
                                    <div>
                                        <h3>2,548</h3>
                                        <small>↑ 12.5% from last month</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- --------------------------------------------- END --------------------------------------------- -->

                        <!-- --------------------------------------- TRANS 2 ---------------------------------------- -->
                        <div class="transaction">
                            <div class="trans-header">
                                <h2>Completed Payments</h2>
                                <div class="icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                            <div class="t1">
                                <div class="info">
                                    <div>
                                        <h3>1,896</h3>
                                        <small>74.4% completion rate</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- --------------------------------------------- END --------------------------------------------- -->

                        <!-- --------------------------------------- TRANS 3 ---------------------------------------- -->
                        <div class="transaction">
                            <div class="trans-header">
                                <h2>Pending Payments</h2>
                                <div class="icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>
                            <div class="t1">
                                <div class="info">
                                    <div>
                                        <h3>435</h3>
                                        <small>17.1% pending rate</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- --------------------------------------------- END --------------------------------------------- -->
                    </div>

                    <div class="transactions">
                        <!-- --------------------------------------- TRANS 4 ---------------------------------------- -->
                        <div class="transaction">
                            <div class="trans-header">
                                <h2>Failed Payments</h2>
                                <div class="icon">
                                    <i class="fas fa-times-circle"></i>
                                </div>
                            </div>
                            <div class="t1">
                                <div class="info">
                                    <div>
                                        <h3>217</h3>
                                        <small>8.5% failure rate</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- --------------------------------------------- END --------------------------------------------- -->
                    </div>
                </div>

                <!-- Transactions Section -->
                <div class="transactions-section">
                    <div class="section-header">
                        <div class="section-title">Transaction List</div>
                        <div class="section-actions">
                            <button class="btn btn-outline" id="refreshBtn">
                                <i class="fas fa-sync-alt"></i> Refresh
                            </button>
                            <button class="btn btn-primary" id="exportBtn">
                                <i class="fas fa-download"></i> Export
                            </button>
                        </div>
                    </div>

                    <!-- Filter Section -->
                    <div class="filter-section">
                        <select class="filter-select">
                            <option value="">All Payment Status</option>
                            <option value="paid">Paid</option>
                            <option value="pending">Pending</option>
                            <option value="failed">Failed</option>
                        </select>
                        <select class="filter-select">
                            <option value="">All Payment Methods</option>
                            <option value="credit_card">Credit Card</option>
                            <option value="bank_transfer">Bank Transfer</option>
                            <option value="e-wallet">E-Wallet</option>
                        </select>
                        <input type="date" class="filter-input" placeholder="From Date">
                        <input type="date" class="filter-input" placeholder="To Date">
                        <input type="text" class="filter-input" placeholder="Search Transaction ID, Customer...">
                        <button class="btn btn-primary">
                            <i class="fas fa-filter"></i> Apply Filters
                        </button>
                    </div>

                    <!-- Transactions Table -->
                    <div class="table-responsive">
                        <table class="transactions-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="transactionTableBody">
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link active" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Detail Transaksi -->
    <div class="modal" id="transactionModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Transaction Details</h3>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body" id="transactionDetailsBody">
                <!-- JS akan mengisi rincian transaksi -->
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" id="closeModalBtn">Close</button>
                <button class="btn btn-primary" id="updateStatusBtn">Update Status</button>
            </div>
        </div>
    </div>

    <!-- Perbarui Status Modal -->
    <div class="modal" id="updateStatusModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Update Payment Status</h3>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Transaction ID</label>
                    <input type="text" class="form-control" id="updateTransactionId" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label">Current Status</label>
                    <input type="text" class="form-control" id="currentStatus" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label">New Status</label>
                    <select class="form-control" id="newStatus">
                        <option value="paid">Paid</option>
                        <option value="pending">Pending</option>
                        <option value="failed">Failed</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Update Reason</label>
                    <textarea class="form-control" id="updateReason" rows="3" placeholder="Enter reason for status update..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" id="cancelUpdateBtn">Cancel</button>
                <button class="btn btn-primary" id="confirmUpdateBtn">Confirm Update</button>
            </div>
        </div>
    </div>

<script src="<?php echo e(asset('js/admin.js')); ?>"></script>    
</body>
</html><?php /**PATH D:\laravel11\resources\views/transaksi.blade.php ENDPATH**/ ?>