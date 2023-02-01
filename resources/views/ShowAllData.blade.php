


<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Admin Dashboard For Student Data</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <style>
          body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
          body {font-size:16px;}
          .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
          .w3-half img:hover{opacity:1}
        </style>
    </head>

    <body>
    <!-- Sidebar/menu -->
        <nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
          <div class="w3-container">
              <h3 class="w3-padding-64"><b>Welcome<br>Admin</b></h3>
          </div>
    
          <div class="w3-bar-block">
            <a href="/"  class="w3-bar-item w3-button w3-hover-white">Home</a> 
            <a href="course" class="w3-bar-item w3-button w3-hover-white">Create Course</a> 
            <a href="showstudents"  class="w3-bar-item w3-button w3-hover-white">View Students</a> 
            <a href="/adminlogout"  class="w3-bar-item w3-button w3-hover-white">Logout</a> 
          </div>
        </nav>

    <!-- !PAGE CONTENT! -->
          <div class="w3-main" style="margin-left:340px;margin-right:40px">

    <!-- Header -->
    <div class="w3-container" style="margin-top:80px" id="showcase">
      <h1 class="w3-jumbo"><b></b></h1>
    </div>
  
    <!-- List of all the courses-->
    <div class="container mt-3">    
   
      <table class="table">
        <thead class="table-dark">
          <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Course Name</td>
            <td>Course Code</td>
            <td>Teacher Id</td>
            <td>REMOVE</td>
          </tr>
        </thead>
        <tbody>
          @foreach($joinedCourses as $j)
          @csrf
          <tr>
            <td>{{$j['id']}}</td>
            <td>{{$j['name']}}</td>
            <td>{{$j->courseName}}</td>
            <td>{{$j->courseCode}}</td>
            <td>{{$j->teacherId}}</td>
            <td><a href={{"delete/".$j['id'] }} class="btn btn-danger">Remove Student</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>


