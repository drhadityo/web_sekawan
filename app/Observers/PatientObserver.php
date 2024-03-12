<?php

namespace App\Observers;

use App\Models\Patient;
use App\Models\EmergencyContact;

class PatientObserver
{
    /**
     * Handle the Patient "created" event.
     *
     * @param  \App\Models\Patient  $patient
     * @return void
     */
    public function creating(Patient $patient)
    {
        if (auth()->check()) {
            $last = EmergencyContact::last()->get()->first()->id;
            $patient->emergency_contact_id = $last;
        }
    }

    /**
     * Handle the Patient "updated" event.
     *
     * @param  \App\Models\Patient  $patient
     * @return void
     */
    public function updated(Patient $patient)
    {
        //
    }

    /**
     * Handle the Patient "deleted" event.
     *
     * @param  \App\Models\Patient  $patient
     * @return void
     */
    public function deleted(Patient $patient)
    {
        //
    }

    /**
     * Handle the Patient "restored" event.
     *
     * @param  \App\Models\Patient  $patient
     * @return void
     */
    public function restored(Patient $patient)
    {
        //
    }

    /**
     * Handle the Patient "force deleted" event.
     *
     * @param  \App\Models\Patient  $patient
     * @return void
     */
    public function forceDeleted(Patient $patient)
    {
        //
    }
}
