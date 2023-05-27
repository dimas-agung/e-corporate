@section('title', 'Karyawan')
@extends('layouts.default')
@section('css')

@endsection

@section('content')
    <div class="container-fluid">
        <div id="form-post">
            <form action="{{ route('employee.store') }}" method="POST" id="form-karyawan">
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
                                    <h4>Master Karyawan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="employee_code"
                                                    placeholder="Masukkan No Karyawan.." required>
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
                                                    <label for="employee_name">Nama Karyawan</label>
                                                    <input type="text" class="form-control" name="employee_name"
                                                        placeholder="Masukkan Nama Karyawan.." required>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="min-height:400px">
                                <div class="card-body">
                                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" id="home-tab" data-toggle="tab"
                                                href="#tab_data_diri" role="tab" aria-controls="home"
                                                aria-selected="false">
                                                Data Diri
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="data-tbp-tab" data-toggle="tab" href="#tab_personalian"
                                                role="tab" aria-controls="data-tbp" aria-selected="false">
                                                Personalian
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="data-kegiatan-tab" data-toggle="tab"
                                                href="#tab_rekening" role="tab" aria-controls="data-kegiatan"
                                                aria-selected="false">
                                                Rekening
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="data-rincian-spp-tab" data-toggle="tab"
                                                href="#tab_keterangan" role="tab" aria-controls="data-spp"
                                                aria-selected="false">
                                                Keterangan
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane active show" id="tab_data_diri" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Tempat, Tanggal Lahir</label>
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-12">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Tempat Lahir.." id="birth_place"
                                                                    name="birth_place" required>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <input type="date" id="birth_date" name="birth_date"
                                                                    required class="form-control">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Jenis kelamain</label>
                                                        <select name="gender" class="form-control" id="gender"
                                                            required>
                                                            <option>Pilih Jenis Kelamin</option>
                                                            <option value="Laki - laki">Laki - laki</option>
                                                            <option value="Perempuan">Perempuan</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Agama</label>
                                                        <select name="religion" class="form-control" id="religion"
                                                            required>
                                                            <option>Pilih Agama</option>
                                                            @foreach ($religions as $item)
                                                                <option value="<?= $item ?>">
                                                                    <?= $item ?>
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-8 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Nomor KTP</label>
                                                        <input type="text" class="form-control" id="nik"
                                                            name="nik" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Status Pernikahan</label>
                                                        <select class="form-control slc2" id="marital_status_code"
                                                            name="marital_status_code" required>
                                                            <option>Pilih Status Pernikahan</option>
                                                            @foreach ($maritals_status as $item)
                                                                <option value="<?= $item->marital_status_code ?>">
                                                                    <?= $item->marital_status_name ?>
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-4 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" id="email"
                                                            name="email" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Nomor Telpon</label>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <input type="text" id="phone_number"
                                                                    name="phone_number" class="form-control"
                                                                    placeholder="No Telpon 1.." required>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <input type="text" id="phone_number_2"
                                                                    name="phone_number_2" class="form-control"
                                                                    placeholder="No Telpon 2..">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Alamat 1</label>
                                                        <textarea name="address" id="address" class="form-control" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Alamat 2</label>
                                                        <textarea name="address_2" id="adress_2" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab_personalian" role="tabpanel"
                                            aria-labelledby="data-tbp-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Grade Karyawan</label>
                                                        <select name="grade_title_code" class="form-control slc2"
                                                            id="grade_title_code" required>
                                                            <option>-- Pilih Grade --</option>
                                                            @foreach ($grade_titles as $item)
                                                                <option value="<?= $item->grade_title_code ?>">
                                                                    <?= $item->grade_title_name ?>
                                                                </option>
                                                            @endforeach


                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Status Karyawan</label>
                                                        <select name="status_job" class="form-control slc2"
                                                            id="status_job" required>
                                                            <option>Pilih Status</option>
                                                            <option value="Tetap">Tetap</option>
                                                            <option value="Kontrak">Kontrak</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Awal</label>
                                                        <input type="date" class="form-control" id="start_date"
                                                            name="start_date" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Berakhir</label>
                                                        <input type="date" class="form-control" id="end_date"
                                                            name="end_date">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Department</label>
                                                        <select name="department_code" class="form-control slc2"
                                                            id="department_code" required onchange="getSection()">
                                                            <option>-- Pilih Department --</option>
                                                            @foreach ($departments as $item)
                                                                <option value="<?= $item->department_code ?>">
                                                                    <?= $item->department_name ?>
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Seksi</label>
                                                        <select name="section_code" class="form-control slc2"
                                                            id="section_code">
                                                            <option>-- Pilih Seksi --</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Atasan Langsung</label>
                                                        <select name="direct_leader_code" class="form-control"
                                                            id="direct_leader_code">
                                                            <option>Pilih Atasan</option>
                                                            @foreach ($leader as $item)
                                                                <option value="<?= $item->employee_code ?>">
                                                                    <?= $item->employee_name ?> -
                                                                    <?= $item->department->department_name ?>
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Peranan Pekerjaan</label>
                                                        <input type="text" name="job_title" class="form-control"
                                                            id="job_title" required>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab_rekening" role="tabpanel"
                                            aria-labelledby="data-kegiatan-tab">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Bank</label>
                                                        <select id="bank_code" name="bank_code" class="form-control slc2"
                                                            required>
                                                            <option value="">-- Pilih Bank --</option>
                                                            @foreach ($banks as $item)
                                                                <option value="<?= $item->bank_code ?>">
                                                                    <?= $item->bank_name ?>
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>No Rekening</label>
                                                        <input type="text" class="form-control" id="rekening_number"
                                                            name="rekening_number" required
                                                            placeholder="Masukkan No Rekening..">

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="tab_keterangan" role="tabpanel"
                                            aria-labelledby="data-rincian-spp-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <textarea name="description" id="description" class="form-control" rows="6"></textarea>
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
        <div id="form-update">
            <form action="" method="POST" id="form-karyawan-update">
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
                                    <h4>Master Karyawan (EDIT)</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="employee_code"
                                                    id="employee_code_edit" placeholder="Masukkan No Karyawan.." required
                                                    readonly>
                                                <div class="form-group">

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <a class="btn btn-warning" onclick="backToAddFrom()"><i
                                                        class="fas fa-undo"></i> RESET </a>
                                                <a class="btn btn-info" onclick="modalSearchData()"> <i
                                                        class="fas fa-search"></i></a>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="employee_name">Nama Karyawan</label>
                                                    <input type="text" class="form-control" name="employee_name"
                                                        id="employee_name_edit" placeholder="Masukkan Nama Karyawan.."
                                                        required>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="min-height:400px">
                                <div class="card-body">
                                    <ul class="nav nav-tabs mb-4" id="myTab_update" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" id="home-tab" data-toggle="tab"
                                                href="#tab_data_diri_update" role="tab" aria-controls="home"
                                                aria-selected="false">
                                                Data Diri
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="data-tbp-tab" data-toggle="tab"
                                                href="#tab_personalian_update" role="tab" aria-controls="data-tbp"
                                                aria-selected="false">
                                                Personalian
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="data-kegiatan-tab" data-toggle="tab"
                                                href="#tab_rekening_update" role="tab" aria-controls="data-kegiatan"
                                                aria-selected="false">
                                                Rekening
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="data-rincian-spp-tab" data-toggle="tab"
                                                href="#tab_keterangan_update" role="tab" aria-controls="data-spp"
                                                aria-selected="false">
                                                Keterangan
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent-update">
                                        <div class="tab-pane active show" id="tab_data_diri_update" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Tempat, Tanggal Lahir</label>
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-12">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Tempat Lahir.." id="birth_place_edit"
                                                                    name="birth_place" required>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <input type="date" id="birth_date_edit"
                                                                    name="birth_date" required class="form-control">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Jenis kelamain</label>
                                                        <select name="gender" class="form-control" id="gender_edit"
                                                            required>
                                                            <option>Pilih Jenis Kelamin</option>
                                                            <option value="Laki - laki">Laki - laki</option>
                                                            <option value="Perempuan">Perempuan</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Agama</label>
                                                        <select name="religion" class="form-control" id="religion_edit"
                                                            required>
                                                            <option>Pilih Agama</option>
                                                            @foreach ($religions as $item)
                                                                <option value="<?= $item ?>">
                                                                    <?= $item ?>
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-8 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Nomor KTP</label>
                                                        <input type="text" class="form-control" id="nik_edit"
                                                            name="nik" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Status Pernikahan</label>
                                                        <select class="form-control slc2" id="marital_status_code_edit"
                                                            name="marital_status_code" required>
                                                            <option>Pilih Status Pernikahan</option>
                                                            @foreach ($maritals_status as $item)
                                                                <option value="<?= $item->marital_status_code ?>">
                                                                    <?= $item->marital_status_name ?>
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-4 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" id="email_edit"
                                                            name="email" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Nomor Telpon</label>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <input type="text" id="phone_number_edit"
                                                                    name="phone_number" class="form-control"
                                                                    placeholder="No Telpon 1.." required>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <input type="text" id="phone_number_2_edit"
                                                                    name="phone_number_2" class="form-control"
                                                                    placeholder="No Telpon 2..">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Alamat 1</label>
                                                        <textarea name="address" id="address_edit" class="form-control" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Alamat 2</label>
                                                        <textarea name="address_2" id="adress_2_edit" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="tab_personalian_update" role="tabpanel"
                                            aria-labelledby="data-tbp-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Grade Karyawan</label>
                                                        <select name="grade_title_code" class="form-control slc2"
                                                            id="grade_title_code_edit" required>
                                                            <option>-- Pilih Grade --</option>
                                                            @foreach ($grade_titles as $item)
                                                                <option value="<?= $item->grade_title_code ?>">
                                                                    <?= $item->grade_title_name ?>
                                                                </option>
                                                            @endforeach


                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Status Karyawan</label>
                                                        <select name="status_job" class="form-control slc2"
                                                            id="status_job_edit" required>
                                                            <option>Pilih Status</option>
                                                            <option value="Tetap">Tetap</option>
                                                            <option value="Kontrak">Kontrak</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Awal</label>
                                                        <input type="date" class="form-control" id="start_date_edit"
                                                            name="start_date" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Berakhir</label>
                                                        <input type="date" class="form-control" id="end_date_edit"
                                                            name="end_date">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Department</label>
                                                        <select name="department_code" class="form-control slc2"
                                                            id="department_code_edit" required
                                                            onchange="getSectionEdit()">
                                                            <option>-- Pilih Department --</option>
                                                            @foreach ($departments as $item)
                                                                <option value="<?= $item->department_code ?>">
                                                                    <?= $item->department_name ?>
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Seksi</label>
                                                        <select name="section_code" class="form-control slc2"
                                                            id="section_code_edit">
                                                            <option>-- Pilih Seksi --</option>
                                                            @foreach ($sections as $item)
                                                                <option value="<?= $item->section_code ?>">
                                                                    <?= $item->section_name ?>
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Atasan Langsung</label>
                                                        <select name="direct_leader_code" class="form-control"
                                                            id="direct_leader_code_edit">
                                                            <option>Pilih Atasan</option>
                                                            @foreach ($leader as $item)
                                                                <option value="<?= $item->employee_code ?>">
                                                                    <?= $item->employee_name ?>
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Peranan Pekerjaan</label>
                                                        <input type="text" name="job_title" class="form-control"
                                                            id="job_title_edit">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab_rekening_update" role="tabpanel"
                                            aria-labelledby="data-kegiatan-tab">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Bank</label>
                                                        <select id="bank_code_edit" name="bank_code"
                                                            class="form-control slc2" required>
                                                            <option value="">-- Pilih Bank --</option>
                                                            @foreach ($banks as $item)
                                                                <option value="<?= $item->bank_code ?>">
                                                                    <?= $item->bank_name ?>
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>No Rekening</label>
                                                        <input type="text" class="form-control"
                                                            id="rekening_number_edit" name="rekening_number" required
                                                            placeholder="Masukkan No Rekening..">

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="tab_keterangan_update" role="tabpanel"
                                            aria-labelledby="data-rincian-spp-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <textarea name="description" id="description_edit" class="form-control" rows="6"></textarea>
                                                    </div>
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
                    <h5 class="modal-title">Daftar Data Karyawan </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="tbEmployee" class="table table-karyawan" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No Karyawan</th>
                                <th>Nama</th>
                                <th>Department</th>
                                <th>No Telpon</th>
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
        const tableRBA = $('.table-karyawan').DataTable({
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
                    data: 'No Karyawan'
                },
                {
                    data: 'Nama'
                },
                {
                    data: 'Department'
                },
                {
                    data: 'No Telpon'
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
            getDataEmployee();
            $('#modalSearchData').modal('show');
            // $('#form-karyawan').attr('action').submit();
        }

        function getDataEmployee() {
            // $("#tbEmployee tbody").html('');
            tableRBA.clear().draw();
            $.ajax({
                type: "GET",
                url: "{{ route('employee.data_employee') }}",
                success: function(response) {
                    let no = 1;
                    let data = [];
                    $.each(response, function() {
                        data.push({
                            '': no,
                            'No Karyawan': this.employee_code,
                            'Nama': this.employee_name,
                            'Department': this.department.department_name,
                            'No Telpon': this.phone_number,
                            'Action': `<a class="btn btn-info" title="View Detail" onclick="getDetail('${this.employee_code}')"><i class="fas fa-eye"></i></a>`
                        });
                        // console.log(data);


                        no++;
                        // $('#tbEmployee tbody').append(`

                });
                tableRBA.rows.add(data).draw();
            }
        })

    }

    function getSection() {
        let department_code = $('#department_code').val()
        $('#section_code')
            .empty()
            .append('<option selected="selected" value="">-- PILIH SECTION --</option>');
        // tableRBA.clear().draw();
        $.ajax({
            type: "GET",
            url: "{{ route('section.data_section') }}",
            data: {
                department_code: department_code
            },
            success: function(response) {
                let no = 1;
                let data = [];
                $.each(response, function() {
                    $('#section_code').append(
                        `<option value="${this.section_code}">${this.section_name}</option>`);
                    // $("#section_code").append($("<option />").val(this.section_code).text(this
                    //     .section_name));
                })

            }
        })
    }

    function getSectionEdit() {
        let department_code = $('#department_code_edit').val()
        $('#section_code_edit')
            .empty()
            .append('<option selected="selected" value="">-- PILIH SECTION --</option>');
        // tableRBA.clear().draw();
        $.ajax({
            type: "GET",
            url: "{{ route('section.data_section') }}",
            data: {
                department_code: department_code
            },
            success: function(response) {
                let no = 1;
                let data = [];
                $.each(response, function() {
                    $('#section_code_edit').append(
                        `<option value="${this.section_code}">${this.section_name}</option>`);
                        // $("#section_code").append($("<option />").val(this.section_code).text(this
                        //     .section_name));
                    })

                }
            })
        }



        function getDetail(employee_code) {
            $.ajax({
                type: "GET",
                url: "{{ route('employee.data_employee') }}",
                data: {
                    employee_code: employee_code
                },
                success: function(response) {
                    $('#employee_name_edit').val(response.employee_name)
                    $('#birth_place_edit').val(response.birth_place)
                    $('#birth_date_edit').val(response.birth_date)
                    $('#gender_edit').val(response.gender)
                    $('#religion_edit').val(response.religion)
                    $('#nik_edit').val(response.nik)
                    $('#email_edit').val(response.email)
                    $('#phone_number_edit').val(response.phone_number)
                    $('#phone_number_2_edit').val(response.phone_number_2)
                    $('#address_edit').val(response.address)
                    $('#adress_2_edit').val(response.address_2)
                    $('#grade_title_code_edit').val(response.grade_title_code)
                    $('#status_job_edit').val(response.status_job)
                    $('#start_date_edit').val(response.start_date)
                    $('#end_date_edit').val(response.end_date)
                    $('#department_code_edit').val(response.department_code)
                    $('#section_code_edit').val(response.section_code)
                    $('#direct_leader_code_edit').val(response.direct_leader_code)
                    $('#job_title_edit').val(response.job_title)
                    $('#bank_code_edit').val(response.bank_code)
                    $('#rekening_number_edit').val(response.rekening_number)
                    $('#description_edit').val(response.description)
                }
            })
            $('#employee_code_edit').val(employee_code)
            $('#form-post').hide();

            // $('#form-update').css("display", "block");
            $('#form-update').show();
            $('#modalSearchData').modal('hide');

        }

        function backToAddFrom() {
            // reset form
            $('form#form-karyawan-update').trigger("reset"); //Line1
            $('form#form-karyawan-update select, form input[type=checkbox]').trigger("change");

            $('#form-update').hide();
            $('#form-post').show();
        }

        function resetForm() {
            $('form#form-karyawan').trigger("reset"); //Line1
            $('form#form-karyawan select, form input[type=checkbox]').trigger("change");
        }

        $('#form-karyawan-update').on('submit', function(e) {
            e.preventDefault();
            // var formData = $(this).serialize();
            var formData = $(this).serializeArray();
            let employee_code = $('#employee_code_edit').val()
            var url = '{{ route('employee.update', ':id') }}';
            url = url.replace(':id', employee_code);
            // console.log(url);
            // return;
            // console.log($('#eror').val());
            // return false;
            $.ajax({
                type: "PUT",
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
                        message: 'Data Karyawan Berhasil di Ubah!',
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
