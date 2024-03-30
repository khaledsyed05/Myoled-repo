<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="{{ asset('asset/patientStyle.css') }}">
    <title>Doctor</title>
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

    {{-- doctor show starts --}}
    <section id="contactus" class="p-5 coolr">
        <p class="h1 text-center">Doctor</p>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md">
                    <img src="{{ asset("DrProf-images/$doctor->profile_picture") }}" class="img-fluid"
                        alt="">
                </div>
                <div class="col-md p-5 h1">
                    <p>
                        Name: {{ $doctor->name }}
                    </p>
                    <p>
                        department: {{ $doctor->department->name }}
                    </p>
                    {{-- <p>
                        clinic: {{  $doctor->clinic->name }}
                    </p> --}}

                </div>
            </div>
        </div>
    </section>
    {{-- doctor show ends  --}}

    {{-- footer starts --}}
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-2 my-3 border-top">

            <ul class="nav justify-content-center efmar pb-3 mb-3">
                <li class="nav-item mt-3 effmar_1"><img src="{{ asset('asset/images/Designer.png') }}" width="20%">
                </li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted mt-5">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted mt-5">Doctors</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted mt-5">Departments</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted mt-5">Contact Us</a></li>
            </ul>
            <p class="text-center text-muted mt-2 ">© 2024 Company, Inc</p>

        </footer>
    </div>
    {{-- footer ends --}}
</body>

</html>
