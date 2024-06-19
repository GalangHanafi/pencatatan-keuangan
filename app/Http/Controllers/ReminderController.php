<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // current user
        $user = auth()->user();
        $user = User::find($user->id);

        $data = [
            'title' => 'Reminder',
            'breadcrumbs' => [
                'Reminder' => "#",
            ],
            'reminders' => $user->reminders()->get(),
            'content' => 'reminder.index',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Create Reminder',
            'breadcrumbs' => [
                'Reminder' => route('reminder.index'),
                'Create' => '#',
            ],
            'content' => 'reminder.create',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $user = User::find($user->id);

        $data = $request->validate([
            'name' => 'required|string',
            'frequency' => 'required|string|in:none,week,month,year',
            'date' => 'nullable|date|required_if:frequency,month,year,none',
            'day_of_week' => 'nullable|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday|required_if:frequency,week',
        ]);

        if ($data['frequency'] == 'week') {
            $data['date'] = Carbon::now()->next($data['day_of_week'])->toDateString();
        }

        $user->reminders()->create($data);

        return redirect()->route('reminder.index')->with('success', 'Reminder created successfully, Next reminder will be set on ' . $data['date']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reminder $reminder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reminder $reminder)
    {
        $user = auth()->user();

        if ($user->id != $reminder->user_id) {
            return abort(404);
        }

        $data = [
            'title' => 'Edit Reminder',
            'breadcrumbs' => [
                'Reminder' => route('reminder.index'),
                'Edit' => '#',
            ],
            'reminder' => $reminder,
            'content' => 'reminder.edit',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reminder $reminder)
    {
        $user = auth()->user();
        if ($user->id != $reminder->user_id) {
            return abort(404);
        }

        $data = $request->validate([
            'name' => 'required|string',
            'frequency' => 'required|string|in:none,week,month,year',
            'date' => 'nullable|date|required_if:frequency,month,year,none',
            'day_of_week' => 'nullable|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday|required_if:frequency,week',
        ]);

        if ($data['frequency'] == 'week') {
            $data['date'] = Carbon::now()->next($data['day_of_week'])->toDateString();
        }

        $reminder->update($data);

        return redirect()->route('reminder.index')->with('success', 'Reminder updated successfully, Next reminder will be set on ' . $data['date']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reminder $reminder)
    {
        $user = auth()->user();
        if ($user->id != $reminder->user_id) {
            return abort(404);
        }

        $reminder->delete();

        return redirect()->route('reminder.index')->with('success', $reminder->name . ' Reminder deleted successfully');
    }
}
