<?php
    namespace App\Http\Controllers;
    
    use App\Models\FinancialGoal;
    use App\Services\GoalService;

    class GoalApiController extends Controller {

        public function index(GoalService $service) {

            /*$goals = FinancialGoal::all()->map(function($goal) use ($service) {
                $goal->progress = $service->progress($goal);
                $goal->remaining = $service->remaining($goal);
                $goal->forecast = $service->forecast($goal);
                $goal->delay = $service->delay($goal);
                return $goal;
            });

            return response()->json($goals);*/

            return  response()->json(FinancialGoal::all()->map(function($goal) use ($service) {
                return [
                    'id'=>$goal->id,
                    'name'=>$goal->name,
                    'target_amount'=>$goal->target_amount,
                    'current_amount'=>$goal->current_amount,
                    'progress'=> $service->progress($goal),
                    'remaining'=> $service->remaining($goal),
                    'forecast'=> $service->forecast($goal),
                    'delay'=> $service->delay($goal)
                ];
            }));
        }
    }
?>