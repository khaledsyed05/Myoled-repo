<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Myoled Clinics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="{{ asset('asset/patientStyle.css') }}">
</head>

<body>
    <!-- Navigation Bar Start -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img srcset="{{ asset('asset/images/Designer.png 12000w') }}" alt="logo">
                Myoled Clinics
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="#department" class="nav-link">Department</a>
                    </li>
                    <li class="nav-item">
                        <a href="#doctors" class="nav-link">Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contactus" class="nav-link">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link btn colr text-light">Make An Appointment</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navigation Bar End -->

    <!-- ShowCase Start -->
    <section class="colr_3 text-light p-5 p-lg-0 pt-lg-5 text-center">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div>
                    <h1>Your Path to <span class="colr_1"> Optimal Health</span></h1>
                    <p class="lead mx-5 my-4">
                        Begins Here: Discover Exceptional Care at <span class="text-warning w-100"> Our State-of-the-Art
                            Medical Clinic</span>
                    </p>
                    <button class="btn colr text-light btn-md p-2 ">
                        Make An Appointment
                    </button>
                </div>
                <img class="img-fluid w-50 d-none d-sm-block" src="{{ asset('asset/images/Medicine-bro.svg') }}"
                    alt="" />
            </div>
        </div>
    </section>
    <!-- ShowCase End -->

    {{-- departments start --}}
    <section class="p-5 corbg">
        <div class="container text-align-md-center ">
            <div class="row text-center d-flex align-content-center flex-column flex-lg-row g-3">
                <p class="h1 text-center" id="department">
                    Departments
                </p>
                <p class="text-secondary font-weight-bold">
                    Departments in our Clinics
                </p>
                @foreach ($departments as $index => $department)
                    @if ($index < 3)
                        <div class="col-lg-4 col-md-8 my-md-3 zoom">
                            <div class="card cor text-light h-100 border-0">

                                <div class="card-body text-center">
                                    <div>
                                        <img srcset="{{ asset("dept-images/$department->cover") }}"
                                            class="img-fluid zoom rounded">
                                    </div>
                                    <div class="h3">{{ $department->name }}</div>
                                    <p>
                                        {{ $department->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
            <div class="d-flex justify-content-center mt-2">

                <a href="" class="btn colr text-light d-flex justify-content-center w-10 ">Show More...</a>
            </div>
        </div>
    </section>
    {{-- departments ends --}}
    <hr>

    {{-- why us start --}}
    <section id="whyus" class="p-5 corb">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md">
                    <img src="{{ asset('asset/images/Doctors-bro.svg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-md p-5">
                    <h2 class="colr_1">Why To Appointment With Us</h2>
                    <p class="lead">
                    <ul class="list-group">
                        <li class="list-group-item p-3 h4 text-center">
                            Qualitfied Doctors
                        </li>
                        <li class="list-group-item p-3 h4 text-center">
                            Appointment From Your Home
                        </li>
                        <li class="list-group-item p-3 h4 text-center ">
                            Emergency Care
                        </li>
                        <li class="list-group-item p-3 h4 text-center">
                            24 Hours Service
                        </li>
                        <li class="list-group-item p-3 h4 text-center">
                            Good Patients FeedBack
                        </li>
                    </ul>
                    </p>
                    <button class="btn colr text-light btn-md p-2 ">
                        Make An Appointment
                    </button>
                </div>
            </div>
        </div>
    </section>
    {{-- why us ends --}}
    <hr>

    {{-- doctors starts --}}
    <section class="p-5 coolr">
        <div class="container text-align-md-center ">
            <div class="row text-center d-flex align-content-center flex-column flex-lg-row g-3">
                <p class="h1 text-center " id="doctors">
                    doctors
                </p>
                <p class="text-secondary font-weight-bold">
                    doctors in our Clinics
                </p>
                @foreach ($doctors as $index => $doctor)
                    @if ($index < 5)
                        <div class="col-lg-3 col-md-8 my-md-3">
                            <a href="{{ route('showDr', ['id' => $doctor->id]) }}"
                                class="text-decoration-none text-black">
                                <div class="card corr text-black h-100 border-0 zoom">
                                    <div class="card-body text-center">
                                        <div>
                                            <img srcset="{{ asset("DrProf-images/$doctor->profile_picture") }}"
                                                class="img-fluid zoom rounded">
                                        </div>
                                        <div class="h3">{{ $doctor->name }}</div>
                                        <p>
                                            {{ $doctor->department->name }}
                                        </p>

                                        <p>
                                            {{ $doctor->clinic_id }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach

            </div>
            <div class="d-flex justify-content-center mt-2">

                <a href="" class="btn colr_4 text-dark d-flex justify-content-center w-10 ">Show More...</a>
            </div>
        </div>
    </section>
    {{-- doctors ends --}}
    <hr>
    {{-- contact us start --}}
    <section id="contactus" class="p-5 coolr">
        <p class="h1 text-center">Contact Us</p>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md">
                    <img src="{{ asset('asset/images/Health professional team-amico.svg') }}" class="img-fluid"
                        alt="">
                </div>
                <div class="col-md p-5">
                    <form class="form form-group" method="POST" action="{{ route('storeContactUs') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn colr_4 text-light">Send</button>
                        </div>
                        @if (Session::has('thanks'))
                            <div class="alert alert-success">
                                {{ Session::get('thanks') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- contact us ends --}}

    {{-- footer starts --}}
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-2 my-3 border-top">

            <ul class="nav justify-content-center efmar pb-3 mb-3">
                <li class="nav-item mt-3 effmar_1"><img src="{{ asset('asset/images/Designer.png') }}"
                        width="20%"></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted mt-5">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted mt-5">Doctors</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted mt-5">Departments</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted mt-5">Contact Us</a></li>
            </ul>
            <p class="text-center text-muted mt-2 ">© 2024 Company, Inc</p>

        </footer>
    </div>
    {{-- footer ends --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
