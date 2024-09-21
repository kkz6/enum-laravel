<?php

use App\UserStatusEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

Route::get('/', function () {
    return view('welcome');
});

Route::get('enum/{status}', function ($status){
    try{
        $status = UserStatusEnum::from($status);

        //further actions for the code.

        dd('are you hugry');

    }catch (ValueError|Exception $exception){
        abort(404);
    }
});

















/**
 * Throws 404 on not matching cases
 */

Route::get('enum/{status}/cast', function (UserStatusEnum $status){
        //further actions for the code.

    dd('how many noted the spelling mistake');
});























/**
 * validation in array format
 */

Route::get('validate', function (Request $request){
    try{

        Validator::make($request->all(),[
            'status' => ['required', Rule::in(array_column(UserStatusEnum::cases(),'value'))],
        ])->validate();

    }catch (\Exception $e){

        dd($e);


    }
});





















Route::get('validate-cast', function (Request $request){
    try{

        Validator::make($request->all(),[
            'status' => ['required', Rule::enum(UserStatusEnum::class)],
        ])->validate();


        dd('hello from hngry puppy');

    }catch (\Exception $e){

        dd($e);

    }
});



