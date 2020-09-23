<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
        <header>
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
                <a class="navbar-brand" href="index.php">Öğrenci</a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="index.php">Listele</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="creat">Yeni Kayıt</a>
                    </li>
                </ul>
            </nav>
        </header>

        <main role="main">
            <div class="jumbotron">
                <div class="container">
                    <h1 class="display-4">Öğrenci Listelem Ekranı</h1>      
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                    <table class="table">
                            <thead>
                                <tr>
                                    <th>Resmi</th>
                                    <th>Adı Soyadı</th>
                                    <th>Cinsiyeti</th>
                                    <th>Sınıfı</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>
                                        <img src="{{ asset('img')}}{{'/'}}{{$student->Img}}"  class="rounded-circle" alt="Image" width='50' height='50'/>
                                    </td>
                                    <td>{{$student->Name}} {{$student->Surname}} </td>
                                    <td> 
                                        {{ $student->Gender==0 ? 'Kadın' : 'Erkek' }}
                                    </td>
                                    <td>
                                        {{$student->className}}
                                    </td>
                                    <td>
                                        <a href="edit/{{ $student->Id }}" class="btn btn-outline-primary">Düzenle</a> 
                                        <a href="delete/{{ $student->Id }}" class="btn btn-outline-danger">Sil</a>
                                    </td>
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
        <footer class="container">
            <p>© Company 2017-2018</p>    
        </footer>
    </body>
</html>