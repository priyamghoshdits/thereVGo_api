<?php

namespace App\Http\Controllers;

use App\Contactuslead;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function get_contact_us()
    {
        $contactUs = Contactuslead::get();
        return response()->json(['success'=>1, 'data'=>$contactUs], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_contact_us(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $contactUs = new Contactuslead();
        $contactUs->name = $requestedData->name;
        $contactUs->email = $requestedData->email;
        $contactUs->phone = $requestedData->phone;
        $contactUs->subject = $requestedData->subject;
        $contactUs->message = $requestedData->message;
        $contactUs->save();
        return response()->json(['success'=>1, 'data'=>$contactUs], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_contact_us(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $contactUs = Contactuslead::find($requestedData->id);
        $contactUs->name = $requestedData->name;
        $contactUs->email = $requestedData->email;
        $contactUs->phone = $requestedData->phone;
        $contactUs->subject = $requestedData->subject;
        $contactUs->message = $requestedData->message;
        $contactUs->update();
        return response()->json(['success'=>1, 'data'=>$contactUs], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_contact_us($id)
    {
        $contactUs = Contactuslead::find($id);
        $contactUs->delete();
        return response()->json(['success'=>1, 'data'=>$contactUs], 200,[],JSON_NUMERIC_CHECK);
    }

}
