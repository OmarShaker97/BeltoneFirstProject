@extends('layouts.app')


@section('content')

<h1>Edit Post</h1>


<form method="post" action="{{route('posts.update', $post->id)}}">

    {{csrf_field()}}

    <input type="hidden" name="_method" value="PUT">

    <input type="text" name="title" placeholder="Enter title" value="{{$post->title}}">
    
    <input type="submit" name="submit">

</form>

<form method="post" action="{{route('posts.destroy', $post->id)}}">

    {{csrf_field()}}

    <input type="hidden" name="_method" value="DELETE">

    <input type="submit" value="DELETE">

</form>

@endsection