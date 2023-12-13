<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCalendarEventRequest;
use App\Http\Requests\UpdateCalendarEventRequest;
use App\Models\CalendarEvent;

class CalendarEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $year, int $month)
    {
        $calendarEvents = CalendarEvent::whereHas("calendar", function ($query) {
            $query->where('active', true);
            // $query->where('user_id', auth()->user()->id);
        })
        ->where(function ($query) use ($year, $month) {
            $query->whereYear('start_date', $year)
                ->whereMonth('start_date', $month);
        })
        ->orWhere(function ($query) use ($year, $month) {
            $query->whereYear('end_date', $year)
                ->whereMonth('end_date', $month);
        })
        ->orderBy('start_date')
        ->get();

        return $calendarEvents->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCalendarEventRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CalendarEvent $calendarEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CalendarEvent $calendarEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCalendarEventRequest $request, CalendarEvent $calendarEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CalendarEvent $calendarEvent)
    {
        //
    }
}
