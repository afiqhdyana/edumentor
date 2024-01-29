<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <title>Student List</title>
  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/icons/flags/flags.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
  <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>

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
          <img src="assets/img/logo.png" alt="Logo">
        </a>
        <a href="index.html" class="logo logo-small">
          <img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
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
              <img class="rounded-circle" src="{{ asset('assets/img/avatar-01.png') }}" width="31" alt="User">
              <div class="user-text">
                <h6>{{ auth()->user()->name }}</h6>
                <p class="text-muted mb-0">Personal Advisor</p>
              </div>
            </span>
          </a>
          <div class="dropdown-menu">
            <div class="user-header">
              <div class="avatar avatar-sm">
                <img src="{{ asset('assets/img/avatar-01.png') }}" alt="User Image" class="avatar-img rounded-circle">
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
                <td class="text-center">
                  <a class="btn btn-primary" role="button" href="/studProfile/{{ $stud->matricNo }}">Back</a>
                </td>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                  <li class="breadcrumb-item active">Personal</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Main layout -->
        <div class="container-fluid">
          <div class="d-sm-flex justify-content-between align-items-center mb-1">
            <h3 class="text-dark mb-0">Student Performance</h3>
            <br>

          </div>
          <br>
          <div class="row">
            <div class="col-md-6 col-xl-3 mb-4">
              <div class="card shadow border-start-info py-2">
                <div class="card-body">
                  <div class="row align-items-center no-gutters">
                    <div class="col text-center me-2">
                      <div class="text-uppercase text-center text-info fw-bold text-xs mb-1"><span>SEMESTER</span></div>
                      <div class="mb-3">
                        <select name="category_name" id="semesterCari" onchange="semesterCari()" class="form-select">
                          <optgroup label="">
                            <option value='overall' selected>Overall</option>
                            @foreach ($result_info as $res)
                            @if($semester == $res->semester)
                            <option value={{ $res->semester }} selected>{{ $res->semester }}</option>
                            @else
                            <option value={{ $res->semester }}>{{ $res->semester }}</option>
                            @endif

                            @endforeach



                          </optgroup>
                        </select>
                      </div>
                      <div class="text-center text-dark fw-bold h5 mb-0"><span></span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <div class="col-md-6 col-xl-3 mb-4">
              <div class="card shadow border-start-primary py-2">
                <div class="card-body">
                  <div class="row align-items-center no-gutters">
                    <div class="col text-center me-2">
                      <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>GPA</span></div>
                      <p>
                        {{ $stud->results()->where('semester', $semester)->value('GPA') }}
                      </p>

                      <div class="text-dark fw-bold h5 mb-0"><span></span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
              <div class="card shadow border-start-success py-2">
                <div class="card-body">
                  <div class="row align-items-center no-gutters">
                    <div class="col text-center me-2">
                      <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>CGPA</span></div>
                      <p>
                        {{ $stud->results()->where('semester', $semester)->value('CGPA') }}
                      </p>
                      <div class="text-dark fw-bold h5 mb-0"><span></span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-lg-7 col-xl-8">
                <div class="card shadow mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary fw-bold m-0">Performance Graph</h6>
                    <br>
                    <div class="dropdown no-arrow">
                      <button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button">
                        <i class="fas fa-ellipsis-v text-gray-400"></i>
                      </button>
                      <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                        <!-- ... (dropdown menu items) ... -->
                      </div>
                    </div>
                  </div>
                  <div class="card-body" style="height: 420px;">
                    <!-- This is where the chart will be rendered -->
                    <div style="width: 500px; height: 500px;" id="chart"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-start-warning py-2">
                  <div class="card-body">
                    <div class="row text-center align-items-center no-gutters">
                      <div class="col me-2">
                        <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Student Skill</span></div>
                        <p>GK : General Knowledge</p>
                        <p>CSK : Computer Science Knowledge</p>
                        <p>TW : Teamwork</p>
                        <p>IM : Information Management</p>
                        <p>CT : Critical Thinking</p>
                        <p>LLL : Life Long Learning</p>
                        <p>TSK : Teaching Skill</p>
                        <p>PS : Problem Solving</p>
                        <p>CRT : Creative Thinking</p>

                        <div class="text-dark fw-bold h5 mb-0"><span></span><span></span></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--<div id="chart"></div>-->
            </div>
          </div>



          <footer>
            <p>Universiti Pendidikan Sultan Idris</p>
          </footer>
        </div>
      </div>
    </div>

    <script>
      var overSkillPoints = [
        @for($i = 0; $i < count($over_skill); $i++)
        '{{ $over_skill[$i]->points }}',
        @endfor
      ];

      var overSkillLabels = [
        @for($i = 0; $i < count($over_skill); $i++)
        '{{ $over_skill[$i]->transSkill }}',
        @endfor
      ];
    </script>

    <!-- Your existing script tag for semesterCari function -->
    <script>
      function semesterCari() {
        window.location.replace("/studPerformance?matricNo={{ $stud->matricNo }}&semester=" + document.getElementById('semesterCari').value);
      }
    </script>

    <!-- Your existing script tag for chart rendering -->
    <script>
      var options = {
        chart: {
          type: 'radar'
        },
        series: [{
          name: "Radar Series 1",
          data: overSkillPoints
        }],
        labels: overSkillLabels
      };

      var chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();
    </script>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/bs-init.js') }}"></script>
    <script src="{{ asset('assets/js/dropdown-search-bs4.js') }}"></script>
    <script src="{{ asset('https://geodata.solutions/includes/countrystate.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>


    <script>
      jQuery(document).ready(function($) {
        $('#toggle_btn').click(function() {
          $('.sidebar').toggleClass('active');
        });
      });
    </script>
    <script>
      $(document).ready(function() {
        $('.datatable').DataTable();
      });
    </script>

  </div>


</body>

</html>