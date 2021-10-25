@extends('layouts.app')


@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Submit Merit</h3>
                <p class="text-subtitle text-muted">Up your merit point.</p>
                @if (request()->get('meritSubmitted') && request()->get('meritSubmitted') == 1)
                <span class="badge bg-light-success mb-2">Merit has been submitted and waiting for approval.</span>
                @endif
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Submit Merit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form class="form form-horizontal" method="POST" action="{{ route('student.submitMerit') }}" enctype="multipart/form-data">
                @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="ename">Event Name</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="e.g. : Gotong Royong" name="ename" id="ename">
                                        <div class="form-control-icon">
                                            <i class="bi bi-app-indicator"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">

                                <div class="form-group has-icon-left">
                                    <label for="edate">Event Date</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="dd/mm/yy" name="edate" id="edate">
                                        <div class="form-control-icon">
                                            <i class="bi bi-calendar-event"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">

                                <div class="form-group has-icon-left">
                                    <label for="edate">Lecturer Matric Number</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="" name="lectmatricnumber" id="lectmatricnumber">
                                        <div class="form-control-icon">
                                            <i class="bi bi-card-heading"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label>Please Select Level</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="levelopt" id="jabatan" value="1"
                                    required>
                                <label class="form-check-label" for="jabatan">
                                    Jabatan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="levelopt" id="politeknik"
                                    value="2" required>
                                <label class="form-check-label" for="politeknik">
                                    Politeknik
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="levelopt" id="negeri"
                                    value="3" required>
                                <label class="form-check-label" for="negeri">
                                    Negeri
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="levelopt" id="kebangsaan"
                                    value="4" required>
                                <label class="form-check-label" for="kebangsaan">
                                    Kebangsaan
                                </label>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
</div>
@endsection
