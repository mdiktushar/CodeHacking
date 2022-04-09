@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.6/dropzone.min.css">
@endsection

@section('content')
    <h1>Upload Media</h1>
    <form class="dropzone" action={{route('media.store')}} method="post">
        @csrf
    </form>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.6/dropzone.min.js"></script>    
@endsection