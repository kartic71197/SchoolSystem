<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Joined Courses Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
  


<div class="jumbotron text-center">
    <h1>Join Courses</h1>
        <div class="float-right mr-5">
        <a href="" class="btn btn-success" data-toggle="modal" data-target="#myModal">Join Courses</a> 
        </div>
        <div class="float-right mr-5">
        <a href="dashboard" class="btn btn-danger">Back</a>
        </div>

</div>
<div class="modal-body">
                    <form action="" method="" id="form">
                    @csrf
                        <div class="col-10">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <td>Id.</td>
                                        <td>name<td>
                                        <td>Course Name</td>
                                        <td>Course Code</td>
                                        <td>Teacher Id</td>
                                        <td>Delete<td>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($joinedCourses as $j)
                                
                                <tr>
                                <td>{{$j->id}}</td>
                                <td>{{$j->name}}</td>
                                <td>{{$j->courseName}}</td>
                                <td>{{$j->courseCode}}</td>
                                <td>{{$j->teacherId}}</td>
                                <td>
                                <form action="joinedcourses/{{$j->id}}" method='POST'>
                                @method('DELETE')
                                 @csrf
                                <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                                </td>
                                </tr>
                                @endforeach
                               
                                
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
  




<!-- Modal -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
       
            <!-- Modal content-->
                <div class="modal-header">
                    <h4 class="modal-title">Join Courses</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
      
                <div class="modal-body">
                    
                        <div class="col-10-fluid">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <td>Sno.</td>
                                        <td>Course Name</td>
                                        <td>Course Code</td>
                                        <td>Teacher Id</td>
                                        <td>Join</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($course as $c)
                                
                                <form action="joinedcourses" method='POST'>
                                           
                                @csrf
                               
                                    <tr>
                                        <td>
                                            <input type="text" name="courseId" id="courseId" value="{{$c->id}}">
                                        </td>
                                        <td>
                                          
                                            <input type="text" name="courseName" id="courseName" value=" {{$c->courseName}}">
                                        </td>
                                        <td>
                                           
                                            <input type="text" name="courseCode" id="courseCode" value=" {{$c->courseCode}}">
                                        <td>
                                           
                                            <input type="text"  name="teacherId" id="teacherId" value=" {{$c->teacherId}}">
                                        </td>
                                       
                                        <td>                                          
                                            <input type="submit" id="submit" value="Join" class="btn btn-success">
                                        </td>
                                    
                                    </tr>
                                </form>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
   