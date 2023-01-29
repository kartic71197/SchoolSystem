<!DOCTYPE html>
<html lang="en">
<head>
  <title>Courses Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Welcome</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/admindashboard">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="course">Courses</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="jumbotron text-center">
    <h1>Add New Courses</h1>
        <div class="float-right mr-5">
             <a href="" class="btn btn-success" data-toggle="modal" data-target="#myModal">Create Courses</a>
        </div>
</div>
  

<div class="container-fluid">
  <div class="row">
    <div class="col-2">
      <div class="list-group">
                <a href="#" class="list-group-item">Courses</a>
                <a href="#" class="list-group-item">Students</a>
      </div>
    </div>
   
      <div class="col-10">
        <table class="table">
          <thead class="table-dark">
            <tr>
                    <td>Sno.</td>
                    <td>Course Name</td>
                    <td>Course Code</td>
                    <td>Teahcer Id</td>
                    <td>Edit</td>
                    <td>Delete</td> 
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
                    <a href="javascript:void(0)" class="btn btn-warning showEditModal">Edit</a>
                </td>
                <td>
                  <form action="course/{{$c->id}}" method='POST'>
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
  </div>    
</div>
<!-- Modal -->
<div id="myModal" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
       
      <!-- Modal content-->
      <div class="modal-header">
          <h4 class="modal-title">Add Courses</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="course" method="POST" id="form">
            @csrf
           <div class="form-group">
            <label for="" >Course Name</label>
            <input type="text" class="form-control" name="courseName" id="courseName">
            <span class="text-danger">@error('courseName'){{$message}} @enderror</span>
           </div>
           <div class="form-group">
            <label for="" >Course Code</label>
            <input type="text" class="form-control" name="courseCode" id="courseCode">
            <span class="text-danger">@error('courseCode'){{$message}} @enderror</span>
           </div>
           <div class="form-group">
            <label for="" >Teacher ID</label>
            <input type="text" class="form-control" name="teacherId" id="teacherId">
            <span class="text-danger">@error('teacherId'){{$message}} @enderror</span>
           </div>
           <div class="form-group">
                <input type="submit" class="form-control btn btn-success" value="Add Course" id="submit" >
           </div>

        </form>
       
      </div>
      
    </div>

  </div>
</div>
   

<script>
    $('.showEditModal').click(function(e){

     teacherId = e.target.parentElement.previousElementSibling.innerText
     courseCode = e.target.parentElement.previousElementSibling.previousElementSibling.innerText
     courseName = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.innerText
     id = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText
      $('#id').val(id);
      $('#courseName').val(courseName);
      $('#courseCode').val(courseCode);
      $('#teacherId').val(teacherId);
      $('#submit').val('Edit Course');
      $('.modal-title').text('Save Changes');
      $('form').attr('action','course/'+id)
      $('form').append('<input type="hidden" name="_method" value="PUT">')


        $('#myModal').modal('show');
    })
    </script>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>