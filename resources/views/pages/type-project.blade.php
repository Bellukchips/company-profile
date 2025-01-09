@extends('templates.index')
@section('content')
    <main class="main">
        <div class="page-title dark-background" style="background-image: url(assets/img/page-title-bg.jpg);">
            <div class="container position-relative">
                <h1>Project</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/" style="color: rgb(185, 122, 6)">Home</a></li>
                        <li class="current">Project</li>
                    </ol>
                </nav>
            </div>
        </div>
        <section id="projects" class="projects section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Projects</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                    <!-- End Portfolio Filters -->

                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                        @forelse ($projects as $project)
                            <div
                                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ strtolower($project->typeProject->name) }}">
                                <div class="portfolio-content h-100">
                                    <img src="{{ Storage::url($project->photo) }}" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <h4>
                                            {{ $project->title }}
                                        </h4>
                                        <p>
                                            {{ $project->status }}
                                        </p>
                                        <a href="{{ Storage::url($project->photo) }}" title="{{ $project->title }}"
                                            data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                                class="bi bi-zoom-in"></i></a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter" style="margin-bottom: 100px;">
                                <h4>Empty Project</h4>
                            </div>
                        @endforelse
                        <!-- End Portfolio Item -->

                    </div><!-- End Portfolio Container -->

                </div>

            </div>

        </section>
    </main>
@endsection
