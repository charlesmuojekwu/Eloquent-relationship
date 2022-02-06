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
            @if (isset($users) || isset($tags) || isset($posts))
        
            <div class="col-6 card mt-5">


                @foreach ( $posts as $post )

                    <h3 > {{ $post->id}} || {{ $post->title}} </h3>
            
                        @foreach ($post->tags as $tag )
                            <p > {{ $tag->name}} || {{( $tag->pivot->created_at )}}</p>
                        @endforeach

                        <p>{{ $post->user->name }}</p>

                @endforeach


                {{-- @foreach ($tags as $tag )

                    <h1>{{ $tag->name }}</h1>

                    @foreach ($tag->posts as $post)
                        <p>{{ $post->title }} </p>
                    @endforeach

                @endforeach --}}
            </div>
            
            @else
                
            <p>The data created</p>
                
            @endif
        </div>
    </div>
    
</body>
</html>