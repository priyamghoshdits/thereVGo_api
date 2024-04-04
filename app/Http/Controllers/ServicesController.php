<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServicesController extends Controller
{
    public function get_services()
    {
        $service = Service::get();
        return response()->json(['success'=>1, 'data'=>$service], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_service(Request $request)
    {
        $service = new Service();
        $service->heading = $request['heading'];
        $service->description = $request['description'];
        $service->short_description = $request['short_description'];

        if ($files = $request->file('image')) {
            // Define upload path
            $destinationPath = public_path('/service/img/'); // upload path
            // Upload Orginal Image
            $file_name = $files->getClientOriginalName();
            $files->move($destinationPath, $file_name);
        }

        $service->image = $file_name;

        if ($files = $request->file('icon')) {
            // Define upload path
            $destinationPath = public_path('/service/icon/'); // upload path
            // Upload Orginal Image
            $file_name = $files->getClientOriginalName();
            $files->move($destinationPath, $file_name);
        }
        $service->icon = $file_name;
        $service->save();

        return response()->json(['success'=>1, 'data'=>$service], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_service(Request $request)
    {
        $service = Service::find($request['id']);
        if ($files = $request->file('image')) {
            if (file_exists(public_path() . '/service/img/' . $service->image)) {
                File::delete(public_path() . '/service/img/' . $service->image);
            }
            $destinationPath = public_path('/service/img/'); // upload path
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
        }
        if ($files = $request->file('icon')) {
            if (file_exists(public_path() . '/service/icon/' . $service->icon)) {
                File::delete(public_path() . '/service/icon/' . $service->icon);
            }
            $destinationPath = public_path('/service/icon/'); // upload path
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
        }
        $service->image = $request['image_name'] ?? $service->image;
        $service->heading = $request['heading'] ?? $service->heading;
        $service->description = $request['description'] ?? $service->description;
        $service->icon = $request['icon_name'] ?? $service->icon;
        $service->update();

        return response()->json(['success'=>1, 'data'=>$service], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_service($id)
    {
        $service = Service::find($id);
        if (file_exists(public_path() . '/service/img/' . $service->image)) {
            File::delete(public_path() . '/service/img/' . $service->image);
        }
        if (file_exists(public_path() . '/service/icon/' . $service->icon)) {
            File::delete(public_path() . '/service/icon/' . $service->icon);
        }
        $service->delete();
    }

}
