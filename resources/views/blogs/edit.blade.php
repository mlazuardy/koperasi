@extends('layouts.app')
@section('content')
    <div class="margin-30">
        <form action="{{url("blog/$blog->uuid")}}" method="post">
            <div class="form-group">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <label for="title">title {{$blog->title}}</label>
                <input type="text" name="title" value="{{$blog->title}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="" cols="30" rows="10" class="form-control">{{$blog->body}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>    
        </form>        
    </div>
@endsection