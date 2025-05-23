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
                    <a class="menu-item active">
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
                 <!-- ---------------------- END OF SIDEBAR ---------------------- -->
                 <a href="{{ route('logout') }}">
                    <label class="btn btn-primary">Logout</label>
                 </a>
            </div>


            <!--============================================== MIDDLE ======================================================-->
            <div class="middle product">
                <!-- ====================================== PRODUCT ====================================== -->
                <div class="products">
                    <div class="add">
                        <h2 class="judul">Web Design Templates</h2>
                        <img src="assets/add.png" style="width: 27px; height: auto;">
                    </div>
                    <div class="design">
                        <!-- --------------------------------------- PRODUCT 1 ---------------------------------------- -->
                        <div class="product">
                            <div class="p1">
                                <div class="photo">
                                    <img src="assets/i.jpg">
                                </div>
                                <div class="info">
                                    <div>
                                        <h3>Driven Furniture Marketing Templates</h3>
                                        <small>875 users</small>
                                    </div>
                                    <div class="bookmark">
                                        <span><img src="assets/more1.png" style="width: auto; height: 18px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END P 1 --------------------------------------------------- -->

                        <!-- --------------------------------------- PRODUCT 2 ---------------------------------------- -->
                        <div class="product">
                            <div class="p1">
                                <div class="photo">
                                    <img src="assets/f.jpg">
                                </div>
                                <div class="info">
                                    <div>
                                        <h3>Adventure & Outdoor Travel Design Kit</h3>
                                        <small>1,210 users</small>
                                    </div>
                                    <div class="bookmark">
                                        <span><img src="assets/more1.png" style="width: auto; height: 18px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END P 2 --------------------------------------------------- -->

                        <!-- --------------------------------------- PRODUCT 3 ---------------------------------------- -->
                        <div class="product">
                            <div class="p1">
                                <div class="photo">
                                    <img src="assets/g.jpg">
                                </div>
                                <div class="info">
                                    <div>
                                        <h3>Sci-Fi & Fantasy Film Promo Templates</h3>
                                        <small>2,456 users</small>
                                    </div>
                                    <div class="bookmark">
                                        <span><img src="assets/more1.png" style="width: auto; height: 18px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END P 3 --------------------------------------------------- -->

                        <!-- --------------------------------------- PRODUCT 4 ---------------------------------------- -->
                        <div class="product">
                            <div class="p1">
                                <div class="photo">
                                    <img src="assets/h.jpg">
                                </div>
                                <div class="info">
                                    <div>
                                        <h3>Minimalist & Classic Web Templates</h3>
                                        <small>9,999 users</small>
                                    </div>
                                    <div class="bookmark">
                                        <span><img src="assets/more1.png" style="width: auto; height: 18px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END P 4 --------------------------------------------------- -->
                    </div>

                    <div class="add">
                        <h2 class="judul">Design Graphics</h2>
                        <img src="assets/add.png" style="width: 27px; height: auto;">
                    </div>
                    <div class="design">
                        <!-- --------------------------------------- PRODUCT 1 ---------------------------------------- -->
                        <div class="product">
                            <div class="p1">
                                <div class="photo">
                                    <img src="assets/j.jpg">
                                </div>
                                <div class="info">
                                    <div>
                                        <h3>Heroic Saga - Epic Movie Poster Kit</h3>
                                        <small>1,007 users</small>
                                    </div>
                                    <div class="bookmark">
                                        <span><img src="assets/more1.png" style="width: auto; height: 18px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END P 1 --------------------------------------------------- -->

                        <!-- --------------------------------------- PRODUCT 2 ---------------------------------------- -->
                        <div class="product">
                            <div class="p1">
                                <div class="photo">
                                    <img src="assets/l.jpg">
                                </div>
                                <div class="info">
                                    <div>
                                        <h3>TimelessClass - Vintage & Classic Fashion Ads</h3>
                                        <small>4,800 users</small>
                                    </div>
                                    <div class="bookmark">
                                        <span><img src="assets/more1.png" style="width: auto; height: 18px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END P 2 --------------------------------------------------- -->

                        <!-- --------------------------------------- PRODUCT 3 ---------------------------------------- -->
                        <div class="product">
                            <div class="p1">
                                <div class="photo">
                                    <img src="assets/k.jpg">
                                </div>
                                <div class="info">
                                    <div>
                                        <h3>Now You See Me Poster Idea Design</h3>
                                        <small>826 users</small>
                                    </div>
                                    <div class="bookmark">
                                        <span><img src="assets/more1.png" style="width: auto; height: 18px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END P 3 --------------------------------------------------- -->

                        <!-- --------------------------------------- PRODUCT 4 ---------------------------------------- -->
                        <div class="product">
                            <div class="p1">
                                <div class="photo">
                                    <img src="assets/m.jpg">
                                </div>
                                <div class="info">
                                    <div>
                                        <h3>Gaming Accessories & Console Ads</h3>
                                        <small>201 users</small>
                                    </div>
                                    <div class="bookmark">
                                        <span><img src="assets/more1.png" style="width: auto; height: 18px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END P 4 --------------------------------------------------- -->
                    </div>

                    <div class="add">
                        <h2 class="judul">UI Kit & Mockup</h2>
                        <img src="assets/add.png" style="width: 27px; height: auto;">
                    </div>
                    <div class="design">
                        <!-- --------------------------------------- PRODUCT 1 ---------------------------------------- -->
                        <div class="product">
                            <div class="p1">
                                <div class="photo">
                                    <img src="assets/u.jpg">
                                </div>
                                <div class="info">
                                    <div>
                                        <h3>AppFrame - Mobile App UI Kit</h3>
                                        <small>4,102 users</small>
                                    </div>
                                    <div class="bookmark">
                                        <span><img src="assets/more1.png" style="width: auto; height: 18px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END P 1 --------------------------------------------------- -->

                        <!-- --------------------------------------- PRODUCT 2 ---------------------------------------- -->
                        <div class="product">
                            <div class="p1">
                                <div class="photo">
                                    <img src="assets/t.jpg">
                                </div>
                                <div class="info">
                                    <div>
                                        <h3>Laptop & Mobile App Mockup Set</h3>
                                        <small>5,803 users</small>
                                    </div>
                                    <div class="bookmark">
                                        <span><img src="assets/more1.png" style="width: auto; height: 18px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END P 2 --------------------------------------------------- -->

                        <!-- --------------------------------------- PRODUCT 3 ---------------------------------------- -->
                        <div class="product">
                            <div class="p1">
                                <div class="photo">
                                    <img src="assets/v.jpg">
                                </div>
                                <div class="info">
                                    <div>
                                        <h3>High-Quality Business Mockup Kit</h3>
                                        <small>5,010 users</small>
                                    </div>
                                    <div class="bookmark">
                                        <span><img src="assets/more1.png" style="width: auto; height: 18px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END P 3 --------------------------------------------------- -->

                        <!-- --------------------------------------- PRODUCT 4 ---------------------------------------- -->
                        <div class="product">
                            <div class="p1">
                                <div class="photo">
                                    <img src="assets/s.jpg">
                                </div>
                                <div class="info">
                                    <div>
                                        <h3>UI/UX Mobile App Presentation Mockups</h3>
                                        <small>1,003 users</small>
                                    </div>
                                    <div class="bookmark">
                                        <span><img src="assets/more1.png" style="width: auto; height: 18px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END P 4 --------------------------------------------------- -->
                    </div>

                    <div class="add">
                        <h2 class="judul">Plugins & Tools</h2>
                        <img src="assets/add.png" style="width: 27px; height: auto;">
                    </div>
                    <div class="design">
                        <!-- --------------------------------------- PRODUCT 1 ---------------------------------------- -->
                        <div class="product">
                            <div class="p1">
                                <div class="photo">
                                    <img src="assets/x.jpg">
                                </div>
                                <div class="info">
                                    <div>
                                        <h3>Advanced Photoshop Retouching Plugin</h3>
                                        <small>7,029 users</small>
                                    </div>
                                    <div class="bookmark">
                                        <span><img src="assets/more1.png" style="width: auto; height: 18px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END P 1 --------------------------------------------------- -->

                        <!-- --------------------------------------- PRODUCT 2 ---------------------------------------- -->
                        <div class="product">
                            <div class="p1">
                                <div class="photo">
                                    <img src="assets/z.jpg">
                                </div>
                                <div class="info">
                                    <div>
                                        <h3>RetroType - Font Effect Bundle Kit</h3>
                                        <small>395 users</small>
                                    </div>
                                    <div class="bookmark">
                                        <span><img src="assets/more1.png" style="width: auto; height: 18px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END P 2 --------------------------------------------------- -->

                        <!-- --------------------------------------- PRODUCT 3 ---------------------------------------- -->
                        <div class="product">
                            <div class="p1">
                                <div class="photo">
                                    <img src="assets/y.jpg">
                                </div>
                                <div class="info">
                                    <div>
                                        <h3>Stone Effect Adobe Tools</h3>
                                        <small>3,085 users</small>
                                    </div>
                                    <div class="bookmark">
                                        <span><img src="assets/more1.png" style="width: auto; height: 18px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END P 3 --------------------------------------------------- -->

                        <!-- --------------------------------------- PRODUCT 4 ---------------------------------------- -->
                        <div class="product">
                            <div class="p1">
                                <div class="photo">
                                    <img src="assets/w.jpg">
                                </div>
                                <div class="info">
                                    <div>
                                        <h3>8 Most Useful Figma Plugins</h3>
                                        <small>3,970 users</small>
                                    </div>
                                    <div class="bookmark">
                                        <span><img src="assets/more1.png" style="width: auto; height: 18px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END P 4 --------------------------------------------------- -->
                    </div>

                    <div class="add">
                        <h2 class="judul">Fonts & Icons</h2>
                        <img src="assets/add.png" style="width: 27px; height: auto;">
                    </div>
                    <div class="design">
                        <!-- --------------------------------------- PRODUCT 1 ---------------------------------------- -->
                        <div class="product">
                            <div class="p1">
                                <div class="photo">
                                    <img src="assets/o.jpg">
                                </div>
                                <div class="info">
                                    <div>
                                        <h3>Kaela - Retro & Old School Font Styles</h3>
                                        <small>19,063 users</small>
                                    </div>
                                    <div class="bookmark">
                                        <span><img src="assets/more1.png" style="width: auto; height: 18px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END P 1 --------------------------------------------------- -->

                        <!-- --------------------------------------- PRODUCT 2 ---------------------------------------- -->
                        <div class="product">
                            <div class="p1">
                                <div class="photo">
                                    <img src="assets/p.jpg">
                                </div>
                                <div class="info">
                                    <div>
                                        <h3>PixelPerfect - Crisp & Modern UI Icon Set</h3>
                                        <small>30,203 users</small>
                                    </div>
                                    <div class="bookmark">
                                        <span><img src="assets/more1.png" style="width: auto; height: 18px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END P 2 --------------------------------------------------- -->

                        <!-- --------------------------------------- PRODUCT 3 ---------------------------------------- -->
                        <div class="product">
                            <div class="p1">
                                <div class="photo">
                                    <img src="assets/n.jpg">
                                </div>
                                <div class="info">
                                    <div>
                                        <h3> Clean & Modern Typography Pack</h3>
                                        <small>49,859 users</small>
                                    </div>
                                    <div class="bookmark">
                                        <span><img src="assets/more1.png" style="width: auto; height: 18px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END P 3 --------------------------------------------------- -->

                        <!-- --------------------------------------- PRODUCT 4 ---------------------------------------- -->
                        <div class="product">
                            <div class="p1">
                                <div class="photo">
                                    <img src="assets/r.jpg">
                                </div>
                                <div class="info">
                                    <div>
                                        <h3>Santiago - Luxury & Stylish Signature Font</h3>
                                        <small>23,204 users</small>
                                    </div>
                                    <div class="bookmark">
                                        <span><img src="assets/more1.png" style="width: auto; height: 18px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------------------- END P 4 --------------------------------------------------- -->
                    </div>
                </div>    
            </div>
        </div>
    </main>
<script src="{{ asset('js/admin.js') }}"></script>    
</body>
</html>