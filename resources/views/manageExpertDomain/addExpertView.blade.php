@extends('layouts.main')

@section('container')
    <section class="vh-100 gradient-custom">
        <div class="card " style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
                <h3 class=" pb-2 pb-md-0"><b>Add New Expert</b></h3>
                <form action="/post" method="post" class="employee-form row">
                    <div class="form-section">
                        <div class="col-12">
                            <label for="inputName5" class="form-label">Expert Name</label>
                            <input type="text" class="form-control mb-3" name="name" required>
                        </div>
                        <div class="col-12">
                            <label for="inputEmail5" class="form-label">Expert University</label>
                            <input type="text" class="form-control mb-3" name="last_name" required>
                        </div>
                        <div class="col-12">
                            <label for="inputName5" class="form-label">Expert Email</label>
                            <input type="email" class="form-control mb-3" name="email" required>
                        </div>
                        <div class="col-12">
                            <label for="inputEmail5" class="form-label">Expert Phone Number</label>
                            <input type="text" class="form-control mb-3" name="phoneNum" required>
                        </div>
                    </div>
                    <div class="form-section">
                        <label for="">E-mail:</label>
                        <input type="email" class="form-control mb-3" name="email" required>
                        <label for="">Phone:</label>
                        <input type="tel" class="form-control mb-3" name="phone" required>
                    </div>
                    <div class="form-section">
                        <label for="">Address:</label>
                        <textarea name="address" class="form-control mb-3" cols="30" rows="5" required></textarea>
                    </div>
                    <div class="form-navigation mt-3">
                        <button type="button" class="previous btn btn-primary float-left">Previous</button>
                        <button type="button" class="next btn btn-primary float-right">Next </button>
                        <button type="submit" class="btn btn-success float-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- <div class="card">
            <div class="card-body">
                <h5 class="card-title">Multi Columns Form</h5>
                <form action="/post" method="post" class="employee-form row g-5">

                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">City</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">State</label>
                        <select id="inputState" class="form-select">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="inputZip" class="form-label">Zip</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Check me out
                            </label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form><!-- End Multi Columns Form -->

            </div>
        </div> --}}
    </section>
@endsection
