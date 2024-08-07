<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>AndroidPlayer4K</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('public/assets/img/download.png')}}" />
    <meta name="google-site-verification" content="KrsxJzd68kiQoneIkBSUa_B8SUsosoRzymeTKOdAAiM" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('public/assets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('public/assets/css/toastr.min.css')}}" />

    <link rel="stylesheet" href="{{asset('public/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('public/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <link rel="stylesheet" href="{{asset('public/assets/vendor/libs/apex-charts/apex-charts.css')}}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('public/assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('public/assets/js/config.js')}}"></script>
    <style>
        span.app-brand-text.demo.menu-text.fw-bolder.ms-2 img {
    width: 6%;
}
    </style>
  </head>

  <body>

 <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{url('add-domain-url')}}" class="app-brand-link">
              <span class="app-brand-text demo menu-text fw-bolder ms-2">                <img src="public/assets/img/androidplayer.jpg" alt="logo"/>ndroidPlayer</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">


            <li class="menu-item active">
              <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">King 4k</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item active">
                  <a href="{{url('add-domain-url')}}"class="menu-link">
                    <div data-i18n="Account">Domain Url</div>
                  </a>
                </li>
                <li class="menu-item active">
                  <a href="{{url('contact-detail')}}" class="menu-link">
                    <div data-i18n="Notifications">Contact Details</div>
                  </a>
                </li>
                <li class="menu-item active">
                  <a href="{{url('update-version')}}" class="menu-link">
                    <div data-i18n="Connections">Update Version</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item active">
              <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Ibox Tv</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item active">
                  <a href="{{url('ibox-domain-url')}}" class="menu-link">
                    <div data-i18n="Error">Domain Url</div>
                  </a>
                </li>
                <li class="menu-item active">
                  <a href="{{('ibox-contact-detail')}}" class="menu-link">
                    <div data-i18n="Under Maintenance">Contact Detail</div>
                  </a>
                </li>
                <li class="menu-item active">
                  <a href="{{('ibox-update-version')}}" class="menu-link">
                    <div data-i18n="Under Maintenance">Update Version</div>
                  </a>
                </li>
              </ul>
            </li>
            
            <li class="menu-item active">
              <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Ibo Player Active Code</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item active">
                  <a href="{{url('ibo-domain-url')}}" class="menu-link">
                    <div data-i18n="Error">Domain Url</div>
                  </a>
                </li>
                <li class="menu-item active">
                  <a href="{{('ibo-contact-detail')}}" class="menu-link">
                    <div data-i18n="Under Maintenance">Contact Detail</div>
                  </a>
                </li>
                <li class="menu-item active">
                  <a href="{{('ibo-update-version')}}" class="menu-link">
                    <div data-i18n="Under Maintenance">Update Version</div>
                  </a>
                </li>
              </ul>
            </li>
            
            <li class="menu-item active">
              <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Media Player Ibo</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item active">
                  <a href="{{url('mediaIbo-domain-url')}}" class="menu-link">
                    <div data-i18n="Error">Domain Url</div>
                  </a>
                </li>
                <li class="menu-item active">
                  <a href="{{('mediaIbo-contact-detail')}}" class="menu-link">
                    <div data-i18n="Under Maintenance">Contact Detail</div>
                  </a>
                </li>
                <li class="menu-item active">
                  <a href="{{('mediaIbo-update-version')}}" class="menu-link">
                    <div data-i18n="Under Maintenance">Update Version</div>
                  </a>
                </li>
              </ul>
            </li>
            
           
           <li class="menu-item active">
              <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Iboss Iptv</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item active">
                  <a href="{{url('Iboss-domain-url')}}" class="menu-link">
                    <div data-i18n="Error">Domain Url</div>
                  </a>
                </li>
                <li class="menu-item active">
                  <a href="{{('Iboss-contact-detail')}}" class="menu-link">
                    <div data-i18n="Under Maintenance">Contact Detail</div>
                  </a>
                </li>
                <li class="menu-item active">
                  <a href="{{('Iboss-update-version')}}" class="menu-link">
                    <div data-i18n="Under Maintenance">Update Version</div>
                  </a>
                </li>
              </ul>
            </li>
            
            <li class="menu-item active">
              <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Ibo Tv Pro</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item active">
                  <a href="{{url('Ibo-pro-domain-url')}}" class="menu-link">
                    <div data-i18n="Error">Domain Url</div>
                  </a>
                </li>
                <li class="menu-item active">
                  <a href="{{('Ibo-pro-contact-detail')}}" class="menu-link">
                    <div data-i18n="Under Maintenance">Contact Detail</div>
                  </a>
                </li>
                <li class="menu-item active">
                  <a href="{{('Ibo-pro-update-version')}}" class="menu-link">
                    <div data-i18n="Under Maintenance">Update Version</div>
                  </a>
                </li>
              </ul>
            </li>
            
            
            <li class="menu-item active">
              <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">4k Player</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item active">
                  <a href="{{url('4kplayer-domain-url')}}" class="menu-link">
                    <div data-i18n="Error">Domain Url</div>
                  </a>
                </li>
                <li class="menu-item active">
                  <a href="{{('4kplayer-contact-detail')}}" class="menu-link">
                    <div data-i18n="Under Maintenance">Contact Detail</div>
                  </a>
                </li>
                <li class="menu-item active">
                  <a href="{{('4kplayer-update-version')}}" class="menu-link">
                    <div data-i18n="Under Maintenance">Update Version</div>
                  </a>
                </li>
              </ul>
            </li>
        <!--<li class="menu-item active">-->
        <!--      <a href="{{url('upload-file')}}" class="menu-link">-->
        <!--        <i class="menu-icon tf-icons bx bx-cube-alt"></i>-->
        <!--        <div data-i18n="Misc">APK Upload File</div>-->
        <!--      </a>        -->
        <!--    </li>-->
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{asset('public/assets/img/avatars/1.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{ route('signout') }}">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
      
                <!-- / Navbar -->
<div class="admin-dashboard">
  @yield('content')
</div>

              <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0 footer-bottom">
                  © 2023 Copyright Created By <strong>AndroidPlayer4K</strong>.
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="public/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="public/assets/vendor/libs/popper/popper.js"></script>
    <script src="public/assets/vendor/js/bootstrap.js"></script>
    <script src="public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="public/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="public/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="public/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="public/assets/js/dashboards-analytics.js"></script>
    
    <script src="{{asset('public/assets/js/toastr.min.js')}}"></script>
    <script src="{{asset('public/assets/js/toastr.init.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
  	'positionClass': 'toast-top-right',
				'preventDuplicates': false,
				'showDuration': '1000',
				'hideDuration': '1000',
				'timeOut': '5000',
				'extendedTimeOut': '1000',
				'showEasing': 'swing',
				'hideEasing': 'linear',
				'showMethod': 'fadeIn',
				'hideMethod': 'fadeOut',
  	
  }
  		toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>
    <style>
        .toast-success
{
   background-color: #0cb257 !important;
   z-index:1000;
   margin-top:100px !important;
}
        footer
        {
         position:fixed;
         bottom:0;
        }
        @media (min-width: 320px) and (max-width: 991px) {
        footer
        {
           display:none;    
        }
            
        }
    </style>
  </body>
</html>
