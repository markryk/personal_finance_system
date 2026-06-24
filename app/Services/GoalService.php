<?php
    namespace App\Services;
    class GoalService {

        public function progress($goal) {

            if($goal->target_amount <= 0) {
                return 0;
            }

            return round(($goal->current_amount / $goal->target_amount) * 100);
        }
    }
?>