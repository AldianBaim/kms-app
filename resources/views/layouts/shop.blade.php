<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div id="app" class="bg-secondary">

        <div class="row justify-content-center">
            <div class="col-lg-4 bg-white p-0 position-relative">
                <main>
                    @yield('content')
                </main>
                <div class="position-sticky fixed-bottom shadow-sm bg-white p-3 pt-4 w-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex gap-3 flex-column align-items-center justify-content-center">
                            <i class="fa fa-lg fa-home"></i>
                            <small>Home</small>
                        </div>
                        <div class="d-flex gap-3 flex-column align-items-center justify-content-center">
                            <i class="fa fa-lg fa-shapes"></i>
                            <small>Kategori</small>
                        </div>
                        <div class="d-flex gap-3 flex-column align-items-center justify-content-center">
                            <i class="fa fa-lg fa-kitchen-set"></i>
                            <small>Resep</small>
                        </div>
                        <div class="d-flex gap-3 flex-column align-items-center justify-content-center">
                            <i class="fa fa-lg fa-shopping-cart"></i>
                            <small>Keranjang</small>
                        </div>
                        <div class="d-flex gap-3 flex-column align-items-center justify-content-center">
                            <i class="fa fa-lg fa-user"></i>
                            <small>Akun</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasBottomLabel">Pilih Detail Pengiriman</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body small">
                <div class="row border-bottom pb-3">
                    <div class="col-1">
                        <i class="fa fa-lg fa-location-dot text-success"></i>
                    </div>
                    <div class="col-10">
                        <h6>Alamat belum dipilih</h6>
                        <span>Mulai atur alamat pengiriman</span>
                        <div class="d-flex text-warning gap-1 align-items-center mt-2" role="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottomAddress" aria-controls="offcanvasBottom">
                            <i class="fa fa-circle-info"></i>
                            <span>Titik alamat perlu diperbaharui untuk pengiriman yang lebih akurat</span>
                            <i class="fa fa-chevron-right text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBottomAddress" aria-labelledby="offcanvasBottomLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                    <i class="fa fa-lg fa-chevron-left"></i>
                </button>
                <h5 class="offcanvas-title" id="offcanvasBottomLabel">Masukan alamat kamu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body small">
                <form action="">
                    <div class="form-group">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea name="address" id="address" cols="30" rows="5" class="form-control border-success" placeholder="Tulis nama jalan/gedung/tempat"></textarea>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        Fancybox.bind('[data-fancybox="gallery"]', {});
    </script>
    <script>
        function previewImage() {
            document.getElementById("img-preview").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("img-source").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("img-preview").src = oFREvent.target.result;
            };
        };

        $(document).ready(function() {
            $('#summernote').summernote();
        });

        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".content").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    </script>
    </script>
    @stack('script')
</body>

</html>