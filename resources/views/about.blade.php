@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- breadcrumb-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li aria-current="page" class="breadcrumb-item active">Tentang Kami</li>
                </ol>
            </nav>

            <div class="box row">
                <div class="col-lg-3">
                    <img src="{{ asset('storage/images/web/lapakdesa_logo1.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-9">
                    <h1>LapakDesa</h1>
                    <p>LapakDesa merupakan aplikasi marketplace berbasis web yang menyediakan berbagai fitur untuk
                        pengguna dan pemilik usaha.</p>
                    {{-- <div class="row">
                        <div class="col-sm-4">
                            <h5>Alamat</h5>
                            <p class="text-secondary">{{ $usaha->alamat }}</p>
                        </div>
                        <div class="col-sm-4">
                            <h5>Nomor HP</h5>
                            <p class="text-secondary">{{ $usaha->no_hp }}</p>
                        </div>
                        <div class="col-sm-4">
                            <h5>Email</h5>
                            <p class="text-secondary">{{ $usaha->email }}</p>
                        </div>
                    </div> --}}

                </div>

            </div>





        </div>
        <!-- /.col-lg-9-->
        <div class="col-lg-12">
            <div id="contact" class="box">
                <h1>Contact</h1>
                <p class="lead">Are you curious about something? Do you have some kind of problem with our products?</p>
                <p>Please feel free to contact us, our customer service center is working for you 24/7.</p>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <h3><i class="fa fa-map-marker"></i>Address</h3>
                        <p>13/25 New Avenue<br>New Heaven<br>45Y 73J<br>England<br><strong>Great Britain</strong></p>
                    </div>
                    <!-- /.col-sm-4-->
                    <div class="col-md-4">
                        <h3><i class="fa fa-phone"></i> Call center</h3>
                        <p class="text-muted">This number is toll free if calling from Great Britain otherwise we
                            advise you to use the electronic form of communication.</p>
                        <p><strong>+33 555 444 333</strong></p>
                    </div>
                    <!-- /.col-sm-4-->
                    <div class="col-md-4">
                        <h3><i class="fa fa-envelope"></i> Electronic support</h3>
                        <p class="text-muted">Please feel free to write an email to us or to use our electronic
                            ticketing system.</p>
                        <ul>
                            <li><strong><a href="mailto:">info@fakeemail.com</a></strong></li>
                            <li><strong><a href="#">Ticketio</a></strong> - our ticketing support platform</li>
                        </ul>
                    </div>
                    <!-- /.col-sm-4-->
                </div>
                <!-- /.row-->
                <hr>
                <h2>Contact form</h2>
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <input id="firstname" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input id="lastname" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input id="subject" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="message" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send message</button>
                        </div>
                    </div>
                    <!-- /.row-->
                </form>
            </div>
        </div>
        <!-- /.col-md-9-->
    </div>
</div>
@endsection
