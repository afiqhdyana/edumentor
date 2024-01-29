<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Black-Navbar.css">
    <link rel="stylesheet" href="assets/css/dropdown-search-bs4.css">
    <link rel="stylesheet" href="assets/css/header-1.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/Ludens-Users---25-After-Register.css">
    <link rel="stylesheet" href="assets/css/Pretty-Header.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-secondary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>My<br>Osmas System<br></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="/dashboard"><i class="fas fa-user"></i><span>Dashboard</span></a><a class="nav-link" href="/studInfo"><i class="fas fa-user-circle"></i><span>Student Info</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="/"><i class="fas fa-table"></i><span>Logout</span></a><a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
               
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top" style="height: 1px;">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                           
                  
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-1">
                        <h3 class="text-dark mb-0">Student Performance</h3>
                        <div class="dropdown">
                            <div class="dropdown-menu"><a class="dropdown-item" href="#">First Item</a><a class="dropdown-item" href="#">Second Item</a><a class="dropdown-item" href="#">Third Item</a></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col text-center me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>GPA</span></div>
                                            <p>3.6</p>
                                        
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
                                            <p>3.51</p>
                                            <div class="text-dark fw-bold h5 mb-0"><span></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                    <option value={{ $res->semester }} selected>{{  $res->semester }}</option>
                                                    @else
                                                    <option value={{ $res->semester }}>{{  $res->semester }}</option>
                                                    @endif
                                                        
                                                    @endforeach
        
                                                  
        
                                                </optgroup>
                                            </select></div>
                                            <div class="text-center text-dark fw-bold h5 mb-0"><span></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-warning py-2">
                                <div class="card-body">
                                    <div class="row text-center align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>Credit Hour</span></div>
                                            <p>18</p>
                                            <div class="text-dark fw-bold h5 mb-0"><span></span><span></span></div>
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
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                       
                                           
                                        </div>
                                        <div style="width: 500px; height: 500px;" id="chart"></div>
                                    </div>
                                   
                                </div>
                                
                                <div class="card-body" style="height: 20px;">
                                   
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
                                        <div id="chart"></div>
                                    </div>
                                </div>
                               
                              
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/dropdown-search-bs4.js"></script>
    <script src="https://geodata.solutions/includes/countrystate.js"></script>
    <script src="assets/js/theme.js"></script>
    
    <script>
        function semesterCari()
        {
             //dah dapat semester //studPerformance?matricNo=D20201095591&semester=A192
             //alert(document.getElementById('semesterCari').value);
             //alert({{ $stud->matricNo }});
             window.location.replace("/studPerformance?matricNo={{ $stud->matricNo }}&semester=" + document.getElementById('semesterCari').value);
        }

var options = {
  chart: {
    type: 'radar'
  },
  series: [
    {
      name: "Radar Series 1",
      data: [
        @for($i = 0; $i < count($over_skill); $i++)
        {{ $over_skill[$i]->points }},
        @endfor
      ] 
    }
   
  ],
  labels: [
    @for($i = 0; $i < count($over_skill); $i++)
        '{{ $over_skill[$i]->transSkill }}',
    @endfor
  ]
}

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();
        </script>

<script>
    var options3 = {
     
    }
    
    var chartz = new ApexCharts(document.querySelector("#chart"), options3);
    
    chartz.render();
            </script>
</body>

</html>