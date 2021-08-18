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

    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Compound Form</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Student Matric Number</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="stud-matric-num" class="form-control"
                                                name="fname" placeholder="01DDT19F1XXX">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Type Of Compound</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select class="form-select" id="reason-select" onchange="compoundSelectionChange()">
                                                <option disabled selected>-Select-</option>
                                                @foreach ($compounds as $compound)
                                                <option value="{{ $compound['ind'] }}">{{ $compound['compound_type'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Compound Value (RM)</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="compound-value" class="form-control"
                                                name="contact" placeholder="0.00">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Merit Deduction</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="merit-deduction" class="form-control"
                                                name="contact" placeholder="0">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Upload Compound File (Proof)</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input class="form-control" type="file" id="formFile">
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit"
                                                class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // $(document).ready(function(){
    //     $("#stud-matric-num").val();
    // });

    var compounds = <?php echo json_encode($compounds); ?>;

    function compoundSelectionChange(e) {
        var indVal = parseInt(document.getElementById("reason-select").value)

        document.getElementById("compound-value").value = compounds[indVal].compound_value
        document.getElementById("merit-deduction").value = compounds[indVal].merit_deduction
    }

</script>