<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
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
                'content' => $request->content ?? "",
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
        $users = User::pluck('email')->toArray(); // Lấy tất cả email user
        return view('admin.contacts.index', ['title' => 'Quản lý liên hệ'] + compact('contacts','users'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed'
        ]);

        try {
            $contact = Contact::findOrFail($id);
            $contact->status = $request->status;
            $contact->save();

            \Log::info('Cập nhật trạng thái liên hệ thành công', [
                'contact_id' => $id,
                'new_status' => $request->status,
                'updated_by' => auth()->id() ?? 'guest'
            ]);

            return response()->json(['success' => true, 'msg' => 'Cập nhật thành công!']);
        } catch (\Exception $e) {
            \Log::error('Lỗi khi cập nhật trạng thái liên hệ', [
                'contact_id' => $id,
                'error' => $e->getMessage()
            ]);

            return response()->json(['success' => false, 'msg' => 'Lỗi server!'], 500);
        }
    }

    public function destroy($id)
{
    $contact = Contact::findOrFail($id); // tìm liên hệ theo ID, nếu không có sẽ báo lỗi 404
    $contact->delete(); // xóa liên hệ

    return redirect()->back()->with('success', 'Xóa liên hệ thành công!');
}

}
