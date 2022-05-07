@extends('layouts.nav')
@section('title', 'Contact CTQM')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('contactus')}}/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body>

<section>
<!-- START CONTACT SECTION -->
<div class="container">
    <div class="section-contact">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="header-section text-center">
                    <h2 class="title">Contact Form</h2>
                    <p class="description">Feel free to contact us anytime. We will get back to you as soon as we can!</p>
                </div>
            </div>
        </div>
        <div class="form-contact">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="single-input">
                            <i class="fas fa-user"></i>
                            <input type="text" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-input">
                            <i class="fas fa-envelope"></i>
                            <input type="text" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-input">
                            <i class="fas fa-phone"></i>
                            <input type="text" name="phoneNumber" placeholder="Phone number">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-input">
                            <i class="fas fa-check"></i>
                            <input type="text" name="subject" placeholder="Subject">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="single-input">
                            <i class="fa-solid fa-message"></i>
                            <textarea placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="submit-input text-center">
                            <input type="submit" name="submit" value="SUBMIT">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- / END CONTACT SECTION -->
</section>
</body>
</html>
@stop()
