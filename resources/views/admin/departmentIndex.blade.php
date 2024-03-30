<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{ asset('asset/app.css') }}">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Dashboard</title>
  </head>
  <body>
    <div class="container-fluid">
      <!-- navbar -->
      <nav class="nav P-2 navtop d-flex justify-content-between">
        <!-- logo and name -->
        <div class="logoHolder d-flex">
          <img src="{{ asset('asset/images/Designer.png') }}" alt="logo" width="90px" height="90px" />
          <p style="font-size: 2em" class="mt-3">Myoled Clinics Dashboard</p>
        </div>
        <!-- admin avarar and name and profile access -->
        <div class="adminProfile d-flex justify-content-end">
          <img
            src="{{ asset('asset/images/adminAvatar.png') }}"
            alt="adminAvatar"
            width="120px"
            height="90px"
          />
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle text-black"
              href=""
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              admin name
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
            <ul class="nav flex-column">
              <li class="sidetab">
                <a href="{{ route('clinic.index') }}" class="nav-link text-white d-flex">
                  <i
                    class="fa fa-hospital-o"
                    style="font-size: 36px; margin-right: 14px"
                  ></i>
                  <span> clinics </span>
                </a>
              </li>
              <li class="sidetab">
                <a href="{{ route('department.index') }}" class="nav-link text-white d-flex">
                  <i
                    class="fa fa-medkit bg-primary p-2 rounded"
                    style="font-size: 36px; margin-right: 14px; margin-left:-8px"
                  ></i>
                  <span> Departments</span>
                </a>
              </li>
              <li class="sidetab" style="margin-left: 5px">
                <a href="{{ route('doctor.index') }}" class="nav-link text-white">
                  <i
                    class="fa fa-user-md"
                    style="font-size: 36px; margin-right: 14px"
                  ></i>
                  <span>Doctors</span>
                </a>
              </li>
              <li class="sidetab" style="margin-left: 5px d-flex">
                <a href="{{ route('contact.index') }}" class="nav-link text-white d-flex">
                    <div style="float: right;
                    margin-left: -10px;">
                        <img src="{{ asset('asset/images/envelope-paper-fill.svg') }}">
                    </div>
                    <span style="margin-left:10px">Contacts</span>
                </a>
            </li>
            </ul>
          </div>
        </div>
        <!-- content -->
        <div class="col-md-9">
          <div class="content">
            <div class="card mb-3">
              <div class="card-header">
                <a href="{{ route('department.create') }}" class="btn btn-primary">Add new </a>
              </div>  
            </div>
            <div class="card">
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">name</th>
                      <th>Tools</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($departments as $department)
                      <tr>
                        <td>
                          <a href="{{ route('department.show', $department->id) }}">
                            {{ $department->name }}  
                          </a>
                        </td>
                        
                        <td>
                          <a href="{{ route('department.edit', $department->id) }}" class="btn btn-warning">
                            Edit
                          </a>
                          <form 
                            action="{{ route('department.destroy', $department->id) }}"
                            method="POST"
                            style="display: inline"
                          >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                              Delete
                            </button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
