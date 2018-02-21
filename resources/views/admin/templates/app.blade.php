<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{auth()->guard('pengguna')->check() ? auth()->guard('pengguna')->user()->username : 'Admin' }} | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{-- select 2 --}}
    <link rel="stylesheet" type="text/css" href="{{URL::to('bower_components/select2/dist/css/select2.min.css')}}">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{URL::to('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{URL::to('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{URL::to('bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{URL::to('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{URL::to('dist/css/skins/_all-skins.min.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{URL::to('bower_components/morris.js/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{URL::to('bower_components/jvectormap/jquery-jvectormap.css')}}">
    {{-- datatables --}}
    <link rel="stylesheet" type="text/css" href="{{URL::to('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{URL::to('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{URL::to('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{URL::to('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <!-- include the style -->
    <link rel="stylesheet" href="{{URL::to('plugins/alertifyjs/build/css/alertify.min.css')}}" />
    <!-- include a theme -->
    <link rel="stylesheet" href="{{URL::to('plugins/alertifyjs/build/css/themes/default.min.css')}}" />
    @yield('customCss')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="#!" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>BPK</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>{{auth()->guard('pengguna')->check() ? auth()->guard('pengguna')->user()->username : 'Admin' }}</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{URL::to('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{auth()->guard('admin')->check() ? 'Admin' : auth()->guard('pengguna')->user()->username}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      {{auth()->guard('admin')->check() ? 'Admin' : auth()->guard('pengguna')->user()->username}}
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    @if(auth()->guard('pengguna')->check())
                      <div class="pull-left">
                        <a href="{{url('/')}}" class="btn btn-default btn-flat">Home</a>
                      </div>
                    @endif
                    <div class="pull-right">
                      <a href="{{auth()->guard('admin')->check() ? route('admin.logout') : route('akun.logout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{URL::to('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{auth()->guard('admin')->check() ? 'Admin' : auth()->guard('pengguna')->user()->username}}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            @if(auth()->guard('admin')->check())
            <li>
              <a href="{{route('admin.landingPageView')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-rocket"></i> <span>Master</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="{{route('admin.penggunaView')}}">
                    <i class="fa fa-users"></i> <span>Pengguna</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('admin.satuanView')}}">
                    <i class="fa fa-cube"></i> <span>Satuan</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('admin.kemasanView')}}">
                    <i class="fa fa-file"></i> <span>Kemasan</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('admin.varianRasaView')}}">
                    <i class="fa fa-envira"></i> <span>Varian Rasa</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('admin.minimalPembelianView')}}">
                    <i class="fa fa-plus"></i> <span>Minimal Pembelian</span>
                  </a>
                </li>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-info-circle"></i>
                    <span>Kategori</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{route('admin.kategoriView')}}"><i class="fa fa-circle-o"></i> Kategori</a></li>
                    <li><a href="{{route('admin.subKategoriView')}}"><i class="fa fa-circle-o"></i> Sub Kategori</a></li>
                  </ul>
                </li>
                <li>
                  <a href="{{route('admin.produkView')}}">
                    <i class="fa fa-cubes"></i>
                    <span>Produk</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('admin.transaksiView')}}">
                    <i class="fa fa-handshake-o"></i>
                    <span>Transaksi</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('admin.lihatPasarView')}}">
                    <i class="fa fa-eye"></i>
                    <span>Lihat Pasar</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('admin.dialogProsesView')}}">
                    <i class="fa fa-refresh"></i>
                    <span>Dialog Proses</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-info-circle"></i>
                <span>Setting Website</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('admin.tentangView')}}"><i class="fa fa-circle-o"></i> Tentang</a></li>
                <li><a href="{{route('admin.kontakView')}}"><i class="fa fa-circle-o"></i> Kontak</a></li>
                <li><a href="{{route('admin.faqView')}}"><i class="fa fa-circle-o"></i> FAQ</a></li>
                <li><a href="{{route('admin.testimonialView')}}"><i class="fa fa-circle-o"></i> Testimonial</a></li>
                <li><a href="{{route('admin.bannerView')}}"><i class="fa fa-circle-o"></i> Banner</a></li>
              </ul>
            </li>
            <li>
              <a href="{{route('admin.settingAdminView')}}">
                <i class="fa fa-gears"></i>
                <span>Setting Admin</span>
              </a>
            </li>
            @else
            <li>
              <a href="{{route('akun.penggunaView')}}">
                <i class="fa fa-dashboard"></i>
                <span>Transaksi</span>
              </a>
            </li>
            <li>
              <a href="{{route('akun.dataPribadiView')}}">
                <i class="fa fa-user"></i>
                <span>Data Pribadi</span>
              </a>
            </li>
            {{-- <li>
              <a href="{{route('akun.proyeksiView')}}">
                <i class="fa fa-money"></i>
                <span>Proyeksi Keuangan</span>
              </a>
            </li> --}}
            @endif
            {{-- <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Pembayaran & Pengiriman</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Metode Pengiriman
                  </a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Metode Pembayaran
                  </a>
                </li>
              </ul>
            </li> --}}
          </section>
          <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Main content -->
          <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
              @yield('content')
            </div>
            <!-- /.row (main row) -->
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
        </footer>
      </div>
      <!-- ./wrapper -->
      <!-- jQuery 3 -->
      <script src="{{URL::to('bower_components/jquery/dist/jquery.min.js')}}"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="{{URL::to('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
      $.widget.bridge('uibutton', $.ui.button);
      </script>
      <!-- Bootstrap 3.3.7 -->
      <script src="{{URL::to('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
      <!-- daterangepicker -->
      <script src="{{URL::to('bower_components/moment/min/moment.min.js')}}"></script>
      <script src="{{URL::to('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
      <!-- datepicker -->
      <script src="{{URL::to('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
      <!-- CK Editor -->
      <script src="{{URL::to('bower_components/ckeditor/ckeditor.js')}}"></script>
      <!-- Bootstrap WYSIHTML5 -->
      <script src="{{URL::to('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
      {{-- dataTables --}}
      <script src="{{URL::to('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
      <script src="{{URL::to('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
      <!-- Slimscroll -->
      <script src="{{URL::to('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
      {{-- select 2 --}}
      <script src="{{URL::to('bower_components/select2/dist/js/select2.min.js')}}"></script>
      <!-- FastClick -->
      <script src="{{URL::to('bower_components/fastclick/lib/fastclick.js')}}"></script>
      {{-- alertify --}}
      <script src="{{URL::to('plugins/alertifyjs/build/alertify.min.js')}}"></script>
      <!-- AdminLTE App -->
      <script src="{{URL::to('dist/js/adminlte.min.js')}}"></script>
      <script type="text/javascript">
      $(function() {
      $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });
      $('#datatables').DataTable();
      $('.select2').select2();
      //Date picker
      $('.datepicker').datepicker({
      autoclose: true
      });
      alertify.set('notifier','position', 'top-right');
      // CKEDITOR.replace('editor1');
      $('.textarea').wysihtml5();
      })
      </script>
      @yield('customJs')
    </body>
  </html>