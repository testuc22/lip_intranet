<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Load Home Page View ON frontend
     */
    public function index() {
    	return view('frontend.home');
    }

    /**
     * Load New Enrolment View Page
     */
    public function create() {
    	return view('frontend.adhar.new-enrolment');
    }

    /**
     * Load Update Enrolment View Page
     */
    public function updateEnrolmentForm() {
    	return view('frontend.adhar.update-enrolment');
    }
}
