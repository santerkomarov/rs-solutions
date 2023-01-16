<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Company;

use App\Http\Requests\CompanyStoreRequest;

use App\Services\CheckControlNumberService;
use Validator;
use Illuminate\Validation\ValidationException;

use Illuminate\Support\Facades\Mail;
use App\Mail\CompanyRegistration;

class MainController extends Controller
{
    /**
     * Показ страницы "Главная"
     * Форма для заполнения данных
     */
    public function index() {
        
        return view('home');
    }

    /**
     * Сохранение в БД данных из формы с валидацией данных
     * Отправка сообщения после создания экземпляра компании
     */
    public function store(CompanyStoreRequest $request, CheckControlNumberService $check) {
        
        // Проверка "Я не робот"
        $checking = $check->checkNumbers($request->generated_random, $request->check_number);
    
        if ($checking) {
            
            // Сохраняем файл, берём путь + хэш имени файла 
            $pdf_path = $request->file->store('state_registration');

            $requestData = $request->all();
            // Перезапись значения
            $requestData['file'] = $pdf_path;
        
            // Отправляем письмо о регистрации компании на сайте
            Mail::to('hallinto@rambler.ru')->send(new CompanyRegistration());
            
            // Создаём компанию
            Company::create($requestData);

            return redirect()->route('table');

        } else {
           
            // Добавляем новое уведомление об ошибке
            $validator = Validator::make([], []);
            $validator->errors()->add('check_numbers', 'Неправильно набранный код');
            
            // Показываем ошибку
            throw new ValidationException($validator);
        }
    }

    /**
     * Показ страницы "Список компаний"
     * Отображение в обратном порядке, самые поздние записи вверху списка
     */
    public function table() {

        $companies = Company::all()->reverse();
        
        return view('table', compact('companies'));
    }


    /**
     * Показ страницы "О проекте"
     */
    public function about() {
        
        return view('about');
    }

    /**
     * Отображение pdf файла
     */
    public function pdf($id) {

        $company = Company::findOrFail($id);
        
        $download_path = (storage_path('app/public'). '/' . $company->file);

        return response()->file($download_path);
    }
}
