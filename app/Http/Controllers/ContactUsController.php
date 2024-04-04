<?php

namespace App\Http\Controllers;

use App\ContactU;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function get_contact_us()
    {
        $contactUs = ContactU::get();
        return response()->json(['success'=>1, 'data'=>$contactUs], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_contact_us(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $contactUs = new ContactU();
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
        $contactUs = ContactU::find($requestedData->id);
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
        $contactUs = ContactU::find($id);
        $contactUs->delete();
        return response()->json(['success'=>1, 'data'=>$contactUs], 200,[],JSON_NUMERIC_CHECK);
    }

}
