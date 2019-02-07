<?php

namespace App\Policies;

use App\Event;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the event.
     *
     * @param  \  $user
     * @param  \App\Event  $event
     * @return mixed
     */
    public function view( $user, Event $event)
    {
        return ($event->chairman !== null && $user->id === $event->chairman->id) || $event->optional->contains($user->id) || $event->required->contains($user->id);
    }

    /**
     * Determine whether the user can create events.
     *
     * @param  \  $user
     * @return mixed
     */
    public function create( $user)
    {
        //
    }

    /**
     * Determine whether the user can update the event.
     *
     * @param  \  $user
     * @param  \App\Event  $event
     * @return mixed
     */
    public function update( $user, Event $event)
    {
        return $user->id === $event->chairman->id;
    }

    /**
     * Determine whether the user can delete the event.
     *
     * @param  \  $user
     * @param  \App\Event  $event
     * @return mixed
     */
    public function delete( $user, Event $event)
    {
        return $user->id === $event->chairman->id;
    }

    /**
     * Determine whether the user can restore the event.
     *
     * @param  \  $user
     * @param  \App\Event  $event
     * @return mixed
     */
    public function restore( $user, Event $event)
    {
        return $user->id === $event->chairman->id;
    }

    /**
     * Determine whether the user can permanently delete the event.
     *
     * @param  \  $user
     * @param  \App\Event  $event
     * @return mixed
     */
    public function forceDelete( $user, Event $event)
    {
        return $user->id === $event->chairman_id;
    }
}
