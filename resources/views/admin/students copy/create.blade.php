<x-base-layout>

                        <div class="row">
                            <div class="col-xs-12 col-sm-3 col-md-3 profile1">
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 profile1" style="min-height: 300px;">
                                <div class="thinborder-ontop">
                                    <h3>Student Info</h3>
                                    <x-jet-validation-errors class="mb-4" />
                                    <form id="userloginform" method="POST" action="{{route('admin.students.store')}}">   
                                        @csrf                                     
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" value="" required="" autofocus="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="student_id"
                                                class="col-md-4 col-form-label text-md-right">Student Id</label>
                                            <div class="col-md-6">
                                                <input id="student_id" type="number" class="form-control" name="student_id" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name"
                                                class="col-md-4 col-form-label text-md-right">Name</label>
                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="room_no"
                                                class="col-md-4 col-form-label text-md-right">Room No.</label>
                                            <div class="col-md-6">
                                                <input id="room_no" type="number" class="form-control" name="room_no" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone"
                                                class="col-md-4 col-form-label text-md-right">Phone</label>
                                            <div class="col-md-6">
                                                <input id="phone" type="number" class="form-control" name="phone" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12" style="text-align: center;">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>                                
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3 profile1">
                            </div>
                        </div>

</x-base-layout>