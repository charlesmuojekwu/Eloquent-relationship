<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>View Document</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            @if (isset($users) || isset($addresses))
        
            <div class="col-6 card">
                {{-- @foreach ($users as $user )
                   <h3 > {{ $user->name}} || {{ $user->email}} </h3>
                   <p > {{ $user->address->country}} || </p>
                @endforeach --}}

                @foreach ($addresses as $address )
                    <h3 > {{ $address->user->name}} || {{ $address->user->email}} </h3>
                    <p > {{ $address->country}} || </p>
                @endforeach
            </div>
            
            @else
                
            <p>The Users and address relationship data created</p>
                
            @endif
        </div>
    </div>
    
</body>
</html>