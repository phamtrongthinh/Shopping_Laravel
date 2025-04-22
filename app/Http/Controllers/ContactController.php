<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('frontend.contact');
    }

    // Xử lý lưu thông tin liên hệ
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'sent_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Cảm ơn bạn đã liên hệ!');
    }

    public function storeAjax(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|regex:/^(0[2-9]{1}[0-9]{8})$/',
            
        ]);

        try {
            // Lưu vào database
            Contact::create([
                'title'   => $request->input('title', 'Liên hệ'),
                'name'    => $request->name,
                'email'   => $request->email,
                'phone'   => $request->phone,
                'content' => $request->content ??"",
            ]);

            // Trả về JSON
            return response()->json([
                'code' => 200,
                'html' => 'Cảm ơn bạn đã liên hệ với chúng tôi!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'html' => 'Có lỗi xảy ra khi gửi thông tin. Vui lòng thử lại!',
            ]);
        }
    }


    // ----------------------------------------admin-------------------------------------------------
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contacts.index', ['title' => 'Quản lý liên hệ'] + compact('contacts'));

    }
}
