<?php
/**
 * Created by PhpStorm.
 * User: jidesakin
 * Date: 7/9/16
 * Time: 12:20 AM
 */

namespace App\Repositories\Event;

use App\Attendance;
use App\Event;
use Illuminate\Support\Facades\DB;
use App\Repositories\Event\EventRepositoryInterface;

class EventRepository implements EventRepositoryInterface
{

    private $event;
    private $attendance;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    public function fetchAll()
    {
        return $this->event->orderBy('events.created_at', 'DESC')
            ->get();
    }

    // public function saveNew($event)
    // {
    //     $this->event->event_type_id = $event['event_type'];
    //     $this->event->theme = $event['theme'];
    //     $this->event->description = $event['description'];
    //     $this->event->venue = $event['venue'];
    //     $this->event->ministering = $event['ministering'];
    //     $this->event->event_date = $event['event_date'];

    //     $this->event->save();

    //     return $this->event;

    // }

    // public function getEventAttendance($id)
    // {
    //     $eventAttendance = $this->event->find($id);

    //     $eventAttendance->attendance = $this->event->join('attendances', 'events.id', '=', 'attendances.event_id')
    //         ->rightJoin('members', 'attendances.member_id', '=', 'members.id')
    //         ->select('members.id', DB::raw("CONCAT(members.first_name, ' ', members.last_name ) as member_name"), 'attendances.created_at as checkin_time')
    //         ->get();

    //     return $eventAttendance;
    // }

    // public function saveAttendance($eventId, $memberId)
    // {
    //     $attendanceExist = $this->attendance->where('event_id', $eventId)
    //         ->where('member_id', $memberId)
    //         ->exists();

    //     if ($attendanceExist) {
    //         return $attendanceExist;
    //     }

    //     $this->attendance->event_id = $eventId;
    //     $this->attendance->member_id = $memberId;
    //     $this->attendance->updated_at = $this->attendance->created_at = \Carbon\Carbon::now();

    //     $this->attendance->save();

    //     return $this->attendance;

    // }

    // public function removeAttendance($eventId, $memberId)
    // {
    //     DB::table('attendances')->where('event_id', $eventId)
    //         ->where('member_id', $memberId)
    //         ->delete();
    // }

}
