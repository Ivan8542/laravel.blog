<?php

namespace App\Http\Controllers;

use App\Models\Step;
use App\Notifications\TaskStepCompleted;

class CompletedStepsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Step $step)
    {
        $step->complete();

        $step->article->owner->notify(new TaskStepCompleted());

        return back();
    }

    public function destroy(Step $step)
    {
        $step->incomplete();
        return back();
    }
}
