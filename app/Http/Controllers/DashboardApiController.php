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

            $income = Income::whereBetween('date', [$request->start, $request->end])->sum('amount');
            $expense = Expense::whereBetween('date', [$request->start, $request->end])->sum('amount');

            return response()->json([
                'income'=>$income,
                'expense'=>$expense,
                'balance'=>$income - $expense
            ]);
        }
    }
?>