<?php

namespace App\Http\Controllers\Answer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
    public function answerView() {
    	return view('admin.answer.index');
    }
}
