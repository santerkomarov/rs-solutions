<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <body class="d-flex flex-column min-vh-100">
          <x-nav-bar/>

          <div style="height: 30px;"></div>
    
        <div class="container mt-5">
            <div class="h2">Список зарегистрированных организаций</div>
        </div>

        <div>
        </div>
    
        <div class="container py-4">
            <div id="accordion">
              @foreach ($companies as $company)
                <div class="card">
                  <div class="card-header p-0" id="item{{$company->id}}">
                    <h5 class="mb-0">
                      <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$company->id}}" aria-expanded="true" aria-controls="collapse{{$company->id}}">
                        <strong>{{$company->company_name}}</strong>
                      </button>
                    </h5>
                  </div>
              
                  <div id="collapse{{$company->id}}" class="collapse" aria-labelledby="item{{$company->id}}" data-parent="#accordion">
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li>
                                <div class="d-flex border-bottom border-top border-light wrapp">
                                    <div class="list-name">
                                        Наименование организации
                                    </div>
                                    <div class="bg-light px-3 rounded">
                                        <strong>{{$company->company_name}}</strong> 
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex border-bottom border-light wrapp">
                                    <div class="list-name">
                                        Юридический адрес организации
                                    </div>
                                    <div class="bg-light px-3 rounded">
                                        <strong>{{$company->company_address}}</strong> 
                                    </div>
                                </div>
                            </li>
                            <li>
                              <div class="d-flex border-bottom border-light wrapp">
                                <div class="list-name">
                                  Почтовый индекс
                                </div>
                                <div class="bg-light px-3 rounded">
                                    <strong>{{$company->post_index}}</strong> 
                                </div>
                              </div>
                            </li>
                            <li>
                              <div class="d-flex border-bottom border-light wrapp">
                                <div class="list-name">
                                  Телефон организации
                                </div>
                                <div class="bg-light px-3 rounded">
                                    <strong>{{$company->company_phone}}</strong> 
                                </div>
                              </div>
                            </li>
                            <li>
                              <div class="d-flex border-bottom border-light wrapp">
                                <div class="list-name">
                                  E-mail адрес организации
                                </div>
                                <div class="bg-light px-3 rounded">
                                    <strong>{{$company->company_email}}</strong> 
                                </div>
                              </div>
                            </li>
                            <li>
                              <div class="d-flex border-bottom border-light wrapp">
                                <div class="list-name">
                                  БИН организации
                                </div>
                                <div class="bg-light px-3 rounded">
                                    <strong>{{$company->company_bin}}</strong> 
                                </div>
                              </div>
                            </li>
                            <hr>
                            <li>
                              <div class="d-flex border-bottom border-light wrapp">
                                <div class="list-name">
                                  ИИК KZ
                                </div>
                                <div class="bg-light px-3 rounded">
                                    <strong>{{$company->company_iik}}</strong> 
                                </div>
                              </div>
                            </li>
                            <li>
                              <div class="d-flex border-bottom border-light wrapp">
                                <div class="list-name">
                                  Наименование банка
                                </div>
                                <div class="bg-light px-3 rounded">
                                    <strong>{{$company->bank_name}}</strong> 
                                </div>
                              </div>
                            </li>
                            <li>
                              <div class="d-flex border-bottom border-light wrapp">
                                <div class="list-name">
                                  БИК
                                </div>
                                <div class="bg-light px-3 rounded">
                                    <strong>{{$company->bank_bik}}</strong> 
                                </div>
                              </div>
                            </li>
                            <hr>
                            <li>
                              <div class="d-flex border-bottom border-light wrapp">
                                <div class="list-name">
                                  ФИО руководителя организации
                                </div>
                                <div class="bg-light px-3 rounded">
                                    <strong>{{$company->company_ceo_fio}}</strong> 
                                </div>
                              </div>
                            </li>
                            <li>
                              <div class="d-flex border-bottom border-light wrapp">
                                <div class="list-name">
                                  Ответственное лицо
                                </div>
                                <div class="bg-light px-3 rounded">
                                    <strong>{{$company->responsible_person}}</strong> 
                                </div>
                              </div>
                            </li>
                            <li>
                              <div class="d-flex border-bottom border-light wrapp">
                                <div class="list-name">
                                  Телефон ответственного лица
                                </div>
                                <div class="bg-light px-3 rounded">
                                    <strong>{{$company->responsible_person_phone}}</strong> 
                                </div>
                              </div>
                            </li>
                            <li>
                              <div class="d-flex border-bottom border-light wrapp">
                                <div class="list-name">
                                  E-mail ответственного лица
                                </div>
                                <div class="bg-light px-3 rounded">
                                    <strong>{{$company->responsible_person_email}}</strong> 
                                </div>
                              </div>
                            </li>
                            <hr>
                            <li>
                              <div class="d-flex border-bottom border-light wrapp">
                                <div class="list-name">
                                  Желаемое название доменного имени в зоне edu.kz
                                </div>
                                <div class="bg-light px-3 rounded">
                                    <strong>{{$company->desired_domen_name}}</strong> 
                                </div>
                              </div>
                            </li>
                            <li>
                              <div class="d-flex border-bottom border-light wrapp">
                                <div class="list-name">
                                  Государственная регистрация
                                </div>
                                <div class="bg-light px-3 rounded">
                                  <a href="{{ url('pdf',[$company->id]) }}" target="_blank">
                                    <img src="{{ './images/pdf.png' }}" alt="png" class="pdf m-1 rounded">
                                  </a>
                                </div>
                              </div>
                            </li>
                        </ul>                
                      </div>
                  </div>
                </div>
                @endforeach
            </div>
        </div>    
        <x-footer />
    </body>
</html>
