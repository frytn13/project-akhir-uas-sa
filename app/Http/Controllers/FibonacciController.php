<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FibonacciController extends Controller
{
    public function index()
    {
        return view('fibonacci.index');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'number' => 'required|integer|min:0|max:20'
        ]);

        $number = $request->number;
        $result = $this->fibonacci($number);
        $sequence = $this->getFibonacciSequence($number);

        return view('fibonacci.index', [
            'number' => $number,
            'result' => $result,
            'sequence' => $sequence
        ]);
    }

    private function fibonacci($n)
    {
        if ($n <= 1) {
            return $n;
        }
        return $this->fibonacci($n - 1) + $this->fibonacci($n - 2);
    }

    private function getFibonacciSequence($n)
    {
        $sequence = [];
        for ($i = 0; $i <= $n; $i++) {
            $sequence[] = $this->fibonacci($i);
        }
        return $sequence;
    }
}
