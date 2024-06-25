<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Uploader</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <h2>Image Uploader</h2>

 <div class="row">

    <form class="form form-group col-md-6 border border-success rounded" action="{{route('image.upload')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <input type="file" name="image" id="image" class="form-control">
        <div class="col-md-6">
    <button type="submit" class="btn btn-outline-success text-danger">Upload</button>
    </div>
    </form>

   @if($message=Session::get('success'))  <!-- @if(session()->has('success')) -->
     <div class="alert alert-success">
        <strong>{{$message}}</strong>
     </div>
     <img src="images/{{Session::get('imagename')}}" style="width:100px height-100px" alt="image">
    @endif
 </div>
</div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>