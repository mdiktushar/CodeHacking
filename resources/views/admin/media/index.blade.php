@extends('layouts.admin')
@section('content')
    <div>
        @if ($photos)
        {{-- <form action={{route('delete.media')}} method="post">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <select class="form-control" name="checkBoxArray" id="">
                    <option value="delete">Delete</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary">
            </div> --}}

            <table class="table table-striped">
                <thead>
                <tr>
                    <th><input type="checkbox" name="" id="options"></th>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($photos as $photo)
                        <tr>
                            <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" id="" value={{$photo->id}}></td>
                            <td scope="row">{{$photo->id}}</td>
                            <td>
                                <a href={{route('media.show', $photo->id)}}>
                                    <img src={{$photo->file}} alt="" srcset="" height="100" width="100">
                                </a>
                            </td>
                            <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No date'}}</td>
                            <td>
                                <form action={{route('media.destroy', $photo->id)}} method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        {{-- </form> --}}
        @endif
    </div> 
    
   
@endsection

@section('scripts')
    {{-- <script>
        $(document).ready(function() {
            $('#options').click(function(){
                if(this.checked) {
                    $('.checkBoxes').each(function(){
                        this.checked = true;
                    })
                } else {
                    $('.checkBoxes').each(function(){
                        this.checked = false;
                    })
                }
            })
        })

    </script> --}}
@endsection