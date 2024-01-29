<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/icons/flags/flags.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

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
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            <div class="page-sub-header">
                                <h3 class="page-title">Financial Details</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/studProfile/{{ $stud->matricNo }}">Student</a></li>
                                    <li class="breadcrumb-item active">Financial Details</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <!--content goes here -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card comman-shadow">
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title student-info">Financial Details <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name" style="font-weight: bold;">Bank Name <span class="login-danger">*</span></label>
                                                <input class="form-control" id="name" placeholder="{{ $financials->bank_name }}" name="name" readonly/>
                                            </div>

                                            <div class="form-group">
                                                <label for="name" style="font-weight: bold;">Bank Account <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" id="name" placeholder="{{ $financials->bank_acc }}" name="name" readonly />
                                            </div>

                                        </div>
                                        <div class="col-12">
                                            <h5 class="form-title student-info">Financial Details <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th>Sponsor ID</th>
                                                        <th>Date Offered</th>
                                                        <th>Date Terminated</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($sponsor as $sponsors)
                                                    <tr>
                                                        <td>{{ $sponsors->id }}</td>
                                                        <td>{{ $sponsors->sponsor_id }}</td>
                                                        <td>{{ $sponsors->dateOffer }}</td>
                                                        <td>{{ $sponsors->dateTerminate }}</td>
                                                        <td>{{ $sponsors->status }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <br>
                                  
                                    </div>

                                    <br>
                                        <br>


                                        <td class="center">
                                            <a class="btn btn-primary " role="button" href="/studProfile/{{ $stud->matricNo }}" style="font-size: smaller;">Back</a>
                                        </td>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

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