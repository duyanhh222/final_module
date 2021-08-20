
<div class="container_banner">
<div class="banner">
    <div class="banner_background" style="background-image:url(Client/images/banner_background.jpg)"></div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active" style="width: 1800px">
                <img src="{{ asset('storage/images/' .  $config->banner1 )}}" class="d-block w-100"  style="width:30%!important; height: 300px; margin-left:20%;" alt="...">
            </div>
            <div class="carousel-item" style="width: 1800px">
                <img src="{{ asset('storage/images/' .  $config->banner2 )}}" class="d-block w-100"  style="width:30%!important; height: 300px; margin-left:20%;"  alt="...">
            </div>
            <div class="carousel-item" style="width: 1800px">
                <img src="{{ asset('storage/images/' .  $config->banner3 )}}" class="d-block w-100"  style="width:30%!important; height: 300px; margin-left:20%;"  alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
</div>

<!-- Characteristics -->

<div class="characteristics">
    <div class="container">
        <div class="row">

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{ asset('storage/images/' .  $config->char1 )}}" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">{{ $config->char_title1 }}</div>

                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{ asset('storage/images/' .  $config->char2 )}}" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">{{ $config->char_title2 }}</div>

                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{ asset('storage/images/' .  $config->char3 )}}" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">{{ $config->char_title3 }}</div>

                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{ asset('storage/images/' .  $config->char4 )}}" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">{{ $config->char_title4 }}</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
