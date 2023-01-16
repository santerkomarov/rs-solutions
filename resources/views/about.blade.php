<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RS-Solutions</title>

        <link href="{{ './css/style.css' }}" rel="stylesheet">
        <link href="{{ './css/normalizer.css' }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="d-flex flex-column min-vh-100">
        <x-nav-bar/>
        <div style="height: 30px;"></div>
    
        <div class="container mt-5">
          <h1 class="my-4">
            О проекте
          </h1>
            <div class="mb-4">
              <p>
                В проекте использован Bootstrap4 для отображения стилей и Jquery для работы небольшой логики, а именно
                отображения информации к заполняемым полям. Вся валидация полей происходит на сервере по условиям задачи.
              </p>
              <p>
                На главной странице происходит заполнение всех данных об организации. При корректном вводе всех значений результаты записываются в Базу Данных и
                отправляется сообщение на электронный адрес <strong>karina@corp.mail.kz</strong><br>
                Далее происходит редирект на страницу просмотра списка компаний.
              </p>
              <p>
                Просмотр кода этого проекта доступен на Github.
                <a href="{{ url('https://github.com/santerkomarov/Kivipaasi') }}" class="btn btn-secondary btn-sm" role="button">перейти</a>
              </p>
            </div>
            <div class="bg-warning p-2">
              <p>
                По условиям теста не было указано о создании функционала CRUD  к элементам списка компаний, поэтому этот момент пропущен.
              </p>
              <p>
                Не было уделено внимание к созданию компонентов и слотов для полей в форме.
              </p>
              <p>
                Некоторое противоречие в требованиях задачи по правилам к полям (БИН организации)
              </p>
              <p>
                Не реализовано условие выделения блока зелёным цветом при правильном вводе, так как это трубует JS и более конкретного обсуждения. Готов это реализовать при необходимости.
              </p>

            </div>
        </div>

        <div>


          <form  action="{{route('post.store')}}" enctype="multipart/form-data" method="post">
            <input name="company_name"  type="text" class="form-control" id="fio" placeholder="Наименование организации">
            @csrf
            <button type="submit" class="w-50 mx-auto btn btn-warning">Регистрация</button>
          </form>




        </div>
        <x-footer />
    </body>
</html>
