<?php
    namespace App\Http\Controllers;

    use App\Models\Expense;
    use App\Models\Income;
    use App\Services\FinanceService;
    use Illuminate\Support\Facades\DB;

    class DashboardController extends Controller {
        public function index(FinanceService $financeService) {

            $totalIncome = Income::sum('amount');
            $totalExpense = Expense::sum('amount');

            $categories = Expense::selectRaw('categories.name, SUM(expenses.amount) total')
            ->join('categories', 'categories.id', '=', 'expenses.category_id')
            ->groupBy('categories.name')
            ->get();

            return view('dashboard.index', [
                'totalIncome'=> $totalIncome,
                'totalExpense'=> $totalExpense,
                'categoryLabels'=> $categories->pluck('name'),
                'categoryValues'=> $categories->pluck('total')
            ]);

            /*$totalIncome = $financeService->totalIncome();
            $totalExpense = $financeService->totalExpense();
            $balance = $financeService->balance();

            $goal = ['name' => 'Notebook', 'target' => 10000, 'current' => 7500];

            $expensesByCategory = Expense::selectRaw('categories.name, SUM(expenses.amount) as total')
            ->join('categories', 'categories.id', '=', 'expenses.category_id')
            ->groupBy('categories.name')
            ->get();

            $incomesByCategory = Income::selectRaw('categories.name, SUM(incomes.amount) as total')
            ->join('categories', 'categories.id', '=', 'incomes.category_id')
            ->groupBy('categories.name')
            ->get();

            return view('dashboard.index', compact(
                'totalIncome', 
                'totalExpense', 
                'balance', 
                'expensesByCategory', 
                'incomesByCategory', 
                'goal'
                )
            );*/
        }
    }
?>