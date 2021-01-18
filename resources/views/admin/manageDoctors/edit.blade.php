


@extends('layout.adminLayout')

@section('content')
  <!-- inserted header/sideNav -->
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
        <a href="http://localhost/laravel/public/admin">
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
            Dashboard
            </li>
        </a>
        <a href="http://localhost/laravel/public/admin/department">
          <li class="text-normal">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
              <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396l1.414-1.414l-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8s3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6s-6-2.691-6-6s2.691-6 6-6z" />
            </svg>
            Department
          </li>
        </a>
        <a href="http://localhost/laravel/public/admin/doctor">
          <li class="active text-normal">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="#0052E9" xmlns="http://www.w3.org/2000/svg">
              <path d="M10.8 0C10.1404 0 9.6 0.491228 9.6 1.09083V9.81752C9.59987 9.85409 9.60785 9.89033 9.62344 9.92405L10.5234 11.833C10.5463 11.8825 10.5848 11.9247 10.634 11.9544C10.6832 11.9841 10.7409 12 10.8 12C10.8591 12 10.9168 11.9841 10.966 11.9544C11.0152 11.9247 11.0537 11.8825 11.0766 11.833L11.9766 9.92405C11.9922 9.89033 12.0001 9.85409 12 9.81752V1.09083C12 0.491228 11.4596 0 10.8 0ZM0.3 0.545413C0.220438 0.54542 0.144136 0.574156 0.087877 0.625297C0.0316179 0.676438 8.11073e-06 0.745799 0 0.818124V11.1811C6.51962e-06 11.2534 0.0316155 11.3228 0.0878749 11.3739C0.144134 11.425 0.220437 11.4538 0.3 11.4538H8.4C8.47956 11.4538 8.55587 11.425 8.61212 11.3739C8.66838 11.3228 8.69999 11.2534 8.7 11.1811V0.818124C8.69999 0.745799 8.66838 0.676438 8.61212 0.625297C8.55586 0.574156 8.47956 0.54542 8.4 0.545413H0.3ZM10.8 0.545413C11.1376 0.545413 11.4 0.783956 11.4 1.09083V9.54481H10.2V1.09083C10.2 0.783956 10.4624 0.545413 10.8 0.545413ZM0.6 1.09083H8.1V10.9083H0.6V1.09083ZM2.22187 2.45438C2.18248 2.45606 2.14383 2.46477 2.10814 2.48003C2.07245 2.49529 2.04041 2.51678 2.01386 2.54329C1.98731 2.5698 1.96676 2.6008 1.95339 2.63453C1.94002 2.66826 1.93409 2.70405 1.93594 2.73987C1.93778 2.77568 1.94737 2.81081 1.96415 2.84325C1.98094 2.8757 2.00459 2.90482 2.03375 2.92896C2.06291 2.95309 2.09702 2.97177 2.13412 2.98393C2.17123 2.99608 2.2106 3.00147 2.25 2.99979H4.05C4.08975 3.0003 4.12922 2.99363 4.16611 2.98015C4.203 2.96667 4.23657 2.94666 4.26488 2.92129C4.29319 2.89592 4.31567 2.86568 4.33102 2.83234C4.34636 2.799 4.35426 2.76322 4.35426 2.72708C4.35426 2.69094 4.34636 2.65517 4.33102 2.62183C4.31567 2.58849 4.29319 2.55825 4.26488 2.53287C4.23657 2.5075 4.203 2.4875 4.16611 2.47402C4.12922 2.46055 4.08975 2.45387 4.05 2.45438H2.25C2.24063 2.45398 2.23124 2.45398 2.22187 2.45438ZM5.22187 2.45438C5.18248 2.45606 5.14383 2.46477 5.10814 2.48003C5.07245 2.49529 5.04041 2.51678 5.01386 2.54329C4.98731 2.5698 4.96676 2.6008 4.95339 2.63453C4.94002 2.66826 4.93409 2.70405 4.93594 2.73987C4.93778 2.77568 4.94737 2.81081 4.96415 2.84325C4.98094 2.8757 5.00459 2.90482 5.03375 2.92896C5.06291 2.95309 5.09702 2.97177 5.13412 2.98393C5.17123 2.99608 5.2106 3.00147 5.25 2.99979H6.45C6.48975 3.0003 6.52922 2.99363 6.56611 2.98015C6.603 2.96667 6.63657 2.94666 6.66488 2.92129C6.69319 2.89592 6.71567 2.86568 6.73102 2.83234C6.74636 2.799 6.75426 2.76322 6.75426 2.72708C6.75426 2.69094 6.74636 2.65517 6.73102 2.62183C6.71567 2.58849 6.69319 2.55825 6.66488 2.53287C6.63657 2.5075 6.603 2.4875 6.56611 2.47402C6.52922 2.46055 6.48975 2.45387 6.45 2.45438H5.25C5.24063 2.45398 5.23124 2.45398 5.22187 2.45438ZM2.22187 3.81792C2.18248 3.81959 2.14383 3.82831 2.10814 3.84357C2.07245 3.85882 2.04041 3.88032 2.01386 3.90683C1.98731 3.93334 1.96676 3.96435 1.95339 3.99807C1.94002 4.0318 1.93409 4.0676 1.93594 4.10341C1.93778 4.13922 1.94737 4.17435 1.96415 4.2068C1.98094 4.23924 2.00459 4.26836 2.03375 4.2925C2.06291 4.31664 2.09702 4.33532 2.13412 4.34747C2.17123 4.35963 2.2106 4.36502 2.25 4.36334H4.05C4.08975 4.36385 4.12922 4.35717 4.16611 4.34369C4.203 4.33022 4.23657 4.31021 4.26488 4.28483C4.29319 4.25946 4.31567 4.22923 4.33102 4.19589C4.34636 4.16255 4.35426 4.12677 4.35426 4.09063C4.35426 4.05449 4.34636 4.01871 4.33102 3.98537C4.31567 3.95203 4.29319 3.92179 4.26488 3.89642C4.23657 3.87104 4.203 3.85104 4.16611 3.83757C4.12922 3.82409 4.08975 3.81741 4.05 3.81792H2.25C2.24063 3.81752 2.23124 3.81752 2.22187 3.81792ZM5.22187 3.81792C5.18248 3.81959 5.14383 3.82831 5.10814 3.84357C5.07245 3.85882 5.04041 3.88032 5.01386 3.90683C4.98731 3.93334 4.96676 3.96435 4.95339 3.99807C4.94002 4.0318 4.93409 4.0676 4.93594 4.10341C4.93778 4.13922 4.94737 4.17435 4.96415 4.2068C4.98094 4.23924 5.00459 4.26836 5.03375 4.2925C5.06291 4.31664 5.09702 4.33532 5.13412 4.34747C5.17123 4.35963 5.2106 4.36502 5.25 4.36334H6.45C6.48975 4.36385 6.52922 4.35717 6.56611 4.34369C6.603 4.33022 6.63657 4.31021 6.66488 4.28483C6.69319 4.25946 6.71567 4.22923 6.73102 4.19589C6.74636 4.16255 6.75426 4.12677 6.75426 4.09063C6.75426 4.05449 6.74636 4.01871 6.73102 3.98537C6.71567 3.95203 6.69319 3.92179 6.66488 3.89642C6.63657 3.87104 6.603 3.85104 6.56611 3.83757C6.52922 3.82409 6.48975 3.81741 6.45 3.81792H5.25C5.24063 3.81752 5.23124 3.81752 5.22187 3.81792ZM2.22187 5.72688C2.18238 5.72843 2.1436 5.73705 2.10777 5.75225C2.07195 5.76745 2.03978 5.78893 2.0131 5.81545C1.98643 5.84198 1.96578 5.87304 1.95234 5.90684C1.93891 5.94064 1.93294 5.97652 1.93479 6.01242C1.93664 6.04832 1.94627 6.08354 1.96313 6.11605C1.97999 6.14856 2.00374 6.17772 2.03303 6.20187C2.06231 6.22601 2.09656 6.24466 2.13379 6.25675C2.17102 6.26883 2.21051 6.27411 2.25 6.27229H6.45C6.48977 6.27282 6.52925 6.26616 6.56616 6.25269C6.60306 6.23923 6.63666 6.21923 6.66498 6.19385C6.69331 6.16848 6.7158 6.13823 6.73116 6.10488C6.74651 6.07153 6.75442 6.03574 6.75442 5.99959C6.75442 5.96344 6.74651 5.92765 6.73116 5.8943C6.7158 5.86095 6.69331 5.83071 6.66498 5.80533C6.63666 5.77996 6.60306 5.75995 6.56616 5.74648C6.52925 5.73301 6.48977 5.72635 6.45 5.72688H2.25C2.24063 5.72648 2.23124 5.72648 2.22187 5.72688ZM2.22187 7.63584C2.14231 7.63923 2.06748 7.67121 2.01386 7.72475C1.96023 7.7783 1.9322 7.84901 1.93593 7.92133C1.93966 7.99366 1.97485 8.06168 2.03375 8.11042C2.09264 8.15917 2.17043 8.18465 2.25 8.18126H4.05C4.08972 8.18172 4.12915 8.17502 4.16599 8.16152C4.20283 8.14802 4.23636 8.128 4.26463 8.10263C4.2929 8.07726 4.31534 8.04704 4.33066 8.01373C4.34598 7.98041 4.35387 7.94466 4.35387 7.90855C4.35387 7.87244 4.34598 7.83669 4.33066 7.80337C4.31534 7.77006 4.2929 7.73984 4.26463 7.71447C4.23636 7.6891 4.20283 7.66908 4.16599 7.65558C4.12915 7.64208 4.08972 7.63538 4.05 7.63584H2.25C2.24063 7.63544 2.23124 7.63544 2.22187 7.63584ZM5.22187 7.63584C5.14231 7.63923 5.06748 7.67121 5.01386 7.72475C4.96023 7.7783 4.9322 7.84901 4.93593 7.92133C4.93966 7.99366 4.97485 8.06168 5.03375 8.11042C5.09264 8.15917 5.17043 8.18465 5.25 8.18126H6.45C6.48972 8.18172 6.52915 8.17502 6.56599 8.16152C6.60283 8.14802 6.63636 8.128 6.66463 8.10263C6.6929 8.07726 6.71534 8.04704 6.73066 8.01373C6.74598 7.98041 6.75387 7.94466 6.75387 7.90855C6.75387 7.87244 6.74598 7.83669 6.73066 7.80337C6.71534 7.77006 6.6929 7.73984 6.66463 7.71447C6.63636 7.6891 6.60283 7.66908 6.56599 7.65558C6.52915 7.64208 6.48972 7.63538 6.45 7.63584H5.25C5.24063 7.63544 5.23124 7.63544 5.22187 7.63584ZM2.22187 8.99938C2.18238 9.00093 2.1436 9.00955 2.10777 9.02475C2.07195 9.03995 2.03978 9.06145 2.0131 9.08797C1.98643 9.1145 1.96578 9.14554 1.95234 9.17934C1.93891 9.21314 1.93294 9.24903 1.93479 9.28493C1.93664 9.32083 1.94627 9.35604 1.96313 9.38855C1.97999 9.42106 2.00374 9.45023 2.03303 9.47438C2.06231 9.49852 2.09656 9.51717 2.13379 9.52926C2.17102 9.54135 2.21051 9.54663 2.25 9.54481H4.05C4.08977 9.54533 4.12925 9.53866 4.16616 9.5252C4.20306 9.51173 4.23666 9.49173 4.26498 9.46635C4.29331 9.44098 4.3158 9.41075 4.33116 9.3774C4.34651 9.34405 4.35442 9.30825 4.35442 9.27209C4.35442 9.23594 4.34651 9.20016 4.33116 9.16681C4.3158 9.13346 4.29331 9.10321 4.26498 9.07784C4.23666 9.05246 4.20306 9.03246 4.16616 9.01899C4.12925 9.00553 4.08977 8.99886 4.05 8.99938H2.25C2.24063 8.99898 2.23124 8.99898 2.22187 8.99938ZM5.22187 8.99938C5.18237 9.00093 5.1436 9.00955 5.10777 9.02475C5.07195 9.03995 5.03978 9.06145 5.0131 9.08797C4.98643 9.1145 4.96578 9.14554 4.95234 9.17934C4.93891 9.21314 4.93294 9.24903 4.93479 9.28493C4.93664 9.32083 4.94627 9.35604 4.96313 9.38855C4.97999 9.42106 5.00374 9.45023 5.03303 9.47438C5.06231 9.49852 5.09656 9.51717 5.13379 9.52926C5.17102 9.54135 5.21051 9.54663 5.25 9.54481H6.45C6.48977 9.54533 6.52925 9.53866 6.56616 9.5252C6.60306 9.51173 6.63666 9.49173 6.66498 9.46635C6.69331 9.44098 6.7158 9.41075 6.73116 9.3774C6.74651 9.34405 6.75442 9.30825 6.75442 9.27209C6.75442 9.23594 6.74651 9.20016 6.73116 9.16681C6.7158 9.13346 6.69331 9.10321 6.66498 9.07784C6.63666 9.05246 6.60306 9.03246 6.56616 9.01899C6.52925 9.00553 6.48977 8.99886 6.45 8.99938H5.25C5.24063 8.99898 5.23124 8.99898 5.22187 8.99938ZM10.3594 10.0902H11.2406L10.8 11.0277L10.3594 10.0902Z" />
            </svg>
            Doctor
          </li>
        </a>
        <a href="http://localhost/laravel/public/admin/patient">
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
        <a href="http://localhost/laravel/public/admin/laboratorist">
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
            Laboratorist
          </li>
        </a>
        <a href="http://localhost/laravel/public/admin/receptionist">
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
            Receptionist
          </li>
        </a>
        <a href="http://localhost/laravel/public/admin/viewAppointment">
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
            View Appointment
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
    
    <div style='margin-top: 2%;'>
        <div style="display: flex; justify-content: space-between; align-items: center;">
          <h3 class="text-large text-grey">Admin / edit</h3>
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
        <!-- Doctor Edit -->
        
    <div class="table-responsive" style='box-shadow: 5px 3px 5px 3px #C4CACB; background-color: white; padding: 2%; border-radius: 10px; font-size: 13px;'>
    
        <div class="col-lg-12 margin-tb">
            <div class="pull-left" style='text-align: center;'>
                <h2>Edit Doctor</h2>
            </div>
            
        </div>
        <div style="display: flex; justify-content: space-between; align-items: center;">
                  <div class="col-lg-12 margin-tb" >
                      <div class="pull-left">
                          <a class="btn btn-primary" href="http://localhost/laravel/public/admin/doctor">Back</a>
                      </div>
                  </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check input field code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="http://localhost/laravel/public/admin/updateDoctor/{{$doctor->id}}" method="POST">
        @csrf
        <!-- @method('PUT') -->
        <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <strong>First Name</strong>
                <input type="text" name="doctor_name" class="form-control" value={{$doctor->doctor_name}}>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <strong>Last Name</strong>
                <input type="text" name="last_name" class="form-control" value={{$doctor->last_name}}>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <strong>Password</strong>
                <input type="password" name="doctor_password" class="form-control" value={{$doctor->doctor_password}}>
            </div>
        </div>
    </div>
    <!-- row2 -->
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <strong>Email</strong>
                <input type="email" name="email" class="form-control" value={{$doctor->email}}>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <strong>CNIC</strong>
                <input type="text" name="CNIC" class="form-control" value={{$doctor->CNIC}}>
            </div>
        </div>
    </div>
    <!-- row3 -->
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <strong>Gender</strong>
                <input type="gender" name="gender" class="form-control" value={{$doctor->gender}}>
            </div>
            
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <strong>Contact No</strong>
                <input type="number" name="contact_no" class="form-control" value={{$doctor->contact_no}}>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <strong>Date of Birth</strong>
                <input type="date" name="DOB" class="form-control" value={{$doctor->DOB}}>
            </div>
        </div>
        
    </div>
    
     
    <!-- row5 -->
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Address</strong>
                    <input type="text" name="address" class="form-control" value={{$doctor->address}}>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Specialist</strong>
                    <input type="text" name="specialist" class="form-control" value={{$doctor->specialist}}>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
   
    
    <!-- Doctor Edit end -->

    </div>
  </main>
  
@endsection