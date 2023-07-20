@section('title', 'Product_category_type')
@extends('layouts.default')
@section('css')
@endsection

@section('content')
    <div class="container-fluid">
        <div id="form-post">
            <form action="{{ route('product_category_type.store') }}" method="POST" id="form-product_category_type">
                @csrf
                <div class="product_category_type-body">
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
                                    <h4>Produk Product_category_type</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="product_category_type_code"
                                                    placeholder="Masukkan Kode .." required>
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
                                                    <label for="product_category_type_name">Nama
                                                        Product_category_type</label>
                                                    <input type="text" class="form-control"
                                                        name="product_category_type_name"
                                                        placeholder="Masukkan Nama Product Category Type.." required>
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
            <form action="" method="POST" id="form-product_category_type-update">
                @csrf
                @method('PUT')
                <div class="product_category_type-body">
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
                                    <h4>Produk Product_category_type (EDIT)</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="product_category_type_code"
                                                    id="product_category_type_code_edit" required readonly>
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
                                                    <label for="product_category_type_name">Nama
                                                        Product_category_type</label>
                                                    <input type="text" class="form-control"
                                                        name="product_category_type_name"
                                                        id="product_category_type_name_edit"
                                                        placeholder="Masukkan Nama Product_category_type.." required>
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
                    <h5 class="modal-title">Daftar Data Product_category_type </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="tbProduct_category_type" class="table table-product_category_type" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No Product_category_type</th>
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
        const tableRBA = $('.table-product_category_type').DataTable({
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
                    data: 'No Product_category_type'
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
        })

        function modalSearchData() {
            getDataProduct_category_type();
            $('#modalSearchData').modal('show');
            // $('#form-product_category_type').attr('action').submit();
        }

        function getDataProduct_category_type() {
            // $("#tbProduct_category_type tbody").html('');
            tableRBA.clear().draw();
            $.ajax({
                type: "GET",
                url: "{{ route('product_category_type.data_product_category_type') }}",
                success: function(response) {
                    let no = 1;
                    let data = [];
                    $.each(response, function() {
                        data.push({
                            '': no,
                            'No Product_category_type': this.product_category_type_code,
                            'Nama': this.product_category_type_name,
                            'Action': `<a class="btn btn-info" title="View Detail" onclick="getDetail('${this.product_category_type_code}')"><i class="fas fa-eye"></i></a>`
                        });
                        // console.log(data);


                        no++;
                        // $('#tbProduct_category_type tbody').append(`

                    });
                    tableRBA.rows.add(data).draw();
                }
            })

        }


        function getDetail(product_category_type_code) {
            $.ajax({
                type: "GET",
                url: "{{ route('product_category_type.data_product_category_type') }}",
                data: {
                    product_category_type_code: product_category_type_code
                },
                success: function(response) {
                    console.log(response.product_category_type_name);
                    // $('#product_category_type_code_edit').val(response.product_category_type_code)
                    $('#product_category_type_name_edit').val(response.product_category_type_name)
                    $('#product_category_type_code_edit').val(response.product_category_type_code)
                    $('#description_edit').val(response.description)
                }
            })
            $('#product_category_type_code_edit').val(product_category_type_code)
            $('#form-post').hide();

            // $('#form-update').css("display", "block");
            $('#form-update').show();
            $('#modalSearchData').modal('hide');

        }

        function backToAddFrom() {
            // reset form
            $('form#form-product_category_type-update').trigger("reset"); //Line1
            $('form#form-product_category_type-update select, form input[type=checkbox]').trigger("change");

            $('#form-update').hide();
            $('#form-post').show();
        }

        function resetForm() {
            $('form#form-product_category_type').trigger("reset"); //Line1
            $('form#form-product_category_type select, form input[type=checkbox]').trigger("change");
        }

        $('#form-product_category_type-update').on('submit', function(e) {
            e.preventDefault();
            // var formData = $(this).serialize();
            var formData = $(this).serializeArray();
            let product_category_type_code = $('#product_category_type_code_edit').val()
            var url = '{{ route('product_category_type.update', ':id') }}';
            url = url.replace(':id', product_category_type_code);
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
                        message: 'Data Product_category_type Berhasil di Ubah!',
                        position: 'topRight',
                        timeout: 2000,
                        onClosed: function() {
                            window.location.href =
                                '{{ url('product/product_category_type') }}'
                        }
                    });
                },

            })

        });
    </script>
@endsection
