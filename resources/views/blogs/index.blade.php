@extends('layouts.app')
@section('content')
    <section class="blog-index margin-30">
        <div id="blog-index-redux"></div>
    </section>
{{--  
    <form action="/blog" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" >
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <input type="text" name="body" >
        </div>
        <button type="submit" class="btn btn-primary">Button</button>
    </form>  --}}
@endsection