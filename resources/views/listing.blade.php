
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
{{ Session::get('updation_success') }}
<span style="color: green" id="msg"></span>
<div class="container">
    <h2>Basic Table</h2>
    <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
    <form method="post" action="{{'update'}}">
    <input type="submit" value="delete">
    <table class="table">
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php  foreach ($list as $key=>$values): ?>
        <tr id="hid{{$values->id}}">
            <td><img width="100px" height="100px" src="{{$values->image}}"></td>
            <td>{{$values->name}}</td>
            <td>{{$values->email}}</td>
            <td>{{$values->phone}}</td>
            <td>{{$values->date_created}}</td>
            <td><a href="{{'update?id='.$values->id}}">Edit</a> </td>
            <td><a id="{{$values->id}}" onclick="deleteid(this.id)" href="javascript:void(0)">Delete</a> </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    </form>
    <ul class="pagination">
        {{ $list->links() }}

    </ul>
</div>

</body>
<script>

    function deleteid(str)
    { $('#msg').fadeIn()
        $.ajax({
            type:'get',
            url:'<?php echo url('/delete'); ?>',
            data:{ 'id':str },
            success:function (data) {
                $('#msg').html(data);
                $('#hid'+str).fadeOut('slow');
                setTimeout(function(){$('#msg').fadeOut()},2000)
            },
            error:function (xhr) {
                alert(xhr);
            }
        })
    }

</script>
</html>
