@extends('layouts.main')

@section('container')
    <section class="vh-100 gradient-custom">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5"><b>Add New Expert</b></h3>
                <div class="stepwizard col-md-offset-3 mb-4">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step">
                            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                            <p>Expert Details</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                            <p>Research Paper Details</p>
                        </div>
                    </div>
                </div>

                <form role="form" action="" method="post">
                    <div class="row setup-content" id="step-1">
                        <div class="col-xs-6 col-md-offset-3">
                            <div class="col-md-12">
                                <h3>Expert Details</h3>
                                <div class="form-group mb-3">
                                    <label class="control-label">Real Name</label>
                                    <input maxlength="100" type="text" required="required" class="form-control"
                                        placeholder="Enter Expert Real Name">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label">University Name</label>
                                    <input maxlength="100" type="text" required="required" class="form-control"
                                        placeholder="Enter Expert University Name">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label">Email</label>
                                    <input maxlength="100" type="text" required="required" class="form-control"
                                        placeholder="Enter Expert Email">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label">Phone Number</label>
                                    <input maxlength="100" type="text" required="required" class="form-control"
                                        placeholder="Enter Expert Phone Number">
                                </div>
                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-2">
                        <div class="col-xs-6 col-md-offset-3">
                            <div class="col-md-12">
                                <h3> Step 2</h3>
                                <div class="form-group">
                                    <label class="control-label">Company Name</label>
                                    <input maxlength="200" type="text" required="required" class="form-control"
                                        placeholder="Enter Company Name">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Company Address</label>
                                    <input maxlength="200" type="text" required="required" class="form-control"
                                        placeholder="Enter Company Address">
                                </div>
                                <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-3">
                        <div class="col-xs-6 col-md-offset-3">
                            <div class="col-md-12">
                                <h3> Step 3</h3>
                                <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
                                <button class="btn btn-success btn-lg pull-right" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
