<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>RS-Solutions</title>
        <link href="{{ './css/style.css' }}" rel="stylesheet">
        <link href="{{ './css/normalizer.css' }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            /* Стили для Popup*/
            .popover-footer{
                padding: 6px 14px;
                background-color: #f7f7f7;
                border-top: 1px solid #ebebeb;
                text-align: right;
            }
        </style>
        <script>
            $(document).ready(function(){
                $('[data-toggle="popover"]').popover({
                    html: true,
                    template: '<div class="popover"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div><div class="popover-footer"><a class="btn btn-info btn-sm">Закрыть</a></div></div>'
                });
                
                // Скрытие Popup окна
                $(document).on("click", ".popover-footer .btn" , function(){
                    $(this).parents(".popover").popover('hide');
                });
            });
            </script>
    </head>
    <body>
        <x-nav-bar/>

        <div style="height: 30px;"></div>
        
        <hr>
        <div class="container">
            <h1 class="my-4">
                Регистрация
            </h1>
            <p>
                Для регистрации компании необходимо заполнить все поля формы.
            </p>
            <p>
                <span class="px-1 rounded badge-primary">?</span> - Справочная информация к требованиям заполнения полей
            </p>
            <p>
                <span class="require"> *</span> - Обязательные к заполнению поля
            </p>

        </div>
        <form  action="{{route('post.store')}}" enctype="multipart/form-data" method="post">
            @csrf
        <div class="container bg-light mb-4">
            <div class="py-3">
                <h5 class="text-primary">Данные организации</h5>
            </div>
            <div class="row mb-4 align-items-end min_height">
                <div class="col-lg">
                    <div class="mb-2">
                        <label for="fio" class="form-label">Наименование организации <br>( пропишите полностью )<span class="require"> *</span>
                            <span class="badge badge-primary" data-toggle="popover" title="Требования проверки" data-content="Поле может
                            содержать только цифровые символы
                            символы латиницы, кирилицы,
                            казахские символы и символы «» , . \ -
                            # № @ &amp; ()">?</span>
                        </label>
                        <input name="company_name" value="{{ old('company_name') }}" type="text" class="form-control" id="fio" placeholder="Наименование организации">
                        @if ($errors->first())
                            <strong class="text-danger">{{ $errors->first('company_name')}}</strong> 
                        @endif
                    </div>
                </div>
                <div class="col-lg">
                    <div class="mb-2">
                        <label for="ur_address" class="form-label">Юридический адрес организации,<br>включая город/область <span class="require">*</span>
                            <span class="badge badge-primary" data-toggle="popover" title="Требования проверки" data-content="Поле может
                            содержать только цифровые символы
                            символы латиницы, кирилицы,
                            казахские символы и символы «» , . \ -
                            # № @ &amp; ()">?</span>
                        </label>
                        <input name="company_address" value="{{ old('company_address') }}" type="text" class="form-control" id="ur_address" placeholder="Юридический адрес организации">
                        @if ($errors->first())
                            <strong class="text-danger">{{ $errors->first('company_address')}}</strong> 
                        @endif
                    </div>
                </div>
                <div class="col-lg">
                    <div class="mb-2">
                        <label for="post_index" class="form-label">Почтовый индекс <span class="require">*</span>
                            <span class="badge badge-primary" data-toggle="popover" title="Требования проверки" data-content="Значение должно быть
                            числом.">?</span>
                        </label>
                        <input name="post_index" value="{{ old('post_index') }}" type="text" class="form-control" id="post_index" placeholder="Почтовый индекс">
                        @if ($errors->first())
                            <strong class="text-danger">{{ $errors->first('post_index')}}</strong> 
                        @endif
                    </div>
                </div>
            </div>
    
            <div class="row mb-4 align-items-end min_height">
                <div class="col-lg">
                    <div class="mb-3">
                        <label for="company_phone" class="form-label">Телефон организации <span class="require">*</span>
                            <span class="badge badge-primary" data-toggle="popover" title="Требования проверки" data-content="Значение должно быть числом.">?</span>
                        </label>
                        <input name="company_phone" value="{{ old('company_phone') }}" type="text" class="form-control" id="company_phone" placeholder="Телефон организации">
                        @if ($errors->first())
                            <strong class="text-danger">{{ $errors->first('company_phone')}}</strong> 
                        @endif
                    </div>
                </div>
                <div class="col-lg">
                    <div class="mb-3">
                        <label for="e-mail" class="form-label">E-mail адрес организации <span class="require">*</span>
                            <span class="badge badge-primary" data-toggle="popover" title="Требования проверки" data-content="Маска для e-mail.">?</span>
                        </label>
                        <input name="company_email" value="{{ old('company_email') }}" type="text" class="form-control" id="e-mail" placeholder="Введите e-mail организации">
                        @if ($errors->first())
                            <strong class="text-danger">{{ $errors->first('company_email')}}</strong> 
                        @endif
                    </div>
                </div>
                <div class="col-lg">
                    <div class="mb-3">
                        <label for="bin" class="form-label">БИН организации (8 цифр) <span class="require">*</span>
                            <span class="badge badge-primary" data-toggle="popover" title="Требования проверки" data-content="Значение должно быть числом, 8 цифр.">?</span>
                        </label>
                        <input name="company_bin" value="{{ old('company_bin') }}" type="text" class="form-control" id="bin" placeholder="Введите БИН организации">
                        @if ($errors->first())
                            <strong class="text-danger">{{ $errors->first('company_bin')}}</strong> 
                        @endif
                    </div>
                </div>
            </div>
        </div>
    
        <div class="container bg-light mb-4">
            <div class="py-3">
                <h5 class="text-primary my-2">Данные банка</h5>
            </div>
    
            <div class="row mb-4 align-items-end min_height">
                <div class="col-lg">
                    <div class="mb-3">
                        <label for="iik" class="form-label">ИИК KZ ( 20-ти значный счёт ) <span class="require">*</span>
                            <span class="badge badge-primary" data-toggle="popover" title="Требования проверки" data-content="Значение должно содержать минимум 20 цифр.">?</span>
                        </label>
                        <input name="company_iik" value="{{ old('company_iik') }}" type="text" class="form-control" id="iik" placeholder="Введите ИИК">
                        @if ($errors->first())
                            <strong class="text-danger">{{ $errors->first('company_iik')}}</strong> 
                        @endif
                    </div>
                </div>
                <div class="col-lg">
                    <div class="mb-3">
                        <label for="bank_name" class="form-label">Наименование банка <span class="require">*</span>
                            <span class="badge badge-primary" data-toggle="popover" title="Требования проверки" data-content="Поле может символы латиницы, кирилицы, казахские символы.">?</span>
                        </label>
                        <input name="bank_name" value="{{ old('bank_name') }}" type="text" class="form-control" id="bank_name" placeholder="Введите наименование банка">
                        @if ($errors->first())
                            <strong class="text-danger">{{ $errors->first('bank_name')}}</strong> 
                        @endif
                    </div>
                </div>
                <div class="col-lg">
                    <div class="mb-3">
                        <label for="bik" class="form-label">БИК ( 8 цифр ) <span class="require">*</span>
                            <span class="badge badge-primary" data-toggle="popover" title="Требования проверки" data-content="Поле должно содержать минимум 8 цифр.">?</span>
                        </label>
                        <input name="bank_bik" value="{{ old('bank_bik') }}" type="text" class="form-control" id="bik" placeholder="Введите БИК">
                        @if ($errors->first())
                            <strong class="text-danger">{{ $errors->first('bank_bik')}}</strong> 
                        @endif
                    </div>
                </div>
            </div>
        </div>
    
        <div class="container bg-light mb-4">
            <div class="py-3">
                <h5 class="text-primary my-2">Персональные данные</h5>
            </div>
            <div class="row mb-4 align-items-end min_height">
                <div class="col-lg">
                    <div class="mb-3">
                        <label for="fio" class="form-label">ФИО руководителя организации <span class="require">*</span>
                            <span class="badge badge-primary" data-toggle="popover" title="Требования проверки" data-content="Поле может
                            содержать только символы латиницы, кирилицы, казахские символы.">?</span>
                        </label>
                        <input name="company_ceo_fio" value="{{ old('company_ceo_fio') }}" type="text" class="form-control" id="fio" placeholder="Введите ФИО руководителя организации">
                        @if ($errors->first())
                            <strong class="text-danger">{{ $errors->first('company_ceo_fio')}}</strong> 
                        @endif
                    </div>
                </div>
                <div class="col-lg">
                    <div class="mb-3">
                        <label for="person" class="form-label">Ответственное лицо <span class="require">*</span>
                            <span class="badge badge-primary" data-toggle="popover" title="Требования проверки" data-content="Поле может
                            содержать только символы латиницы, кирилицы, казахские символы.">?</span>
                        </label>
                        <input name="responsible_person" value="{{ old('responsible_person') }}" type="text" class="form-control" id="person" placeholder="Введите ФИО ответственного лица">
                        @if ($errors->first())
                            <strong class="text-danger">{{ $errors->first('responsible_person')}}</strong> 
                        @endif
                    </div>
                </div>
                <div class="col-lg">
                    <div class="mb-3">
                        <label for="person_phone" class="form-label">Телефон ответственного лица <span class="require">*</span>
                            <span class="badge badge-primary" data-toggle="popover" title="Требования проверки" data-content="Поле может
                            содержать только цифры.">?</span>
                        </label>
                        <input name="responsible_person_phone" value="{{ old('responsible_person_phone') }}" type="text" class="form-control" id="person_phone" placeholder="Введите телефон ответственного лица">
                        @if ($errors->first())
                            <strong class="text-danger">{{ $errors->first('responsible_person_phone')}}</strong> 
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mb-4 align-items-end min_height">
                <div class="col-lg">
                    <div class="mb-3">
                        <label for="person_email" class="form-label">E-mail ответственного лица <span class="require">*</span>
                            <span class="badge badge-primary" data-toggle="popover" title="Требования проверки" data-content="Маска для e-mail.">?</span>
                        </label>
                        <input name="responsible_person_email" value="{{ old('responsible_person_email') }}" type="text" class="form-control" id="person_email" placeholder="Введите E-mail ответственного лица">
                        @if ($errors->first())
                            <strong class="text-danger">{{ $errors->first('responsible_person_email')}}</strong> 
                        @endif
                    </div>
                </div>
                <div class="col-lg"></div>
                <div class="col-lg"></div>
                
            </div>
        </div>
        <div class="container bg-light mb-4 pb-4">
            <div class="py-3">
                <h5 class="text-primary my-2">Дополнительные данные</h5>
            </div>
            <div class="row align-items-end ">
                <div class="col-lg max-width">
                    <div class="mb-3">
                        <label for="domen_name" class="form-label">Желаемое название доменного имени в зоне edu.kz <span class="require">*</span>
                            <span class="badge badge-primary" data-toggle="popover" title="Требования проверки" data-content="Маска для www.">?</span>
                        </label>
                        <input name="desired_domen_name" value="{{ old('desired_domen_name') }}" type="text" class="form-control" id="domen_name" placeholder="Введите название доменного имени">
                    </div>
                </div>
            </div>
            @if ($errors->first('desired_domen_name'))
                <p class="m-0"><strong class="text-danger">{{ $errors->first('desired_domen_name')}}</strong></p> 
            @endif
            <div class="mb-4">
                <div class="row mt-3 align-items-end ">
                    <div class="col-lg max-width">
                        <div class="form-group">
                            <label for="file_load" class="form-label">Загрузите копию свидетельства о государственной регистрации <span class="require">*</span></label>
                            <span class="badge badge-primary" data-toggle="popover" title="Требования проверки" data-content="Размер не должен
                                превышать 2.00 Мб и только PDF.">?</span>  
                            <input name="file" type="file" class="form-control-file" id="file_load">
                        </div>
                    </div>
                </div>
                @if ($errors->first('file'))
                    <p class="m-0"><strong class="text-danger">{{ $errors->first('file')}}</strong></p> 
                @endif
            </div>
            
            <h6 class="text-primary my-2">Антиспам</h6>
            <div class="row">
                <input name="generated_random" hidden value="{{ $random = rand(100,1000);}}">
                <div class="col max-width">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Введите код: &nbsp;<b>{{$random}}</b></span>
                        </div>
                        <input name="check_number" value="{{ old('check_number') }}" type="text" class="form-control {{($errors->first('check_numbers') ? 'form-error' : '')}}" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                </div>
            </div>
            @if ($errors->first('check_numbers'))
                <p class="m-0"><strong class="text-danger">{{ $errors->first('check_numbers')}}</strong></p> 
            @endif
        </div>
    
        <div class="container mb-5 p-3">
            <div class="row justify-content-center">
                <button type="submit" class="w-50 mx-auto btn btn-warning">Регистрация</button>
            </div>
        </div>
    </form>
    

    <x-footer/>

    </body>
</html>
