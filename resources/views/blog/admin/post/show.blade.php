@extends('layouts.app')
@section('layoutsHead')
<style>
    #w {
        border-radius: 50px;
    }
</style>
@endsection

@section('content')





<div class="container d-flex h-100 text-center text-white bg-dark mt-5" id="w">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h3 class="float-md-start mb-0">{{$item->title}}</h3>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <strong><a class="nav-link active" aria-current="page" href="{{route('blog.admin.posts.edit',$item->id)}}">Edit</a></strong>
                </nav>
            </div>
        </header>

        <main class="px-3">
            <h5>{{$item->excerpt}}</h5>
            <h5>Категорія статті: {{$item->category->title}}</h5>
            <textarea class=" container lead mt-4 mb-5 " id="w" placeholder="Text...">{{$item->text}}</textarea>


        </main>

        <footer class="mt-auto text-white-50">
            <h5>Автор статті: {{$item->user->name}}</h5>
            <p>{{$item->published_at ? \Carbon\Carbon::parse($item->published_at)->format('d.M.H:i') : ' '}}</p>
        </footer>
    </div>
</div>




@endsection