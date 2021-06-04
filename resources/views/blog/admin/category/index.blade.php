@extends('layouts.app')
@section('content')

@section('layoutsHead')
<meta name="theme-color" content="#7952b3">
<!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script> -->


<!-- JavaScript Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> -->
@endsection



<!-- main-->

<div class="container-fluid mt-5">
    <div class="row d-flex justify-content-around">
        <div class="col-md-5">

            <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                <a href="{{route('blog.admin.categories.create')}}" class="btn btn-primary">Написати</a>
            </nav>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Категорія</th>
                                <th>Батьківська категорія </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paginator as $item )
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>
                                    <a href="{{route('blog.admin.categories.edit',$item->id)}}">
                                        {{$item->title}}
                                    </a>
                                </td>
                                <td @if (in_array($item->parent_id,[0,1])) style="color:#ccc" @endif>{{$item->parent_id}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-around">
        <div class="col-md-5">
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
</div>

@endsection