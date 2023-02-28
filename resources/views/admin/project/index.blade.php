@extends('admin.layouts.main')
@section('content')
    <!-- main content -->
    <div class="container mt-3 mb-3">
        <div class="card">
            <div class="card-body">
                <h1 class="card-head">Project List</h1>
                <a href="/panel/projects/create" class="btn btn-primary float-right mb-3 rounded-pill px-3">Add new
                    Projects</a>
                <table class="table table-bordered mt-3" id="rundownTable">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Projects Name</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->project_title }}</td>
                                <td class="d-flex">
                                    <a href="/panel/projects/{{ $data->id }}/edit" class="btn btn-info mr-2">Edit</a>
                                    <form action="/panel/projects/{{ $data->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex flex-row-reverse">
                    <div class="p-2">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- akhir main content -->
@endsection
