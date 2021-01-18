@extends('layout.doctorLayout')

@section('content')

<header>
    <nav class="sideNav">
      <div class="brand">
        <svg width="143" height="29" viewBox="0 0 143 29" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M123.208 0.111493C123.144 0.159263 123.096 0.30257 123.096 0.429955C123.096 0.668802 125.867 4.47443 126.169 4.63366C126.281 4.69735 126.838 4.64958 127.395 4.50627C128.669 4.20373 131.36 4.3152 132.618 4.69735C133.749 5.04766 133.621 5.12728 132.411 4.84066C131.074 4.53812 129.402 4.56997 127.953 4.9362C126.392 5.33428 125.5 5.82789 125.102 6.51259L124.784 7.05397L125.262 6.94251C126.137 6.71959 130.739 6.63997 131.758 6.84697C132.284 6.94251 133.335 7.32467 134.083 7.67497C135.166 8.20044 135.691 8.58259 136.71 9.60167C137.777 10.6685 138.08 10.8914 138.589 10.9233C139.147 10.987 139.37 10.8118 139.019 10.5889C138.94 10.5411 138.86 10.3182 138.86 10.1112C138.86 9.90421 138.94 9.68129 139.019 9.63352C139.115 9.56983 139.178 8.58259 139.178 7.18136V4.80881L138.239 3.37573C137.714 2.57958 137.14 1.86304 136.965 1.7675C136.679 1.60827 124.625 3.14713e-05 123.717 3.14713e-05C123.494 3.14713e-05 123.255 0.0478001 123.208 0.111493Z" fill="black"/>
          <path d="M139.784 6.84701C139.736 8.3597 139.815 9.4584 139.991 9.63355C140.213 9.85648 140.166 10.2227 139.815 10.9074C139.608 11.3214 139.529 11.7195 139.577 12.1016C139.608 12.4042 139.608 12.5316 139.561 12.3723C139.401 11.8787 139.242 12.0857 138.956 13.0889C138.653 14.1716 138.764 14.4105 139.497 14.2353C140.038 14.108 140.038 14.108 139.815 13.4551C139.704 13.1366 139.656 12.85 139.704 12.8023C139.736 12.7704 139.863 13.057 139.975 13.4551C140.166 14.1239 140.15 14.2035 139.879 14.4105C139.608 14.6175 139.624 14.6334 140.102 14.4742C140.373 14.3786 140.612 14.2831 140.612 14.2831C140.612 14.2672 140.468 13.8691 140.293 13.4073C139.927 12.4679 139.863 11.1463 140.182 11.1463C140.277 11.1463 140.819 11.2099 141.36 11.2896C142.49 11.4647 143 11.3692 143 11.0189C143 10.8278 141.137 7.7387 140.022 6.13047C139.831 5.85977 139.815 5.93939 139.784 6.84701Z" fill="black"/>
          <path d="M9.10249 7.73863C7.81271 8.08894 6.76179 8.72586 5.82232 9.74494L4.96248 10.6685L4.78732 10.0316C4.70771 9.68125 4.54847 9.10802 4.46886 8.75771C4.21409 7.80232 3.86378 7.64309 1.96893 7.64309C0.519925 7.64309 0.328848 7.67494 0.169616 7.94563C-0.0692305 8.42332 -0.0533074 27.2604 0.201463 27.5151C0.472156 27.7858 5.28094 27.7858 5.55163 27.5151C5.69494 27.3718 5.74271 25.7795 5.74271 21.337C5.74271 15.6843 5.75863 15.334 6.07709 14.6493C6.68217 13.2958 7.55794 12.7385 9.05472 12.7385C10.3286 12.7385 11.268 13.3276 11.8572 14.506L12.2712 15.3499V21.337C12.2712 25.7795 12.319 27.3718 12.4623 27.5151C12.6693 27.7221 17.0959 27.8018 17.5895 27.6107C17.8124 27.5311 17.8443 26.8464 17.8443 21.5917C17.8443 18.216 17.908 15.4454 18.0035 15.1429C18.2424 14.283 18.943 13.4073 19.6595 13.057C20.9971 12.42 22.8123 12.7703 23.5607 13.8213C24.2772 14.8403 24.2931 14.9518 24.3728 21.4166L24.4524 27.6266H27.0797H29.707L29.7548 21.2096C29.8025 14.0283 29.7389 13.3913 28.7675 11.3532C27.0478 7.75455 23.0034 6.4807 19.2774 8.35963C18.8474 8.58256 18.0194 9.20356 17.4303 9.74494C16.459 10.6526 16.3634 10.7163 16.2201 10.4296C16.1246 10.2545 15.6787 9.74494 15.2329 9.31502C13.5928 7.70678 11.3636 7.13355 9.10249 7.73863Z" fill="#0052E9"/>
          <path d="M42.6047 7.57939C37.1431 8.45516 33.3534 12.9614 33.6559 18.232C34.0699 25.7158 41.7926 30.2061 48.5281 26.8941C53.114 24.633 55.2954 19.3466 53.6553 14.4582C52.3496 10.557 48.6236 7.77046 44.4836 7.57939C43.7034 7.54754 42.8754 7.54754 42.6047 7.57939ZM45.8849 12.8499C46.888 13.2958 47.7319 14.1875 48.3052 15.4136C49.3879 17.7383 48.6555 20.8274 46.681 22.1968C45.3912 23.1044 43.783 23.3274 42.3181 22.8337C41.299 22.4834 40.0888 21.3688 39.5475 20.2542C39.1494 19.4421 39.1016 19.1714 39.1016 17.7543C39.1016 16.4645 39.1653 16.0186 39.436 15.4295C40.057 14.0919 41.2512 13.0251 42.6843 12.5633C43.3372 12.3404 45.1046 12.4996 45.8849 12.8499Z" fill="#0052E9"/>
          <path d="M65.8366 7.64311C64.6742 7.85011 63.066 8.47112 62.015 9.09212C60.6138 9.93604 59.0533 11.6876 58.3209 13.2481C57.5088 14.9518 57.27 15.9868 57.27 17.7543C57.27 19.5377 57.5088 20.5568 58.3209 22.2924C59.5947 24.9515 62.429 27.1649 65.3748 27.7859C67.6996 28.2795 69.9129 27.9769 72.1422 26.8942C74.037 25.9547 75.8045 24.1872 76.7439 22.2924C77.4127 20.9071 77.8745 19.0759 77.8745 17.7384C77.8745 16.4964 77.3968 14.6174 76.728 13.2162C76.2026 12.1175 75.8363 11.6239 74.7854 10.5889C73.3842 9.20358 72.2536 8.51888 70.4861 7.9775C69.2123 7.57942 67.0308 7.43611 65.8366 7.64311ZM69.7378 12.9774C70.7568 13.5347 71.4256 14.2671 71.967 15.4454C72.3173 16.1779 72.381 16.5441 72.381 17.7543C72.381 18.9645 72.3173 19.3307 71.967 20.0631C71.0912 21.9421 69.7059 22.9293 67.7633 23.0567C66.7601 23.1204 66.4894 23.0726 65.6296 22.6905C61.9832 21.0504 61.5374 15.4932 64.8812 13.2481C65.9162 12.5634 66.4417 12.42 67.7792 12.4837C68.655 12.5156 69.0849 12.6271 69.7378 12.9774Z" fill="#0052E9"/>
          <path d="M88.941 7.72271C86.8073 8.18448 85.4857 8.93287 83.8297 10.573C81.7915 12.6111 80.8998 14.7767 80.8839 17.6747C80.8839 20.0791 81.3457 21.6714 82.6036 23.5981C85.1991 27.5788 90.5652 29.1075 95.0077 27.1489C96.202 26.6235 97.428 25.8432 97.6191 25.477C97.7306 25.2541 97.4917 24.8082 96.4886 23.3433C95.788 22.3242 95.1351 21.4962 95.0555 21.4962C94.96 21.4962 94.6733 21.6395 94.4345 21.8147C92.046 23.5185 89.2117 23.3751 87.5079 21.4644C86.5048 20.3657 86.2341 19.5854 86.2341 17.7543C86.2341 16.3212 86.2818 16.0824 86.6799 15.2862C87.2213 14.2193 87.906 13.4869 88.8614 12.9296C89.5142 12.5474 89.7372 12.4997 91.1702 12.4997C92.7466 12.4997 92.7785 12.5156 94.0046 13.1684L95.2466 13.8531L96.4249 12.0379C97.0777 11.0506 97.6191 10.1271 97.6191 10.0156C97.6191 9.72903 95.9631 8.66218 94.7848 8.18448C93.081 7.49979 90.7881 7.30871 88.941 7.72271Z" fill="#0052E9"/>
          <path d="M107.491 7.7228C103.797 8.55081 100.629 11.6558 99.7847 15.2863C99.4662 16.6079 99.4662 19.0919 99.7687 20.3021C101.377 26.6554 108.319 29.84 114.147 26.9102C114.816 26.5599 115.612 26.0822 115.915 25.8274C116.392 25.4293 116.44 25.3497 116.265 25.0153C115.883 24.3147 113.829 21.4804 113.717 21.5282C113.67 21.56 112.985 21.8944 112.205 22.2925C110.931 22.9294 110.692 22.9931 109.657 22.9931C107.348 22.9931 105.692 21.6874 105.007 19.3308C104.227 16.6238 105.724 13.4551 108.16 12.643C108.733 12.452 109.307 12.4042 110.198 12.452C111.249 12.5157 111.584 12.6112 112.635 13.1685C113.733 13.7736 113.861 13.8054 114.068 13.5666C114.529 13.0093 116.249 10.2387 116.249 10.0157C116.249 9.58581 114.131 8.35973 112.587 7.89796C111.345 7.5158 108.781 7.43619 107.491 7.7228Z" fill="#0052E9"/>
          <path d="M126.44 7.72284C123.255 8.35976 120.66 10.3183 119.275 13.1367C118.447 14.8086 118.16 15.9869 118.16 17.7544C118.16 22.3243 121.042 26.1937 125.485 27.579C127.268 28.1363 129.863 28.0885 131.615 27.4834C134.306 26.5599 136.44 24.7447 137.586 22.404C138.51 20.4932 138.749 19.3786 138.653 17.3563C138.526 14.522 137.618 12.452 135.628 10.4775C133.271 8.13684 129.704 7.06999 126.44 7.72284ZM129.943 12.6749C131.105 13.0252 132.459 14.3628 132.937 15.6526C133.924 18.2799 132.921 21.2097 130.596 22.5791C129.943 22.9613 129.704 23.009 128.43 23.009C127.252 23.009 126.886 22.9453 126.329 22.6428C125.341 22.1173 124.545 21.2575 124.02 20.111C123.606 19.2512 123.542 18.9168 123.542 17.7703C123.542 16.0029 124.052 14.8245 125.278 13.694C126.599 12.4838 128.16 12.1495 129.943 12.6749Z" fill="#0052E9"/>
        </svg>   
        <svg class="hamburger" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
          <g fill="none">
            <path d="M4 6h16M4 12h16m-7 6h7" stroke="#0052E9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </g>
        </svg>              
      </div>
      <ul class="navLists">
        <a href="http://localhost/laravel/public/doctor">
          <li class="active text-normal">
              <svg xmlns="http://www.w3.org/2000/svg" 
              xmlns:xlink="http://www.w3.org/1999/xlink" 
              aria-hidden="true" focusable="false" 
              width="1em" 
              height="1em" 
              fill="#0052E9"
              style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
              <g>
                <path fill-rule="evenodd" d="M13 14s1 0 1-1s-1-4-6-4s-6 3-6 4s1 1 1 1h10zm-9.995-.944v-.002v.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002v.002zM8 7a2 2 0 1 0 0-4a2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0a3 3 0 0 1 6 0z"/>
              </g>
            </svg>
            Dashboard
            </li>
        </a>
        
        <a href="http://localhost/laravel/public/doctor/patient">
          <li class="text-normal">
            <svg xmlns="http://www.w3.org/2000/svg" 
                  xmlns:xlink="http://www.w3.org/1999/xlink" 
                  aria-hidden="true" focusable="false" 
                  width="1em" 
                  height="1em" 
                  fill="#0052E9"
                  style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
              <g>
                <path fill-rule="evenodd" d="M13 14s1 0 1-1s-1-4-6-4s-6 3-6 4s1 1 1 1h10zm-9.995-.944v-.002v.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002v.002zM8 7a2 2 0 1 0 0-4a2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0a3 3 0 0 1 6 0z"/>
              </g>
            </svg>
            Patient
          </li>
        </a>
        <a href="http://localhost/laravel/public/doctor/laboratorist">
          <li class="text-normal">
            <svg xmlns="http://www.w3.org/2000/svg" 
                  xmlns:xlink="http://www.w3.org/1999/xlink" 
                  aria-hidden="true" focusable="false" 
                  width="1em" 
                  height="1em" 
                  fill="#0052E9"
                  style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
              <g>
                <path fill-rule="evenodd" d="M13 14s1 0 1-1s-1-4-6-4s-6 3-6 4s1 1 1 1h10zm-9.995-.944v-.002v.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002v.002zM8 7a2 2 0 1 0 0-4a2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0a3 3 0 0 1 6 0z"/>
              </g>
            </svg>
            Bed Allotment
          </li>
        </a>
        <a href="http://localhost/laravel/public/doctor/receptionist">
          <li class="text-normal">
            <svg xmlns="http://www.w3.org/2000/svg" 
                  xmlns:xlink="http://www.w3.org/1999/xlink" 
                  aria-hidden="true" focusable="false" 
                  width="1em" 
                  height="1em" 
                  fill="#0052E9"
                  style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
              <g>
                <path fill-rule="evenodd" d="M13 14s1 0 1-1s-1-4-6-4s-6 3-6 4s1 1 1 1h10zm-9.995-.944v-.002v.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002v.002zM8 7a2 2 0 1 0 0-4a2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0a3 3 0 0 1 6 0z"/>
              </g>
            </svg>
            Manage Appointment
          </li>
        </a>
        <a href="http://localhost/laravel/public/doctor/viewAppointment">
          <li class="text-normal">
            <svg xmlns="http://www.w3.org/2000/svg" 
                  xmlns:xlink="http://www.w3.org/1999/xlink" 
                  aria-hidden="true" focusable="false" 
                  width="1em" 
                  height="1em" 
                  fill="#0052E9"
                  style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
              <g>
                <path fill-rule="evenodd" d="M13 14s1 0 1-1s-1-4-6-4s-6 3-6 4s1 1 1 1h10zm-9.995-.944v-.002v.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002v.002zM8 7a2 2 0 1 0 0-4a2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0a3 3 0 0 1 6 0z"/>
              </g>
            </svg>
            Profile
          </li>
        </a>
      </ul>
      
    </nav>
  </header>

  <main class="mainWrapper">
  <section class="topNav" style='border-bottom: 0.5px solid #88B0B9;'>
      <div class="hamburger">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
          <g fill="none"><path d="M4 6h16M4 12h16M4 18h7" stroke="#0052E9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </g>
        </svg>
      </div>
      <div>
        <div class="topNav-btnWrapper">     </div>
        <div class="profile-wrapper">
        <ul  class="navbar-nav" >
                
                <li class="nav-item dropdown" >
                  <a style='font-size: 15px;' class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="http://localhost/laravel/resources/images/profile.png" width="35" height="40" class="rounded-circle">
                  {{session('user')}} 
                </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" >
                      <a class="dropdown-item" href="http://localhost/laravel/public/admin">Dashboard</a>
                      <a class="dropdown-item" href="http://localhost/laravel/public/admin">Edit Profile</a>
                      <a class="dropdown-item" href="http://localhost/laravel/public/">Log Out</a>
                  </div>
              </li>
              <li class="nav-item"><li>   
            </ul>
        </div>
      </div>
    </section>
    <div>
      
      <section id="overview">
        <div style="display: flex; justify-content: space-between; align-items: center;">
          <h3 class="text-large text-grey">Admin / Dashboard</h3>
          <p class="text-normal text-grey">
            Filter
            <svg xmlns="http://www.w3.org/2000/svg" 
                  xmlns:xlink="http://www.w3.org/1999/xlink" 
                  aria-hidden="true" focusable="false" 
                  width="1em" 
                  height="1em" 
                  style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32">
              <g fill="none" stroke="#666666" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path d="M2 5s4-2 14-2s14 2 14 2L19 18v9l-6 3V18L2 5z"/>
              </g>
            </svg>
          </p>
        </div>
        <div class="cardWrapper">
          <div class="card">
            <!-- user progress target canvas -->
            <div class="progress-hamburger">
              <canvas id="userProgress" width="90" height="90"></canvas>
            </div>
           <div>
             <p class="text-large text-grey">Total number of Patients</p>
             <span>
               <p class="text-normal text-grey">
                 62% 
                <svg width="13" height="9" viewBox="0 0 13 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6.49999 0L13 8.25H0L6.49999 0Z" fill="#5DF888"/>
                </svg>
              </p>
              <svg width="63" height="26" viewBox="0 0 63 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0 26V10.3755L5.60289 18.645L11.8586 14.0553L17.1566 8.95548L22.5442 6.43643L27.8222 8.95548L33.8206 14.6354L39.481 8.95548L45.2619 14.0553L50.9223 3.80797C50.9223 3.80797 52.9538 5.69498 53.7891 7.26675C53.9586 7.58562 62.0776 -1.1916 62.7162 0.137052C63.3548 1.4657 62.7162 26 62.7162 26H0Z" fill="#C2D5FA"/>
              </svg>  
             </span>
           </div>
          </div>
          <div class="card">
            <!-- course progress target canvas -->
            <div class="progress-hamburger">
              <canvas id="courseProgress" width="90" height="90"></canvas>
            </div>
            <div>
              <p class="text-large text-grey">Total number of Doctors</p>
              <span>
                <p class="text-normal text-grey">
                  79% 
                 <svg width="13" height="9" viewBox="0 0 13 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                   <path d="M6.49999 0L13 8.25H0L6.49999 0Z" fill="#5DF888"/>
                 </svg>
               </p>
               <svg width="63" height="26" viewBox="0 0 63 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                 <path fill-rule="evenodd" clip-rule="evenodd" d="M0 26V10.3755L5.60289 18.645L11.8586 14.0553L17.1566 8.95548L22.5442 6.43643L27.8222 8.95548L33.8206 14.6354L39.481 8.95548L45.2619 14.0553L50.9223 3.80797C50.9223 3.80797 52.9538 5.69498 53.7891 7.26675C53.9586 7.58562 62.0776 -1.1916 62.7162 0.137052C63.3548 1.4657 62.7162 26 62.7162 26H0Z" fill="#C2D5FA"/>
               </svg>  
              </span>
            </div>
          </div>
          <div class="card">
            <!-- provider progress target canvas -->
            <div class="progress-hamburger">
              <canvas id="providerProgress" width="90" height="90"></canvas>
            </div>
            <div>
              <p class="text-large text-grey">Total number of Laboratorist</p>
              <span>
                <p class="text-normal text-grey">
                  63% 
                 <svg width="13" height="9" viewBox="0 0 13 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                   <path d="M6.49999 0L13 8.25H0L6.49999 0Z" fill="#5DF888"/>
                 </svg>
               </p>
               <svg width="63" height="26" viewBox="0 0 63 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                 <path fill-rule="evenodd" clip-rule="evenodd" d="M0 26V10.3755L5.60289 18.645L11.8586 14.0553L17.1566 8.95548L22.5442 6.43643L27.8222 8.95548L33.8206 14.6354L39.481 8.95548L45.2619 14.0553L50.9223 3.80797C50.9223 3.80797 52.9538 5.69498 53.7891 7.26675C53.9586 7.58562 62.0776 -1.1916 62.7162 0.137052C63.3548 1.4657 62.7162 26 62.7162 26H0Z" fill="#C2D5FA"/>
               </svg>  
              </span>
            </div>
          </div>
        </div>
      </section>
      <section id="users">
        <div style="display: flex; justify-content: space-between; align-items: center;">
          <h3 class="text-large text-grey">New Users</h3>
          <p class="text-normal text-grey">
            Filter
            <svg xmlns="http://www.w3.org/2000/svg" 
                  xmlns:xlink="http://www.w3.org/1999/xlink" 
                  aria-hidden="true" focusable="false" 
                  width="1em" 
                  height="1em" 
                  style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32">
              <g fill="none" stroke="#666666" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path d="M2 5s4-2 14-2s14 2 14 2L19 18v9l-6 3V18L2 5z"/>
              </g>
            </svg>
          </p>
        </div>
        <!-- user table -->
        <div class="card">
          <div class="heading">
              <li class="text-normal text-grey text-bold">Account Status</li>
              <li class="text-normal text-grey text-bold" style="margin: 0 40%;">User Name</li>
              <li class="text-normal text-grey text-bold" style="margin: 0 40%;">Email Address</li>
              <li class="text-normal text-grey text-bold"style="margin: 0 150%;">Country</li>
              <li class="text-normal text-grey text-bold" style="margin: 0 250%;">Action</li>
          </div>
          <div class="row">
            <li class="statusCell bg-online text-small">Online</li>
            <li class="usernameCell text-normal text-grey" style="margin: 0 40%;"> <img class="profile" src="http://localhost/laravel/resources/images/profile.png" alt="profile"> Kashif Hussain</li>
            <li class="text-normal text-grey "style="margin: 0 40%;">kashifhussaindahri123@gmail.com</li>
            <li class="text-normal text-grey"style="margin: 0 150%;">Germany</li>
            <li class="text-grey text-normal" style="margin: 0 250%;">...</li>
          </div>
          <div class="row">
            <li class="statusCell bg-offline" >Offline</li>
            <li class="usernameCell text-normal text-grey" style="margin: 0 40%;"> <img class="profile" src="http://localhost/laravel/resources/images/profile.png" alt="profile"> Kashif Hussain</li>
            <li class="text-normal text-grey"style="margin: 0 40%;">kashifhussaindahri123@gmail.com</li>
            <li class="text-normal text-grey"style="margin: 0 150%;">Germany</li>
            <li class="text-grey text-normal" style="margin: 0 250%;">...</li>
          </div>
          <div class="row">
            <li class="statusCell bg-online text-small">Online</li>
            <li class="usernameCell text-normal text-grey" style="margin: 0 40%;"> <img class="profile" src="http://localhost/laravel/resources/images/profile.png" alt="profile"> Kashif Hussain</li>
            <li class="text-normal text-grey" style="margin: 0 40%;">kashifhussaindahri123@gmail.com</li>
            <li class="text-normal text-grey"style="margin: 0 150%;">Germany</li>
            <li class="text-grey text-normal" style="margin: 0 40%;">...</li>
          </div>
          <div class="row">
            <li class="statusCell bg-away">Away</li>
            <li class="usernameCell text-normal text-grey" style="margin: 0 40%;"> <img class="profile" src="http://localhost/laravel/resources/images/profile.png" alt="profile"> Kashif Hussain</li>
            <li class="text-normal text-grey" style="margin: 0 40%;">kashifhussaindahri123@gmail.com</li>
            <li class="text-normal text-grey" style="margin: 0 150%;">Germany</li>
            <li class="text-grey text-normal" style="margin: 0 250%;">...</li>
          </div>
          <div class="row">
            <li class="statusCell bg-online text-small">Online</li>
            <li class="usernameCell text-normal text-grey" style="margin: 0 40%;"> <img class="profile" src="http://localhost/laravel/resources/images/profile.png" alt="profile"> Kashif Hussain</li>
            <li class="text-normal text-grey" style="margin: 0 40%;">kashifhussaindahri123@gmail.com</li>
            <li class="text-normal text-grey" style="margin: 0 150%;">Germany</li>
            <li class="text-grey text-normal" style="margin: 0 250%;">...</li>
          </div>
          <button class="viewAll-btn text-small">View All Patients</button>
        </div>
      </section>
      
      
      <section id="statistics">
        <h3 class="text-large text-grey">Statistics</h3>
        <div class="cardWrapper">
          <div class="card m-2 my-3">
            <div class="card-title">
              <h3 class="text-normal text-bold text-grey">User Growth (New Users)</h3>
              <p class="text-normal text-grey">
                Filter
                <svg xmlns="http://www.w3.org/2000/svg" 
                      xmlns:xlink="http://www.w3.org/1999/xlink" 
                      aria-hidden="true" focusable="false" 
                      width="1em" 
                      height="1em" 
                      style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32">
                  <g fill="none" stroke="#666666" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    <path d="M2 5s4-2 14-2s14 2 14 2L19 18v9l-6 3V18L2 5z"/>
                  </g>
                </svg>
              </p>
            </div>
            <!-- user growth target canvas -->
            <div class="chart">
              <canvas id="userGrowth"></canvas>
            </div>
          </div>
          <div class="card m-2 my-3">
            <div class="card-title">
              <h3 class="text-normal text-bold text-grey">Tutor Growth (New Tutors)</h3>
              <p class="text-normal text-grey">
                Filter
                <svg xmlns="http://www.w3.org/2000/svg" 
                      xmlns:xlink="http://www.w3.org/1999/xlink" 
                      aria-hidden="true" focusable="false" 
                      width="1em" 
                      height="1em" 
                      style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32">
                  <g fill="none" stroke="#666666" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    <path d="M2 5s4-2 14-2s14 2 14 2L19 18v9l-6 3V18L2 5z"/>
                  </g>
                </svg>
              </p>
            </div>
            <!-- tutor growth target canvas -->
            <div class="chart">
              <canvas id="tutorGrowth"></canvas>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>

  </div>



@endsection