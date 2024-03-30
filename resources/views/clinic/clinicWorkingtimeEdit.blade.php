<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('asset/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Dashboard</title>
</head>

<body>
    <div class="container-fluid">
        <!-- navbar -->
        <nav class="nav P-2 Navtop d-flex justify-content-between">
            <!-- logo and name -->
            <div class="logoHolder d-flex">
                <img src="{{ asset('asset/images/Designer.png') }}" alt="logo" width="90px" height="90px" />
                <p style="font-size: 2em" class="mt-3">Myoled Clinics Dashboard</p>
            </div>
            <!-- admin avarar and name and profile access -->
            <div class="adminProfile d-flex justify-content-end">
                <img src="{{ asset('asset/images/adminAvatar.png') }}" alt="adminAvatar" width="120px"
                    height="90px" />
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-black" href="" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{-- {{ $admins->name }} --}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                    </ul>
                </li>
            </div>
        </nav>

        <div class="row">
            <div class="col-md-2">
                <!-- Sidebar -->
                <div class="d-flex flex-column text-bg-dark sidebar">
                    <ul class="nav flex-column ">
                        <li class="sidetab" style="margin-left: 5px">
                            <a href="{{ route('doctor.index') }}" class="nav-link text-white d-flex">
                                <i class="fa fa-user-md" style="font-size: 36px; margin-right: 19px"></i>
                                <span>Doctors</span>
                            </a>
                        </li>
                        <li class="sidetab" style="margin-left: 5px">
                            <a href="{{ route('doctor.index') }}" class="nav-link text-white d-flex">
                                <img src="{{ asset('asset/images/calendar-plus.svg') }}">
                                <span style="margin-inline: 10px">working time</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Add Clinic Working Time and Days
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('workingtime.store', ['clinicid' => $clinicid]) }}">
                            @csrf

                            <div class="form-group">
                                <label for="days">Days</label>
                                <select id="days" class="js-example-basic-single form-control" name="days[]">
                                    <option value="monday">Monday</option>
                                    <option value="tuesday">Tuesday</option>
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                                    <option value="saturday">Saturday</option>
                                    <option value="sunday">Sunday</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="start_time">Start Time</label>
                                <input id="start_time" type="time" class="form-control" name="start_time" required>
                            </div>

                            <div class="form-group">
                                <label for="end_time">End Time</label>
                                <input id="end_time" type="time" class="form-control" name="end_time" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
