<?php

namespace App\Http\Controllers\Testimonial;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    public function testimonialView() {
    	return view('admin.testimonial.index');
    }
}
