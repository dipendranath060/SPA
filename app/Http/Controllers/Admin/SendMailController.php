<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\FrontendController;
use App\Mail\SendMail;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|min:10|max:11',
            'date' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (strtotime($value) < strtotime(now()->toDateString())) {
                        $fail('The '.$attribute.' must be a date after or equal to today.');
                    }
                },
            ],
            'message' => 'required|string',
            'package' => 'required',
        ]);

        // Fetch the package details by ID
    $package = Package::find($request->package);
    
    // Check if the package is found
    if ($package) {
        $data['package_name'] = $package->title;
    } else {
        // Handle the case where the package is not found
        $data['package_name'] = 'Unknown';
    }

    Mail::to('backenddev.binaryshastra@gmail.com')->send(new SendMail($data));
    return redirect()->route('contact')
                ->with('message', 'Message Submitted.... Thank You for Choosing Us... We will get in touch with you shortly....');
    // dd($request->all());
    }
}


