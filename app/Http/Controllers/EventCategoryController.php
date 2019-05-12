<?php

namespace App\Http\Controllers;

use App\Services\Event\EventCategoryServiceInterface as EventCategoryService;
use Illuminate\Http\Request;

use App\Http\Requests\CreateEventCategoryRequest;

class EventCategoryController extends Controller
{
    private $eventCategoryService;
    private $eventType;


    public function __construct(EventCategoryService $eventCategoryService)
    {
        $this->eventCategoryService = $eventCategoryService;
    }


    public function store(CreateEventCategoryRequest $request)
    {
        $eventCategory = $request->only(['name', 'description']);

        $this->eventCategoryService->saveNew($eventCategory);

        return redirect('events')->with('success', 'Event Category Created');
    }



}
