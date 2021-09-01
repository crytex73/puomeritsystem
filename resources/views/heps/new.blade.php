@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Register</h3>
                <p class="text-subtitle text-muted">Register student & lecturer here.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Register User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form class="form form-horizontal" method="POST" action="{{ route('hep.register.new') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="name">Full Name</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="" id="name" name="name">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="email">Email</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="" id="email" name="email">
                                        <div class="form-control-icon">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="matric">Matric Number</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="" id="matric" name="matric">
                                        <div class="form-control-icon">
                                            <i class="bi bi-card-heading"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="pass">Password</label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" placeholder="" id="pass" name="pass">
                                        <div class="form-control-icon">
                                            <i class="bi bi-key"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label>Please Select Role :</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="roleopt" id="studentopt"
                                    value="student" required>
                                <label class="form-check-label" for="studentopt">
                                    Student
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="roleopt" id="lectureropt"
                                    value="lecturer" required>
                                <label class="form-check-label" for="lectureropt">
                                    Lecturer
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