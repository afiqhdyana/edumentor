<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - Brand</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome5-overrides.min.css') }}">
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
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
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
                            </li>
                
                                          
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h1><span class="blue"></span>Student<span class="color:blue"></span> <span class="yellow">Profile</span></h1>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="/assets/img/avatars/women.jpg" width="160" height="160">
                                    <p>{{ $stud->studName }}</p>
                                    <div class="mb-3"><a class="btn btn-warning btn-sm" role="button" href="/studPerformance?matricNo={{ $stud->matricNo  }}&semester=A192" style="width: 155.766px;">View Performance</a></div>
                                    <div class="mb-3"><a class="btn btn-warning btn-sm" role="button" href="/addGrade/{{ $stud->matricNo  }}">Add Result</a></div>
                                </div>
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3" style="height: 50.2px;">
                                    <h6 class="text-warning fw-bold m-0">Relative</h6>
                                </div>
                                <div class="card-body" style="height: 300.8px;">
                                    <h4 class="small fw-bold"></h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                   
                                                    <th>Name</th>
                                                    <th>Relation</th>
                                                    <th>Address</th>
                                                    <th>Tel No</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr></tr>
                                                @foreach ($relatives->slice(0, 3) as $relative)
                                                <tr>
                                                   
                                                    <td>{{ $relative->name }}</td>
                                                    <td>{{ $relative->relation }}</td>
                                                    <td>{{ $relative->address }}</td>
                                                    <td>{{ $relative->telNum }}</td>
                                                </tr>
                                                @endforeach
                                               
                                            </tbody>
                                        </table>
                                    </div><td><a  href="relativesMore/{{ $stud->matricNo  }}">More Detail</a></td>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-8" style="height: 683.8px;">
                            <div class="row mb-3 d-none">
                                <div class="col">
                                    <div class="card textwhite bg-primary text-white shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card textwhite bg-success text-white shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3" >
                                        <div class="card-header py-3">
                                            <p class="text-warning m-0 fw-bold">Student Detail</p>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="username"><strong>Matric No</strong><br></label><input class="form-control" type="text" id="username" placeholder={{ $stud->matricNo }} name="username"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="email"><strong>Course</strong><br></label><input class="form-control" type="email" id="email" placeholder={{ $details->course }} name="email"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="first_name"><strong>Program</strong></label><input class="form-control" type="text" id="first_name" placeholder={{ $details->program }} name="first_name"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="last_name"><strong>Faculty</strong><br></label><input class="form-control" type="text" id="last_name" placeholder={{ $details->faculty }} name="last_name"></div>
                                                    </div>
                                                </div>
                                                <td><a  href="moreDetail/{{ $stud->matricNo  }}">More Detail</a></td>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="card shadow mb-3" style="height: 254px;">
                                        <div class="card-header py-3">
                                            <p class="text-warning m-0 fw-bold">Contact Information</p>
                                        </div>
                                        
                                        

                                            <form>
                                                <div class="mb-3"><label class="form-label" for="address"><strong>Address</strong></label><input class="form-control" type="text" id="address" placeholder={{ $cont->address }} name="address"></div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="city"><strong>City</strong></label><input class="form-control" type="text" id="city" placeholder={{ $cont->city }} name="city"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="country"><strong>Tel. No</strong><br></label><input class="form-control" type="text" id="country" placeholder={{ $cont->telNum }} name="country"></div>
                                                    </div>
                                                </div>
                                                <td><a  href="contactMore/{{ $stud->matricNo  }}">More Detail</a></td>
                                            </form>
                                        </div>
                                        <br>

                                        <div class="card shadow">

                                        <div class="card-header py-3" style="height: 53px;">
                                            <p class="text-warning m-0 fw-bold">Co-Curiculum</p>
                                        </div>
                                        <div class="card-body" >
                                            <form>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                
                                                                <th>Code</th>
                                                                <th>Description</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($co_curiculums->slice(0, 2) as $co_curiculum)
                                                        
                                                            <tr>
                                                                <td>{{ $co_curiculum->code }}</td>
                                                                <td>{{ $co_curiculum->description }}</td>
                                                                
                                                            </tr>
                                                            @endforeach
                                                           
                                                        </tbody>
                                                    </table>
                                                </div> <td><a  href="coCuriculum/{{ $stud->matricNo  }}">More Detail</a></td>
                                                </div>
                                            </form>
                                        </div>


                                        <br>
                                        <div class="card shadow">
                                            <div class="card-header py-3">
                                                <p class="text-warning m-0 fw-bold">Financial</p>
                                            </div>
                                            <div class="card-body" style="height: 137px;">
                                                <form>
                                                    
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="city"><strong>Bank Name</strong></label><input class="form-control" type="text" id="city" placeholder={{ $financials->bank_name }} name="city"></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="country"><strong>Bank Account</strong><br></label><input class="form-control" type="text" id="country" placeholder={{ $financials->bank_acc }} name="country"></div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3"><td><a  href="financialMore/{{ $stud->matricNo  }}">More Detail</a></td></div>
                                                </form>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   


                    <div class="card shadow mb-4" style="width: 385.6px;height: 290px;">
                        <div class="card-header py-3" style="width: 383.6px;">
                            <h6 class="text-warning m-0 fw-bold">Qualification</h6>
                        </div>
                       
                            <h4 class="small fw-bold"></h4>
                          
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            
                                            <th>Qualification Desc</th>
                                            <th>Result</th>
                                            <th>CGPA</th>
                                            <th>Total Subject</th>
                                            <th>Year</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($qualifications->slice(0, 2) as $qualification)
                                  
                                        <tr>
                                            <td>{{ $qualification->qualification_desc }}</td>
                                            <td>{{ $qualification->result }}</td>
                                            <td>{{ $qualification->CGPA }}</td>
                                            <td>{{ $qualification->total_subject }}<br><br></td>
                                            <td>{{ $qualification->year }}</td>
                                            
                                            
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                                <td><a  href="qualificationMore/{{ $stud->matricNo  }}">More Detail</a></td>
                            </div>
                        </div>
            <br>
            
                            <div class="row">
                    <div class="card shadow " style="width: 1238.6px;">
                        <div class="card-header py-3" style="width: 1210.6px;" style="height: 100.8px;">
                <p class="text-warning m-0 fw-bold">Activity</p>
                </div>
                <div class="card-body" style="height: 180.8px;">
                    <h4 class="small fw-bold"></h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                
                                <th>Program/Activity</th>
                                <th>Place</th>
                                <th>Date</th>
                                <th>Achievement</th>
                                <th>Category</th>
                                <th>Level</th>
                                <th>Merit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activity->slice(0, 3) as $act)
                                
                          
                            <tr>
                                <td>{{ $act->program }}</td>
                                <td>{{ $act->place }}</td>
                                <td>{{ $act->date}}</td>
                                <td>{{ $act->achievement }}<br><br></td>
                                <td>{{ $act->category }}</td>
                                <td>{{ $act->level }}</td>
                                <td>{{ $act->merit }}</td>
                                
                                <td></td>
                            </tr>
                            @endforeach
                            
                            
                        </tbody>
                       
                    </table>
                    <td><a  href="activityMore/{{ $stud->matricNo  }}">More Detail</a></td>
                   
            </div>
        </div>
    </div>
</div>
        
            
            
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span></span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/bs-init.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
</body>

</html>