@extends('layouts.app')


@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Submit Compound</h3>
                <p class="text-subtitle text-muted">A place for summon student</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Submit Compound</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card-body">
            <form class="form form-vertical">
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Student Matric Number</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="e.g. : 01DDT19F1XXX"
                                        id="first-name-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table mb-0 table-lg">
                            <thead>
                                <tr>
                                    <th>Type Of Summon</th>
                                    <th>Value(RM)</th>
                                    <th>Select</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-bold-500">Membuat Bising/Menganggu Kenteteraman</td>
                                    <td>10</td>
                                    <td>
                                        <div class="checkbox">
                                            <input type="checkbox" id="checkbox1" class="form-check-input" unchecked="">
                                        </div>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td class="text-bold-500">Berpakaian Tidak Sopan </td>
                                    <td>50</td>
                                    <td>
                                        <div class="checkbox">
                                            <input type="checkbox" id="checkbox2" class="form-check-input" unchecked="">
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="text-bold-500">Berambut Panjang</td>
                                    <td>50</td>
                                    <td>
                                        <div class="checkbox">
                                            <input type="checkbox" id="checkbox3" class="form-check-input" unchecked="">
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="text-bold-500">Membuang Sampah Merata</td>
                                    <td>50</td>
                                    <td>
                                        <div class="checkbox">
                                            <input type="checkbox" id="checkbox4" class="form-check-input" unchecked="">
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="text-bold-500">Tidak Memakai Kad Pelajar</td>
                                    <td>50</td>
                                    <td>
                                        <div class="checkbox">
                                            <input type="checkbox" id="checkbox5" class="form-check-input" unchecked="">
                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </section>
</div>
@endsection
