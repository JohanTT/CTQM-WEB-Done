<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('/site/css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/site/css/responsive.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/site/fonts/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/site/fontawesome-free-6.0.0-web/fontawesome-free-6.0.0-web/css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>

    <title>CTQM</title>
</head>
<body>
    <div id="CTQM">
    <nav class="navbar navbar-expand-lg">
        <a href="home" class="navbar-brand"><b>C</b>TQM</a>  		
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon">
            <i class="fas fa-bars" style="color:#F4F4F4; font-size:28px;"></i>
        </span>
        </button>
        nav links and other content for toggling
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
            <div class="navbar-nav">
                <a href="home" class="nav-item nav-link">Home</a>
                <a href="#" class="nav-item nav-link">About</a>			
                <div class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle">Services</a>
                    <div class="dropdown-menu">					
                        <a href="#" class="dropdown-item">Web Design</a>
                        <a href="#" class="dropdown-item">Web Development</a>
                        <a href="#" class="dropdown-item">Graphic Design</a>
                        <a href="#" class="dropdown-item">Digital Marketing</a>
                    </div>
                </div>
                <a href="#" class="nav-item nav-link">Pricing</a>
                <a href="#" class="nav-item nav-link">Blog</a>
            </div>
            <form class="navbar-form form-inline">
                <div class="input-group search-box">								
                    <input type="text" id="search" class="form-control" placeholder="Search here...">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="material-icons">&#xE8B6;</i></span>
                    </div>
                </div>
            </form>
            <div class="navbar-nav action-buttons ml-auto">
                @if ($type == 'login')
                <a href="sign-up" target="_self" class="btn btn-primary"><i class="fa-solid fa-arrow-right-from-bracket"></i> Log In</button></a>
                @elseif($type == 'signup')
                <a href="log-in" target="_self" class="btn btn-primary"><i class="fa-solid fa-user-circle-o"></i> Sign Up</button></a>
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
                         <a href="https://johantt.github.io/First-CV/" target="_blank"><img src="https://scontent.fsgn5-14.fna.fbcdn.net/v/t1.15752-9/275313344_470905094763745_7088804788181546263_n.jpg?_nc_cat=101&ccb=1-5&_nc_sid=ae9488&_nc_ohc=sflgsDGvbC0AX_eaT4R&tn=p0n9vF4b3fGhsfZZ&_nc_ht=scontent.fsgn5-14.fna&oh=03_AVJLfpQ3fHj1AWT_H47a9uXS-JPVYO1ekJ9qGzflVjLFFA&oe=625542B7" alt="" id="profile"></a>
                         <a href="https://dophuc0111001.github.io/dophuc_cv/" target="_blank"><img src="https://scontent.fsgn5-9.fna.fbcdn.net/v/t1.15752-9/275708344_1007203976590352_2033536551430361100_n.jpg?_nc_cat=105&ccb=1-5&_nc_sid=ae9488&_nc_ohc=jlwnWqXU-hsAX8NDtRZ&_nc_ht=scontent.fsgn5-9.fna&oh=03_AVLJpKkyVPresgZr-MzMDpGDw7rsM8BIQILj68J7tYGv0g&oe=625575BB" alt="" id="profile"></a>
                         <a href="https://fontaine07.github.io/cv-midterm/" target="_blank"><img src="https://i.ibb.co/Ps2NJgt/5d035f91a3a36cfd35b2.jpg" alt="" id="profile"></a>
                         <a href="https://nttlynh3010.github.io/CV-NTTL/?fbclid=IwAR2fEVG0xmhYLUCcoMKRixEMi4BMtesURbVNOwBIDW4g-Rmo5YfWsLDV_q0" target="_blank"><img src="https://scontent.fsgn5-4.fna.fbcdn.net/v/t1.15752-9/275444123_504804834498855_4265982560178038882_n.jpg?_nc_cat=102&ccb=1-5&_nc_sid=ae9488&_nc_ohc=MWbzhnQksZAAX89fdhZ&tn=p0n9vF4b3fGhsfZZ&_nc_ht=scontent.fsgn5-4.fna&oh=03_AVJt4K0oJX9D-jEcATYy_ZqarHkHr1HrWJacHdIAtSAEBA&oe=62592AFC" alt="" id="profile"></a>
                         <a href="https://leanhtri2908.github.io/CV-C-Nh-n/?fbclid=IwAR31BWbju8QpSDBtVfNBwH9ac1GCp0ofEx7s54GHhYaPzoaKhZMP9586B5Q" target="_blank"><img src="https://scontent.fsgn5-4.fna.fbcdn.net/v/t1.15752-9/274834883_443344860875089_5306162494514359997_n.png?_nc_cat=102&ccb=1-5&_nc_sid=ae9488&_nc_ohc=TI1xuFKvGvoAX_OUhrv&_nc_ht=scontent.fsgn5-4.fna&oh=03_AVJubDtbOwYeK0OaVYNkpL2GKvEejWFcW4RPnrkVd1Pivg&oe=6257E976" alt="" id="profile"></a>
                         <a href="https://johantt.github.io/Nghia_CV/#" target="_blank"><img src="https://scontent.fsgn5-6.fna.fbcdn.net/v/t1.15752-9/275070304_663926694826840_1280996632467203665_n.jpg?_nc_cat=108&ccb=1-5&_nc_sid=ae9488&_nc_ohc=yrQ92WWCpeoAX8wisHC&_nc_ht=scontent.fsgn5-6.fna&oh=03_AVJuwLB-DnUG2HpTjpwc2eLjpMzGW7t4ipzmsXIIJWlx_w&oe=6256DCC8" alt="" id="profile"></a>
                         <a href="https://nguyenducnh142.github.io/cv/CV.html?fbclid=IwAR0thWx4I01OOfxBVA01mRmO6ojivRAhqBM_w6zBs1L3Q_28CWnYxBzoHGo" target="_blank"><img src="https://scontent.fsgn5-10.fna.fbcdn.net/v/t1.15752-9/275516862_664344178217874_7465321391802119056_n.jpg?_nc_cat=107&ccb=1-5&_nc_sid=ae9488&_nc_ohc=rot5UiWio2EAX--8xEN&_nc_ht=scontent.fsgn5-10.fna&oh=03_AVLVsMiDVffgByEs6HAPNPf6TiW_5qVJ0CRc9Zd2Cd5aqw&oe=6258103E" alt="" id="profile"></a>
                    </div>
            </div>
            <p class="copyright"> &copy; <i>Copyright 2022. All rights reserved.</i></p>
        </div>
    </div>
</body>
</html> -->