<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="{{('css/admin.css') }}">
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
                    <img src="assets/4.jpg" alt="profil" width="150">
                </div>
            </div>
        </div>
    </nav>

    <!--------------------------- MAIN --------------------------->
    <main>
        <div class="container">
            <!--========================= LEFT =========================-->
            <div class="left">
                @php
                    $admin = session('admin');

                    if ($admin && !empty($admin['nama'])) {
                        $adminName = $admin['nama']; // Menampilkan nama dari database
                    } else {
                        // Jika nama kosong, ambil bagian sebelum @
                        $adminName = isset($admin['email']) && strpos($admin['email'], '@') !== false
                            ? explode('@', $admin['email'])[0]
                            : 'Admin';
                    }
                @endphp

                <a class="profile" href="{{ route('profil') }}">
                    <div class="profile-photo">
                        <img src="assets/4.jpg">
                    </div>
                    <div class="handle">
                        <h4>{{ $adminName }}</h4>
                        <p class="text-muted">
                            @Admin
                        </p>
                    </div>
                </a>

                <!-- ======================================================= SIDEBAR ==================================================================== -->
                 <div class="sidebar">
                    <a class="menu-item active">
                        <span><img src="assets/home.png" style="width: 18px; height: 18px; margin-left: 1.9rem;"></span> <h3>Home</h3>
                    </a>
                    <a class="menu-item" href="{{ route('produk') }}">
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
                    <a class="menu-item" href="{{ route('transaksi') }}">
                        <span><img src="assets/refund.png" style="width: 18px; height: 18px; margin-left: 1.9rem;"></span> <h3>Transaction <br>& Payment</h3>
                    </a>
                    <a class="menu-item" href="{{ route('statistik') }}">
                        <span><img src="assets/spreadsheet-app.png" style="width: 18px; height: 18px; margin-left: 1.9rem;"></span> <h3>Statistic</h3>
                    </a>
                    <a class="menu-item" href="{{ route('tambah.user') }}">
                        <span><img src="assets/setting.png" style="width: 18px; height: 18px; margin-left: 1.9rem;"></span> <h3>User Setting</h3>
                    </a>
                 </div>
                 <!-- ------------------------------------------------------------- END OF SIDEBAR --------------------------------------------------------------------- -->
                  <a href="{{ route('logout') }}">
                    <label class="btn btn-primary">Logout</label>
                  </a>
            </div>


            <!--=========================================================== MIDDLE ===========================================================-->
            <div class="middle">
                <!-- --------------------------------- STORIES ----------------------------  -->
                <div class="templates">
                    <div class="template">
                        <p class="logo">Web Design</p>
                    </div>
                    <div class="template">
                        <p class="logo">Design Grafis</p>
                    </div>
                    <div class="template">
                        <p class="logo">UI Kit & Mockup</p>
                    </div>
                    <div class="template">
                        <p class="logo">Plugin & Tool</p>
                    </div>
                    <div class="template">
                        <p class="logo">Font & Icon</p>
                    </div>
                </div>
                
                <!-- ====================================================== PRODUCT ============================================================== -->
                <h2 class="judul">Top Product</h2>
                <div class="products">
                    <!-- --------------------------------------- PRODUCT 1 ---------------------------------------- -->
                    <div class="product">
                        <div class="card-index">
                            <h3>01</h3>
                        </div>
                        <div class="photo">
                            <img src="assets/e.jpg">
                        </div>
                        <div class="info">
                            <h3>Loki-Inspired Marvel Graphic Design Template</h3>
                            <small>99,876 users</small>
                            <div class="action-button">
                                <div class="interaction-btn">
                                    <span><img src="assets/heart.png" style="width: 18px; height: 18px;"></span>
                                    <span><img src="assets/chat.png" style="width: 18px; height: 18px;"></span>
                                    <span><img src="assets/share.png" style="width: 18px; height: 18px;"></span>
                                </div>
                            </div>
                        </div>
                        <div class="bookmark">
                            <span><img src="assets/more.png" style="width: 18px; height: 18px;"></span>
                            <span><img src="assets/bookmark.png" style="width: 18px; height: 18px;"></span>
                        </div>
                    </div>
                    <!-- ---------------------------- END P 1 --------------------------------------- -->

                    <!-- --------------------------------------- PRODUCT 2 ---------------------------------------- -->
                    <div class="product">
                        <div class="card-index">
                            <h3>02</h3>
                        </div>
                        <div class="photo">
                            <img src="assets/b.jpg">
                        </div>
                        <div class="info">
                            <h3>Professional & Eye-Catching Commercial Designs</h3>
                            <small>78,009 users</small>
                            <div class="action-button">
                                <div class="interaction-btn">
                                    <span><img src="assets/heart.png" style="width: 18px; height: 18px;"></span>
                                    <span><img src="assets/chat.png" style="width: 18px; height: 18px;"></span>
                                    <span><img src="assets/share.png" style="width: 18px; height: 18px;"></span>
                                </div>
                            </div>
                        </div>
                        <div class="bookmark">
                            <span><img src="assets/more.png" style="width: 18px; height: 18px;"></span>
                            <span><img src="assets/bookmark.png" style="width: 18px; height: 18px;"></span>
                        </div>
                    </div>
                    <!-- ---------------------------- END P 2 --------------------------------------- -->

                    <!-- --------------------------------------- PRODUCT 1 ---------------------------------------- -->
                    <div class="product">
                        <div class="card-index">
                            <h3>03</h3>
                        </div>
                        <div class="photo">
                            <img src="assets/a.jpg">
                        </div>
                        <div class="info">
                            <h3>Sleek & Modern Business Website Templates</h3>
                            <small>48,823 users</small>
                            <div class="action-button">
                                <div class="interaction-btn">
                                    <span><img src="assets/heart.png" style="width: 18px; height: 18px;"></span>
                                    <span><img src="assets/chat.png" style="width: 18px; height: 18px;"></span>
                                    <span><img src="assets/share.png" style="width: 18px; height: 18px;"></span>
                                </div>
                            </div>
                        </div>
                        <div class="bookmark">
                            <span><img src="assets/more.png" style="width: 18px; height: 18px;"></span>
                            <span><img src="assets/bookmark.png" style="width: 18px; height: 18px;"></span>
                        </div>
                    </div>
                    <!-- ---------------------------- END P 1 --------------------------------------- -->

                    <!-- --------------------------------------- PRODUCT 1 ---------------------------------------- -->
                    <div class="product">
                        <div class="card-index">
                            <h3>04</h3>
                        </div>
                        <div class="photo">
                            <img src="assets/d.jpg">
                        </div>
                        <div class="info">
                            <h3>Effortless Elegance, Timeless Confidence Design</h3>
                            <small>49,219 users</small>
                            <div class="action-button">
                                <div class="interaction-btn">
                                    <span><img src="assets/heart.png" style="width: 18px; height: 18px;"></span>
                                    <span><img src="assets/chat.png" style="width: 18px; height: 18px;"></span>
                                    <span><img src="assets/share.png" style="width: 18px; height: 18px;"></span>
                                </div>
                            </div>
                        </div>
                        <div class="bookmark">
                            <span><img src="assets/more.png" style="width: 18px; height: 18px;"></span>
                            <span><img src="assets/bookmark.png" style="width: 18px; height: 18px;"></span>
                        </div>
                    </div>
                    <!-- ---------------------------- END P 1 --------------------------------------- -->

                    <!-- --------------------------------------- PRODUCT 1 ---------------------------------------- -->
                    <div class="product">
                        <div class="card-index">
                            <h3>05</h3>
                        </div>
                        <div class="photo">
                            <img src="assets/c.jpg">
                        </div>
                        <div class="info">
                            <h3>Neon Cyberpunk & Sci-Fi AI Art Templates</h3>
                            <small>42,506 users</small>
                            <div class="action-button">
                                <div class="interaction-btn">
                                    <span><img src="assets/heart.png" style="width: 18px; height: 18px;"></span>
                                    <span><img src="assets/chat.png" style="width: 18px; height: 18px;"></span>
                                    <span><img src="assets/share.png" style="width: 18px; height: 18px;"></span>
                                </div>
                            </div>
                        </div>
                        <div class="bookmark">
                            <span><img src="assets/more.png" style="width: 18px; height: 18px;"></span>
                            <span><img src="assets/bookmark.png" style="width: 18px; height: 18px;"></span>
                        </div>
                    </div>
                    <!-- ---------------------------- END P 1 --------------------------------------- -->
                </div>
                <!-- ---------------------------- END OF PRODUCT --------------------------------------- -->
            </div>
            <!-- ========================================== END OF MIDDLE =================================================== -->

            <!--===================================================== RIGHT =============================================================-->
            <div class="right">
                <div class="all">
                    <div class="heading">
                        <h4>Quick Info</h4>
                    </div>
  
                    <!-- ---------------------- QUICK INFO ---------------------- -->
                    <div class="category">
                        <h6 class="active">Orders</h6>
                        <h6>History</h6>
                        <h6 class="feedback">Feedback(62)</h6>
                    </div>
                    <!-- ----------------------------- ORDER ------------------------------- -->
                    <div class="order">
                        <div class="profile-photo">
                            <img src="assets/3.jpg">
                        </div>
                        <div class="order-body">
                            <h5>Andrew Garfield</h5>
                            <p class="text-muted">Has completed the payment</p>
                        </div>
                    </div>
                    <div class="order">
                        <div class="profile-photo">
                            <img src="assets/1.jpg">
                        </div>
                        <div class="order-body">
                            <h5>Emma Watson</h5>
                            <p class="text-muted">Has purchased a product</p>
                        </div>
                    </div>
                    <div class="order">
                        <div class="profile-photo">
                            <img src="assets/5.jpg">
                        </div>
                        <div class="order-body">
                            <h5>Benedict Cumberbatch</h5>
                            <p class="text-muted">Has requested a payment cancellation</p>
                        </div>
                    </div>
                    <div class="order">
                        <div class="profile-photo">
                            <img src="assets/7.jpg">
                        </div>
                        <div class="order-body">
                            <h5>Chris Hemsworth</h5>
                            <p class="text-muted">Has canceled the payment</p>
                        </div>
                    </div>
                    <!-- ----------------------------- END ORDER ------------------------------- -->
                </div>
                <!-- ---------------------------- END INFO ------------------------ -->

                <!-- ---------------------------- MOST LIKE -------------------------------- -->
                <div class="most-liked">
                    <div class="most">
                        <div class="like">
                            <div class="info">
                                <div>
                                    <h3>Weekly Earnings</h3>
                                    <p class="teks">$5,247.09</p>
                                    <p class="text-muted">+$142 (3,7%) - Today</p>
                                </div>
                            </div>
                            <div class="photo1">
                                <img src="assets/br.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<script src="{{ asset('js/admin.js') }}"></script>    
</body>
</html>
