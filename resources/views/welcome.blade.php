<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>شريط التنقل العربي</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
        integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5rY+z6D/O01d3/X+B+X/j5e/VqWjJm/Q/bS/n/F5/S/m/q/Q/v/O/S/n/r/p/S/S/a/Q/b/S/S/t/U/a/S/a/S/S/p/p/p/p/i/t/E/U/t/E/u/Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href={{ asset('frontend/style.css') }} />
</head>

<body>
    <header class="navbar">
        <button class="menu-btn d-lg-none" onclick="toggleMenu()">
            <i class="fa-solid fa-bars fa-2x"></i>
        </button>

        <div class="right-nav d-none d-lg-block">
            <ul>
                <li><a href="{{ route('home') }}">الرئيسية</a></li>
                <li><a href="{{ route('sections.index') }}">الأقسام</a></li>
                <li><a href="#">تواصل معنا</a></li>
            </ul>
        </div>

        <div class="center-img">
            <img src={{ asset('frontend/image/Frame115.png') }} alt="logo" />
        </div>

        <div class="left-nav  d-lg-block">
            <ul class="icons">
                <li class="nav-item search-icon">
                    <a href="#" id="toggle-search"><i class="fa-solid fa-magnifying-glass"></i></a>
                </li>

                <li>
                    <a href="{{ route('orders.favorites') }}" class="favorites-link">
                        <i class="fa-regular fa-heart"></i>
                        <span class="favorite-count">0</span>
                    </a>
                </li>
            </ul>
        </div>

<div class="dropdown-menu-mobile" id="mobile-menu">
    <ul>
        <li><a href="{{ route('home') }}">الرئيسية</a></li>
        <li><a href="{{ route('sections.index') }}">الأقسام</a></li>
        <li><a href="#">تواصل معنا</a></li>
    </ul>
    <ul class="icons">
        <li class="nav-item search-icon-mobile">
            <a href="#" id="toggle-search-mobile"><i class="fa-solid fa-magnifying-glass"></i></a>
        </li>
        <li>
            <a href="{{ route('orders.favorites') }}" class="favorites-link">
                <i class="fa-regular fa-heart"></i>
                <span class="favorite-count">0</span>
            </a>
        </li>
    </ul>
</div>
    </header>
    <!-- نافذة البحث -->
    <div id="search-bar" class="search-bar">
        <form id="search-form" class="search-form-full-width">
            <div class="search-input-wrapper">
                <input type="text" name="search" placeholder="ابحث عن طلب..." class="form-control w-100" />
            </div>
            <button type="submit" class="btn btn-primary">بحث</button>
        </form>
    </div>

    @yield('content')

    <!-- seven -->
    <footer class="main-footer">
        <div class="footer-container">
            <div class="footer-column about-us">
                <div class="footer-logo">
                    <img src={{ asset('frontend/image/Frame114.png') }} alt="مقايضة شعار" />
                </div>
                <p class="fot-p">
                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما
                    سيلهي<br />
                    القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في
                    الصفحة<br />
                    التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم..
                </p>
                <div class="social-icons">
                    <a href="#" aria-label="فيسبوك"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="تويتر"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="إنستغرام"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="لينكد إن"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div class="footer-column contact-info">
                <div class="contact-items-container contact-numbers">
                    <h3>تواصل معنا</h3>

                    <div class="contact-item">
                        <a href="tel:+966563214828" class="icon-link">
                            <div class="icon-bg">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                        </a>
                        <a href="tel:+966563214828" class="number-link">
                            <p class="footer-number-text">+96666201248</p>
                        </a>
                    </div>
                    <div class="contact-item">
                        <a href="tel:+966563214828" class="icon-link">
                            <div class="icon-bg">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                        </a>
                        <a href="tel:+966563214828" class="number-link">
                            <p class="footer-number-text">+96666467891</p>
                        </a>
                    </div>
                    <div class="contact-item">
                        <a href="" class="icon-link">
                            <div class="icon-bg">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </a>
                        <p class="footer-number-text">swap@gmail.com</p>

                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div>
                <p>جميع الحقوق محفوظة لمقايضة 2025</p>
            </div>
            <div class="payment-icons">
                <img src={{ asset('frontend/image/footer3.png') }} alt="آبل باي" />
                <img src={{ asset('frontend/image/Vector.png') }} alt="فيزا" />
                <img src={{ asset('frontend/image/logos_apple-pay.png') }} alt="ماستركارد" />
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src={{ asset('frontend/main.js') }}></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- استدعاء ملف Bootstrap JS مع Popper المدمج -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        // الدالة المسؤولة عن تحديث العدد
        function updateFavoritesCount() {
            $.ajax({
                url: '{{ route('favorites.count') }}',
                type: 'GET',
                success: function(response) {
                    if (response.count > 0) {
                        $('.favorite-count').text(response.count).show();
                    } else {
                        $('.favorite-count').text(0).hide();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Failed to get favorites count:', error);
                }
            });
        }

        $(document).ready(function() {
            // استدعاء الدالة عند تحميل الصفحة لأول مرة
            updateFavoritesCount();

            $('.add-to-favorite').on('click', function(e) {
                e.preventDefault();
                console.log('Heart icon was clicked!');

                var orderId = $(this).data('order-id');
                var heartIcon = $(this).find('i');

                $.ajax({
                    url: '/orders/toggle-favorite/' + orderId,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            if (response.is_favorite) {
                                // تغيير لون القلب إلى الأحمر
                                heartIcon.css('color', 'red');
                                alert(response.message);
                            } else {
                                // إعادة لون القلب إلى الأبيض أو اللون الافتراضي
                                heartIcon.css('color', 'white');
                                alert(response.message);
                            }

                            // استدعاء الدالة لتحديث العدد بعد نجاح العملية
                            updateFavoritesCount();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('حدث خطأ أثناء إضافة الطلب للمفضلة.');
                    }
                });
            });
        });
    </script>
    <script>
        const orderDetailsRoute = "{{ route('order.details', '') }}";

        document.getElementById("toggle-search").addEventListener("click", function(e) {
            e.preventDefault();
            document.getElementById("search-bar").classList.toggle("show");
        });
        document.getElementById("toggle-search-mobile").addEventListener("click", function(e) {
            e.preventDefault();
            document.getElementById("search-bar").classList.toggle("show");
        });
        document.getElementById("search-form").addEventListener("submit", function(e) {
            e.preventDefault();
            let query = this.search.value.trim();

            if (!query) return;

            fetch(`/orders/search?query=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(data => {
                    let resultsContainer = document.querySelector(".search-results");
                    if (!resultsContainer) {
                        resultsContainer = document.createElement("div");
                        resultsContainer.classList.add("search-results");
                        document.getElementById("search-bar").appendChild(resultsContainer);
                    }
                    resultsContainer.innerHTML = "";

                    if (data.length === 0) {
                        resultsContainer.innerHTML = "<p class='text-center text-muted'>لا يوجد نتائج.</p>";
                    } else {
                        data.forEach(order => {
                            let item = document.createElement("div");
                            item.classList.add("search-item");
                            item.innerHTML = `
                        <a href="${orderDetailsRoute.replace('%2F', '')}/${order.id}">
                            <strong>${order.order_name}</strong>
                        </a>
                        `;
                            resultsContainer.appendChild(item);
                        });
                    }
                })
                .catch(err => console.error(err));
        });
    </script>
</body>

</html>
