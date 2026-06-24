<?php
    namespace App\Http\Controllers;
    
    use App\Models\FinancialGoal;
    use App\Services\GoalService;

    class GoalApiController extends Controller {

        public function index(GoalService $service) {

            $goals = FinancialGoal::all()->map(function($goal) use ($service) {
                $goal->progress = $service->progress($goal);
                return $goal;
            });

            return response()->json($goals);
        }
    }
?>