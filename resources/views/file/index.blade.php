@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <span>{{ session('status') }} <i class="fa fa-fw fa-circle-check"></i></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<section class="p-3">
    <h4>Berbagi Berkas</h4>
    <p><small>Small description about berbagi berkas</small></p>

    <div class="table-responsive my-5">
        <!--
        <div class="d-flex justify-content-between mb-3">
            <div class="d-flex flex-column">
                <div class="mb-2">
                    <span class="">Kategori :</span>
                    <a href="#" class="badge bg-warning">Pembibitan</a>
                    <a href="#" class="badge bg-danger">Teknik Budidaya</a>
                    <a href="#" class="badge bg-info">Waktu Tanam</a>
                    <a href="#" class="badge bg-success">Panyakit</a>
                    <a href="#" class="badge bg-dark">Lainnya</a>
                </div>
                <div>
                    <span class="">Tipe Berkas :</span>
                    <a href="#" class="badge bg-danger">PDF</a>
                    <a href="#" class="badge bg-primary">DOC/DOCX</a>
                    <a href="#" class="badge bg-success">MP4</a>
                </div>
            </div>
            <div>
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
                    <i class="fa fa-fw fa-upload"></i>
                    Unggah Berkas
                </button>
            </div>
        </div>
        -->

        <div class="pull-right mb-5">
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
                <i class="fa fa-fw fa-upload"></i>
                Unggah Berkas
            </button>
        </div>
        
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Berkas</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Oleh</th>
                    <th>Tanggal</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($files as $file)
                <tr>
                    <td>
                        @if(str_contains($file->attachment, '.mp4'))
                        <a href="{{ url('storage/files/' . $file->attachment) }}" target="_blank">
                            <i class="fa fa-xl fa-fw fa-file-video text-warning"></i>
                        </a>
                        @elseif(str_contains($file->attachment, '.pdf'))
                        <a href="{{ url('storage/files/' . $file->attachment) }}" target="_blank">
                            <i class="fa fa-xl fa-fw fa-file-pdf text-danger"></i>
                        </a>
                        @elseif(str_contains($file->attachment, 'doc') || str_contains($file->attachment, '.docx'))
                        <a href="{{ url('storage/files/' . $file->attachment) }}" target="_blank">
                            <i class="fa fa-xl fa-fw fa-file-word text-primary"></i>
                        </a>
                        @else
                        <a href="{{ url('storage/files/' . $file->attachment) }}" target="_blank">
                            <i class="fa fa-xl fa-fw fa-photo"></i>
                        </a>
                        @endif
                    </td>
                    <td width="250">{{ $file->title }}</td>
                    <td>{{ $file->category }}</td>
                    <td>{{ $file->user->name }}</td>
                    <td>{{ date('d M Y H:i', strtotime($file->created_at)) }}</td>
                    <td>
                        <a onclick="setDetail('{{ $file }}')" data-bs-toggle="modal" data-bs-target="#editModal" class="badge bg-primary pointer"><i class="fa fa-pencil"></i></a>
                        <form action="{{ url('berbagi-berkas/' . $file->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah anda yakin akan dihapus?')" class="badge bg-danger" style="border: 0px"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if(count($files) == 0)
        <div class="text-center mt-4">Belum ada data</div>
        @endif
    </div>

    <!-- Upload Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Form Unggah Berkas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/berbagi-berkas') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                            @error('title')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="category" class="form-label">Kategori</label>
                            <select name="category" class="form-control" id="category" required>
                                <option value="" selected>Pilih ..</option>
                                <option value="Pembibitan">Pembibitan</option>
                                <option value="Waktu Tanam">Waktu Tanam</option>
                                <option value="Kondisi Cuaca">Kondisi Cuaca</option>
                                <option value="Teknik Budidaya">Teknik Budidaya</option>
                                <option value="Penyakit">Penyakit</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            <div class="form-text">Pilih kategori terkait materi.</div>
                        </div>
                        <div class="form-group attachment mb-4">
                            <label for="attachment" class="form-label">Berkas</label>
                            <input type="file" name="attachment" id="attachment" class="form-control" required>
                            @error('attachment')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group text-end">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i>
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Form Update Berkas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/berbagi-berkas/') }}" id="edit_form" enctype="multipart/form-data" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group mb-3">
                            <label for="edit_title" class="form-label">Judul</label>
                            <input type="text" name="title" id="edit_title" class="form-control" required>
                            @error('title')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="edit_category" class="form-label">Kategori</label>
                            <select name="category" class="form-control" id="edit_category" required>
                                <option value="" selected>Pilih ..</option>
                                <option value="Pembibitan">Pembibitan</option>
                                <option value="Waktu Tanam">Waktu Tanam</option>
                                <option value="Kondisi Cuaca">Kondisi Cuaca</option>
                                <option value="Teknik Budidaya">Teknik Budidaya</option>
                                <option value="Penyakit">Penyakit</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            <div class="form-text">Pilih kategori terkait materi.</div>
                        </div>
                        <div class="form-group attachment mb-4">
                            <label for="attachment" class="form-label">Berkas</label>
                            <input type="file" name="attachment" id="attachment" class="form-control">
                            @error('attachment')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group text-end">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i>
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('script')
    <script>
        function setDetail(data) {
            const parseData = JSON.parse(data)

            // Get element input for replace value
            const input_title = document.getElementById('edit_title');
            const input_category = document.getElementById('edit_category');
            const form = document.getElementById('edit_form');

            // replace value from data
            input_title.value = parseData.title
            input_category.value = parseData.category
            form.action = "{{ url('/berbagi-berkas') }}" + "/" + parseData.id
        }
    </script>
    @endpush

</section>

@endsection