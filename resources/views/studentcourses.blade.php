<!DOCTYPE html>
<html lang="en">
<head>
  <title>Studen Joined Courses Page</title>
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
        <a href="dashboard" class="btn btn-danger">Cancel</a>
        </div>

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
                    <form action="joinedcourse" method="POST" id="form">
                    @csrf
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
                                    <tr>
                                        <td>{{$c->id}}</td>
                                        <td>{{$c->courseName}}</td>
                                        <td>{{$c->courseCode}}</td>
                                        <td>{{$c->teacherId}}</td>               
                                        <td>
                                            <form action="course{{$c->id}}" method='GET'>
                                            @csrf
                                            <input type="submit" value="Join" class="btn btn-success">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
   