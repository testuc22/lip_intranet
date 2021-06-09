<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Load All Application Listing View
     */
    public function index() {
    	return view('admin.applications.application-listing');
    }

    /**
     * Load All Application Listing View
     */
    public function completeApplications() {
    	return view('admin.applications.complete-application');
    }

    /**
     * Load All Application Listing View
     */
    public function pendingApplications() {
    	return view('admin.applications.pending-application');
    }
}
