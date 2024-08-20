<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Http\Request;
use Validator;

class ContactsController extends Controller
{
    private $contactItems = ['name', 'email', 'title', 'body'];

    private $validator = [
        'name'  => 'required|string|max:10',
        'email' => 'required|string|max:50',
        'title' => 'required|string|max:100',
        'body'  => 'required|string|max:255'
    ];

    /**
     * 問い合わせフォームを表示
     *
     * @return object
     **/
    function show(): object
    {
        return view('contact.form');
    }

    /**
     * 確認画面へ移動
     *
     * @param  object $request
     * @return object
     **/
    function post(Request $request): object
    {
        $input = $request->only($this->contactItems);

        $validator = Validator::make($input, $this->validator);

        if ($validator->fails()) {
            return redirect()->action([ContactsController::class, 'show'])
                ->withInput()
                ->withErrors($validator);
        }

        $request->session()->put('form_input', $input);

        return redirect()->action([ContactsController::class, 'confirm']);
    }

    /**
     * 確認処理
     *
     * @param  object $request
     * @return object
     **/
    function confirm(Request $request): object
    {
        $input = $request->session()->get('form_input');

        if (!$input) {
            return redirect()->action([ContactsController::class, 'show']);
        }

        return view('contact.confirm', ['input' => $input]);
    }

    /**
     * 送信処理
     *
     * @param  object $request
     * @return object
     **/
    function send(Request $request, Mailer $mailer): object
    {
        $input = $request->session()->get('form_input');

        if (!$input) {
            return redirect()->action([ContactsController::class, 'show']);
        }

        if ($request->has('back')) {
            return redirect()->action([ContactsController::class, 'show'])
                ->withInput($input);
        }

        $mailer->to($input['email'])->send(new Contact());

        $request->session()->forget('form_input');

        return redirect()->action([ContactsController::class, 'done']);
    }

    /**
     * 完了画面に移動
     *
     * @return object
     **/
    function done(): object
    {
        return view('contact.done');
    }
}
