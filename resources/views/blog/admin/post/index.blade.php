@extends('layouts.app')
@section('content')

@section('layoutsHead')
<meta name="theme-color" content="#7952b3">
<!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}"></script> -->

<!-- JavaScript Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> -->
@endsection



<!-- main-->

<div class="container-fluid mt-5">
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <a href="{{route('blog.admin.posts.create')}}" class="btn btn-primary">Написати нову статтю</a>
    </nav>

    <div class="row d-flex justify-content-around mt-5">
        <!-- start conteiner -->

        @foreach ($paginator as $post )
        <div class="col-md-2 m-3">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" href="google">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary"></strong>
                    <h4 class="mb-0 ">{{$post->title}}</h4>
                    <div class="mb-1 text-muted">{{$post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d.M.H:i') : ' '}}</div>
                    <p class="card-text mb-auto">ID:{{$post->id}}</p>
                    <a href="{{route('blog.admin.posts.show',$post->id)}}" class="stretched-link">Continue reading</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img " width="20" height="auto" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" @if ($post->is_published) fill="#55595c" @else fill="red" @endif></rect>
                    </svg>
                </div>
            </div>
        </div>
        @endforeach
        <!-- end conteiner -->
        @if ($paginator->total() > $paginator->count())
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{$paginator->links()}}
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>

<!-- end main -->

</div>

@endsection