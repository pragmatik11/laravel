<!DOCTYPE html>
<html lang="en">
<head>
@include('layouts/header')
</head>
@include('layouts/navbar')
<body>
<body>
        

<div class="page-header">
  <div class="container">
    <div class="row">
      <div class="col-6">
        <h2>Suntem aici pentru tine!</h2>
        <p>Pentru informații suplimentare, ne puteți contacta la adresa de e-mail office@girlsowncosmetics.ro, la numãrul de telefon 0723101100 de L-V în intervalul orar 10.00 – 18.00 sau prin intermediul formularului alãturat.</p>
        <p>Vă rugăm să vă asigurați că răspunsul la întrebarea dumneavoastră nu se regăsește deja în site! Din motive de eficiență, este dificil să răspundem tuturor solicitărilor de informații care se regăsesc cu ușurință în paginile dedicate (Intrebari frecvente, paginile produselor, etc). Mulțumim pentru intelegere!</p>
      </div>
      <div class="col-6">
        <img src="img/contact.jpg" alt="">

      </div>
      
    </div>
  </div>
</div>
        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
                <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                    <p>Get In Touch</p>
                    <h2>For Any Query</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-4 contact-item wow zoomIn" data-wow-delay="0.2s">
                                <i class="fa fa-map-marker-alt"></i>
                                <div class="contact-text">
                                    <h2>Location</h2>
                                    <p>123 Street, New York, USA</p>
                                </div>
                            </div>
                            <div class="col-md-4 contact-item wow zoomIn" data-wow-delay="0.4s">
                                <i class="fa fa-phone-alt"></i>
                                <div class="contact-text">
                                    <h2>Phone</h2>
                                    <p>+012 345 67890</p>
                                </div>
                            </div>
                            <div class="col-md-4 contact-item wow zoomIn" data-wow-delay="0.6s">
                                <i class="far fa-envelope"></i>
                                <div class="contact-text">
                                    <h2>Email</h2>
                                    <p>info@example.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="contact-form">
                        @if(Session::has('success')) 
                            <script>
                                $(document).ready(function (){
                                    $("#click").click(function (){
                                        $('html, body').animate({
                                            scrollTop: $("#form").offset().top
                                        }, 2000);
                                    });
                                });
                                Swal.fire('Contact Form Submit Successfully');
                            </script>
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                        @endif                        
                            <form method="POST" id="form" action="{{ route('contact.store') }}">
                  
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Phone:</strong>
                                        <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone') }}">
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Subject:</strong>
                                        <input type="text" name="subject" class="form-control" placeholder="Subject" value="{{ old('subject') }}">
                                        @if ($errors->has('subject'))
                                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Message:</strong>
                                        <textarea name="message" rows="3" class="form-control">{{ old('message') }}</textarea>
                                        @if ($errors->has('message'))
                                            <span class="text-danger">{{ $errors->first('message') }}</span>
                                        @endif
                                    </div>  
                                </div>
                            </div>
                   
                            <div class="form-group text-center">
                                <button class="btn btn-success btn-submit">Save</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


       

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
</body>
@include('layouts/footer')
</html>



