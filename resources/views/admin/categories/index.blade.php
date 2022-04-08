@extends('layouts.admin')

@section('content')
    <div>
        <div>
            <form action={{route('categories.store')}} method="post">
                @csrf
                <div class="form-group">
                  <label for="name" name='name'>Name</label>
                  <input type="text" class="form-control" name='name' id="name" placeholder="Name">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <br><br>
            @include('includes.form_error')
        </div>

        @if ($categories)
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created Date</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $categorie)
                        <tr>
                            <th scope="row">{{$categorie->id}}</th>
                            <td><a href={{route('categories.edit', $categorie->id)}}>{{$categorie->name}}</a></td>
                            <td>{{$categorie->created_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
          
    </div>
    
@endsection