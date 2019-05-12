<?php
/**
 * Created by PhpStorm.
 * User: jidesakin
 * Date: 7/9/16
 * Time: 12:20 AM
 */

namespace App\Repositories;


use App\EventCategory;

class EventCategoryRepository implements EventCategoryRepositoryInterface
{

    private $eventCategory;

    public function __construct(EventCategory $eventCategory)
    {
        $this->eventCategory = $eventCategory;
    }


    public function fetchAll()
    {
        return $this->eventCategory->all();
    }


    public function create(array $eventCategory)
    {
        $this->eventCategory->name = $eventCategory['name'];
        $this->eventCategory->description = $eventCategory['description'];
        $this->eventCategory->updated_at = $this->eventCategory->created_at = \Carbon\Carbon::now();

        $this->eventCategory->save();

        return $this->eventCategory;
    }

}
