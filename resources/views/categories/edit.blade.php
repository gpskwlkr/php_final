@extends('layouts.app')

@section('content')
    @if(isset($msg))
        <p>$msg</p>
    @endif

    <form style="padding: 20px;" method="post" enctype="multipart/form-data" action="{{ route("categories.update", $category->id) }}">
        @csrf
        @method("PUT")

        <div class="form-group">
            <label for="name">Name
                <input type="text" class="form-control" id="name" aria-describedby="name" value="{{ $category->name }}">
            </label>
        </div>
        <div class="form-group">
            <label for="enabled">Category status
                <select name="enabled" class="form-control">
                    <option value="1">Enabled</option>
                    <option value="2">Disabled</option>
                </select>
            </label>
        </div>
        <input type="hidden" name="_token"  id='csrf_toKen' value="{{ csrf_toKen() }}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
