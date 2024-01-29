


<style>
    /*	
      Table Responsive
      ===================
      Author: https://github.com/pablorgarcia
   */
  
  @charset "UTF-8";
  @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);
  @import url(https://fonts.googleapis.com/css?family=Open+Sans);
@import url(https://fonts.googleapis.com/css?family=Bree+Serif);
@import url(https://fonts.googleapis.com/css?family=Ubuntu:400,700);
@import url(https://weloveiconfonts.com/api/?family=entypo|fontawesome|zocial);

  
  
  body {
    font-family: 'Open Sans', sans-serif;
    font-weight: 300;
    line-height: 1.42em;
    color:#A7A1AE;
    background-color:#1F2739;
  }
  
  h1 {
    font-size:3em; 
    font-weight: 100;
    line-height:0em;
    text-align: center;
    color: #4DC3FA;
  }
  
  h2 {
    font-size:1em; 
    font-weight: 300;
    text-align: center;
    display: block;
    line-height:0em;
    padding-bottom: 1em;
    color: #FB667A;
  }
  
  h2 a {
    font-weight: 700;
    text-transform: uppercase;
    color: #FB667A;
    text-decoration: none;
  }
  
  .blue { color: #185875; }
  .yellow { color: #FFF842; }
  
  .container th h1 {
        font-weight: bold;
        font-size: 1em;
    text-align: center;
    color: #185875;
  }
  
  .container td {
        font-weight: normal;
        font-size: 1em;
    -webkit-box-shadow: 0 2px 2px -2px #0E1119;
         -moz-box-shadow: 0 2px 2px -2px #0E1119;
              box-shadow: 0 2px 2px -2px #0E1119;
  }
  
  .container {
        text-align: center;
        overflow: hidden;
        width: 80%;
        
        margin: 0 auto;
    display: table;
    padding: 0 0 8em 0;
  }
  
  .container td, .container th {
        padding-bottom: 2%;
        padding-top: 2%;
    padding-left:2%;  
  }
  
  /* Background-color of the odd rows */
  .container tr:nth-child(odd) {
        background-color: #323C50;
  }
  
  /* Background-color of the even rows */
  .container tr:nth-child(even) {
        background-color: #2C3446;
  }
  
  .container th {
        background-color: #1F2739;
  }
  
  .container td:first-child { color: #FB667A; }
  
  .container tr:hover {
     background-color: #464A52;
  -webkit-box-shadow: 0 6px 6px -6px #0E1119;
         -moz-box-shadow: 0 6px 6px -6px #0E1119;
              box-shadow: 0 6px 6px -6px #0E1119;
  }
  
  .container td:hover {
    background-color: #FFF842;
    color: #403E10;
    font-weight: bold;
    
    box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
    transform: translate3d(6px, -6px, 0);
    
    transition-delay: 0s;
        transition-duration: 0.4s;
        transition-property: all;
    transition-timing-function: line;
  }
  
  @media (max-width: 800px) {
  .container td:nth-child(4),
  .container th:nth-child(4) { display: none; }
  }
 
  * {
  	margin: 0; 
		padding: 0;
		box-sizing: border-box;
	}

  body {
		padding: 10px; 
		font-family: "Helvetica Neue", helvetica, arial; 
		
	}

  #container {
		position: relative;
		width: 100%;		
	}
  #container:after {
		content: "";
		display: block;
		clear: both;
		height: 0;
	}

  #menu {
		position: relative;
		float: left;
		width: 40%;
		padding: 0 10px;
		border-radius: 3px;
		box-shadow: inset 0 1px 1px rgba(255,255,255,.5), inset 0 -1px 0 rgba(0,0,0,.15), 0 1px 3px rgba(0,0,0,.15);
		background: rgba(204, 204, 204, 0.699); 
	}

	#menu, #menu ul {
		list-style: none;
	}

	#menu > li {
		float: left;
		position: relative;
		border-right: 1px solid rgba(0,0,0,.1);
		box-shadow: 1px 0 0 rgba(255,255,255,.25);
		perspective: 1000px;
		
	}

	#menu > li:first-child {
		border-left: 1px solid rgba(255,255,255,.25);
		box-shadow: -1px 0 0 rgba(0,0,0,.1), 1px 0 0 rgba(255,255,255,.25);
	}

	#menu a {
		display: block;
		position: relative;
		z-index: 10;
		padding: 13px 20px 13px 20px;
		text-decoration: none;
		color: rgba(75,75,75,1);
		line-height: 1;
		font-weight: 600;
		font-size: 12px;
		letter-spacing: -.05em;
		background: transparent;		
		text-shadow: 0 1px 1px rgba(255,255,255,.9);
		transition: all .25s ease-in-out;
	
	}

	#menu > li:hover > a {
		background: #333;
		color: rgba(0,223,252,1);
		text-shadow: none;
	}

	#menu li ul  {
		position: absolute;
		left: 0;
		z-index: 1;
		width: 100px;
		padding: 0;
		opacity: 0;
		visibility: hidden;
		border-bottom-left-radius: 4px;
		border-bottom-right-radius: 4px;
		background: transparent;
		overflow: hidden;
		transform-origin: 50% 0%;
	}


	#menu li:hover ul {
		
		padding: 15px 0;
		background: #333;
		opacity: 1;
		visibility: visible;
		box-shadow: 1px 1px 7px rgba(0,0,0,.5);
		animation-name: swingdown;
		animation-duration: 1s;
		animation-timing-function: ease;

	}

	@keyframes swingdown {
		0% {
			opacity: .99999;
			transform: rotateX(90deg);
		}

		30% {			
			transform: rotateX(-20deg) rotateY(5deg);
			animation-timing-function: ease-in-out;
		}

		65% {
			transform: rotateX(20deg) rotateY(-3deg);
			animation-timing-function: ease-in-out;
		}

		100% {
			transform: rotateX(0);
			animation-timing-function: ease-in-out;
		}
	}

	#menu li li a {
		padding-left: 15px;
		font-weight: 400;
		color: #ddd;
		text-shadow: none;
		border-top: dotted 1px transparent;
		border-bottom: dotted 1px transparent;
		transition: all .15s linear;
	}

	#menu li li a:hover {
		color: rgba(0,223,252,1);
		border-top: dotted 1px rgba(255,255,255,.15);
		border-bottom: dotted 1px rgba(255,255,255,.15);
		background: rgba(0,223,252,.02);
	}

  body {
  font-family: 'Open Sans', sans-serif;
  font-size:14px;
}
.btn-default {
color: #333;
background-color: #fff;
border-color: #ccc;
}

