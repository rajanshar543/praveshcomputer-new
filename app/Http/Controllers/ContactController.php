<?php

namespace App\Http\Controllers;

use App\Mail\NewEnquiryNotification;
use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view('Frontend.pages.contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'mobile'     => 'required|string|max:15',
            'email'      => 'nullable|email|max:150',
            'message'    => 'required|string|max:1000',
        ]);

        contact::create($validated);

        try {
            Mail::to(config('mail.notifications_to'))->send(new NewEnquiryNotification($validated));
        } catch (\Throwable $exception) {
            Log::error('Website enquiry email could not be sent.', ['exception' => $exception->getMessage()]);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Your enquiry has been submitted successfully! Our team will contact you soon.',
            ]);
        }

        return redirect()->back()->with('success', 'Your query has been submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(contact $contact)
    {
        $contacts = contact::all();

        return view('Backend.pages.contact-list', compact('contacts'));
    }

    public function updateStatus(Request $request)
    {
        $contact = Contact::find($request->id);

        if ($contact) {
            $contact->status = $request->status;
            $contact->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(contact $contact)
    {
        //
    }
}
