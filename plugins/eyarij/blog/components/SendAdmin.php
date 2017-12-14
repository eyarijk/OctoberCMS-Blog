<?php namespace Eyarij\Blog\Components;

use Cms\Classes\ComponentBase;
use Eyarij\Blog\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use ValidationException;
use October\Rain\Support\Facades\Flash;

class SendAdmin extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'SendAdmin Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
    function onContact(){
        $data = post();
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
        ];
        $validation = Validator::make($data, $rules);
        if ($validation->fails()) {
            throw new ValidationException($validation);
        }

        $contact = new Contact();
        $contact->name = input('name');
        $contact->email = input('email');
        if(input('message')){
            $contact->message = input('message');
        } else {
            $contact->message = "Без сообщения!";
        }
        $contact->save();
        $vars = ['name' => input('name'),'email' => input('email'),'content' => input('message') ];
        Mail::send('eyarij.blog::message', $vars, function($message) {

            $message->to('admin@domain.tld', 'Admin Person');
            $message->subject('This is a reminder');

        });
        Flash::success('Сообщение отправлено!');

    }
}
