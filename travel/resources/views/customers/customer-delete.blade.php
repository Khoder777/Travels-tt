<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<form id="deleteForm" action="{{ route('destroy', ['id'=>$id]) }}" method="POST">
    @csrf
    <div class="alert alert-danger" role="alert"><center>
      Are you sure you want to delete this customer?</center>
    </div>
    <style>
      a {
          color: white; /* Change color to desired value */
      }
      a:hover {
    color: white;
}
  </style>
    <center><button type="submit" class="btn btn-info text-white"><u>YES</u></button></center><br/>
    <center><button type="submit" class="btn btn-info" ><a href={{ route('index') }}>NO</a></button></center>
    
    
</form>
