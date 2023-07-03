@section('title', 'Composit')
@extends('layouts.default')
@section('css')
@endsection

@section('content')
    <div class="container-fluid">
        <div id="form-post">
            <form action="{{ route('composit.store') }}" method="POST" id="form-composit">
                @csrf
                <div class="composit-body">
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
                                    <h4>Produk Composit</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="composit_code"
                                                    id="composit_code" placeholder="Masukkan Kode Composit.." required
                                                    onchange="setCompositItem()">
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
                                                    <label for="composit_name">Nama Composit</label>
                                                    <input type="text" class="form-control" name="composit_name"
                                                        placeholder="Masukkan Nama Composit.." required>
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
                                    <div class="form-group">
                                        <a class="btn btn-sm btn-primary" onclick="addDataDetail()"><i
                                                class="fa fa-plus"></i>
                                            Tambah Item</a>
                                    </div>
                                    <div>
                                        <table class="table" id="tbAddDetail">
                                            <thead>
                                                <th>Uom</th>

                                                <th>Value</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" class="form-control"
                                                            id="composit_code_items_default" name="composit_code_items[]"
                                                            required>
                                                    </td>

                                                    <td><input type="text" class="form-control"
                                                            id="to_composit_code_items_default"
                                                            name="to_composit_code_items[]" readonly required>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control"
                                                            id="composit_code_items_default" name="composit_code_items[]"
                                                            required>
                                                    </td>

                                                    <td><input type="text" class="form-control"
                                                            id="to_composit_code_items_default"
                                                            name="to_composit_code_items[]" readonly required>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control"
                                                            id="composit_code_items_default" name="composit_code_items[]"
                                                            required>
                                                    </td>

                                                    <td><input type="text" class="form-control"
                                                            id="to_composit_code_items_default"
                                                            name="to_composit_code_items[]" readonly required>
                                                    </td>

                                                </tr>

                                            </tbody>

                                        </table>
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
            <form action="" method="POST" id="form-composit-update">
                @csrf
                @method('PUT')
                <div class="composit-body">
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
                                    <h4>Produk Composit (EDIT)</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="composit_code"
                                                    id="composit_code_edit" required readonly>
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
                                                    <label for="composit_name">Nama Composit</label>
                                                    <input type="text" class="form-control" name="composit_name"
                                                        id="composit_name_edit" placeholder="Masukkan Nama Composit.."
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="description">Keterangan</label>
                                                    <input type="text" class="form-control" name="description"
                                                        id="description_edit" placeholder="Masukkan Keterangan..">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="description">Unit</label>
                                                    <select name="unit_code" id="unit_code_edit"
                                                        class="form-control slc-unit" required>
                                                        <option value="">-- Pilih Unit --</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <a class="btn btn-sm btn-primary" onclick="addDataDetailEdit()"><i
                                                    class="fa fa-plus"></i>
                                                Tambah Item</a>
                                        </div>
                                        <div>
                                            <table class="table" id="tbAddDetailEdit">
                                                <thead>
                                                    <th>Composit Code</th>

                                                    <th>To Composit Code</th>

                                                    <th>Value</th>
                                                    <th></th>
                                                </thead>
                                                <tbody>


                                                </tbody>

                                            </table>
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
                    <h5 class="modal-title">Daftar Data Composit </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="tbComposit" class="table table-composit" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No Composit</th>
                                <th>Nama</th>
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
        var dataSlcOptionComposit = [];
        const tableRBA = $('.table-composit').DataTable({
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
                    data: 'No Composit'
                },
                {
                    data: 'Nama'
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
            getSlcOptionComposit()
            getSlcOptionUnit()
        })

        function getSlcOptionUnit() {

            $.ajax({
                type: "GET",
                url: "{{ route('unit.data_unit') }}",
                success: function(response) {
                    let no = 1;
                    let data = [];
                    $.each(response, function() {
                        $('.slc-unit').append($("<option />").val(this.unit_code).text(this.unit_code));
                    });
                }
            })
        }
        // console.log(dataSlcOptionComposit);
        function getSlcOptionComposit() {
            $.ajax({
                type: "GET",
                url: "{{ route('composit.data_composit') }}",
                success: function(response) {
                    let no = 1;
                    let data = [];
                    $.each(response, function() {

                        dataSlcOptionComposit.push({
                            'data': `<option value='${this.composit_code}'>${this.composit_code}</option>`,
                        });
                    });
                }
            })
            // console.log(dataSlcOptionComposit);
        }

        function setCompositItem() {
            let composit_code = $('#composit_code').val();
            $.ajax({
                type: "GET",
                url: "{{ route('composit.is_unique_composit_code') }}",
                data: {
                    composit_code: composit_code
                },
                success: function(response) {
                    if (response == true) {
                        iziToast.error({
                            title: 'Error!',
                            message: 'Kode Composit sudah digunakan',
                            position: 'topRight'
                        });
                        let composit_code = $('#composit_code').val(null);
                        return
                    }
                }
            })
            $('#composit_code_items_default').val(composit_code)
            $('#to_composit_code_items_default').val(composit_code)
            $('#value_items_default').val(1)

        }

        function modalSearchData() {
            getDataComposit();
            $('#modalSearchData').modal('show');
            // $('#form-composit').attr('action').submit();
        }

        function addDataDetail() {
            var rowCount = $('#tbAddDetail tbody tr').length;
            let no = rowCount + 1;
            let slcOptionComposit = '';
            let composit_code_default = $('#composit_code_items_default').val()
            dataSlcOptionComposit.forEach(element => {
                slcOptionComposit += `${element.data}`
                // console.log(element);
            });

            $('#tbAddDetail tbody').append(`
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="composit_code_items[]" value="${composit_code_default}" required readonly>
                                        </td>
                                        <td>
                                            <select class="form-control slc-composit" id="to_composit_code_items[]" name="to_composit_code_items[]"  required>
                                                <option value=''>-- Pilih Composit --</option>
                                                ${slcOptionComposit}
                                            </select>
                                        </td>
                                      
                                        <td><input type="number" class="form-control" id="value_items[]"name="value_items[]"  required></td>
                                        <td style='vertical-align:middle; text-align: center;font-weight:bold'><a class="btn btn-danger DeleteRow"><i class="fa fa-trash"></i><a></td>

                                    </tr>

                                `);
        }
        $("#tbAddDetail").on("click", ".DeleteRow", function() {
            $(this).closest("tr").remove();
        });

        function addDataDetailEdit() {
            var rowCount = $('#tbAddDetailEdit tbody tr').length;
            let no = rowCount + 1;
            let slcOptionComposit = '';
            let composit_code_default = $('#composit_code_edit').val()
            dataSlcOptionComposit.forEach(element => {
                slcOptionComposit += `${element.data}`
                // console.log(element);
            });

            $('#tbAddDetailEdit tbody').append(`
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="composit_code_items[]" value="${composit_code_default}" required readonly>
                                        </td>
                                        <td>
                                            <select class="form-control slc-composit" id="to_composit_code_items[]" name="to_composit_code_items[]"  required>
                                                <option value=''>-- Pilih Composit --</option>
                                                ${slcOptionComposit}
                                            </select>
                                        </td>
                                      
                                        <td><input type="number" class="form-control" id="value_items[]"name="value_items[]"  required></td>
                                        <td style='vertical-align:middle; text-align: center;font-weight:bold'><a class="btn btn-danger DeleteRow"><i class="fa fa-trash"></i><a></td>

                                    </tr>

                                `);
        }
        $("#tbAddDetailEdit").on("click", ".DeleteRow", function() {
            $(this).closest("tr").remove();
        });

        function getDataComposit() {
            // $("#tbComposit tbody").html('');
            tableRBA.clear().draw();
            $.ajax({
                type: "GET",
                url: "{{ route('composit.data_composit') }}",
                success: function(response) {
                    let no = 1;
                    let data = [];
                    $.each(response, function() {
                        data.push({
                            '': no,
                            'No Composit': this.composit_code,
                            'Nama': this.composit_name,
                            'Action': `<a class="btn btn-info" title="View Detail" onclick="getDetail('${this.composit_code}')"><i class="fas fa-eye"></i></a>`
                        });
                        // console.log(data);


                        no++;
                        // $('#tbComposit tbody').append(`

                });
                tableRBA.rows.add(data).draw();
            }
        })

    }


    function getDetail(composit_code) {
        $.ajax({
            type: "GET",
            url: "{{ route('composit.data_composit') }}",
            data: {
                composit_code: composit_code
            },
            success: function(response) {
                console.log(response.composit_name);
                // $('#composit_code_edit').val(response.composit_code)
                $('#composit_name_edit').val(response.composit_name)
                $('#composit_code_edit').val(response.composit_code)
                $('#unit_code_edit').val(response.unit_code)
                $('#description_edit').val(response.description)
            }
        })
        //get items
        $.ajax({
            type: "GET",
            url: "{{ route('composit.data_composit_items') }}",
            data: {
                composit_code: composit_code
            },
            success: function(response) {
                let no = 1
                // dataSlcOptionComposit.forEach(element => {
                //     slcOptionComposit += `${element.data}`
                //     // console.log(element);
                // });
                $.each(response, function() {
                    $('#tbAddDetailEdit tbody').append(
                        `
                                                                                                                                                                                                                                                                                                <tr>
                                                                                                                                                                                                                                                                                                    <td>
                                                                                                                                                                                                                                                                                                        <input type="text" class="form-control" name="composit_code_items[]" value="${this.composit_code}" required readonly>
                                                                                                                                                                                                                                                                                                        </td>
                                                                                                                                                                                                                                                                                                        <td>
                                                                                                                                                                                                                                                                                                            <input type="text" class="form-control" name="to_composit_code_items[]" value="${this.to_composit_code}" required readonly>
                                                                                                                                                                                                                                                                                                       
                                                                                                                                                                                                                                                                                                    </td>
                                                                                                                                                                                                                                                                                                  
                                                                                                                                                                                                                                                                                                    <td><input type="number" class="form-control" id="value_items[]"name="value_items[]" value="${this.value}"  required></td>
                                                                                                                                                                                                                                                                                                    <td style='vertical-align:middle; text-align: center;font-weight:bold'><a class="btn btn-danger DeleteRow"><i class="fa fa-trash"></i><a></td>

                                                                                                                                                                                                                                                                                                </tr>

                                                                                                                                                                                                                                                                                            `
                        );

                    });

                }
            })


            $('#composit_code_edit').val(composit_code)

            $('#form-post').hide();

            // $('#form-update').css("display", "block");
            $('#form-update').show();
            $('#modalSearchData').modal('hide');

        }

        function backToAddFrom() {
            // reset form
            $('form#form-composit-update').trigger("reset"); //Line1
            $('form#form-composit-update select, form input[type=checkbox]').trigger("change");

            $('#form-update').hide();
            $('#form-post').show();
        }

        function resetForm() {
            $('form#form-composit').trigger("reset"); //Line1
            $('form#form-composit select, form input[type=checkbox]').trigger("change");
        }

        $('#form-composit-update').on('submit', function(e) {
            e.preventDefault();
            // var formData = $(this).serialize();
            var formData = $(this).serializeArray();
            let composit_code = $('#composit_code_edit').val()
            var url = '{{ route('composit.update', ':id') }}';
            url = url.replace(':id', composit_code);
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
                        message: 'Data Composit Berhasil di Ubah!',
                        position: 'topRight',
                        timeout: 2000,
                        onClosed: function() {
                            window.location.href = '{{ url('product/composit') }}'
                        }
                    });
                },
            })

        });
    </script>
@endsection
