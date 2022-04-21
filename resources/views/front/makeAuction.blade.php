<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400&display=swap" rel="stylesheet">
    <title>Cars Auction</title>
</head>
<body>
    <div class="fixed-top">
        <div class="cornerstyle"></div>
        <div class="contactnavbar d-flex  align-content-between me-4 p-4 flex-wrap">
            <div class="fa fa-facebook w-100 text-light"></div>
            <div class="fa fa-instagram w-100 text-light"></div>
            <div class="fa fa-whatsapp w-100 text-light"></div>
            <div class="fa fa-facebook w-100 text-light"></div>
        </div>


    </div>
    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-dark ">

        <div class="container-fluid w-96 my-5">

            <a class="navbar-brand border p-2 logo-box " href="#">CAC</a>
            <button class="bttn border-0 px-4 navbar-toggle me-5 pe-5" type="button">
                <div class="menu my-1 px-3 bg-light"> </div>
                <div class="menu bg-light"> </div>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0 w-75 d-flex justify-content-between fs-7">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">الصفحة الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">العروض</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">المزايدة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">تواصل معنا
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">من نحن
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">تسجيل الدخول
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">انشاء حساب
                        </a>
                    </li>


                </ul>
                <button class="nav-item text-center border-0  contact text-light fs-6 py-2 px-4 m-auto">
                    <i class="fa fa-phone">&nbsp; 777 777 777</i>
                </button>
            </div>


        </div>
    </nav>

    <section class="">
        <section>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ URL::asset('images/car1.png') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ URL::asset('images/car2.png') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ URL::asset('images/car3.png') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div>
                <div class="col-md-4">
                    <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
            </div>
        </section>
        <section>

        </section>
        
    </section>
    
    <footer>
        <script src="{{ URL::asset('js/js.js') }}"></script>
        <script src="{{ URL::asset('js/app.js') }}"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

    </footer>
</body>

</html>

