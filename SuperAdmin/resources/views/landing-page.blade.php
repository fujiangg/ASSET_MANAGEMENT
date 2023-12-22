<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <link rel="icon" href="assets/images/Website_Logo/Website_Logo_3.png">
    <title>ProKing Indonesia</title>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    

<!--

TemplateMo 570 Chain App Dev

https://templatemo.com/tm-570-chain-app-dev

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-chain-app-dev.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
  

  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav" class="scroll-to-section">
            <!-- ***** Logo Start ***** -->
            <a href="#homepage" class="logo">
              @foreach($dataNavbar as $item)
              <img src="{{asset('NavbarImages/'.$item->websitelogo)}}" alt="Logo ProKing Indonesia" srcset="">
              @endforeach
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#homepage" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#aboutuspage">About Us</a></li>
              <li class="scroll-to-section"><a href="#projectspage">Projects</a></li>
              <li class="scroll-to-section"><a href="#contactuspage">Contact Us</a></li>
            </ul>
            <a href="http://127.0.0.1:8000/logindestination" class="action_btn" id="form-open">LOGIN</a>    
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->


  <!-- ***** Home Page Start ***** -->
  <div class="main-banner" id="homepage">
    <section class="page-section">
      {{-- <div class="form_container">
        <i class="fa-solid fa-xmark form_close"></i>
        <!-- Login From -->
        <div class="form login_form">
          <form action="#">
            <h2>Login</h2>
            <div class="input_box">
              <input type="email" placeholder="Enter your email" required />
              <i class="fa-solid fa-envelope email"></i>
            </div>
            <div class="input_box">
              <input type="password" placeholder="Enter your password" required />
              <i class="fa-solid fa-lock password"></i>
              <i class="fa-solid fa-eye-slash pw_hide"></i>
            </div>
            <div class="option_field">
              <span class="checkbox">
                <input type="checkbox" id="check" />
                <label for="check">Remember me</label>
              </span>
              <a href="#" class="forgot_pw">Forgot password?</a>
            </div>
            <button class="button">Login Now</button>
            <div class="login_signup">Don't have an account? <a href="#" id="signup">Signup</a></div>
          </form>
        </div>
        <!-- Signup From -->
        <div class="form signup_form">
          <form action="#">
            <h2>Signup</h2>
            <div class="input_box">
              <input type="email" placeholder="Enter your email" required />
              <i class="fa-solid fa-envelope email"></i>
            </div>
            <div class="input_box">
              <input type="password" placeholder="Create password" required />
              <i class="fa-solid fa-lock password"></i>
              <i class="fa-solid fa-eye-slash pw_hide"></i>
            </div>
            <div class="input_box">
              <input type="password" placeholder="Confirm password" required />
              <i class="fa-solid fa-lock password"></i>
              <i class="fa-solid fa-eye-slash pw_hide"></i>
            </div>
            <button class="button">Signup Now</button>
            <div class="login_signup">Already have an account? <a href="#" id="login">Login</a></div>
          </form>
        </div>
      </div> --}}
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-6 align-self-center">
                <div class="right-image show-up header-text" data-wow-duration="1s" data-wow-delay="1s">
                  <div class="row">
                    <div class="col-lg-12">
                      @foreach($dataHome as $item)
                      <img src="{{asset('HomeImages/'.$item->websiteimage)}}"  alt="Ilustration ProKing Indonesia" srcset="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 align-self-center">
                <div class="left-content show-up header-text" data-wow-duration="1s" data-wow-delay="1s">
                  <div class="col-lg-12">
                    <h2><center>{{ $item->greetingsword }}</center></h2>
                    <img src="{{asset('HomeImages/'.$item->websitelogo)}}" alt="Logo ProKing Indonesia" srcset="">
                    <p>{{ $item->websitedescription }}</p>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- ***** Home Page End ***** -->


  <!-- ***** About Us Page Start ***** -->
  <div id="aboutuspage" class="about-us section">
    <section class="page-section">
      <div class="container">
        <div class="section-heading">
          <h1 class="text-center">About Us</h1>
          @foreach($dataAboutDescription as $item)
          <p>{{ $item->description }}</p>
          @endforeach
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mb-5">
            <div class="team-member">
              @foreach($dataAboutTeam as $item)
              <img class="mx-auto rounded-circle" src="{{asset('AboutUsImages/'.$item->profilepicture)}}" alt="Logo ProKing Indonesia" srcset="">
              <h4>{{ $item->fullname }}</h4>
              <p class="text-muted">{{ $item->jobposition }}</p>
              <ul>
                <li><a href="{{ $item->instagramlink }}" target="_blank"><i class="fab fa-instagram"></i><i class="fab fa-instagram"></i></a></li>
                <li><a href="{{ $item->linkedinlink }}" target="_blank"><i class="fab fa-linkedin-in"></i><i class="fab fa-linkedin-in"></i></a></li>
              </ul>
              {{-- @endforeach
              @endforeach --}}
            </div>
          </div>
          <div class="col-lg-4" >
            <div class="team-member">
              @endforeach 
              {{-- <img class="mx-auto rounded-circle" src="{{asset('aboutimg/'.$item->profilepicture)}}" alt="..." />
              <h4>{{ $item->fullname }}</h4>
              <p class="text-muted">{{ $item->jobposition }}</p>
              <ul>
                <li><a href="{{ $item->instagramlink }}" target="_blank"><i class="fab fa-instagram"></i><i class="fab fa-instagram"></i></a></li>
                <li><a href="{{ $item->linkedinlink }}" target="_blank"><i class="fab fa-linkedin-in"></i><i class="fab fa-linkedin-in"></i></a></li>
              </ul>
            </div>
          </div> --}}
          
        </div>
      </div>
    </section>
  </div>
  <!-- ***** About Us Page Start ***** -->


  <!-- ***** Projects Us Page Start ***** -->
  <div id="projectspage" class="projects section">
    <section class="page-section">
      <div class="container">
        <div class="section-heading">
          <h1 class="text-center">Our Projects</h1>
        </div>
      </div>
      <div class="container swiper">
        <div class="slide-container">
          <div class="card-wrapper swiper-wrapper">
            @foreach($dataProject as $item)
            <div class="card swiper-slide">
              <img src="{{asset('OurProjectImages/'.$item->projectimage)}}"  class="card-img-top" alt="Project Image 1" srcset="">
              <div class="card-body">
                <h4 class="card-title"><a href="#">{{ $item->projectname }}</a></h4>
                <a href="{{ route('projectdetail', $item->id) }}" class="action_btn">VISIT</a>
              </div>
              <p class="card-text">{{ $item->projectdescription }}</p>
            </div>
            @endforeach
          </div>
        </div>
        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
      </div>
      <div class="swiper-pagination"></div>
    </section>
  </div>
  <!-- ***** Projects Us Page End ***** -->

  <!-- ***** Contact Us Page Start ***** -->
  <div id="contactuspage" class="contact-us section">
    <section class="page-section">
      <div class="container">
        <div class="section-heading">
          <h1 class="text-center">Contact Us</h1>
        </div>
        <div class="form">
          <div class="card contact-info">
            @foreach ($dataContactCard1 as $item)
            <h3 class="title">{{ $item->cardtitle }}</h3>
            <p class="text">{{ $item->carddescription }}</p>
            <div class="operating-hour">
              <p>Operating Hour</p>
              <div class="detail-info">
                <i class="fa-solid fa-calendar"></i>
                <p>{{ $item->day }}</p>
              </div>
              <div class="detail-info">
                <i class="fa-solid fa-clock"></i>
                <p>{{ $item->time }}. (WIB)</p>
              </div>
            </div>
            <div class="contact">
              <div class="detail-contact">
                <i class="fa-solid fa-phone"></i>
                <p>{{ $item->phonenumber }}</p>
              </div>
              <div class="detail-contact">
                <i class="fa-solid fa-envelope"></i>
                <p>{{ $item->emailaddress  }}</p>
              </div>
              <div class="detail-contact">
                <i class="fa-solid fa-location-dot"></i>
                <p>{{ $item->locationaddress }}</p>
              </div>
            </div>
            <div class="social-media">
              <p>Connect with us :</p>
              <div class="social-icons">
                <ul>
                  <li><a href="{{ $item->facebooklink }}" target="_blank"><i class="fab fa-facebook-f"></i><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="{{ $item->twitterlink }}"" target="_blank"><i class="fab fa-twitter"></i><i class="fab fa-twitter"></i></a></li>
                  <li><a href="{{ $item->instagramlink }}" target="_blank"><i class="fab fa-instagram"></i><i class="fab fa-instagram"></i></a></li>
                  <li><a href="{{ $item->linkedinlink }}" target="_blank"><i class="fab fa-linkedin-in"></i><i class="fab fa-linkedin-in"></i></a></li>
               @endforeach
                </ul>
              </div>
            </div>
          </div>
          <div class="card">
            @foreach($dataContactCard2 as $item)
            <h3 class="title">{{ $item->cardtitle }}</h3>
            <p class="text">{{ $item->carddescription }}</p>
            @endforeach
            <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-form')}}">
              @csrf
              <div class="input-container">
                <input type="text" id="fullname" name="fullname" class="input">
                <label for="">Full Name</label>
                <span>Full Name</span>
              </div>
              <div class="input-container">
                <input type="text" id="email" name="email" class="input">
                <label for="">Email</label>
                <span>Email</span>
              </div>
              <div class="input-container">
                <input type="text" id="phone" name="phone" class="input">
                <label for="">Phone</label>
                <span>Phone</span>
              </div>
              <div class="select-menu">
                <div class="select-btn">
                  <span class="sBtn-text">Subject</span>
                  <i class="bx bx-chevron-down"></i>
                </div>
                <ul class="options">
                  <li class="option">
                    <input type="radio" class="radio" id="feedback" name="subject" value="Feedback" required>
                    <label for="feedback" class="option-text">Feedback</label>
                  </li>
                  <li class="option">
                    <input type="radio" class="radio" id="website-issue" name="subject" value="Website Issue(s)" required>
                    <label for="website-issue" class="option-text">Website Issue(s)</label>
                  </li>
                  <li class="option">
                    <input type="radio" class="radio" id="general-question" name="subject" value="General Question(s)" required>
                    <label for="general-question" class="option-text">General Question(s)</label>
                  </li>
                </ul>
              </div>
              <div class="input-container textarea">
                <textarea name="message" class="input"></textarea>
                <label for="">Message</label>
                <span>Message</span>
              </div>
              <input type="submit" value="SEND" class="action_btn" />
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- ***** Contact Us Page End ***** -->



  <!-- ***** Footer Start ***** -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-2">
          <div class="footer-widget" class="scroll-to-section">
            <a href="#homepage" class="logo">
              @foreach($dataFooter as $item)
              <img src="{{asset('FooterImages/'.$item->websitelogo)}}" alt="Logo ProKing Indonesia" srcset="">
            </a> 
          </div>
        </div>
        <div class="col-lg-3">
          <div class="footer-widget">
            <p><a href="https://maps.app.goo.gl/aKoLwx18gXz1qGrW6" target="_blank">{{ $item->locationaddress }}</a></p>
          </div>
        </div>
        <div class="col-lg-4">
        </div>  
        <div class="col-lg-3">
          <div class="footer-widget">
            <ul>
              <li><a href="{{ route('copyrightpage') }}">Copyright</a></li>
              <li><a href="{{ route('privacypolicypage') }}">Privacy Policy</a></li>
              <li><a href="{{ route('termsofusepage') }}">Terms Of Us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="copyright-text">
            <p class="scroll-to-section"><a href="#homepage">{{ $item->copyright }}</a></p>
          @endforeach
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- ***** Footer End***** -->


  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('assets/js/animation.js') }}"></script>
  <script src="{{ asset('assets/js/imagesloaded.js') }}"></script>
  <script src="{{ asset('assets/js/popup.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <script src="{{ asset('assets/js/swipercard.js') }}"></script>
  <script src="{{ asset('assets/js/contact-us.js') }}"></script>
  <script src="{{ asset('assets/js/contact-form.js') }}"></script>
  <script src="{{ asset('assets/js/login.js') }}"></script>

  <script>
   
    $(document).ready(function() {
    $('#add-blog-post-form').submit(function(e) {
      e.preventDefault();
      // Logika pemrosesan formulir Anda di sini

      // Tampilkan alert setelah pengiriman formulir
      alert("Message Sent Successfully!");
    });
  });

  
  
    $(document).ready(function() {
      $('.select-btn').click(function() {
        $('.options').toggleClass('active');
      });
  
      $('.option').click(function() {
        var selectedOption = $(this).text();
        $('.sBtn-text').text(selectedOption);
        $('.options').removeClass('active');
      });
  
      $(document).on('click', function(e) {
        if (!$(e.target).closest('.select-menu').length) {
          $('.options').removeClass('active');
        }
      });
    });
  </script>
  
</body>
</html>