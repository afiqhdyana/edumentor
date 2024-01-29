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
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome5-overrides.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Black-Navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dropdown-search-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header-1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Ludens-Users---25-After-Register.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Pretty-Header.css') }}">
</head>

<body>
    <section class="clean-block clean-form dark h-100">
        <div class="container">
            <div class="block-heading" style="padding-top: 0px;">
                <h2 class="text-primary" style="margin-top: 100px;">Qualification Details&nbsp;<br></h2>
                <p>{{ $stud->studName }}</p>
                <p>{{ $stud->matricNo }}</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                 
                                    <th class="text-secondary" style="border-style: solid;background: var(--purple);">Qualification Description</th>
                                    <th style="background: var(--purple);">Result</th>
                                    <th style="background: var(--purple);">CGPA</th>
                                    <th style="background: var(--purple);">Total Subject</th>
                                    <th style="background: var(--purple);">Year</th>
                                    <th style="background: var(--purple);">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($qualifications as $qualification)
                                  
                                <tr>
                                    <td>{{ $qualification->qualification_desc }}</td>
                                    <td>{{ $qualification->result }}</td>
                                    <td>{{ $qualification->CGPA }}</td>
                                    <td>{{ $qualification->total_subject }}<br><br></td>
                                    <td>{{ $qualification->year }}</td>
                                    
                                    <td><button class="btn btn-primary" type="button">View</button></td>
                                </tr>
                                @endforeach

                                
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col">
                            <nav class="navbar navbar-light navbar-expand-md custom-header">
                                <div class="container-fluid">
                                    <div><a class="navbar-brand" href="#">Qualification&nbsp;<span>Details</span> </a><button class="navbar-toggler" data-bs-toggle="collapse"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                     
                                        <th class="text-secondary" style="border-style: solid;background: var(--purple);">Subject</th>
                                        <th style="background: var(--purple);">Result</th>
                                        <th style="background: var(--purple);">Point</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($qualifications_details as $quali)
                                    <tr>
                                        <td>{{ $quali->subject }}</td>
                                        <td>{{ $quali->result }}</td>
                                        <td>{{ $quali->point }}</td>

                                        
                                        
                                        <td><button class="btn btn-primary" type="button">View</button></td>
                                    </tr>

                                        
                                    @endforeach
                                   
                                        
                                   
                               
                                   
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><a button class="btn btn-primary" href="/studProfile/{{ $stud->matricNo }}" class="btn btn-default">Back</a></button>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/dropdown-search-bs4.js"></script>
    <script src="https://geodata.solutions/includes/countrystate.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>