@extends('layout.adminmaster')
@section('title', 'Admin Edit User')
@section('content')

<div class="db-info-wrap">
    <div class="row">


        <div class="col">
            <div class="dashboard-box table-opp-color-box" style="height: 500px">
            <h2>Edit User</h2>

    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')
        <div class="row mt-3">
          <div class="col">
            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $user->name }}" required>
          </div>
          <div class="col">
            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}" requireds>
          </div>
        </div>
        <div class="row mt-3">
            <div class="col">
              <input type="text" class="form-control" name="country" placeholder="Name" value="{{ $user->country }}" placeholder="Country Name" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" name="state" placeholder="Email" value="{{ $user->state }}" placeholder="State Name" requireds>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <input type="text" class="form-control" name="city" placeholder="Name" value="{{ $user->city }}" placeholder="City Name" required>
            </div>
            <div class="col">
              <input type="number" class="form-control" name="phone" placeholder="Email" value="{{ $user->phone }}" placeholder="Phone Name" requireds>
            </div>
          </div>
        <div class="row mt-3">
            <div class="col">
                <input type="password" class="form-control" name="password" placeholder="Enter password if you want to update, Otherwise leave it null">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
      </form>

    </div>
    </div>
</div>
</div>

@endsection
