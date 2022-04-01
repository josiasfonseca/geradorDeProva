<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Gerador de Provas</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/perguntas">Perguntas</a>
                </li>
            </ul>
        </div>
    </nav>


    <h3 class="text-center">Correção</h3>

    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">

            <div class="ml-3 p-4">
                @foreach (json_decode($provacorrigida) as $key => $pg)
                    <div class="card mt-2">
                        <h5 class="card-header">Questão {{ $key + 1 }}</h5>
                        <div @class(['card-body', 'alert', 'alert-danger' => $pg->acertou == 0, 'alert-info' => $pg->acertou == 1])>
                            <h5 class="card-title">{{ $pg->pergunta }}</h5>
                            @foreach (json_decode($pg->respostas) as $keys => $resp)
                                <div class="form-check">
                                    {{ $keys }} -- {{ $pg->respostas_dada }}
                                    <input class="form-check-input" type="radio" disabled
                                        {{ $keys == $pg->respostas_dada ? 'checked' : null }}
                                        name="{{ $pg->idperguntas }}" id="questao{{ $pg->idperguntas }}"
                                        value={{ $keys + 1 }}>
                                    <label class="form-check-label" for="questao{{ $pg->idperguntas }}">
                                        {{ $resp->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="col-3"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>
