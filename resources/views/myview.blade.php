<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Horizontal form</h2>

    <form enctype="multipart/form-data" class="form-horizontal" method="post" action="">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Name:</label>
            <div class="col-sm-10">
                <input type="file" name="img">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" value="@if(!empty($edit->name)){{$edit->name}} @endif" placeholder="Enter email" name="name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Email:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pwd" value="@if(!empty($edit->email)){{$edit->email}} @endif" placeholder="Enter password" name="email">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Phone:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pwd" value="@if(!empty($edit->phone)){{$edit->phone}} @endif" placeholder="Enter password" name="phone">
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="submit" value="Submit" class="btn btn-default">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
               {{ Session::get('success') }}
            </div>
        </div>
    </form>
</div>

</body>
</html>
