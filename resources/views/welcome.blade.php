@extends('layout.app')
@section('content')
    <!-- home section -->
    <section class="home" id="home">

        <div class="images">
            <img src="{{ asset('assets/images/Ophthalmologist-bro.svg') }}" alt="">
        </div>

        <div class="content">
            <h3>TwoLabs Optics</h3>
            <p><b>High Innovation Professional Eye Care </b> <br>A comprehensive eye clinic</p>
            <a href="#" class="btn"> Explore More <span class="fas fa-chevron-right"> </span> </a>
        </div>
    </section>
    <!-- end of home section -->

    <!-- icons section -->
    <section class="icons-container">

        <div class="icons">
            <i class="fas fa-user-md"></i>
            <h3>140+</h3>
            <p>doctors at work</p>
        </div>

        <div class="icons">
            <i class="fas fa-user"></i>
            <h3>1040+</h3>
            <p>satisfied patients</p>
        </div>

    </section>
    <!-- end of icons section -->

    <!-- services section -->
    <section class="services" id="services">

        <h1 class="heading"> our <span>services</span> </h1>

        <div class="box-container">

            <div class="box">
                <i class="bi bi-eyeglasses"></i>
                <h3>Optical Frames</h3>
                <p>Optical Frames are the frames that hold prescription lenses. They come in a wide variety of shapes,
                    colors, and material, allowing you to express your personal style. Whether you prefer classic,
                    trendy, or unique frames, we have something for everyone. We also provide White Lenses, Tinted
                    Lenses, Photochromic Lenses, Blue cut Lenses and etc.</p>
                <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span></a>
            </div>

            <div class="box">
                <i class="bi bi-eye-fill"></i>
                <h3>Comprehensive eye exams</h3>
                <p>Comprehensive eye exams are super important for keeping your eye healthy. They help catch any issues
                    early on and make sure your vison is in tip-top shape. During the exam, we will check your eyesight,
                    examine the health of your eyes. It is a good idea to get an eye exam every 1-2 years, especially if
                    you wear glasses or have a family history of eye problems. </p>
                <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span></a>
            </div>

            <div class="box">
                <i class="bi bi-droplet-half"></i>
                <h3>Contact Lens</h3>
                <p>Contact Lens fitting is a process where we determine the right type of prescription of contact lenses
                    for you. We’ll measure the size and shape of your eyes, asses your vision needs, and consider your
                    lifestyle. This ensures that the contacts lenses fit comfortably and provide clear vision.</p>
                <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span></a>
            </div>

            <div class="box">
                <i class="bi bi-sunglasses"></i>
                <h3>Designer Frames</h3>
                <p>Designer Frames are all about style and sophistication. They are created by renowned fashion brands
                    and offers a touch of luxury to your eyewear. With designer frame, you can elevate your looks and
                    makes fashion statements. From iconic logos to unique designers, these frames are crafted with
                    precision and attention to details. We have brands like: Rayban, Lacoste, Dior, Gucci, etc.</p>
                <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span></a>
            </div>

            <div class="box">
                <i class="fas fa-notes-medical"></i>
                <h3>Treatment for Eye Diseases</h3>
                <p>Treating eye diseases is crucial for maintaining good vision. Depending on the specific condition,
                    treatment options may include medication, eye drops, surgery, or lifestyle changes. You can trust us
                    to provide the right, diagnosis and recommend the most suitable treatment plan. Early detection and
                    prompt treatment are key to managing eye diseases and preserving your precious sight.</p>
                <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span></a>
            </div>

        </div>

    </section>
    <!-- end of services section -->

    <!-- about us -->
    <section class="about" id="about">

        <h1 class="heading"> <span>about</span> us </h1>

        <div class="row">

            <div class="images">
                <img src="{{ asset('assets/images/Ophthalmologist-amico.svg')}}" alt="">
            </div>

            <div class="content">
                <h3>The Best Eye Clinic Services for Your Eyes.</h3>
                <p>Vision plays a vital role throughout our lives, taking this into account, TwoLabs Optics exist to
                    deliver world class eye care services.
                    Recognized among one of the best Eye care centers in Abuja, F.C.T Nigeria, TwoLabs Optics offers you
                    excellent eye services and treatments under the guidance of qualified consultants and experienced
                    opticians.
                    Our facility is equipped with the most up-to-date technology to ensure the best eye care possible.
                    At TwoLabs Optics, you can find the best consultation for all vision defects.</p>
                <ul>
                    <li>Comprehensive eye exams</li>
                    <li>Contact lens fittings.</li>
                    <li>Optical Frames.</li>
                    <li>Designer Frames.</li>
                    <li>Treatment for eye diseases</li>
                </ul>
                <a href="#" class="btn"> Learn More <span class="fas fa-chevron-right"></span></a>
            </div>

        </div>

    </section>
    <!-- end of about us -->

    <!-- doctors section -->
    <section class="doctors" id="doctors">

        <h1 class="heading"> our <span>doctors</span> </h1>

        <div class="box-container">

            <div class="box">
                <img src="{{ asset('assets/images/doc-1.png')}}" alt="">
                <h3>James Anderson</h3>
                <span>ophthalmologist</span>
                <div class="share">
                    <a href="#" class="fab fa-facebook"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>

            <div class="box">
                <img src="{{ asset('assets/images/doc-2.png')}}" alt="">
                <h3>Jennifer Adams</h3>
                <span>expect doctor</span>
                <div class="share">
                    <a href="#" class="fab fa-facebook"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>

            <div class="box">
                <img src="{{ asset('assets/images/doc-3.png')}}" alt="">
                <h3>William Carter</h3>
                <span>ophthalmologist</span>
                <div class="share">
                    <a href="#" class="fab fa-facebook"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>

            <div class="box">
                <img src="{{ asset('assets/images/doc-4.png')}}" alt="">
                <h3>Jessica Davis</h3>
                <span>optometrist</span>
                <div class="share">
                    <a href="#" class="fab fa-facebook"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>

            <div class="box">
                <img src="{{ asset('assets/images/doc-5.png')}}" alt="">
                <h3>Daniel King</h3>
                <span>optician</span>
                <div class="share">
                    <a href="#" class="fab fa-facebook"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>

            <div class="box">
                <img src="{{ asset('assets/images/premium_photo-1677333502598-c7023d305395.avif')}}" alt="">
                <h3>Thomas Graham</h3>
                <span>optometrist</span>
                <div class="share">
                    <a href="#" class="fab fa-facebook"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>


        </div>

    </section>
    <!-- end of doctors section -->

    
    <!-- end of booking section -->

    <!-- review section -->

    <section class="review" id="review">

        <h1 class="heading"> client's <span>review</span> </h1>

        <div class="box-container">

            <div class="box">
                <img src="{{ asset('assets/images/pic1.jpeg')}}" alt="">
                <h3>John Edwards</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p class="text">
                    “I am one of the pioneer patients of TwoLabs Optics having registered with them in 2014. I have
                    witnessed the practice grown from a humble Eye Clinic to a renown center of excellence with optimal
                    eye care, highly qualified professional staff, wide range of products and services, reasonable
                    charges, stylish eye wares and above all; friendly customer care.”
                </p>
            </div>

            <div class="box">
                <img src="{{ asset('assets/images/pic.2.jpeg')}}" alt="">
                <h3>John Edwards</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p class="text">
                    “TwoLabs Optics is easily one of the best eye clinics in Abuja. Their professionalism, care,
                    attention to details and post customer care attention is highly commendable. “</p>
            </div>

            <div class="box">
                <img src="{{ asset('assets/images/pic.3.jpeg')}}" alt="">
                <h3>John Edwards</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p class="text">
                    “TwoLabs Optics is nonpareil in the provision of eye care services. The whole process of
                    registration, consultation, visual acuity tests and recommendation of spectacles took about an hour.
                    The equipment are also top notch. The staff are warm and the ambience of the Eye center is
                    welcoming. I was also contacted to pick up my prescribed spectacles and received it in due time..”
                </p>
            </div>

        </div>

    </section>

    <!-- end of review section -->

@endsection