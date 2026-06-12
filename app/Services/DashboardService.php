<?php
    use App\Models\Expense;
    use App\Models\Income;

    class DashboardService {
        public function totals() {
            $income = Income::sum('amount');
            $expense = Expense::sum('amount');

            return [
                'income' => $income,
                'expense' => $expense,
                'balance' => $income - $expense,
            ];
        }
    }
?>