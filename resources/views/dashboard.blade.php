<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>EduMentor</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/feather/feather.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="{{ asset('assets/js/calander.js') }}"></script>


    <style>
        @media (max-width: 992px) {
            .sidebar {
                display: none;
            }

            .sidebar.active {
                display: block;
            }
        }


        .smaller-heading {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="" class="logo">
                    <img src="assets/img/logo.png" alt="Logo">
                </a>

                <a href="" class="logo logo-small">
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
                                <p class="text-muted mb-0" id="userRole">{{ auth()->user()->role }}</p>
                            </div>
                        </div>
                        <a class="dropdown-item role-item" data-role="personal_advisor">Personal Advisor</a>
                        <a class="dropdown-item role-item" data-role="lecturer">Lecturer</a>
                    </div>

        </div>
        <div id="personalAdvisorContainer">
            <div class="sidebar" id="personalAdvisorSidebar">
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
                                    <h3 class="page-title">Welcome Personal Advisor</h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                        <li class="breadcrumb-item active">Personal</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Total Students</h6>
                                        <h3>{{ $totalStudents }}</h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="assets/img/icons/dash-icon-01.svg" alt="Dashboard Icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Main layout -->
                    <div class="card flex-fill student-space comman-shadow">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="card-title">Students with Academic Problems</h5>
                            <ul class="chart-list-out student-ellips">
                                <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table star-student table-hover table-center table-borderless table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Matric No</th>
                                            <th>Name</th>
                                            <th>Phone Number</th>
                                            <th>Academic Problem</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($problematicStudents as $student)
                                        <tr>
                                            <td class="text-nowrap">
                                                <div>{{ $student->matricNo }}</div>
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="{{ route('studprofile', $student->matricNo) }}">
                                                    {{ $student->studName }}
                                                </a>
                                            </td>
                                            <td class="text-center">{{ $student->phoneNumber }}</td>
                                            <td>
                                                @if ($student->CGPA < 3.0) 
                                                CGPA Results: Below 3.0 
                                                @elseif ($student->muet < 4) 
                                                MUET Results: Below Band 4 @endif </td>
                                            <td class="text-end">
                                                <a type="button" class="btn btn-warning" href="https://wa.me/6{{ $student->phoneNumber }}" target="_blank">Contact</a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="lecturerContainer" style="display: none;">


            <div class="sidebar" id="lecturerSidebar">
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
                                <a href="attendance"><i class="fas fa-graduation-cap"></i> <span>Attendance</span></a>
                            </li>
                            <li>
                                <a href="notices"><i class="fas fa-graduation-cap"></i> <span>Notice</span></a>
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
                                    <h3 class="page-title">Welcome!</h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                        <li class="breadcrumb-item active">Personal</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>

            </div>
        </div>
        </li>
        </ul>
    </div>

    <footer>
        <p>Universiti Pendidikan Sultan Idris</p>
    </footer>

    <script>
        $(document).ready(function() {
            console.log('Document is ready');

            $('.role-item').on('click', function() {
                console.log('Role item clicked');

                var selectedRole = $(this).data('role');
                console.log(selectedRole);

                // Update the userRole element
                $('#userRole').text(selectedRole);

                // Show/hide containers based on the selected role
                if (selectedRole === 'personal_advisor') {
                    $('#personalAdvisorContainer').show();
                    $('#lecturerContainer').hide();
                    $('#personalAdvisorSidebar').show();
                    $('#lecturerSidebar').hide();
                } else if (selectedRole === 'lecturer') {
                    $('#personalAdvisorContainer').hide();
                    $('#lecturerContainer').show();
                    $('#personalAdvisorSidebar').hide();
                    $('#lecturerSidebar').show();
                }
            });

            // Initial check to set the sidebar state based on the initial role
            var initialRole = $('#userRole').text().trim();
            if (initialRole === 'lecturer') {
                $('#personalAdvisorSidebar').hide();
                $('#lecturerSidebar').show();
            } else {
                $('#personalAdvisorSidebar').show();
                $('#lecturerSidebar').hide();
            }

            // Handle sidebar toggle button click
            $('#toggle_btn').click(function() {
                $('#personalAdvisorSidebar').toggle();
                $('#lecturerSidebar').toggle();
            });
        });
    </script>


    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script src="{{ asset('assets/plugins/simple-calendar/jquery.simple-calendar.js') }}"></script>
    <script src="{{ asset('assets/js/calander.js') }}"></script>
    <script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>

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


    <!-- <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var calendarEl = document.getElementById('calendar-doctor');

                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        // Configure your calendar options here
                        plugins: ['dayGrid'],
                        events: [
                            // Add your calendar events here

                            // Add more events as needed
                        ]
                    });

                    calendar.render();
                });
            </script>-->





</body>

</html>