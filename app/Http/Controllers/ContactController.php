<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Lưu thông tin để hiển thị lại
        $data = $request->only('email', 'phone', 'subject', 'message');

        // Chuyển đến view xác nhận
        return view('contact.confirm', compact('data'));
    }
}
