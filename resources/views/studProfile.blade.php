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
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
                </a>
                <a href="index.html" class="logo logo-small">
                    <img src="{{ asset('assets/img/logo-small.png') }}" alt="Logo" width="30" height="30">
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
                    <a href="{{ url('dashboard') }}"><i class="feather-grid"></i> <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="{{ url('studInfo') }}"><i class="fas fa-graduation-cap"></i> <span>Student List</span></a>
                </li>
                <li>
                    <a href="{{ url('/') }}"><i class="fas fa-clipboard-list"></i> <span>Log Out</span></a>
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

                <td class="text-center">
                                <a class="btn btn-primary" role="button" href="{{ url('studInfo') }}">Back</a>
                            </td>
        </div>

                <!-- Main layout -->
                <main style="margin-top: 20px;">
                    <div class="container">
                        <!-- Student Profile Content -->
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <!-- Student Card and Relative Information -->
                                <div class="card mb-3">
                                    <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="{{ asset('assets/img/women.png') }}" width="160" height="160">
                                        <p>{{ $stud->studName }}</p>
                                        <div class="mb-3"><a class="btn btn-warning btn-sm" role="button" href="/studPerformance?matricNo={{ $stud->matricNo  }}&semester=A192" style="width: 155.766px;">View Performance</a></div>
                                       
                                    </div>
                                    <br>

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
                                            </div>
                                            <td class="text-center">
                                                <a class="btn btn-primary" role="button" href="relativesMore/{{ $stud->matricNo  }}">More Detail</a>
                                            </td>
                                        </div>
                                    </div>
                                </div>


                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow mb-3">
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

                                                    <td class="text-center">
                                                        <a class="btn btn-primary" role="button" href="moreDetail/{{ $stud->matricNo  }}">More Detail</a>
                                                    </td>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="card shadow mb-3">
                                            <div class="card-header py-3">
                                                <p class="text-warning m-0 fw-bold">Contact Information</p>
                                            </div>

                                            <div class="card-body">

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

                                                    <td class="text-center">
                                                        <a class="btn btn-primary" role="button" href="contactMore/{{ $stud->matricNo  }}">More Detail</a>
                                                    </td>
                                                </form>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="card shadow">

                                            <div class="card-header py-3" style="height: 53px;">
                                                <p class="text-warning m-0 fw-bold">Co-Curiculum</p>
                                            </div>
                                            <div class="card-body">
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
                                                    </div>

                                                    <td class="text-center">
                                                        <a class="btn btn-primary" role="button" href="coCuriculum/{{ $stud->matricNo  }}">More Detail</a>
                                                    </td>
                                            </div>
                                            </form>
                                        </div>


                                        <br>
                                        <div class="card shadow">
                                            <div class="card-header py-3">
                                                <p class="text-warning m-0 fw-bold">Financial</p>
                                            </div>
                                            <div class="card-body">
                                                <form>

                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="city"><strong>Bank Name</strong></label><input class="form-control" type="text" id="city" placeholder={{ $financials->bank_name }} name="city"></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="country"><strong>Bank Account</strong><br></label><input class="form-control" type="text" id="country" placeholder={{ $financials->bank_acc }} name="country"></div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">

                                                        <td class="text-center">
                                                            <a class="btn btn-primary" role="button" href="financialMore/{{ $stud->matricNo  }}">More Detail</a>
                                                        </td>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>

                                        <div class="card shadow">
                                            <div class="card-header py-3">
                                                <p class="text-warning m-0 fw-bold">Qualification</p>
                                            </div>
                                            <div class="card-body">

                                            </div>

                                            <div class="card-body">
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

                                                    <td class="text-center">
                                                        <a class="btn btn-primary" role="button" href="qualificationMore/{{ $stud->matricNo  }}">More Detail</a>
                                                    </td>
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="row">
                                            <div class="card shadow">
                                                <div class="card-header py-3">
                                                    <p class="text-warning m-0 fw-bold">Activity</p>
                                                </div>

                                                <div class="card-body">
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

                                                        <td class="text-center">
                                                            <a class="btn btn-primary" role="button" href="activityMore/{{ $stud->matricNo  }}">More Detail</a>
                                                        </td>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>





                            </div>
                        </div>
                    </div>

                </main>
            </div>
        </div>

    </div>

    <footer>
        <p>Universiti Pendidikan Sultan Idris</p>
    </footer>
    </div>
    </div>
    </div>
    </div>
    </div>


    </div>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <!-- Feather Icons -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/feather/feather.css') }}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">






    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

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

</body>

</html>