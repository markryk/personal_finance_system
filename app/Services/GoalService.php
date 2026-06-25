<?php
    namespace App\Services;
    class GoalService {

        //Calcula o progresso da meta
        public function progress($goal) {

            if($goal->target_amount <= 0) {
                return 0;
            }

            return round(($goal->current_amount / $goal->target_amount) * 100);
        }

        //Calcula o restante para atingir a meta
        public function remaining($goal) {
            return max(0, $goal->target_amount - $goal->current_amount);
        }

        //Previsão de conclusão da meta
        public function forecast($goal) {

            $months = $goal
                ->incomes()
                ->selectRaw("MONTH(created_at) month, SUM(amount) total")
                ->groupBy('month')
                ->get();

            if($months->count() == 0) {
                return null;
            }

            $average = $months->avg('total');
            $remaining = $this->remaining($goal);

            return ceil($remaining / $average);
        }

        //Calcular atraso (quanto falta para atingir a meta)
        public function delay($goal) {

            $today = now();
            $totalDays = $goal->created_at->diffInDays($goal->deadline);
            $passed = $goal->created_at->diffInDays($today);
            $expected = ($passed / $totalDays) * 100;
            $current = $this->progress($goal);
            return round($current - $expected);
        }
    }
?>