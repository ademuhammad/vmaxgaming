@php
    $promos = App\Models\Time::all();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Promo Zapple Repair</title>
    <link rel="icon" type="image/svg" href="{{ asset('countdown/asset/img/zapplerepairLogo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('countdown/asset/css/style.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap"
        rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        .card:not(.active) {
            background-color: #fff;
        }

        .custom-button {
            background-color: #dc483a;
            color: white;


        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="mailto:zapplerepair@gmail.com" aria-current="page" href="#">
                                <ion-icon name="mail-outline"></ion-icon>
                                zapplerepair@gmail.com
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">
                                <ion-icon name="logo-whatsapp"></ion-icon>
                                0877-8885-5868
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="https://www.linkedin.com/company/zapplerepairindonesia/" class="nav-link">
                                <ion-icon name="logo-linkedin"></ion-icon>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.facebook.com/zapplerepairofficial/">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://twitter.com/Zapplerepair">
                                <ion-icon name="logo-twitter"></ion-icon>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.instagram.com/zapplerepair/">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('countdown/asset/img/zapplerepairLogo.png') }}" alt="Logo" width="200"
                    height="24" class="d-inline-block align-text-top" />
            </a>
        </div>
    </nav>


    <div class="content">
        <h1 class="text-title">
            Promo Zapple Repair
        </h1>
        <div class="container mb-4 ">
            <!-- card content -->
            <div class="row justify-content-center ">
                @php
                    $sortedPromos = $promos->sortByDesc('starttime')->values();
                @endphp
                @foreach ($sortedPromos as $promo)
                    <div class="col-12 col-md-6 col-lg-4 mb-4">

                        <div class="card text-center" id="promoCard{{ $promo->id }}">
                            <h4>{{ $promo->promotitle }}</h4>
                            <img src="{{ asset('/storage/file/' . $promo->images) }}" class="card-img-top"
                                alt="..." />

                                <div class="countdown" id="countdown-timer{{ $promo->id }}"></div>
                                <div id="promo-timing-info{{ $promo->id }}">
                                    <p>Waktu Mulai: <span>{{ $promo->starttime->format('Y-m-d H:i:s') }}</span></p>
                                    <p>Waktu Berakhir: <span>{{ $promo->endtime->format('Y-m-d H:i:s') }}</span></p>
                                </div>
                                <p class="card-text">{{ $promo->content }}</p>
                                <a href="{{ $promo->tiktok }}" id="tiktokLink{{ $promo->id }}" class="link" style="text-decoration: none; width: 100%"
                                    style="display: none;">
                                   <p>klik untuk join</p> {{ $promo->tiktok }}
                                </a>
                                <button id="promoButtonRegister{{ $promo->id }}" class="btn btn-info mt-auto"
                                    data-bs-toggle="modal" data-bs-target="#registerModal{{ $promo->id }}"
                                    style="display: none; background-color: red; color: white;">
                                    Reminder Me
                                </button>

                        </div>

                    </div>
                    <div class="modal fade" id="registerModal{{ $promo->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('register.data') }}" method="POST">

                                        @csrf
                                        <div class="mb-3">
                                            <label for="registerInputNama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="registerInputNama"
                                                name="name" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="registerInputNomorHP" class="form-label">Nomor HP</label>
                                            <input type="number" class="form-control" id="registerInputNomorHP"
                                                name="wanumber" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary">Register</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        <!-- Modal untuk Register -->



    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <h6>Tentang Kami</h6>
                    <p>
                        Di Zapplerepair, kami mengkhususkan diri dalam memperbaiki
                        perangkat Apple dan Windows, seperti kerusakan logicboard macbook,
                        penggantian battery macbook / surface, layar lcd surface bergetar
                        dan lainnya. Kami menyediakan beragam sparepart yang lengkap dan
                        didukung oleh tenaga ahli yang profesional. Di samping itu kami
                        memiliki pengalaman bertahun-tahun dalam perbaikan IT, yang
                        menjadikan kami sebagai tempat service Apple dan Windows Surface
                        terbaik di Indonesia dengan harga yang optimal dan pelayanan serta
                        fasilitas yang berkualitas.
                    </p>
                </div>
                <div class="col-lg-3">
                    <h6>Informasi</h6>
                    <p>Service Apple Mac</p>
                    <p>Service Windows Surface</p>
                    <p>Service di Tempat</p>
                    <p>Pemulihan Data Apple dan Surface</p>
                    <p>Sparepart Apple Mac dan Surface</p>
                </div>
                <div class="col-lg-3">
                    <h6>Sosial Media</h6>
                    <a class=" mt-2" style="text-decoration: none" href="#">
                        <p class="footer-text">
                            <ion-icon name="logo-instagram"></ion-icon> Instagram
                        </p>

                    </a>

                    <a class=" mt-2" style="text-decoration: none" href="#">
                        <p class="footer-text">
                            <ion-icon name="logo-twitter"></ion-icon> Twitter
                        </p>
                    </a>
                    <a class=" mt-2" style="text-decoration: none" href="#">
                        <p class="footer-text">
                            <ion-icon name="logo-facebook"></ion-icon> Facebook
                        </p>
                    </a>
                    <a href="" class="mt-2" style="text-decoration: none">
                        <p class="footer-text">
                            <ion-icon name="logo-linkedin"></ion-icon> Linkedin
                        </p>
                    </a>
                </div>
            </div>

            <h6 class="text-center pt-3">Copyright ©2023 Zapplerepair Indonesia</h6>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script>
        const promoData = @json($promos);

        function openRegisterModal(promoId) {
            var myModal = new bootstrap.Modal(document.getElementById(`registerModal${promoId}`));
            myModal.show();
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-info').forEach(function(button) {
                button.addEventListener('click', function() {
                    // Extracting the promo ID from the button ID
                    const promoId = button.id.replace('promoButtonRegister', '');
                    openRegisterModal(promoId);
                });
            });
        });

        function formatWIB(date) {
            const options = {
                timeZone: "Asia/Jakarta",
                hour12: false,
                year: "numeric",
                month: "numeric",
                day: "numeric",
                hour: "numeric",
                minute: "numeric",
                second: "numeric",
            };
            return new Intl.DateTimeFormat("id-ID", options).format(date);
        }


        function formatTimeDifference(timeDifference) {
            const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
            const hours = Math.floor(
                (timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
            );
            const minutes = Math.floor(
                (timeDifference % (1000 * 60 * 60)) / (1000 * 60)
            );
            const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

            return `${days} hari, ${hours} jam, ${minutes} menit, ${seconds} detik`;
        }

        function updateCountdown(promoId, startDate, endDate) {
            const now = new Date(new Date().toLocaleString("en-US", {
                timeZone: "Asia/Jakarta"
            }));
            const promoCard = document.getElementById(`promoCard${promoId}`);
            const tiktokLink = document.getElementById(`tiktokLink${promoId}`);
            const promoButtonRegister = document.getElementById(`promoButtonRegister${promoId}`);
            const elementId = `countdown-timer${promoId}`;

            // Set zona waktu "Asia/Jakarta" untuk waktu sekarang (now)
            now.toLocaleString("en-US", {
                timeZone: "Asia/Jakarta"
            });

            if (now < startDate) {
                const timeDifference = startDate - now;
                document.getElementById(elementId).innerHTML =
                    "<strong> Promo Mulai Dalam: </strong>" + formatTimeDifference(timeDifference);
                tiktokLink.style.display = "none";
                promoButtonRegister.style.display = "block";
            } else if (now < endDate) {
                const timeDifference = endDate - now; // Perubahan disini
                document.getElementById(elementId).innerHTML =
                    "<strong> Promo Berlangsung: </strong>" + formatTimeDifference(timeDifference);

                // Tampilkan link TikTok dan sembunyikan button register
                tiktokLink.style.display = "block";
                promoButtonRegister.style.display = "none";

                promoCard.classList.add("active");
            } else {
                // Promo has ended, display a message without countdown
                document.getElementById(elementId).innerHTML = "<strong>Promo Telah Berakhir </strong>";

                // Sembunyikan link TikTok dan button register
                tiktokLink.style.display = "block";
                promoButtonRegister.style.display = "none";

                promoCard.classList.remove("active");
            }
        }


        function checkPromoStatus() {
            promoData.forEach(promo => {
                const promoStartDate = new Date(promo.starttime);
                const promoEndDate = new Date(promo.endtime);

                updateCountdown(promo.id, promoStartDate, promoEndDate);
            });
        }


        setInterval(checkPromoStatus, 1000);

        promoData.forEach(promo => {
            const promoStartDate = new Date(promo.starttime);
            const promoEndDate = new Date(promo.endtime);

            document.getElementById(`promo-start-time${promo.id}`).textContent = formatWIB(promoStartDate);
            document.getElementById(`promo-end-time${promo.id}`).textContent = formatWIB(promoEndDate);
        });
    </script>

</body>

</html>
