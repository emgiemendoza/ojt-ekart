<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EEI-EDC Online Commissary</title>
        <link rel="icon" type="image/x-icon" href="img/pages/ekart2.png" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

        <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
        <script defer src="{{ mix('js/app.js') }}"></script>


    </head>
    <body>
        <div id="app">
            <header class="with-background">
                <div class="top-nav container">
                    <div class="top-nav-left">
                        <div class="logo"> 
                        <img src="img/pages/EEI-EDC2.png" alt="hero image"> </div>
                        {{-- {{ menu('main', 'partials.menus.main') }} --}}
                        {{ menu('partials.menus.main') }}
                    </div>
                    <div class="top-nav-right">
                        @include('partials.menus.main-right')
                    </div>
                </div> <!-- end top-nav -->
                <div class="hero container">
                    <div class="hero-copy">
                        <h1>EEI-EDC Online Commissary (eKart)</h1>
                        <p style="margin-bottom: 20px; margin-top: 12px;">Ang "eKart" ay isang serbisyong pamamaraan para sa maginhawang pamimili ng ating mga miyembro ng Kooperatiba. Maaari nang mag-advance order para sa mga nais bilhin sa EEI-EDC Commissary sa pamamagitan ng portal na ito. Pick-up-pin at bayaran ang mga pinamili sa mga POS cashiers ng ating Commissary sa araw at oras na inyong hiling.</p>
                        <p style="margin-top: 12px;">Ikinalulugod namin ang inyong walang sawang pagsuporta at pagtangkilik sa ating Kooperatiba!</p>
                        <div class="hero-buttons">
                            <a href="{{ route('shop.index') }}" class="button">Continue Shopping</a>
                            {{-- <a href="https://www.youtube.com/playlist?list=PLEhEHUEU3x5oPTli631ZX9cxl6cU_sDaR" class="button button-white">Screencasts</a>
                            <a href="https://github.com/drehimself/laravel-ecommerce-example" class="button button-white">GitHub</a> --}}
                        </div>
                    </div> <!-- end hero-copy -->

                    <div class="hero-image">
                        <img src="img/pages/ekart2.png" alt="hero image">
                    </div> <!-- end hero-image -->
                </div> <!-- end hero -->
            </header>

            <div class="featured-section">

                <div class="container">
                    {{-- <h1 class="text-center">EEI-EDC Online Commissary</h1>

                    <p class="section-description">Is an online shopping for EEI-EDC Members Only.</p> --}}

                    <div class="text-center button-container">
                        <a href="#" class="button">Featured Products</a>
                        {{-- <a href="#" class="button">On Sale</a> --}}
                    </div>

                    {{-- <div class="tabs">
                        <div class="tab">
                            Featured
                        </div>
                        <div class="tab">
                            On Sale
                        </div>
                    </div> --}}

                    <div class="products text-center">
                        @foreach ($products as $product)
                            <div class="product">
                                <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt="product"></a>
                                <a href="{{ route('shop.show', $product->slug) }}"><div class="product-name">{{ $product->name }}</div></a>
                                <div class="product-price">{{ $product->presentPrice() }}</div>
                            </div>
                        @endforeach

                    </div> <!-- end products -->

                    <div class="text-center button-container">
                        <a href="{{ route('shop.index') }}" class="button">View more products</a>
                    </div>

                </div> <!-- end container -->

            </div> <!-- end featured-section -->

            {{-- <blog-posts></blog-posts> --}}

            @include('partials.footer')

        </div> <!-- end #app -->
        <script src="js/app.js"></script>
    </body>
</html>
