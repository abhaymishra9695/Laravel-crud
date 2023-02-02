<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/parsley.css')}}"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <div class="row">
        <div class="col-md-6 offset-3 mt-5">
            <h3 style="text-align:center">Edit post</h3>
            <a href="{{route('posts.create')}}" class="btn btn-info mb-4">Create Post</a>
            <a href="{{route('posts.index')}}" class="btn btn-info mb-4">Show Post</a>
            @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
             @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
             @endforeach
            </ul>
          </div>
        @endif

        @if(session('update'))
           
            <div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Success!</strong> {{session('update')}}.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form method="post" id="form" action="{{ route('posts.update',$post->id)}}" style="margin-top:35px">
           @csrf
         @method("PUT")
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text"  name="title" class="form-control" id="title" value="{{old('title', $post->title)}}" placeholder="Title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="discription"  class="form-control" id="description" placeholder="Description">{{ old('discription',$post->discription) }}</textarea>
              
            </div>
           
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
  $('#form').parsley();
</script>
</body>
</html>