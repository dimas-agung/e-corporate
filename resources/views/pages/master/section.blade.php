@section('title', 'Seksi')
@extends('layouts.default')
@section('css')

@endsection

@section('content')
    <div class="container-fluid">
        <div id="form-post">
            <form action="{{ route('section.store') }}" method="POST" id="form-seksi">
                @csrf
                <div class="section-body">
                    <div class="row">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-has-icon w-100 mx-3">
                                <div class="alert-icon"><i class="fas fa-exclamation-circle"></i></div>
                                <div class="alert-body">
                                    <div class="alert-title">Kesalahan Validasi</div>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card mb-2">
                                <div class="card-header">
                                    <h4>Master Seksi</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="section_code"
                                                    placeholder="Masukkan Kode Seksi.." required>
                                                <div class="form-group">

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <a class="btn btn-primary"> GENERATE </a>
                                                <a class="btn btn-info" onclick="modalSearchData()"> <i
                                                        class="fas fa-search"></i></a>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="section_name">Nama Seksi</label>
                                                    <input type="text" class="form-control" name="section_name"
                                                        placeholder="Masukkan Nama Seksi.." required>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Department</label>
                                                    <select name="department_code" class="form-control slc2"
                                                        id="department_code" required>
                                                        <option>-- Pilih Department --</option>
                                                        @foreach ($departments as $item)
                                                            <option value="<?= $item->department_code ?>">
                                                                <?= $item->department_name ?>
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="description">Keterangan</label>
                                                    <input type="text" class="form-control" name="description"
                                                        placeholder="Masukkan Keterangan..">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="float-right">
                                        <button class="btn btn-success"><i class="fas fa-save"></i>
                                            Simpan</button>
                                        <a class="btn btn-danger"><i class="fas fa-refresh"></i> Reset</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div id="form-update" style="display: none">
            <form action="" method="POST" id="form-seksi-update">
                @csrf
                @method('PUT')
                <div class="section-body">
                    <div class="row">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-has-icon w-100 mx-3">
                                <div class="alert-icon"><i class="fas fa-exclamation-circle"></i></div>
                                <div class="alert-body">
                                    <div class="alert-title">Kesalahan Validasi</div>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card mb-2">
                                <div class="card-header">
                                    <h4>Master Seksi (EDIT)</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="section_code"
                                                    id="section_code_edit" placeholder="Masukkan No Seksi.." required
                                                    readonly>
                                                <div class="form-group">

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <a class="btn btn-warning" onclick="backToAddFrom()"><i
                                                        class="fas fa-undo"></i>
                                                    RESET </a>
                                                <a class="btn btn-info" onclick="modalSearchData()"> <i
                                                        class="fas fa-search"></i></a>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="section_name">Nama Seksi</label>
                                                    <input type="text" class="form-control" name="section_name"
                                                        id="section_name_edit" placeholder="Masukkan Nama Seksi.." required>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Department</label>
                                                    <select name="department_code" class="form-control slc2"
                                                        id="department_code_edit" required>
                                                        <option>-- Pilih Department --</option>
                                                        @foreach ($departments as $item)
                                                            <option value="<?= $item->department_code ?>">
                                                                <?= $item->department_name ?>
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="description">Keterangan</label>
                                                    <input type="text" class="form-control" name="description"
                                                        id="description_edit" placeholder="Masukkan Keterangan..">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="float-right">
                                        <button class="btn btn-success"><i class="fas fa-save"></i>
                                            Simpan</button>
                                        <a class="btn btn-danger"><i class="fas fa-refresh"></i> Reset</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    {{-- modal --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="modalSearchData">
        <div class="modal-dialog modal-xl" role="document" style="width: 90%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Daftar Data Seksi </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="tbSection" class="table table-seksi" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No Seksi</th>
                                <th>Nama</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="get-rekening">Simpan</button> --}}
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')

    <script>
        @if ($message = Session::get('success'))
            iziToast.success({
                title: 'Sukses!',
                message: '{{ $message }}',
                position: 'topRight'
            });
        @endif
        const tableRBA = $('.table-seksi').DataTable({
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            info: true,
            bFilter: true,
            ordering: true,
            columns: [{
                    data: ''
                },
                {
                    data: 'No Seksi'
                },
                {
                    data: 'Nama'
                },
                {
                    data: 'Department'
                },
                {
                    data: 'Action'
                },
            ],
            // fixedColumns: true,
            display: true
        });
        $(document).ready(function() {
            $('#form-update').hide();
            $('#form-post').show();
            // $('#form-update').css("display", "none");
            $('#modalSearchData').modal('hide');
        })

        function modalSearchData() {
            getDataSection();
            $('#modalSearchData').modal('show');
            // $('#form-seksi').attr('action').submit();
        }

        function getDataSection() {
            // $("#tbSection tbody").html('');
            tableRBA.clear().draw();
            $.ajax({
                type: "GET",
                url: "{{ route('section.data_section') }}",
                success: function(response) {
                    let no = 1;
                    let data = [];
                    $.each(response, function() {
                        data.push({
                            '': no,
                            'No Seksi': this.section_code,
                            'Nama': this.section_name,
                            'Department': this.department.department_name,
                            'Action': `<a class="btn btn-info" title="View Detail" onclick="getDetail('${this.section_code}')"><i class="fas fa-eye"></i></a>`
                        });
                        // console.log(data);


                        no++;
                        // $('#tbSection tbody').append(`

                    });
                    tableRBA.rows.add(data).draw();
                }
            })

        }


        function getDetail(section_code) {
            $.ajax({
                type: "GET",
                url: "{{ route('section.data_section') }}",
                data: {
                    section_code: section_code
                },
                success: function(response) {
                    // $('#section_code_edit').val(response.section_code)
                    $('#section_name_edit').val(response.section_name)
                    $('#department_code_edit').val(response.department_code)
                    $('#description_edit').val(response.description)
                }
            })
            $('#section_code_edit').val(section_code)
            $('#form-post').hide();

            // $('#form-update').css("display", "block");
            $('#form-update').show();
            $('#modalSearchData').modal('hide');

        }

        function backToAddFrom() {
            // reset form
            $('form#form-seksi-update').trigger("reset"); //Line1
            $('form#form-seksi-update select, form input[type=checkbox]').trigger("change");

            $('#form-update').hide();
            $('#form-post').show();
        }

        function resetForm() {
            $('form#form-seksi').trigger("reset"); //Line1
            $('form#form-seksi select, form input[type=checkbox]').trigger("change");
        }

        $('#form-seksi-update').on('submit', function(e) {
            e.preventDefault();
            // var formData = $(this).serialize();
            var formData = $(this).serializeArray();
            let section_code = $('#section_code_edit').val()
            var url = '{{ route('section.update', ':id') }}';
            url = url.replace(':id', section_code);
            // console.log(url);
            // return;
            // console.log($('#eror').val());
            // return false;
            $.ajax({
                type: "POST",
                url: url,
                data: [...formData],
                beforeSend: function() {
                    // $("#buttonSubmit").prop('disabled', true);
                },
                success: function(response) {
                    // console.log(response);
                    // $("#buttonSubmit").prop('disabled', false);
                    iziToast.success({
                        title: 'Sukses!',
                        message: 'Data Seksi Berhasil di Ubah!',
                        position: 'topRight',
                        timeout: 2000,
                        onClosed: function() {
                            window.location.href = document.referrer
                        }
                    });
                },

            })

        });
    </script>
@endsection
