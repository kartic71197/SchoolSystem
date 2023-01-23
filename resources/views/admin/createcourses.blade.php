<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Auth</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <h4>Create here</h4>
                <hr>
<form action="{{route('course-created')}}" method="post">
@if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    @if(Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
    @endif
@csrf
<div class="form-group">
             <label for="courseName">Course Name</label>
             <input type='text' class="form-control" placeholder="Enter Course Name" name="courseName" value="{{old('CourseName')}}">
             <span class="text-danger">@error('courseName'){{$message}} @enderror</span>
        </div>
        <div class="form-group">
             <label for="courseCode">Course Id</label>
             <input type='text' class="form-control" placeholder="Enter Course Id" name="courseCode" value="{{old('courseCode')}}">
             <span class="text-danger">@error('courseCode'){{$message}} @enderror</span>
        </div>
        <br>
        <div class="form-group">
            <button class="btn btn-block btn-primary" type="submit">Enter</button>
        </div>
        <br>
        <a href="/admindashboard">Back to Dashboard</a>

    </form>
    

    </body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>