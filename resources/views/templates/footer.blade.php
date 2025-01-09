<footer id="footer" class="footer dark-background">
    @php
        $contactUs = App\Models\Contact\ContactUs::first();
        $settings = App\Models\Setting\Setting::first();
    @endphp
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span class="sitename">{{ $setting->site_name }} </span>
                </a>
                <div class="footer-contact pt-3">
                    <p>
                        {{ $contactUs->address }}
                    </p>

                    <p class="mt-3"><strong>Phone:</strong> <span>
                            {{ $contactUs->phone }}
                        </span></p>
                    <p><strong>Email:</strong> <span>
                            {{ $contactUs->email }}
                        </span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About us</a></li>
                    <li><a href="#">Terms of service</a></li>
                    <li><a href="#">Privacy policy</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Our Services</h4>
                <ul>
                    <li><a href="#">Pembangunan Jalan</a></li>
                    <li><a href="#">Pembangunan Rumah</a></li>
                    <li><a href="#">Perbaikan Jalan / Rumah</a></li>

                </ul>
            </div>


        </div>
    </div>


</footer>
