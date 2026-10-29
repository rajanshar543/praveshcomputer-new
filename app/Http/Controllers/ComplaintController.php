<?php

namespace App\Http\Controllers;

use App\Mail\NewComplaintNotification;
use App\Models\complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ComplaintController extends Controller
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


        return view('Frontend.pages.complaint');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:100',
            'email'       => 'nullable|email|max:150',
            'phone'       => 'required|string|max:15',
            'address'     => 'required|string|max:255',
            'device_type' => 'required|in:Laptop,Desktop,Printer,Other',
            'brand'       => 'required|string|max:100',
            'problem'     => 'required|string|max:1000',
            'visit_date'  => 'nullable|date',
            'time_slot'   => 'nullable|string|max:50',
            'urgency'     => 'required|in:Normal,Urgent',
        ]);

        Complaint::create($validated);

        try {
            Mail::to(config('mail.notifications_to'))->send(new NewComplaintNotification($validated));
        } catch (\Throwable $exception) {
            Log::error('Repair complaint email could not be sent.', ['exception' => $exception->getMessage()]);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Your complaint has been registered successfully! Our technician will contact you soon.',
            ]);
        }

        return redirect()->route('complaint.create')->with('success', 'Your complaint has been registered successfully! Our technician will contact you soon.');
    }

    /**
     * Display the specified resource.
     */
    public function show(complaint $complaint)
    {
        $complaints=$complaint::all(); 


        return view('Backend.pages.complaint-list',compact('complaints'));
    }
    public function updateStatus(Request $request)
{
    $request->validate([
        'id' => 'required|integer|exists:complaints,id',
        'status' => 'required|string|in:Pending,In Progress,Resolved',
    ]);

    $complaint = Complaint::find($request->id);
    $complaint->status = $request->status;
    $complaint->save();

    return response()->json(['success' => true]);
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(complaint $complaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, complaint $complaint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(complaint $complaint)
    {
        //
    }
}
