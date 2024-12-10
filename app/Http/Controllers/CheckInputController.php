<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckInputController extends Controller
{
    public function index()
    {
        return view('check_input');
    }
    public function process(Request $request)
    {
        $input1 = strtoupper($request->input('input1'));
        $input2 = strtoupper($request->input('input2'));

        $input1Chars = array_unique(str_split($input1));
        $input2Chars = array_unique(str_split($input2));

        $check_char = array_intersect($input1Chars, $input2Chars);
        $char_matches = implode(',', $check_char);

        if(count($check_char) > 0) {
            $commonCount = count($check_char);
        }

        $percentage = ($commonCount / strlen($input1)) * 100;

        return view('result_check', [
            'input1' => $input1,
            'input2' => $input2,
            'matches' => $commonCount,
            'char_matches' => $char_matches,
            'percentage' => $percentage
        ]);
    }
}
