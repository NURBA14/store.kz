@extends('admin.layouts.layout')

@section('title')
    Categories
@endsection


@section('header')
    Categories list
@endsection


@section('content')
    @include('admin.layouts.success')
    @include('admin.layouts.error')
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Categories list</h4>
                    </div>
                    <div class="card-content">
                        @if ($categories)
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Post count</th>
                                            <th>Created at</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td class="text-success">{{ $category->slug }}</td>
                                                <td>{{ $category->products_count }}</td>
                                                <td>{{ $category->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('categories.edit', ['category' => $category->id]) }}">
                                                        <button type="button" class="btn btn-sm btn-warning"><i
                                                                class="bi bi-pencil-square"></i></button>
                                                    </a>
                                                    <form
                                                        action="{{ route('categories.destroy', ['category' => $category->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Confirm the deletion')"
                                                            class="btn btn-sm btn-danger"><i
                                                                class="bi bi-trash3-fill"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
