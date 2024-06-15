<div class="menu-bottom desktop-hide">
    <div class="container">
        <div class="wrapper">
            <nav>
                <ul class="flexitem">
                    <li>
                        <a href="#">
                            <i class="ri-bar-chart-line"></i>
                            <span>Trending</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="ri-user-6-line"></i>
                            <span>Account</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="ri-heart-line"></i>
                            <span>Wishlist</span>
                        </a>
                    </li>
                    <li>
                        <a href="#0" class="t-search">
                            <i class="ri-search-line"></i>
                            <span>Search</span>
                        </a>
                    </li>
                    <li>
                        <a href="cart.php" class="cart-trigger">
                            <i class="ri-shopping-cart-line"></i>
                            <span>Cart</span>
                            <div class="fly-item">
                                <span class="item-number">5</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- menu bottom-->

<div class="search-bottom desktop-hide">
    <div class="container">
        <div class="wrapper">

            <form action="" class="search">
                <a href="#" class="t-close search-close flexcenter"><i class="ri-close-line"></i></a>
                <span class="icon-large"><i class="ri-search-line"></i></span>
                <input type="search" placeholder="Your email address" required>
                <button type="submit">Search</button>
            </form>
        </div>
    </div>
</div>
<!-- search bottom-->

<div class="overlay"></div>

<div id="modal" class="modal">
    <div class="content flexcol">
        <div class="image object-cover">
            <img src="assets/products/cover.png" alt="">
        </div>
        <h2>Get the lastest deals and coupons</h2>
        <p class="mobile-hide">Windows 10 & Office 2019 Professional Plus</p>
        <form action="" class="search">
            <span class="icon-large"><i class="ri-mail-line"></i></span>
            <input type="mail" placeholder="Your email address">
            <button>Subscribe</button>
        </form>
        <a href="#" class="mini-text">Do not show me again</a>
        <a href="#" class="t-close modalclose flexcenter">
            <i class="ri-close-line"></i>
        </a>
    </div>
</div>

<script>

    //show modal on load
    window.onload = function () {
        document.querySelector('.site').classList.toggle('showmodal')
    }
    document.querySelector('.modalclose').addEventListener('click', function () {
        document.querySelector('.site').classList.remove('showmodal')
    });
    //show seaech 
    const searchButton = document.querySelector('.t-search'),
        tClose = document.querySelector('.search-close'),
        showClass = document.querySelector('.site');
    searchButton.addEventListener('click', function () {
        showClass.classList.toggle('showsearch')
    })
    tClose.addEventListener('click', function () {
        showClass.classList.remove('showsearch')
    })

</script>