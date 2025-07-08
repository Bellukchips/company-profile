@extends('templates.index')
@push('css')
    <style>
        /* Atur gambar agar responsif */
        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 10px 0;
            object-fit: contain;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1),
                0px 1px 3px rgba(0, 0, 0, 0.06);
            border-radius: 15px;

        }

        p {
            text-align: justify;
            font-size: 14px;
        }

        /* Atur teks blockquote agar terlihat rapi dan responsif */
        blockquote {
            border-left: 4px solid #ccc;
            padding-left: 10px;
            color: #555;
            margin: 10px 0;
            font-style: italic;
        }

        /* Atur elemen ul dan ol agar memiliki padding yang sesuai */
        ul,
        ol {
            padding-left: 20px;
            margin: 10px 0;
        }

        /* Atur elemen li agar memiliki jarak antar item */
        li {
            margin-bottom: 5px;
        }

        /* Atur link agar terlihat menarik dan responsif */
        a {
            color: #1a73e8;
            text-decoration: none;
            word-wrap: break-word;
            /* Supaya link panjang tidak merusak layout */
        }

        a:hover {
            text-decoration: underline;
        }

        /* Teks bold dan italic */
        strong {
            font-weight: bold;
        }

        em {
            font-style: italic;
        }


        /* Atur elemen del untuk teks strikethrough */
        del {
            text-decoration: line-through;
            margin: 0 5px;
        }

        /* Responsivitas untuk layar kecil */
        @media (max-width: 768px) {
            blockquote {
                padding-left: 8px;
                font-size: 0.9rem;
            }

            ul,
            ol {
                padding-left: 15px;
            }

            li {
                margin-bottom: 3px;
            }

            img {
                margin: 5px 0;
            }
        }
    </style>
@endpush

@section('content')
    <main class="main">
        <div class="page-title dark-background" style="background-image: url(assets/img/page-title-bg.jpg);">
            <div class="container position-relative">
                <h1>About</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/" style="color: rgb(185, 122, 6)">Home</a></li>
                        <li class="current">About</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->
        <section id="about" class="about section">

            <div class="container">
                {!! $about->content ?? '' !!}
            </div>
        </section>
    </main>
@endsection
@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Temukan semua elemen <img> pada halaman
            var images = document.querySelectorAll('img');

            // Loop melalui setiap elemen <img>
            images.forEach(function(image) {
                // Tambahkan kelas 'img-fluid' ke setiap elemen <img>
                image.classList.add('img-fluid object-fit-contain');
            });
        });
    </script>
@endpush
