@extends('master')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title ml-3">WELCOME</h4>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                    </div>
                    <div class="container mt-3 mb-3">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="card">
                                    <img src="car.jpeg" class="card-img-top" alt="Car Image">
                                    <div class="card-body">
                                        <h5 class="card-title">Bledug Car</h5>
                                        <p class="card-text">Harga: Rp 15,000,000</p>
                                        <a href="#" class="btn btn-primary">Beli Sekarang</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <img src="motor.jpeg" class="card-img-top" alt="Motorcycle Image">
                                    <div class="card-body">
                                        <h5 class="card-title">Krabby Motor</h5>
                                        <p class="card-text">Harga: Rp 10,000,000</p>
                                        <a href="#" class="btn btn-primary">Beli Sekarang</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <img src="truck1.jpeg" class="card-img-top" alt="Truck Image">
                                    <div class="card-body">
                                        <h5 class="card-title">Truck Model</h5>
                                        <p class="card-text">Harga: Rp 19,000,000</p>
                                        <a href="#" class="btn btn-primary">Beli Sekarang</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="car1.jpeg" class="card-img-top" alt="Car Image">
                                    <div class="card-body">
                                        <h5 class="card-title">Car Model</h5>
                                        <p class="card-text">Harga: Rp 24,000,000</p>
                                        <a href="#" class="btn btn-primary">Beli Sekarang</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <img src="motor1.jpeg" class="card-img-top" alt="Motorcycle Image">
                                    <div class="card-body">
                                        <h5 class="card-title">Motorcycle Model</h5>
                                        <p class="card-text">Harga: Rp 39,000,000</p>
                                        <a href="#" class="btn btn-primary">Beli Sekarang</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <img src="truck.jpeg" class="card-img-top" alt="Truck Image">
                                    <div class="card-body">
                                        <h5 class="card-title">Truck Model</h5>
                                        <p class="card-text">Harga: Rp 39,000,000</p>
                                        <a href="#" class="btn btn-primary">Beli Sekarang</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
      .card-img-top {
          height: 200px; /* Set a fixed height for the images */
          object-fit: cover; /* Ensure the images cover the entire container */
      }
  </style>
@endsection
