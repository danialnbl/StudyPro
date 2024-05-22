@extends('layouts.main')

@section('container')
    <section class="vh-100 gradient-custom">
        <div class="card " style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">

                <form action="/post" method="post" class="expert-form row">
                    <div class="form-section">
                        <h3 class=" pb-2 pb-md-0"><b>Add New Expert</b></h3>
                        <div class="col-12">
                            <label for="expertName" class="form-label">Expert Name</label>
                            <input type="text" class="form-control mb-3" id="expertName" name="expertName" required>
                        </div>
                        <div class="col-12">
                            <label for="expertUniversity" class="form-label">Expert University</label>
                            <input type="text" class="form-control mb-3" id="expertUniversity" name="expertUniversity"
                                required>
                        </div>
                        <div class="col-12">
                            <label for="expertEmail" class="form-label">Expert Email</label>
                            <input type="email" class="form-control mb-3" id="expertEmail" name="expertEmail" required>
                        </div>
                        <div class="col-12">
                            <label for="expertNo" class="form-label">Expert Phone Number</label>
                            <input type="text" class="form-control mb-3" id="expertNo" name="expertNo" required>
                        </div>
                        <div class="col-12">
                            <label for="R_Title">Research Domain:</label>
                            <select class="form-select" aria-label="Default select example" id="R_Title" name="R_Title"
                                required>
                                <option selected>Open this select menu</option>
                                <option value="1">Computer System Research Group</option>
                                <option value="2">Virtual Simulation & Computing
                                </option>
                                <option value="3">Machine Intelligence Research Group</option>
                                <option value="4">Cyber Security Interest Group
                                </option>
                                <option value="5">Software Engineering
                                </option>
                                <option value="6">Knowledge Engineering & Computational Linguistic</option>
                                <option value="7">Data Science & Simulation Modeling
                                </option>
                                <option value="8">Database Technology & Information System
                                </option>
                                <option value="9">Educational Technology (EduTech)
                                </option>
                                <option value="10">Image Signal Processing
                                </option>
                                <option value="11">Computer Network & Research Group
                                </option>
                                <option value="12">Soft Computing & Optimization
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-section">
                        <table>
                            <tr>
                                <td>
                                    <h3 class=" pb-2 pb-md-0"><b>Expert Research</b></h3>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="RP_Title">Research Paper Title:</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control mb-3" id="RP_Title" name="RP_Title" required>
                                </td>
                            </tr>

                        </table>
                        <table id="addExpertTable" class="mt-2">
                            <tr>
                                <td>
                                    <label for="RP_File">Upload Research Paper:</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="form-control" type="file" id="RP_File" name="RP_File" required>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-section">
                        {{-- <label for="">Address:</label> --}}
                        <textarea name="address" class="form-control mb-3" cols="30" rows="5" required></textarea>
                    </div>
                    <div class="form-navigation mt-3">
                        <button type="button" class="previous btn btn-primary float-left">Previous</button>
                        <button type="button" class="next btn btn-primary float-right">Next </button>
                        <button id="addMore" name="addMore" type="button" class="addMore btn btn-primary float-right">
                            Add More Research Paper
                        </button>
                        <button type="submit" class="btn btn-success float-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
