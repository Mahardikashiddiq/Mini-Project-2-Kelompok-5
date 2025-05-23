<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="{{('css/user.css') }}">
</head>
<body>
    <nav>
        <div class="container">
            <h2 class="log">
                CloudProject
            </h2>
            <div class="search-bar">
                <img src="assets/search-interface-symbol.png" alt="search icon" style="width: 18px; height: 18px;">
                <input type="search" placeholder="Search for products">
            </div>
            <div class="create">
                <label class="btn btn-primary" for="#create-post">User Dashboard</label>
                <div class="profile-photo">
                    <img src="assets/Riyan.jpeg" alt="profile" width="150">
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
                    $user = session('user');
    
                    if ($user && !empty($user['nama'])) {
                        $username = $user['nama'];  // Menampilkan nama yang disimpan di database
                    } else {
                        // Jika nama kosong, ambil bagian sebelum @gmail.com
                        $username = strpos($user['email'], '@') !== false ? explode('@', $user['email'])[0] : 'User';
                    }
                @endphp

                <a class="profile" href="{{ route('profil') }}">
                    <div class="profile-photo">
                        <img src="assets/Riyan.jpeg">
                    </div>
                    <div class="handle">
                        <h4>{{ $username }}</h4>
                        <p class="text-muted">
                            user
                        </p>
                    </div>
                </a>

                <!-- ======================== SIDEBAR ======================== -->
                 <div class="sidebar">
                    <a class="menu-item active">
                        <span><img src="assets/home.png" style="width: 18px; height: 18px; margin-left: 1.9rem;"></span> <h3>Home</h3>
                    </a>
                    <a class="menu-item">
                        <span><img src="assets/shopping-chart.png" style="width: 21px; height: 21px; margin-left: 1.9rem;"></span> <h3>My Cart</h3>
                    </a>
                    <a class="menu-item" id="notifications">
                        <span><img src="assets/notification.png" style="width: 18px; height: 18px; margin-left: 1.9rem;"></span> <h3>Notifications</h3>
                        <!------------------------------------ POP UP -------------------------------------->
                         <div class="notifications-popup">
                            <div>
                                <div class="profile-photo">
                                    <img src="assets/Riyan.jpeg" width="150">
                                </div>
                                <div class="notification-body">
                                    <b>New Product</b> Now available: Template A
                                    <small class="text-muted">2 DAYS AGO</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="assets/Riyan.jpeg" width="150">
                                </div>
                                <div class="notification-body">
                                    <b>Order Shipped</b> Your order #12345 has shipped
                                    <small class="text-muted">3 DAYS AGO</small>
                                </div>
                             </div>
                             <div>
                                <div class="profile-photo">
                                    <img src="assets/Riyan.jpeg" width="150">
                                </div>
                                <div class="notification-body">
                                    <b>Sale Alert</b> 30% off on all UI templates
                                    <small class="text-muted">5 DAYS AGO</small>
                                </div>
                             </div>
                             <div>
                                <div class="profile-photo">
                                    <img src="assets/Riyan.jpeg" width="150">
                                </div>
                                <div class="notification-body">
                                    <b>Welcome</b> Thanks for joining our marketplace!
                                    <small class="text-muted">1 WEEK AGO</small>
                                </div>
                             </div>
                         </div>
                         <!-- -----------------------------END OF POPUP ------------------------ -->
                    </a>
                    <a class="menu-item" id="messages-notifications">
                        <span><img src="assets/refund.png" style="width: 18px; height: 18px; margin-left: 1.9rem;"></span> <h3>My Orders</h3>
                    </a>
                    <a class="menu-item">
                        <span><img src="assets/wishlist.png" style="width: 18px; height: 18px; margin-left: 1.9rem;"></span> <h3>Wishlist</h3>
                    </a>
                    <a class="menu-item">
                        <span><img src="assets/setting.png" style="width: 18px; height: 18px; margin-left: 1.9rem;"></span> <h3>Settings</h3>
                    </a>
                 </div>
                 <!-- ---------------------- END OF SIDEBAR ---------------------- -->
                 <a href="{{ route('logout') }}">
                    <label class="btn btn-primary">Logout</label>
                  </a>
            </div>


            <!--========================= MIDDLE =========================-->
            <div class="middle">
                <!-- --------------------------------- CATEGORIES ----------------------------  -->
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
                
                <!-- ------------------------------------------------- -->
                <form class="create-post">
                    <div class="profile-photo1">
                        <img src="assets/Riyan.jpeg" >
                    </div>
                    <input type="text" placeholder="Search for templates..." id="create-post">
                    <input type="submit" value="Search" class="btn btn-primary">
                </form>

                <!-- ====================================== PRODUCT ====================================== -->
                <div class="products">
                    <!-- --------------------------------------- PRODUCT 1 ---------------------------------------- -->
                    <div class="product">
                        <div class="head">
                            <div class="user">
                                <div class="profile-photo">
                                    <img src="assets/Riyan.jpeg">
                                </div>
                                <div class="info">
                                    <h3>Premium UI Template</h3>
                                    <small>Added 3 days ago</small>
                                </div>
                            </div>
                            <div class="price">
                                <h3>$49.99</h3>
                            </div>
                        </div>

                        <div class="photo">
                            <img src="assets/ui web.jpg">
                        </div>

                        <div class="action-button">
                            <div class="interaction-btn">
                                <span><img src="assets/like.png" style="width: 18px; height: 18px;"></span>
                                <span><img src="assets/chat.png" style="width: 18px; height: 18px;"></span>
                                <span><img src="assets/share.png" style="width: 18px; height: 18px;"></span>
                            </div>
                            <div class="bookmark">
                                <span><img src="assets/bookmark.png" style="width: 18px; height: 18px;"></span>
                            </div>
                        </div>

                        <div class="liked-by">
                            <span><img src="assets/Riyan.jpeg"></span>
                            <span><img src="assets/profile.jpg"></span>
                            <span><img src="assets/Riyan.jpeg"></span>
                            <p>Liked by <b>Dian</b> and <b>2,996 others</b></p>
                        </div>

                        <div class="caption">
                            <p>
                                <b>Premium UI Kit</b> Responsive dashboard template with modern design. Perfect for web apps and admin panels.
                                <span class="harsh-tag">#UIKit #WebDesign</span>
                            </p>
                        </div>
                        <div class="add-to-cart"><button class="btn btn-primary">Add to Cart</button></div>
                    </div>
                    <!-- ---------------------------- END P 1 --------------------------------------- -->

                    <!-- --------------------------------------- PRODUCT 2 ---------------------------------------- -->
                    <div class="product">
                        <div class="head">
                            <div class="user">
                                <div class="profile-photo">
                                    <img src="assets/Riyan.jpeg">
                                </div>
                                <div class="info">
                                    <h3>Graphic Design Template</h3>
                                    <small>Added 5 days ago</small>
                                </div>
                            </div>
                            <div class="price">
                                <h3>$39.99</h3>
                            </div>
                        </div>

                        <div class="photo">
                            <img src="assets/graphic-design.jpg">
                        </div>

                        <div class="action-button">
                            <div class="interaction-btn">
                                <span><img src="assets/like.png" style="width: 18px; height: 18px;"></span>
                                <span><img src="assets/chat.png" style="width: 18px; height: 18px;"></span>
                                <span><img src="assets/share.png" style="width: 18px; height: 18px;"></span>
                            </div>
                            <div class="bookmark">
                                <span><img src="assets/bookmark.png" style="width: 18px; height: 18px;"></span>
                            </div>
                        </div>

                        <div class="liked-by">
                            <span><img src="assets/Riyan.jpeg"></span>
                            <span><img src="assets/profile.jpg"></span>
                            <span><img src="assets/Riyan.jpeg"></span>
                            <p>Liked by <b>Sarah</b> and <b>1,856 others</b></p>
                        </div>

                        <div class="caption">
                            <p>
                                <b>Graphic Design Bundle</b> Complete set of social media templates, banners, and marketing materials.
                                <span class="harsh-tag">#GraphicDesign #Marketing</span>
                            </p>
                        </div>
                        <div class="add-to-cart"><button class="btn btn-primary">Add to Cart</button></div>
                    </div>
                    <!-- ---------------------------- END P 2 --------------------------------------- -->

                    <!-- --------------------------------------- PRODUCT 3 ---------------------------------------- -->
                    <div class="product">
                        <div class="head">
                            <div class="user">
                                <div class="profile-photo">
                                    <img src="assets/Riyan.jpeg">
                                </div>
                                <div class="info">
                                    <h3>Font Pack</h3>
                                    <small>Added 1 week ago</small>
                                </div>
                            </div>
                            <div class="price">
                                <h3>$24.99</h3>
                            </div>
                        </div>

                        <div class="photo">
                            <img src="assets/font-pack.jpg">
                        </div>

                        <div class="action-button">
                            <div class="interaction-btn">
                                <span><img src="assets/like.png" style="width: 18px; height: 18px;"></span>
                                <span><img src="assets/chat.png" style="width: 18px; height: 18px;"></span>
                                <span><img src="assets/share.png" style="width: 18px; height: 18px;"></span>
                            </div>
                            <div class="bookmark">
                                <span><img src="assets/bookmark.png" style="width: 18px; height: 18px;"></span>
                            </div>
                        </div>

                        <div class="liked-by">
                            <span><img src="assets/Riyan.jpeg"></span>
                            <span><img src="assets/profile.jpg"></span>
                            <span><img src="assets/Riyan.jpeg"></span>
                            <p>Liked by <b>Michael</b> and <b>1,245 others</b></p>
                        </div>

                        <div class="caption">
                            <p>
                                <b>Premium Font Collection</b> 15 elegant fonts for professional design projects. Commercial license included.
                                <span class="harsh-tag">#Fonts #Typography</span>
                            </p>
                        </div>
                        <div class="add-to-cart"><button class="btn btn-primary">Add to Cart</button></div>
                    </div>
                    <!-- ---------------------------- END P 3 --------------------------------------- -->

                    <!-- --------------------------------------- PRODUCT 4 ---------------------------------------- -->
                    <div class="product">
                        <div class="head">
                            <div class="user">
                                <div class="profile-photo">
                                    <img src="assets/Riyan.jpeg">
                                </div>
                                <div class="info">
                                    <h3>Icon Pack</h3>
                                    <small>Added 2 weeks ago</small>
                                </div>
                            </div>
                            <div class="price">
                                <h3>$19.99</h3>
                            </div>
                        </div>

                        <div class="photo">
                            <img src="assets/icon-pack.jpg">
                        </div>

                        <div class="action-button">
                            <div class="interaction-btn">
                                <span><img src="assets/like.png" style="width: 18px; height: 18px;"></span>
                                <span><img src="assets/chat.png" style="width: 18px; height: 18px;"></span>
                                <span><img src="assets/share.png" style="width: 18px; height: 18px;"></span>
                            </div>
                            <div class="bookmark">
                                <span><img src="assets/bookmark.png" style="width: 18px; height: 18px;"></span>
                            </div>
                        </div>

                        <div class="liked-by">
                            <span><img src="assets/Riyan.jpeg"></span>
                            <span><img src="assets/profile.jpg"></span>
                            <span><img src="assets/Riyan.jpeg"></span>
                            <p>Liked by <b>Jessica</b> and <b>956 others</b></p>
                        </div>

                        <div class="caption">
                            <p>
                                <b>Essential Icon Set</b> 500+ vector icons in multiple formats. Perfect for web and mobile design.
                                <span class="harsh-tag">#Icons #UI</span>
                            </p>
                        </div>
                        <div class="add-to-cart"><button class="btn btn-primary">Add to Cart</button></div>
                    </div>
                    <!-- ---------------------------- END P 4 --------------------------------------- -->
                </div>
                <!-- ---------------------------- END OF PRODUCT --------------------------------------- -->
            </div>
            <!-- ========================================== END OF MIDDLE =================================================== -->

            <!--========================= RIGHT =========================-->
            <div class="right">
                <div class="all">
                    <div class="heading">
                        <h4>My Shopping Cart</h4>
                    </div>
                    <!-- ---------------------- QUICK INFO ---------------------- -->
                    <div class="search-bar">
                        <img src="assets/search-interface-symbol.png" style="width: 18px; height: 18px;">
                        <input type="search" placeholder="Search in cart" id="cart-search">
                    </div>
                    <div class="category">
                        <h6 class="active">Cart</h6>
                        <h6>Saved</h6>
                        <h6 class="feedback">Checkout</h6>
                    </div>
                    <!-- ----------------------------- CART ITEMS ------------------------------- -->
                    <div class="order">
                        <div class="profile-photo">
                            <img src="assets/ui web.jpg">
                        </div>
                        <div class="order-body">
                            <h5>UI Kit Template</h5>
                            <p class="text-muted">$49.99</p>
                        </div>
                        <div class="remove-item">✕</div>
                    </div>
                    <div class="order">
                        <div class="profile-photo">
                            <img src="assets/font-pack.jpg">
                        </div>
                        <div class="order-body">
                            <h5>Font Pack</h5>
                            <p class="text-muted">$24.99</p>
                        </div>
                        <div class="remove-item">✕</div>
                    </div>
                    <div class="order-total">
                        <h5>Total: $74.98</h5>
                        <button class="btn btn-primary">Checkout</button>
                    </div>
                    <!-- ----------------------------- END CART ITEMS ------------------------------- -->
                </div>
                <!-- ---------------------------- END INFO ------------------------ -->

                <!-- ---------------------------- RECOMMENDED ITEMS -------------------------------- -->
                <div class="most-liked">
                    <h4>Recommended For You</h4>
                    <div class="most">
                        <!-- ----------------------------------- CONTENT 1 ----------------------------- -->
                        <div class="like">
                            <div class="info">
                                <div>
                                    <h5>Premium Figma Template</h5>
                                    <p class="text-muted">$59.99</p>
                                </div>
                            </div>
                            <div class="photo">
                                <img src="assets/figma.jpg">
                            </div>
                        </div>
                        <!-- ----------------------------------- CONTENT 2 ----------------------------- -->
                        <div class="like">
                            <div class="info">
                                <div>
                                    <h5>Mobile UI Kit</h5>
                                    <p class="text-muted">$39.99</p>
                                </div>
                            </div>
                            <div class="photo">
                                <img src="assets/ui.jpg">
                            </div>
                        </div>
                        <!-- ----------------------------------- CONTENT 3 ----------------------------- -->
                        <div class="like">
                            <div class="info">
                                <div>
                                    <h5>Dashboard Template</h5>
                                    <p class="text-muted">$49.99</p>
                                </div>
                            </div>
                            <div class="photo">
                                <img src="assets/dasboard.jpg">
                            </div>
                        </div>
                        <!-- ----------------------------------- CONTENT 4 ----------------------------- -->
                        <div class="like">
                            <div class="info">
                                <div>
                                    <h5>Icon Bundle</h5>
                                    <p class="text-muted">$19.99</p>
                                </div>
                            </div>
                            <div class="photo">
                                <img src="assets/icon.jpg">
                            </div>
                        </div>
                        <!-- ----------------------------------- RECENTLY VIEWED HEADING ----------------------------- -->
                        <h4 class="recently-viewed">Recently Viewed</h4>
                        <!-- ----------------------------------- CONTENT 5 ----------------------------- -->
                        <div class="like">
                            <div class="info">
                                <div>
                                    <h5>Bootstrap Template</h5>
                                    <p class="text-muted">$29.99</p>
                                </div>
                            </div>
                            <div class="photo">
                                <img src="assets/bootstrap.jpg">
                            </div>
                        </div>
                        <!-- ----------------------------------- CONTENT 6 ----------------------------- -->
                        <div class="like">
                            <div class="info">
                                <div>
                                    <h5>WordPress Theme</h5>
                                    <p class="text-muted">$69.99</p>
                                </div>
                            </div>
                            <div class="photo">
                                <img src="assets/wordpress.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<script src="{{ asset('js/user.js') }}"></script>    
</body>
</html>
