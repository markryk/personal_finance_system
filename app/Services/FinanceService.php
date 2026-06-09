<?php
    use App\Models\Income;
    use App\Models\Expense;

    class FinanceService {
        public function totalIncome() {
            return Income::sum('amount');
        }

        public function totalExpense() {
            return Expense::sum('amount');
        }

        public function balance() {
            return $this->totalIncome() - $this->totalExpense();
        }
    }
?>