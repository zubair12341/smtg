@extends('layout.master')
@section('title', 'Complain Trip')
@section('content')
    @push('styles')
        <style>
            .point_of_interest {
                max-height: 500px;
                overflow-y: auto;
            }

            .h-label {
                font-weight: 700;
                font-size: 28px;
            }
        </style>
    @endpush
    <section class="inner-banner-wrap">
        <div class="inner-baner-container" style="background-image: url({{ asset('assets/images/inner-banner.jpg') }});">
            <div class="container">
                <div class="inner-banner-content">
                    <h1 class="inner-title">Complain Againts Driver</h1>
                </div>
            </div>
        </div>
        <div class="inner-shape"></div>
    </section>
    <section class="inner-banner-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Complain Againts Driver</h3>
                </div>
            </div>
            <form action="{{ route('complain.store') }}" method="POST">
                @csrf
                <input type="hidden" value="{{$trip->id}}" name="trip_id">
                <div class="row">
                 
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="form-label">Complaint</label>
                        <textarea name="message" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                 
                </div>
                <hr>
           
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="button-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
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


