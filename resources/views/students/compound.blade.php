@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Compounds </h3>
                <p class="text-subtitle text-muted">List of my compounds</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Compounds</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Compounds Datatable
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Bil</th>
                            <th>Compound Reason</th>
                            <th>Value(RM)</th>
                            <th>Date Of Compound</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($compounds as $key => $compound)
                        <tr>
                            <td>{{ $key + 1 }}</td>
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
                            <td>
                                @if ($compound->payment_status == false)
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalPayView" onclick="viewCompound({{ json_encode($compound) }}, {{ json_encode(Request::root()) }})">Pay</button>
                                @else
                                <button class="btn btn-primary btn-sm disabled">Pay</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade text-left" id="modalPayView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
            aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <form action="#">
                        <div class="modal-body">
                            <div class="container">
                                <div class="mb-3">
                                    <h3 class="modal-title text-center">Compound Overview</h3>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 offset-md-2 mb-2">
                                        <span style="font-weight: bold;">Compound Reason</span>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <span id="modalCompReason"></span>
                                    </div>
                                    <div class="col-md-4 offset-md-2 mb-2">
                                        <span style="font-weight: bold;">Compound Value</span>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <span id="modalCompValue"></span>
                                    </div>
                                    <div class="col-md-4 offset-md-2 mb-2">
                                        <span style="font-weight: bold;">Date of Compound</span>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <span id="modalDateOfCompound"></span>
                                    </div>
                                    <div class="col-md-4 offset-md-2 mb-2">
                                        <span style="font-weight: bold;">File of Evidence</span>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <a href="#" id="modalFileUrl" target="_blank">
                                            <i class="bi bi-link-45deg"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="mt-4 d-flex justify-content-end">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Cancel</span>
                                    </button>
                                    <a href="#" id="aSubmitPayment" type="button" class="btn btn-primary ml-2">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Submit Payment</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection

<script>
    function viewCompound(_compound, _rootURL){
        console.log('compound: ',_compound)
        console.log('root url: ',_rootURL)
        document.getElementById('modalCompReason').textContent = _compound.comp_reason
        document.getElementById('modalCompValue').textContent = 'RM ' + (parseFloat(_compound.comp_value)).toFixed(2)
        document.getElementById('modalDateOfCompound').textContent = _compound.submission_date
        if(_compound.proof_file_url && _compound.proof_file_url.trim() != '') 
            document.getElementById('modalFileUrl').href = _rootURL + _compound.proof_file_url
        document.getElementById('aSubmitPayment').href = _rootURL + '/checkout/paycompound/' + _compound.id
    }
</script>