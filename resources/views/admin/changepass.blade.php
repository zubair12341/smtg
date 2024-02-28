@extends('layout.adminmaster')
@section('title', 'Change Password')
@section('content')
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

<style>
    .my_img{
        height: 70px;
    border-radius: 50%;
    margin-top: -19px;
    margin-left: 20px;
    }
</style>

    <div class="db-info-wrap">
        <div class="row mt-3">
            <div class="col-lg-12 mt-5">
                <div class="dashboard-box table-opp-color-box">
                    <div class="d-flex">
                        <h4>Update Profile</h4>
                        @if(auth()->user()->image!=null)
                        <img src="{{auth()->user()->image}}" class="my_img" alt="">
                        @else
                        <img src="https://static.vecteezy.com/system/resources/previews/008/442/086/non_2x/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg" class="my_img" alt="">
                        @endif
                    </div>
                   


                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">


                                <div class="form-group">
                                    <label for="current_password">Name</label>
                                    <input type="text" name="name" value="{{ auth()->user()->name }}"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="current_password">Email</label>
                                    <input type="text" name="email" value="{{ auth()->user()->email }}"
                                        class="form-control" required>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="current_password">Country</label>
                                    <input type="text" name="country" value="{{ auth()->user()->country }}"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="current_password">City</label>
                                    <input type="text" name="city" value="{{ auth()->user()->city }}"
                                        class="form-control" required>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="current_password">State</label>
                                    <input type="text" name="state" value="{{ auth()->user()->state }}"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="current_password">Phone Number</label>
                                    <input type="text" name="phone" value="{{ auth()->user()->phone }}"
                                        class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="current_password">Profile Image</label>
                                    <input type="file" name="image" class="form-control" >
                                </div>
                            </div>
                            <div class="col-6">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <button style="margin-top: 35px" type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <hr>
                    <h4>Change Password</h4>
                    <br>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" name="current_password" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" name="new_password" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="new_password_confirmation">Confirm New Password</label>
                                    <input type="password" name="new_password_confirmation" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <button style="margin-top: 35px" type="submit" class="btn btn-primary">Change
                                    Password</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        @if (session('error'))
            swal({
                title: "Error",
                text: "{{ session('error') }}",
                icon: "error",
                button: "OK",
            });
        @endif
        @if (session('success'))
            swal({
                title: "Success",
                text: "{{ session('success') }}",
                icon: "success",
                button: "OK",
            });
        @endif
    </script>
@endsection
