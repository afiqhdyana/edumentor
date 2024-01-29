<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <title>Student List</title>
  <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/icons/flags/flags.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/datatables.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  

  <style>
      @media (max-width: 992px) {
          .sidebar {
              display: none;
          }

          .sidebar.active {
              display: block;
          }
      }
  </style>
</head>

<body>
  <div class="main-wrapper">
    <div class="header">
      <div class="header-left">
        <a href="index.html" class="logo">
          <img src="{{ asset('assets/img/logo.png')}}" alt="Logo">
        </a>
        <a href="index.html" class="logo logo-small">
          <img src="{{ asset('assets/img/logo-small.png')}}" alt="Logo" width="30" height="30">
        </a>
      </div>
      <div class="menu-toggle">
        <a href="javascript:void(0);" id="toggle_btn">
          <i class="fas fa-bars"></i>
        </a>
      </div>
      <ul class="nav user-menu">
        <li class="nav-item dropdown has-arrow new-user-menus">
          <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
            <span class="user-img">
              <img class="rounded-circle" src="{{ asset('assets/img/avatar-01.png') }}"  width="31"
                alt="User">
              <div class="user-text">
                <h6>{{ auth()->user()->name }}</h6>
                <p class="text-muted mb-0">Personal Advisor</p>
              </div>
            </span>
          </a>
          <div class="dropdown-menu">
            <div class="user-header">
              <div class="avatar avatar-sm">
                <img src="{{ asset('assets/img/avatar-01.png') }}"  alt="User Image"
                  class="avatar-img rounded-circle">
              </div>
              <div class="user-text">
                <h6>{{ auth()->user()->name }}</h6>
                <p class="text-muted mb-0">Personal Advisor</p>
              </div>
            </div>

            <a class="dropdown-item" href="/">Logout</a>
          </div>
        </li>
      </ul>
    </div>

    <div class="sidebar" id="sidebar">
      <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
          <ul>
            <li class="menu-title">
              <span>Main Menu</span>
            </li>
            <li>
              <a href="dashboard"><i class="feather-grid"></i> <span>Dashboard</span></a>
            </li>
            <li>
              <a href="studInfo"><i class="fas fa-graduation-cap"></i> <span>Student List</span></a>
            </li>
            <li>
              <a href="/"><i class="fas fa-clipboard-list"></i> <span>Log Out</span></a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="page-wrapper">
      <div class="content container">
        <div class="page-header">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-sub-header">
                <h3 class="page-title">Welcome Personal Advisor!</h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                  <li class="breadcrumb-item active">Personal</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Main layout -->
        <main style="margin-top: 20px;">
    <div class="container">
     

        <!-- Your existing content goes here -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Qualification Description</th>
                        <th scope="col">Result</th>
                        <th scope="col">CGPA</th>
                        <th scope="col">Total Subject</th>
                        <th scope="col">Year</th>
                        
                        <th scope="col" colspan="2" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                 
                    <!-- Loop through students -->
                    @foreach ($qualifications as $qualification)
                    
                        <tr>
                            <th scope="row">{{ $qualification->qualification_desc }}</th>
                            <td>{{ $qualification->result }}</td>
                            <td>{{ $qualification->CGPA }}</td>
                            <td>{{ $stud->semester }}</td>
                            <td>{{ $qualification->year}}</td>
                            
                           <!-- <td class="text-center">
                                <a class="btn btn-primary" role="button" href="/moremorequalify/{{ $stud->matricNo }}">View</a>
                            </td>-->
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <br>
            <td class="text-center">
                                <a class="btn btn-primary" role="button" href="/studProfile/{{ $stud->matricNo }}">Back</a>
                            </td>
        </div>
    </div>
</main>

            

        
      </div>
    </div>
    <footer>
          <p>Universiti Pendidikan Sultan Idris</p>
        </footer>
  </div>

  <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

  <script>
    jQuery(document).ready(function ($) {
        $('#toggle_btn').click(function () {
            $('.sidebar').toggleClass('active');
        });
    });
</script>
<script>
        $(document).ready(function () {
            $('.datatable').DataTable();
        });
    </script>


</body>

</html>
