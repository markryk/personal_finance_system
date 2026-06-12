<?php
    namespace App\Http\Controllers;

    use App\Models\Expense;
    use App\Models\Income;
    use App\Services\FinanceService;
    use Illuminate\Support\Facades\DB;

    class DashboardController extends Controller {
        public function index(FinanceService $financeService) {
            $totalIncome = $financeService->totalIncome();
            $totalExpense = $financeService->totalExpense();
            $balance = $financeService->balance();

            $expensesByCategory = Expense::selectRaw('categories.name, SUM(expenses.amount) as total')
            ->join('categories', 'categories.id', '=', 'expenses.category_id')
            ->groupBy('categories.name')
            ->get();

            return view('dashboard.index', compact('totalIncome', 'totalExpense', 'balance', 'expensesByCategory'));
        }
    }
?>