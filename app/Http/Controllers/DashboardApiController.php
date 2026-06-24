<?php
    namespace App\Http\Controllers;

    use App\Models\Income;
    use App\Models\Expense;
    use Illuminate\Http\Request;

    class DashboardApiController {
        public function data(Request $request) {

            $request->validate([
                'start'=>'required|date',
                'end'=>'required|date'
            ]);

            //Totais
            $income = Income::whereBetween('date', [$request->start, $request->end])->sum('amount');
            $expense = Expense::whereBetween('date', [$request->start, $request->end])->sum('amount');

            //Gastos por categoria
            $categories = Expense::selectRaw('categories.name, SUM(expenses.amount) total')
            ->join('categories', 'categories.id', '=', 'expenses.category_id')
            ->whereBetween('expenses.date', [$request->start, $request->end])
            ->groupBy('categories.name')
            ->get();

            //Fluxo mensal
            $monthly = Income::selectRaw("MONTH(date) month, SUM(amount) total")
            ->whereBetween('date', [$request->start, $request->end])
            ->groupBy('month')
            ->orderBy('month')
            ->get();

            return response()->json([
                "income"=>$income,
                "expense"=>$expense,
                "balance"=>$income - $expense, 

                "categories" => [
                    "labels" => $categories->pluck('name'),
                    "values" => $categories->pluck('total')
                ],

                "monthly" => [
                    "labels" => $monthly->pluck('month'),
                    "values" => $monthly->pluck('total')
                ]
                
            ]);
        }
    }
?>