<x-layouts.apps>

    <div class="col-span-12">
        <div class="box">
            <div class="header">
                <h2 class="title">DATA FILE ARSIP</h2>
                <a href="#addData" data-bs-toggle="modal" class="btn btn-sm btn-outline-success">
                    <i class="bi bi-plus"></i> Tambah
                </a>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>File</th>
                                <th>Extentions</th>
                                <th>File Size</th>
                                <th>Path</th>
                                <th>Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama_file }}</td>
                                    <td>{{ $data->extention_file }}</td>
                                    <td>{{ $data->size_file. 'Kb' }}</td>
                                    <td>{{ $data->path_file }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="#updateData{{ $data->id }}" data-bs-toggle="modal"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="#deleteData{{ $data->id }}" data-bs-toggle="modal"
                                                class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal Hapus Data-->
                                <x-modals.deletemodal id="deleteData{{ $data->id }}" action="{{ url('delete', $data->id) }}" />

                                <!-- Modal update Data-->
                                <x-modals.defaultmodal id="updateData{{ $data->id }}" title="Update Data" buttonSubmit="Update"
                                    action="{{ url('update', $data->id) }}">
                                    <div class="col-span-12 ">
                                        <x-inputs.inputFile name="files" />
                                    </div>
                                </x-modals.defaultmodal>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <x-modals.defaultmodal id="addData" title="Tambah Data" buttonSubmit="SIMPAN" action="{{ url('store') }}">
        <div class="col-span-12 ">
            <x-inputs.inputFile name="files" />
        </div>
    </x-modals.defaultmodal>
</x-layouts.apps>
