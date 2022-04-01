<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
</head>

<body>
    <div id="app">

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
                        <a class="nav-link" href="/">Gerador de Provas</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/perguntas">Perguntas</a>
                    </li>
                </ul>
            </div>
        </nav>


        <h3 class="text-center">Perguntas</h3>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">

                <div class="ml-3 p-4">
                    <form method="post" action="/perguntas">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputNome">Pergunta</label>
                            <input type="text" required maxlength="200" class="form-control" name="pergunta"
                                id="pergunta" placeholder="pergunta">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNome">Rotulo</label>
                            <input type="text" required maxlength="80" class="form-control" name="rotulo"
                                id="rotulo" placeholder="Rotulo">
                        </div>
                        <br />
                        Nivel da Pergunta:
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
                        Respostas:&nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-primary btn-rounded" @click="addElementoResposta">+</button>
                        <br />
                        <br />
                        <div id="respostas">

                        </div>

                        <button class="btn btn-primary mt-2" type="submit">Salvar</button>
                    </form>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
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
    <script>
        var app = new Vue({
            el: '#app',
            delimiters: ['[[', ']]'],
            data: {
                respostas: [],
                id: 0,
                form: {
                    resposta: '',
                    resposta1: '',
                    resposta2: '',
                    resposta3: '',
                    resposta4: '',
                    resposta5: ''
                }
            },
            methods: {
                salvar(e) {
                    e.preventDefault();
                    console.log(this.form)
                },
                addElementoResposta(e) {
                    e.preventDefault();
                    this.id++;

                    if (this.id > 4) {
                        alert("MAXIMO 4 OPCOES");
                        return
                    }
                    const ele = document.getElementById('respostas');

                    var formGroup = document.createElement("div")
                    formGroup.setAttribute("class", "form-group")

                    var label = document.createElement('label')
                    label.setAttribute("for", "pergunta");

                    var textLabel = document.createTextNode('Resposta ' + this.id)
                    label.appendChild(textLabel)

                    var check = document.createElement('input')
                    check.setAttribute('class', 'form-check-input')
                    check.setAttribute('type', 'radio')
                    check.setAttribute('required', '')
                    check.setAttribute('name', 'correta')
                    check.setAttribute('value', this.id)

                    var label1 = document.createElement('label')
                    label1.setAttribute("for", "pergunta");
                    var textLabel1 = document.createTextNode('RR')
                    label1.appendChild(textLabel1)

                    var input = document.createElement('input')
                    input.setAttribute('class', 'form-control')
                    input.setAttribute('type', 'text')
                    input.setAttribute('name', 'pergunta'+this.id)

                    var br = document.createElement('br')
                    var labelRadio = document.createElement('label')
                    var textLabelRadio = document.createTextNode('Correta')
                    labelRadio.appendChild(textLabelRadio)

                    formGroup.appendChild(label);
                    formGroup.appendChild(br);
                    formGroup.appendChild(check);
                    formGroup.appendChild(labelRadio);
                    formGroup.appendChild(input);
                    ele.appendChild(formGroup)


                }
            }
        })
    </script>
</body>

</html>
