<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
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


    <h3 class="text-center">Gerador de Provas</h3>

    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">

            <div class="ml-3 p-4">
                <form method="post" action="/prova">
                @csrf
                    <div class="form-group">
                        <label for="exampleInputNome">Nome do aplicante</label>
                        <input type="text" required maxlength="80" class="form-control" name="nome" id="exampleInputNome" placeholder="Nome do aplicante">
                    </div>
                    <br />
                    Nivel da Prova:
                    <br />
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="nivel" id="facil" value="1" checked>
                        <label class="form-check-label" for="facil">Fácil</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="nivel" id="medio" value="2">
                        <label class="form-check-label" for="medio">Médio</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="nivel" id="dificil" value="3">
                        <label class="form-check-label" for="dificil">Difícil</label>
                    </div>
                    <br />
                    <br />
                    <div class="form-group">
                        <label for="exampleInputQntQuestoes">Qtde de Questões</label>
                        <input type="number" name="qntQuestoes" min="1" max="10" required class="form-control" id="exampleInputQntQuestoes" value="10">
                    </div>
                    <br />
                    <button type="submit" class="btn btn-primary" >Gerar</button>
                </form>
            </div>

        </div>
        <div class="col-3"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
