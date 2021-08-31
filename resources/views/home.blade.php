@extends('layouts.app')

@section('content')
<div class="page-heading">
    <h3>My Dashboard</h3>
</div>
@if (Auth::user() && Auth::user()->is_student)
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body" style="padding: 100px 0px 100px 0px">
                            <div class="row">
                                {{-- <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div> --}}
                                <div class="col-12 mx-auto text-center">
                                    <h1 class="font-extrabold mb-3">{{ $merit }}</h1>
                                    <h3 class="text-muted font-semibold">My Merit Score</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body" style="padding: 100px 0px 100px 0px">
                            <div class="row">
                                {{-- <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div> --}}
                                <div class="col-12 mx-auto text-center">
                                    <h1 class="font-extrabold mb-3">{{ $unsettledCompoundCounts }}</h1>
                                    <h3 class="text-muted font-semibold">Unsettled Compound</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body" style="padding: 100px 0px 100px 0px">
                            <div class="row">
                                {{-- <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div> --}}
                                <div class="col-12 mx-auto text-center">
                                    <h1 class="font-extrabold mb-3">{{ $settledCompoundCounts }}</h1>
                                    <h3 class="text-muted font-semibold">Settled Compound</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@elseif (Auth::user() && Auth::user()->is_lecturer)
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body" style="padding: 100px 0px 100px 0px">
                            <div class="row">
                                {{-- <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div> --}}
                                <div class="col-12 mx-auto text-center">
                                    <h1 class="font-extrabold mb-3">{{ $compoundCounts }}</h1>
                                    <h3 class="text-muted font-semibold">Overall Submitted Compound</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body" style="padding: 100px 0px 100px 0px">
                            <div class="row">
                                {{-- <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div> --}}
                                <div class="col-12 mx-auto text-center">
                                    <h1 class="font-extrabold mb-3">{{ $settledCompoundCounts }}</h1>
                                    <h3 class="text-muted font-semibold">Student's Settled Compound</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endif

@endsection
