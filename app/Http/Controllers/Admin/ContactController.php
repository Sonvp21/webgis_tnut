<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\ContactRequest;
use App\Models\Admin\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.contacts.index', [
            'contacts' => Contact::query()
                ->when(
                    $request->search,
                    fn($query) => $query->where('name', 'like', '%' . $request->search . '%')
                )
                ->latest()
                ->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.contacts.create');
    }

    public function store(ContactRequest $request): RedirectResponse
    {
        Contact::create($request->all());

        return redirect()->route('admin.contacts.index')->with('success', trans('admin.alerts.success.create'));
    }

    /**
     * @return Factory|View
     */
    public function show(Contact $contact): View
    {
        // Chỉ cập nhật 'read_at' nếu chưa có giá trị
        if (is_null($contact->read_at)) {
            $contact->timestamps = false; // Tắt tự động cập nhật 'updated_at'
            $contact->update([
                'read_at' => now(),
            ]);
            $contact->timestamps = true; // Bật lại tự động cập nhật
        }

        return view('admin.contacts.show', compact('contact'));
    }


    public function edit(Contact $contact): View
    {
        return view('admin.contacts.edit')
            ->with([
                'contact' => $contact,
            ]);
    }

    public function update(Contact $contact, ContactRequest $request): RedirectResponse
    {
        $contact->update($request->all());

        return redirect()->route('admin.contacts.index')->with('success', trans('admin.alerts.success.edit'));
    }

    /**
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return back()->with('success', trans('admin.alerts.success.deleted'));
    }

    public function toggleVisibility(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'status' => 'required|in:0,1'
        ]);

        $contact->update(['status' => $validated['status']]);

        return response()->json([
            'success' => 1,
            'new_status' => $contact->status
        ]);
    }
}
