<?php

namespace App\Services\Event;

use App\Services\Event\EventServiceInterface;
use App\Repositories\Event\EventRepositoryInterface as EventRepository;

class EventService implements EventServiceInterface {

    private $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function fetchAll()
    {
        return $this->eventRepository->fetchAll();
    }
}

