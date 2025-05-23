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

                @php
                    $user = session('admin');
                    $username = $user ? explode('@', $user['email'])[0] : 'Guest';
                @endphp

                <a class="profile" href="{{ route('profil') }}">
                    <div class="profile-photo">
                        <img src="assets/4.jpg">
                    </div>
                    <div class="handle">
                        <h4>{{ $username }}</h4>
                        <p class="text-muted">
                            @Admin
                        </p>
                    </div>
                </a>

                <!-- ======================== SIDEBAR ======================== -->
                 <div class="sidebar">
                    <a class="menu-item" href="{{ route('admin') }}">
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
                    <a class="menu-item active">
                        <span><img src="assets/spreadsheet-app.png" style="width: 18px; height: 18px; margin-left: 1.9rem;"></span> <h3>Statistic</h3>
                    </a>
                    <a class="menu-item" href="{{ route('tambah.user') }}">
                        <span><img src="assets/setting.png" style="width: 18px; height: 18px; margin-left: 1.9rem;"></span> <h3>User Setting</h3>
                    </a>
                 </div>
                 <!-- ---------------------- END OF SIDEBAR ---------------------- -->
                 <a href="{{ route('logout') }}">
                    <label class="btn btn-primary">Logout</label>
                 </a>
            </div>


            <!--========================= MIDDLE =========================-->
            <div class="middle statistic">
                <!-- ====================================== PRODUCT ====================================== -->
                <div class="products">
                    <h2 class="judul">Analytics</h2>
                    <div class="bar-chart analytics">
                        <!-- --------------------------------------- STAT 1 ---------------------------------------- -->
                        <div class="product">
                            <div class="chart">
                                <div class="info">
                                    <div class="info1">
                                        <div>
                                            <div class="up">
                                                <h3>24.7 K</h3>
                                                <small>+49%</small>
                                            </div>
                                            <small>Unique visitors</small>
                                        </div>
                                        <div>
                                            <div class="up">
                                                <h3>56.9 K</h3>
                                                <small>+8%</small>
                                            </div>
                                            <small>Total Pageviews</small>
                                        </div>
                                        <div>
                                            <div class="down">
                                                <h3>2m 56s</h3>
                                                <small>-5%</small>
                                            </div>
                                            <small>Visit Duration</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="photo">
                                    <img src="assets/image.png">
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END STAT 1 --------------------------------------------------- -->

                        <!-- --------------------------------------- STAT 2 ---------------------------------------- -->
                        <div class="product">
                            <div class="chart">
                                <h2>Active Users Right Now</h2>
                                <div class="info">
                                    <div>
                                        <h3>347</h3>
                                        <small>Live Visitors</small>
                                    </div>
                                </div>
                                <div class="photo1">
                                    <img src="assets/chrt.png">
                                </div>
                                <p>Real-Time Report →</p>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END STAT 2 --------------------------------------------------- -->
                    </div>

                    <h2 class="judul">Selling Product</h2>
                    <div class="bar-chart">
                        <!-- --------------------------------------- STAT 1 ---------------------------------------- -->
                        <div class="product">
                            <div class="chart">
                                <div class="info">
                                    <div>
                                        <h4>CloudProject Pro</h4>
                                        <small>Sales</small>
                                        <div class="up">
                                            <h3>$24,780</h3>
                                            <small>+49%</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="photo2">
                                    <img src="assets/line1.png">
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END STAT 1 --------------------------------------------------- -->

                        <!-- --------------------------------------- STAT 2 ---------------------------------------- -->
                        <div class="product">
                            <div class="chart">
                                <div class="info">
                                    <div>
                                        <h4>CloudProject Advanced</h4>
                                        <small>Sales</small>
                                        <div class="down">
                                            <h3>$17,498</h3>
                                            <small>-14%</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="photo2">
                                    <img src="assets/line2.png">
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END STAT 2 --------------------------------------------------- -->

                        <!-- --------------------------------------- STAT 3 ---------------------------------------- -->
                        <div class="product">
                            <div class="chart">
                                <div class="info">
                                    <div>
                                        <h4>CloudProject Basic</h4>
                                        <small>Sales</small>
                                        <div class="up">
                                            <h3>$9,963</h3>
                                            <small>+24%</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="photo2">
                                    <img src="assets/line3.png">
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END STAT 3 --------------------------------------------------- -->
                    </div>

                    <h2 class="judul">Profit</h2>
                    <div class="bar-chart">
                        <!-- --------------------------------------- STAT 1 ---------------------------------------- -->
                        <div class="product">
                            <div class="chart">
                                <div class="info">
                                    <div class="info1">
                                        <div>
                                            <small>Sales Overtime</small>
                                            <div class="down">
                                                <h3>$1,486</h3>
                                                <small>-32%</small>
                                                <div class="status">
                                                    <span class="dot current"></span> Current
                                                    <span class="dot previous"></span> Previous
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="photo3">
                                    <img src="assets/barrr.png">
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END STAT 1 --------------------------------------------------- -->

                        <!-- --------------------------------------- STAT 2 ---------------------------------------- -->
                        <div class="product">
                            <div class="chart">
                                <div class="info">
                                    <div class="info1">
                                        <div>
                                            <small>Sales Refund</small>
                                            <div class="down">
                                                <h3>$6,794</h3>
                                                <small>-34%</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="photo3">
                                        <img src="assets/barr.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END STAT 2 --------------------------------------------------- -->
                    </div>

                    <h2 class="judul">Sessions Category</h2>
                    <div class="bar-chart">
                        <!-- --------------------------------------- STAT 1 ---------------------------------------- -->
                        <div class="product">
                            <div class="chart">
                                <h2>Sessions by User Tier</h2>
                                <div class="photo2">
                                    <img src="assets/donut1.png">
                                </div>
                                <div class="info">
                                    <div class="session">
                                        <span class="dot desktop"></span> Desktop
                                        <span class="dot mobile"></span> Mobile
                                        <span class="dot tablet"></span> Tablet
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END STAT 1 --------------------------------------------------- -->

                        <!-- --------------------------------------- STAT 2 ---------------------------------------- -->
                        <div class="product">
                            <div class="chart">
                                <h2>Sessions by Age</h2>
                                <div class="photo2">
                                    <img src="assets/donut2.png">
                                </div>
                                <div class="info">
                                    <div class="session">
                                        <span class="dot teen"></span> 18-24
                                        <span class="dot adult"></span> &lt;18
                                        <span class="dot adultt"></span> 24-36
                                        <span class="dot old"></span> &gt;35
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END STAT 2 --------------------------------------------------- -->

                        <!-- --------------------------------------- STAT 3 ---------------------------------------- -->
                        <div class="product">
                            <div class="chart">
                                <h2>Sessions by Gender</h2>
                                <div class="photo2">
                                    <img src="assets/gender.png">
                                </div>
                                <div class="info">
                                    <div class="session">
                                        <span class="dot male"></span> Male
                                        <span class="dot female"></span> Female
                                        <span class="dot unknown"></span> Unknown
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END STAT 3 --------------------------------------------------- -->
                    </div>
                </div>
            </div>
        </div>
    </main>
<script src="{{ asset('js/admin.js') }}"></script>    
</body>
</html>