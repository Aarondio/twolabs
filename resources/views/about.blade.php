@extends('layout.app')
<!-- home section -->
@section('content')


 
    <section class="about" style="margin-top: 8rem" id="about">

        <h1 class="heading"> <span>about</span> us </h1>
        <h1 class="heading"> <span>WHO WE ARE</span></h1>

        <div class="row">

            <div class="images">
                <img src="{{ asset('assets/images/Ophthalmologist-amico.svg')}}" alt="">
            </div>

            <div class="content">
                <p>TwoLabs Optics is a Medical Laboratory which was established in 2015 and began as one of the few
                    dedicated, comprehensive eye clinic in FCT Abuja, Nigeria. Our mission is to improve your vision and
                    enhance your quality of life. We value honesty, integrity and compassion and our team of experienced
                    opticians is committed to providing personalized care to each patient. </p>

                <p>Our mission is to provide affordable and high-quality products to our customers. We believe in
                    putting out customer first and providing exceptional services. We offer a wide range of services,
                    including Comprehensive eye exams, contacts lens fitting, and pediatric eye care. We also have a
                    great selection of frames (both optical and designers) and lenses to choose from, so you can find
                    the perfect pair of glasses to fit your style and budget</p>

                <p> We make sure we can provide everything you need under one roof, from Eye checkup down to optical
                    services and eye surgeries, TwoLabs Optics has all the solutions you need.</p>

                <a href="#" class="btn"> Learn More <span class="fas fa-chevron-right"></span></a>
            </div>

        </div>

    </section>
    <!-- end of about us -->

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



    <!-- choose us  section-->


    <h1 class="heading">Why <span>choose</span> us </h1>

    <section class="about">
        <div class="row">
            <div class="content">
                <p>TwoLabs Optics is a Medical Laboratory which was established in 2015 and began as one of the few
                    dedicated, comprehensive eye clinic in FCT Abuja, Nigeria. Our mission is to improve your vision and
                    enhance your quality of life. We value honesty, integrity and compassion and our team of experienced
                    opticians is committed to providing personalized care to each patient. </p>

                <p>Our mission is to provide affordable and high-quality products to our customers. We believe in
                    putting out customer first and providing exceptional services. We offer a wide range of services,
                    including Comprehensive eye exams, contacts lens fitting, and pediatric eye care. We also have a
                    great selection of frames (both optical and designers) and lenses to choose from, so you can find
                    the perfect pair of glasses to fit your style and budget</p>

                <p> We make sure we can provide everything you need under one roof, from Eye checkup down to optical
                    services and eye surgeries, TwoLabs Optics has all the solutions you need.</p>

                <a href="#" class="btn"> Learn More <span class="fas fa-chevron-right"></span></a>
            </div>

            <div class="images">
                <img src="{{ asset('assets/images/doc-2.png')}}" alt="">
            </div>
    

        </div>
    </section>



    <!-- end of choose us section -->




@endsection