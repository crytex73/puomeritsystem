@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Summons </h3>
                <p class="text-subtitle text-muted">List of my students' summons</p>

                @if (request()->get('newCompoundSubmitted') && request()->get('newCompoundSubmitted') == 1)
                <span class="badge bg-light-success mb-2">New compound has been created successfully!</span>
                @endif
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Summons</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Summons Datatable
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Bil</th>
                            <th>Matric Number</th>
                            <th>Compound Reason</th>
                            <th>Value(RM)</th>
                            <th>Date Of Compound</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($compounds as $key => $compound)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $compound->student->matric_number }}</td>
                            <td>{{ $compound->comp_reason }}</td>
                            <td>RM {{ number_format((float)$compound->comp_value, 2, '.', '') }}</td>
                            <td>{{ $compound->submission_date }}</td>
                            <td>
                                @if ($compound->payment_status == true)
                                <span class="badge bg-success">Paid</span>
                                @else
                                <span class="badge bg-warning">Not Paid</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection