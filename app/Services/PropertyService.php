<?php

namespace App\Services;

use App\Events\PropertyCreatedEvent;
use App\Events\PropertyDeletedEvent;
use App\Events\PropertyStatusChangedEvent;
use App\Events\PropertyUpdatedEvent;
use App\Models\Property;

class PropertyService
{
    public function createProperty(array $propertyData)
    {
        $property = Property::create($propertyData);
        event(new PropertyCreatedEvent($property));

        return $property;
    }

    public function updateProperty(Property $property, array $propertyData)
    {
        $oldStatus = $property->status; // before update
        $property->update($propertyData);
        event(new PropertyUpdatedEvent($property));
        if ($oldStatus != $property->status) {
            event(new PropertyStatusChangedEvent($property, $oldStatus));
        }
    }

    public function deleteProperty(Property $property)
    {
        $property->delete();
        event(new PropertyDeletedEvent($property));
    }
}
