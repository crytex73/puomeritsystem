@extends('layouts.app')


@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Submit Merit</h3>
                <p class="text-subtitle text-muted">Up your merit point</p>
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
        <div class="card-body">
            <form class="form form-vertical">
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Event Name</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="e.g. : Gotong Royong"
                                        id="first-name-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-app-indicator"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">

                            <div class="form-group has-icon-left">
                                <label for="email-id-icon">Event Date</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="dd/mm/yy" id="email-id-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-calendar-event"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="mobile-id-icon">Proof Upload</label>
                                <div class="position-relative">
                                    <div class="filepond--root multiple-files-filepond filepond--hopper"
                                        data-style-button-remove-item-position="left"
                                        data-style-button-process-item-position="right"
                                        data-style-load-indicator-position="right"
                                        data-style-progress-indicator-position="right"
                                        data-style-button-remove-item-align="false" style="height: 76px;"><input
                                            class="filepond--browser" type="file" id="filepond--browser-d0dd4upxy"
                                            name="filepond" aria-controls="filepond--assistant-d0dd4upxy"
                                            aria-labelledby="filepond--drop-label-d0dd4upxy" accept="" multiple=""><a
                                            class="filepond--credits" aria-hidden="true" target="_blank"
                                            rel="noopener noreferrer" style="transform: translateY(68px);"></a>
                                        <div class="filepond--drop-label"
                                            style="transform: translate3d(0px, 0px, 0px); opacity: 1;"><label
                                                for="filepond--browser-d0dd4upxy" id="filepond--drop-label-d0dd4upxy"
                                                aria-hidden="true">Drag &amp; Drop your files or <span
                                                    class="filepond--label-action" tabindex="0">Browse</span></label>
                                        </div>
                                        <div class="filepond--list-scroller"
                                            style="transform: translate3d(0px, 60px, 0px);">
                                            <ul class="filepond--list" role="list"></ul>
                                        </div>
                                        <div class="filepond--panel filepond--panel-root" data-scalable="true">
                                            <div class="filepond--panel-top filepond--panel-root"></div>
                                            <div class="filepond--panel-center filepond--panel-root"
                                                style="transform: translate3d(0px, 8px, 0px) scale3d(1, 0.6, 1);"></div>
                                            <div class="filepond--panel-bottom filepond--panel-root"
                                                style="transform: translate3d(0px, 68px, 0px);"></div>
                                        </div><span class="filepond--assistant" id="filepond--assistant-d0dd4upxy"
                                            role="status" aria-live="polite" aria-relevant="additions"></span>
                                        <div class="filepond--drip"></div>
                                        <fieldset class="filepond--data"></fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <label>Please Select Level</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="levelopt" id="jabatan" value=""
                                required>
                            <label class="form-check-label" for="jabatan">
                                Jabatan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="levelopt" id="politeknik"
                                value="" required>
                            <label class="form-check-label" for="politeknik">
                                Politeknik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="levelopt" id="negeri"
                                value="" required>
                            <label class="form-check-label" for="negeri">
                                Negeri
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="levelopt" id="kebangsaan"
                                value="" required>
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

    </section>
</div>
@endsection
