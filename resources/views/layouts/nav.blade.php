<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('smallnav')}}/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="{{URL::asset('/site/css/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <a href="{{url('/home')}}" class="navbar-brand"><b>C</b>TQM</a>  		
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon">
            <i class="fas fa-bars" style="color:#F4F4F4; font-size:28px;"></i>
        </span>
        </button>
        <!--nav links and other content for toggling-->
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
            <div class="navbar-nav">
                <div class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle">Prime Pack</a>
                    <div class="dropdown-menu">					
                        <a href="{{url('ctqm-pack/1')}}" class="dropdown-item">Fullstack Web</a>
                        <a href="{{url('ctqm-pack/2')}}" class="dropdown-item">MySQL</a>
                        <a href="{{url('ctqm-pack/3')}}" class="dropdown-item">Complete Python</a>
                        <a href="{{url('ctqm-pack/4')}}" class="dropdown-item">Java</a>
            <a href="{{url('/view-more')}}/prime" class="dropdown-item">View more...</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle">Free Pack</a>
                    <div class="dropdown-menu">					
                        <a href="{{url('ctqm-pack/6')}}" class="dropdown-item">The Full Stack Web</a>
                        <a href="{{url('ctqm-pack/7')}}" class="dropdown-item">Angular 8</a>
                        <a href="{{url('ctqm-pack/8')}}" class="dropdown-item">Python Beginner</a>
                        <a href="{{url('ctqm-pack/9')}}" class="dropdown-item">Machine Learning</a>
            <a href="{{url('/view-more')}}/free" class="dropdown-item">View more...</a>
            </div>
        </div>			
                <a href="{{url('/contact-us')}}" class="nav-item nav-link">Contact Us</a>
            </div>
            <form action="{{url('/search')}}" class="navbar-form form-inline">
                @csrf
                <div class="input-group search-box">								
                    <input type="text" id="search" name="key" class="form-control" placeholder="Searching pack here...">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text">
                            <i class="material-icons">&#xE8B6;</i>
                        </button>
                    </div>
                </div>
            </form>
            <div class="navbar-nav action-buttons ml-auto">
                @if (session()->has('username'))
                <a href="#" data-toggle="dropdown" class="btn btn-primary"><i class="fa-solid fa-user-circle-o"></i> {{session('username')}}</a>
                <div class="dropdown-menu">					
                        <a href="{{url('/profileUser')}}" class="dropdown-item">Update Profile</a>
                        <!-- <a href="#" class="dropdown-item">Settings</a> -->
                    <form action="{{url('/log-out')}}" method="get">
                        <button type="submit" class="btn btn-link btn-logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
                    </form>
                </div>
                @else
                <a href="{{url('/log-in')}}" target="_self" class="btn btn-login"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</button></a>
                @endif
            </div>
        </div>
    </nav>
    @yield('content')
    <div id="footer">
            <div class="container">
                <iv class="row">
                    <div class="col-md-6 col-md-3">
                          <h3>CTQM Group</h3>
                          <p>Class code: 2121COMP130305</p>
                          <p>Instructor: Mr Le Hoang Viet Tuan</p>
                    </div>
                  <div class="col-sm-4">
                    <h3> Reference Links</h3>
                    <ul>
                      <li><a href="https://www.tutorialspoint.com/index.htm" target="_blank">Tutorials Point</a></li>
                      <li><a href="https://www.codecademy.com/" target="_blank">Code Academy</a></li>
                  </ul>
                  </div>
            
                <div class="col-sm-4 col-md-2">
                    <h3>Languages</h3>
                    <ul>
                      <li><a href="#">C/C++</a></li>
                      <li><a href="#">Python</a></li>
                      <li><a href="#">JavaScript</a></li> 
                      <li><a href="#">PHP</a></li> 
                  </ul>
                  </div>
            
                  <div class="col-md-6 col-md-2">
                    <h3> Contact Us</h3>
                    <div class="contact">
                    <i class="fa fa-envelope-square fa-2x" style="color: #EB9762;"></i>
                    <span>Ho Chi Minh University of Education</span>
                    </div>
                  </div>
            
                   <div class="social">
                     <h3>About us</h3>
                         <a href="https://johantt.github.io/First-CV/" target="_blank"><img src="{{url('smallnav')}}/img/Thang.jpg" alt="" id="profile"></a>
                         <a href="https://dophuc0111001.github.io/dophuc_cv/" target="_blank"><img src="{{url('smallnav')}}/img/Phuc.png" alt="" id="profile"></a>
                         <a href="https://fontaine07.github.io/cv-midterm/" target="_blank"><img src="{{url('smallnav')}}/img/Tram.jpg" alt="" id="profile"></a>
                         <a href="https://nttl-3010.github.io/CV-CK/" target="_blank"><img src="{{url('smallnav')}}/img/Linh.png" alt="" id="profile"></a>
                         <a href="https://leanhtri2908.github.io/CV-C-Nh-n/?fbclid=IwAR31BWbju8QpSDBtVfNBwH9ac1GCp0ofEx7s54GHhYaPzoaKhZMP9586B5Q" target="_blank"><img src="{{url('smallnav')}}/img/Tri.png" alt="" id="profile"></a>
                         <a href="https://johantt.github.io/Nghia_CV/#" target="_blank"><img src="{{url('smallnav')}}/img/Nghia.jpg" alt="" id="profile"></a>
                         <a href="https://nguyenducnh142.github.io/cv/CV.html?fbclid=IwAR0thWx4I01OOfxBVA01mRmO6ojivRAhqBM_w6zBs1L3Q_28CWnYxBzoHGo" target="_blank"><img src="{{url('smallnav')}}/img/Nhat.png" alt="" id="profile"></a>
                    </div>
            </div>
            <p class="copyright"> &copy; <i>Copyright 2022. All rights reserved.</i></p>
    </div>
</body>

<script>
    $(document).on("click", ".navbar-right .dropdown-menu", function(e){
        e.stopPropagation();
    });
</script>

</html>