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
                            <img class="rounded-circle" src="public/assets/img/profiles/avatar-01.png" width="31" alt="User">
                            <div class="user-text">
                                <h6>{{ auth()->user()->name }}</h6>
                                <p class="text-muted mb-0">Personal Advisor</p>
                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="public/assets/img/profiles/avatar-01.png" alt="User Image" class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6>{{ auth()->user()->name }}</h6>
                                <p class="text-muted mb-0">Personal Advisor</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="profile.html">My Profile</a>
                        <a class="dropdown-item" href="inbox.html">Inbox</a>
                        <a class="dropdown-item" href="/login">Logout</a>
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
                                <h3 class="page-title">Add Result</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/studProfile/{{ $stud->matricNo }}">Student</a></li>
                                    <li class="breadcrumb-item active">Add Result</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Student Result</h3>
                    <div class="row mb-3">
                        <div class="col-lg-8">
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
                        </div>
                    </div>
                    <div class="card shadow mb-3" style="width: 1121px;">
                        <div class="card-header py-3">
                           
                            
                        </div>
                        <div class="card-body">
                            <form id="addGrade_form" method="POST" action="/terima">
                                @csrf
                                <input type="text" name="matricNo" value="{{ $matricNo }}" style="display : none;"/>
                                <div class="mb-3"><label class="form-label" for="class"><strong>Semester</strong><br></label>
                                    <select name="semester" class="form-select">
                                    <optgroup label="This is a group">
                                        <option value="0" selected disabled>Select Semester</option>
                                        @foreach ($sem as $list)
                                        <option value={{ $list->semester }}>{{ $list->semester  }}</option>
                                        @endforeach
                                        
                                    </optgroup>
                                </select></div>
                                <button class="btn btn-dark float-right " onclick="add_more_field()">Add More+</button>  
                                <div class="row">
                                    <div class="col">
                                        
                                        <div class="mb-3"><label class="form-label" for="booktitle"><strong>Course</strong><br></label>
                                            <select name="course0" class="form-select">
                                                <optgroup label="This is a group">
                                                    <option value="null" selected="">Select Course</option>
                                                    <option value="HNS3192">HNS3192</option>
                                                    <option value="KPF3012">KPF3012</option>
                                                    <option value="MTK3013">MTK3013</option>
                                                    <option value="MTN3063">MTN3063</option>
                                                    <option value="MTS3013">MTS3013</option>
                                                    <option value="PPI3012">PPI3012</option>
                                                    <option value="CMP2011">CMP2011</option>
                                                    <option value="BMW3032">BMW3032</option>
                                                    <option value="CUP2011">CUP2011</option>
                                                    <option value="HNH3182">HNH3182</option>
                                                    <option value="KPS3014">KPS3014</option>
                                                    <option value="MMG3033">MMG3033</option>
                                                    <option value="MTD3033">MTD3033</option>
                                                    <option value="MTS3023">MTS3023</option>
                                                    

                                                </optgroup>
                                            </select></div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="class"><strong>Grade</strong><br></label>
                                            <select name="grade0" class="form-select">
                                            <optgroup label="This is a group">
                                                <option value="null" selected="">Select Grade</option>
                                                <option value="A">A</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B">B</option>
                                                <option value="B-">B-</option>
                                                <option value="C+">C+</option>
                                                <option value="C">C</option>
                                                <option value="D+">D+</option>
                                                <option value="D">D</option>
                                                <option value="F">F</option>
                                            </optgroup>
                                        </select></div>
                                </div>
                              
                                                
                               
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3"><button class="btn btn-danger btn-sm" type="submit" onclick="myFunction()" style="margin: 10px;">Add Information</button></div>
           
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>
        <script src="{{ asset('assets/js/script.js') }}"></script>
   
    <script>var count=1;
        function add_more_field(){
            count+=1
            html='<div class="row'+count+'">\
            <div class="col'+count+'">\
                <div class="mb-3"><label class="form-label" for="class"><strong>Category</strong><br></label><select name="course'+count+'" class="form-select">\
                    <optgroup label="This is a group">\
                        <option value="12" selected="">Select Course</option>\
                        <option value="HNS3192">HNS3192</option>\
                                                    <option value="KPF3012">KPF3012</option>\
                                                    <option value="MTK3013">MTK3013</option>\
                                                    <option value="MTN3063">MTN3063</option>\
                                                    <option value="MTS3013">MTS3013</option>\
                                                    <option value="PPI3012">PPI3012</option>\
                                                    <option value="CMP2011">CMP2011</option>\
                                                    <option value="BMW3032">BMW3032</option>\
                                                    <option value="CUP2011">CUP2011</option>\
                                                    <option value="HNH3182">HNH3182</option>\
                                                    <option value="KPS3014">KPS3014</option>\
                                                    <option value="MMG3033">MMG3033</option>\
                                                    <option value="MTD3033">MTD3033</option>\
                                                    <option value="MTS3023">MTS3023</option>\
                    </optgroup>\
                </select></div>\
            </div>\
            <div class="row">\
            <div class="col">\
                <div class="mb-3"><label class="form-label" for="class"><strong>Category</strong><br></label><select name="grade'+count+'" class="form-select">\
                    <optgroup label="This is a group">\
                        <option value="12" selected="">Select Grade</option>\
                                                <option value="A">A</option>\
                                                <option value="A-">A-</option>\
                                                <option value="B+">B+</option>\
                                                <option value="B">B</option>\
                                                <option value="B-">B-</option>\
                                                <option value="C+">C+</option>\
                                                <option value="C">C</option>\
                                                <option value="D+">D+</option>\
                                                <option value="D">D</option>\
                                                <option value="F">F</option>\
                    </optgroup>\
                </select></div>\
        </div>'
        
        var form=document.getElementById('addGrade_form')
        form.innerHTML+=html
        }</script>
        <script>
            function myFunction() {
  document.getElementById("addGrade_form").submit();
}
        </script>



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
    