<!DOCTYPE html>
<html>
<head>
    <title>Mitgliederverwaltung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home.index') }}">Mitgliederverwaltung</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mitglieder
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('members.index') }}">Alle Mitglieder</a></li>
                        <li><a class="dropdown-item" href="{{ route('members.index') }}">Bogen</a></li>
                        <li><a class="dropdown-item" href="{{ route('members.index') }}">Luftdruck</a></li>
                        <li><a class="dropdown-item" href="{{ route('members.index') }}">Feuerwaffen</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('trainings.index') }}">Trainings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('departments.index') }}">Abteilungen</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br />
<div class="container-fluid">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>