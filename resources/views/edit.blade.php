<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <title>Kayıt Güncelleme</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
        <header>
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
                <a class="navbar-brand" href="../index.php">Öğrenci</a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="../index.php">Listele</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../creat">Yeni Kayıt</a>
                    </li>
                </ul>
            </nav>
        </header>

        <main role="main">
            <div class="jumbotron">
                <div class="container">
                    <h1 class="display-4">Öğrenci Kayıt Güncelleme Ekranı</h1>  
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                    <form action="../update/{{$student->Id}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <label >Adı:</label>
                            <input type="text" class="form-control" value="{{$student->Name}}" placeholder="Adını Giriniz" name="name" id="ad" required>
                        </div>
                        <div class="form-group">
                            <label>Soyadı:</label>
                            <input type="text" class="form-control" value="{{$student->Surname}}" placeholder="Soyadını Giriniz" name="surname" id="surname" required>
                        </div>
                        <div class="form-group">
                            <label>Cinsiyeti:</label>
                            <select id="inputState" name="gender" class="form-control">
                                <option value="0" {{$student->Gender==0 ? 'selected' : '' }} >Kadın</option>
                                <option value="1" {{$student->Gender==1 ? 'selected' : '' }}>Erkek</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sınıf:</label>
                            <select id="inputState" name="classId" class="form-control">
                                    @foreach($class as $item)
                                        <option value="{{$item->Id}}" {{$student->ClassId==$item->Id ? ' selected' : '' }}>{{$item->Name}}  </option>
                                     @endforeach   
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Resmi:</label>
                            <label>{{$student->Img}}</label>
                            <input type='text' Hidden name='img' value="{{$student->Img}}" class='form-control-file border'>
                            <input type="file" class="form-control-file border" name="fileToUpload" >
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Kaydet</button>
                        </form>

                    </div>
                </div>
            </div>
        </main>

        <footer class="container">
            <p>© Company 2017-2018</p>    
        </footer>
    </body>
</html>