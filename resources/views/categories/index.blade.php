@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Enabled</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->enabled ? "Enabled" : "Disabled" }}</td>
                    <td>
                        <form>
                            <button class="btn btn-primary" formaction="{{ route('categories.edit', ['id' => $category->id]) }}">Edit</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
