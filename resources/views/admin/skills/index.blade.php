@extends('admin.layouts.main')
@section('content')

    <!-- main content -->
    <div class="container mt-3 mb-3">
        <div class="card">
            <div class="card-body">
                <h1 class="card-head">Skill List</h1>
                <p>Get the icon on <a href="https://fontawesome.com/icons">Font Awesome</a>. Just type the Class Like :
                    <code>fa-brands fa-instagram</code>
                </p>
                <form action="/panel/skills" method="POST">
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
                                Skills Name
                            </td>
                            <td>
                                Skills Icon
                            </td>
                            <td>
                                Icon Color
                            </td>
                            <td style="width: 20%">
                                Action
                            </td>

                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>
                                        <input type="hidden" name="skill[{{ $loop->iteration }}][id]"
                                            value="{{ $data->id }}">
                                        <input type="text" class="form-control"
                                            name="skill[{{ $loop->iteration }}][skill_name]" value="{{ $data->skill_name }}"
                                            placeholder="skill Name">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control" value="{{ $data->skill_icon }}"
                                            placeholder="Skill Icon" name="skill[{{ $loop->iteration }}][skill_icon]">
                                    </td>

                                    <td>
                                        <input type="color" class="form-control" value="{{ $data->skill_color }}"
                                            placeholder="Icon Color" name="skill[{{ $loop->iteration }}][skill_color]">
                                    </td>

                                    <td>
                                        <a href="{{ URL::to('/panel/skill/delete/' . $data->id) }}"
                                            class="btn btn-danger container-fluid">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex flex-row-reverse">
                        <div class="p-2">
                            <a onclick="myCreateFunction()" class="btn btn-primary rounded-pill">Add more Skill</a>
                        </div>
                    </div>
                    <button class="btn btn-primary rounded-pill container-fluid mt-3" type="submit">Update Skill</button>
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
                "<input type='hidden' name='skill[" +
                count +
                "][id]' value=''><input type='text' class='form-control' name = 'skill[" +
                count +
                "][skill_name]' value = '' placeholder = 'skill Name'> ";
            rundown.innerHTML = "<input type='text' class='form-control' name = 'skill[" + count +
                "][skill_icon]' value = '' placeholder = 'Skill Icon'>";
            icon.innerHTML = "<input type='color' class='form-control' name = 'skill[" + count +
                "][skill_color]' value = '' placeholder = 'Icon Color'>";
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
