@extends('admin.layouts.main')
@section('content')

    <!-- main content -->
    <div class="container mt-3 mb-3">
        <div class="card">
            <div class="card-body">
                <h1 class="card-head">Socmed List</h1>
                <p>Get the icon on <a href="https://fontawesome.com/icons">Font Awesome</a>. Just type the Class Like :
                    <code>fa-brands fa-instagram</code>
                </p>
                <form action="/panel/socmed" method="POST">
                    @csrf
                    @if ($errors->all())
                        <div class="alert alert-danger mb-3">
                            @foreach ($errors->all() as $message)
                                <p>{{ $message }}</p>
                            @endforeach
                        </div>
                    @endif
                    <table class="table table-bordered mt-3" id="rundownTable">
                        <thead>
                            <td style="width: 30%">
                                Socmed Name
                            </td>
                            <td>
                                Socmed Link
                            </td>
                            <td>
                                Fontawesome Icon
                            </td>
                            <td style="width: 20%">
                                Action
                            </td>

                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>
                                        <input type="hidden" name="socmed[{{ $loop->iteration }}][id]"
                                            value="{{ $data->id }}">
                                        <input type="text" class="form-control"
                                            name="socmed[{{ $loop->iteration }}][socmed_name]"
                                            value="{{ $data->socmed_name }}" placeholder="socmed Name">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control" value="{{ $data->socmed_url }}"
                                            placeholder="URL" name="socmed[{{ $loop->iteration }}][socmed_url]">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control" value="{{ $data->socmed_icon }}"
                                            placeholder="Font Awesome Icon"
                                            name="socmed[{{ $loop->iteration }}][socmed_icon]">
                                    </td>

                                    <td>
                                        <a href="{{ URL::to('/panel/socmed/delete/' . $data->id) }}"
                                            class="btn btn-danger container-fluid">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex flex-row-reverse">
                        <div class="p-2">
                            <a onclick="myCreateFunction()" class="btn btn-primary rounded-pill">Add more Socmed</a>
                        </div>
                    </div>
                    <button class="btn btn-primary rounded-pill container-fluid mt-3" type="submit">Update Socmed</button>
                </form>
            </div>
        </div>
    </div>
    <!-- akhir main content -->


@endsection

@section('script')
    <script>
        var count = {{ count($datas) }};

        function myCreateFunction() {
            count++;
            var table = document.getElementById("rundownTable");
            var row = table.insertRow();
            var waktu = row.insertCell(0);
            var rundown = row.insertCell(1);
            var icon = row.insertCell(2);
            var action = row.insertCell(3);
            waktu.innerHTML =
                "<input type='hidden' name='socmed[" +
                count +
                "][id]' value=''><input type='text' class='form-control' name = 'socmed[" +
                count +
                "][socmed_name]' value = '' placeholder = 'Socmed Name'> ";
            rundown.innerHTML = "<input type='text' class='form-control' name = 'socmed[" + count +
                "][socmed_url]' value = '' placeholder = 'Socmed URL'>";
            icon.innerHTML = "<input type='text' class='form-control' name = 'socmed[" + count +
                "][socmed_icon]' value = '' placeholder = 'Socmed Icon'>";
            action.innerHTML = "<a onclick='myDeleteFunction(" + count +
                ")' class='btn btn-danger container-fluid'>Delete</a>";
        }

        function myDeleteFunction(row) {
            count--;
            console.log(row + " test");
            document.getElementById("rundownTable").deleteRow(row);
        }
    </script>
@endsection
