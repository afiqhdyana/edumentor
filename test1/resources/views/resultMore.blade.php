<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>UI Latest</title>
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
                <ul class="list-group">
                    <li class="list-group-item"><span></span></li>
                </ul>
                <div class="dropdown"><a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" href="#"></a>
                    <div class="dropdown-menu"><a class="dropdown-item" href="#">First Item</a><a class="dropdown-item" href="#">Second Item</a><a class="dropdown-item" href="#">Third Item</a></div>
                </div>
                <div class="dropdown">
                    <div class="dropdown-menu"><input type="text" class="form-control dropdown-search-input" placeholder="Search.."><a class="dropdown-item" href="#">Angular</a><a class="dropdown-item" href="#">Java</a><a class="dropdown-item" href="#">JavaScript</a></div>
                </div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                           
                                <nav class="navbar navbar-light navbar-expand-md custom-header">
                                    <div class="container-fluid">
                                        <div><a class="navbar-brand" href="#"><span>Result Information</span> </a><button class="navbar-toggler" data-bs-toggle="collapse"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="color: var(--gray-dark);background: var(--purple);">Semester</th>
                                        <th style="background: var(--purple);color: var(--dark);">Desc</th>
                                        <th style="background: var(--purple);color: var(--dark);">Status</th>
                                        <th style="background: var(--purple);color: var(--dark);">KRSL</th>
                                        <th style="background: var(--purple);color: var(--dark);">GPA</th>
                                        <th style="background: var(--purple);color: var(--dark);">KRKL</th>
                                        <th style="background: var(--purple);color: var(--dark);">CGPA</th>
                                        <th style="background: var(--purple);color: var(--dark);">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $results)
                                        
                                  
                                    <tr>
                                        <td>{{ $results->semester }}</td>
                                        <td>{{ $results->description }}</td>
                                        <td>{{ $results->status }}</td>
                                        <td>{{ $results->KRSL }}</td>
                                        <td>{{ $results->GPA }}</td>
                                        <td>{{ $results->KRKL }}</td>
                                        <td>{{ $results->CGPA }}</td>
                                        <td class="text-center"><a class="btn btn-primary" role="button" href="/moremoreResults?matricNo={{ $stud->matricNo }}&semester={{ $results->semester }}">View</a></td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <nav class="navbar navbar-light navbar-expand-md custom-header">
                            <div class="container-fluid">
                                <div><a class="navbar-brand" href="#"><span>Result Detail</span> </a><button class="navbar-toggler" data-bs-toggle="collapse"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="color: var(--gray-dark);background: var(--purple);">Course</th>
                                        
                                        <th style="background: var(--purple);color: var(--dark);">Grade</th>
                                        <th style="background: var(--purple);color: var(--dark);">Point</th>
                                       
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        
                                   
                                    <tr>
                                        <td></td>
                                      
                                        <td><p id='3'></p></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                  
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/dropdown-search-bs4.js"></script>
    <script src="https://geodata.solutions/includes/countrystate.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>