.btn {
display: inline-block;
padding: 6px 12px;
margin-bottom: 0;
font-size: 14px;
font-weight: 400;
line-height: 1.42857143;
text-align: center;
white-space: nowrap;
vertical-align: middle;
cursor: pointer;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
background-image: none;
border: 1px solid transparent;
border-radius: 4px;
}

#page-content-wrapper {
width: 100%;
padding: 15px;
}

#page-content-wrapper {
padding: 20px;
}

.sidebar {
  list-style-type:none;
  background-color:rgb(51, 51, 51);
  width:230px;
  height:100%;
  top:0;
  bottom:0;
  left:0;
  text-align:left;
  position: absolute;
  margin: 0;
  padding: 0;
  list-style: none;
  transition:1s ease;
}

.sidebar a {
  text-decoration:none;
  color:white;
  transition:1s ease;
}

.sidebar li {
  text-indent: 20px;
  line-height: 40px;
  transition:0.5s ease;
}

.sidebar li:hover {
  background-color:#777;
  cursor:pointer;
  text-indent: 30px;
}

.sidebar > .sidebar-brand {
height: 65px;
font-size: 18px;
line-height: 60px;
}


  </style>

  
<div id="container">
  <nav>
    
    
  </nav>
  <br>
  <br>
  <br>

</div>

<h1><span class="blue"></span>Student<span class="blue"></span> <span class="yellow">List</span></h1>
<br>
<br>
<br>
<html>
<head>
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  
</head>
<body>
  
  </header>
  <center>
  <table style="margin-left: 100px;">
    <td>
      
          <meta charset="utf-8">
          <title>Sidebar</title>
          <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
        </head>
        <body>
          <ul class="sidebar">
            <li class="sidebar-brand"><a href="">My Osmas System</a></li>
            <li><a href="dashboard">Dashboard</a></li>
            <li><a href="studInfo">Student Info</a></li>
       
            <li><a href="/">Logout</a></li>
            </ul>
        </body>
      
                 
    </td>
    <td style="width : 80vw;">
        <table class="container">
            <thead>
              <tr>
                <th><h1>ID</h1></th>
                <th><h1>Matric No</h1></th>
                <th><h1>Student Name</h1></th>
                <th><h1>Semester</h1></th>
                <th><h1>CGPA</h1></th>
                <th><h1>Action</h1></th>
              </tr>
            </thead>
          
              @foreach ( $students as $stud )
              <tr>
               
                <td>{{ $stud->id }}</td>
                <td>{{ $stud->matricNo }}</td>
                <td>{{ $stud->studName }}</td>
                <td>{{ $stud->semester }}</td>
                <td>{{ $stud->CGPA}}</td>
                <td class="text-center"><a class="btn btn-primary" role="button" href="studProfile/{{ $stud->matricNo  }}">View Profile</a></td>
                  <td class="text-center"><a class="btn btn-primary" role="button" href="/studInfo/resultMore/{{ $stud->matricNo  }}">View Result</a></td>
              </tr>
              @endforeach
             
            </tbody>
          </table>
        </td>
    </table>
  </center>

  
</html>


    
 
