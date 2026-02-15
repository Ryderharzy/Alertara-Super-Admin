<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Law Enforcement Routes
Route::get('/law-enforcement-and-incident-reporting/sample-item-1', function () {
    return view('1-law-enforcement-and-incident-reporting.sample-item-1');
})->name('law-enforcement.sample-item-1');

Route::get('/law-enforcement-and-incident-reporting/sample-item-2', function () {
    return view('1-law-enforcement-and-incident-reporting.sample-item-2');
})->name('law-enforcement.sample-item-2');

Route::get('/law-enforcement-and-incident-reporting/sample-item-3', function () {
    return view('1-law-enforcement-and-incident-reporting.sample-item-3');
})->name('law-enforcement.sample-item-3');

Route::get('/law-enforcement-and-incident-reporting/sample-item-4', function () {
    return view('1-law-enforcement-and-incident-reporting.sample-item-4');
})->name('law-enforcement.sample-item-4');

Route::get('/law-enforcement-and-incident-reporting/sample-item-5', function () {
    return view('1-law-enforcement-and-incident-reporting.sample-item-5');
})->name('law-enforcement.sample-item-5');

Route::get('/law-enforcement-and-incident-reporting/sample-item-6', function () {
    return view('1-law-enforcement-and-incident-reporting.sample-item-6');
})->name('law-enforcement.sample-item-6');

Route::get('/law-enforcement-and-incident-reporting/sample-non-dropdown-item', function () {
    return view('1-law-enforcement-and-incident-reporting.sample-non-dropdown-item');
})->name('law-enforcement.sample-non-dropdown-item');

// Traffic Routes
Route::get('/traffic-and-transport-management/sample-item-1', function () {
    return view('2-traffic-and-transport-management.sample-item-1');
})->name('traffic.sample-item-1');

Route::get('/traffic-and-transport-management/sample-item-2', function () {
    return view('2-traffic-and-transport-management.sample-item-2');
})->name('traffic.sample-item-2');

Route::get('/traffic-and-transport-management/sample-item-3', function () {
    return view('2-traffic-and-transport-management.sample-item-3');
})->name('traffic.sample-item-3');

Route::get('/traffic-and-transport-management/sample-item-4', function () {
    return view('2-traffic-and-transport-management.sample-item-4');
})->name('traffic.sample-item-4');

Route::get('/traffic-and-transport-management/sample-item-5', function () {
    return view('2-traffic-and-transport-management.sample-item-5');
})->name('traffic.sample-item-5');

Route::get('/traffic-and-transport-management/sample-item-6', function () {
    return view('2-traffic-and-transport-management.sample-item-6');
})->name('traffic.sample-item-6');

Route::get('/traffic-and-transport-management/sample-non-dropdown-item', function () {
    return view('2-traffic-and-transport-management.sample-non-dropdown-item');
})->name('traffic.sample-non-dropdown-item');

// Fire Routes
Route::get('/fire-and-rescue-services-management/sample-item-1', function () {
    return view('3-fire-and-rescue-services-management.sample-item-1');
})->name('fire.sample-item-1');

Route::get('/fire-and-rescue-services-management/sample-item-2', function () {
    return view('3-fire-and-rescue-services-management.sample-item-2');
})->name('fire.sample-item-2');

Route::get('/fire-and-rescue-services-management/sample-item-3', function () {
    return view('3-fire-and-rescue-services-management.sample-item-3');
})->name('fire.sample-item-3');

Route::get('/fire-and-rescue-services-management/sample-item-4', function () {
    return view('3-fire-and-rescue-services-management.sample-item-4');
})->name('fire.sample-item-4');

Route::get('/fire-and-rescue-services-management/sample-item-5', function () {
    return view('3-fire-and-rescue-services-management.sample-item-5');
})->name('fire.sample-item-5');

Route::get('/fire-and-rescue-services-management/sample-item-6', function () {
    return view('3-fire-and-rescue-services-management.sample-item-6');
})->name('fire.sample-item-6');

Route::get('/fire-and-rescue-services-management/sample-non-dropdown-item', function () {
    return view('3-fire-and-rescue-services-management.sample-non-dropdown-item');
})->name('fire.sample-non-dropdown-item');

// Emergency Routes
Route::get('/emergency-response-system/sample-item-1', function () {
    return view('4-emergency-response-system.sample-item-1');
})->name('emergency.sample-item-1');

Route::get('/emergency-response-system/sample-item-2', function () {
    return view('4-emergency-response-system.sample-item-2');
})->name('emergency.sample-item-2');

Route::get('/emergency-response-system/sample-item-3', function () {
    return view('4-emergency-response-system.sample-item-3');
})->name('emergency.sample-item-3');

Route::get('/emergency-response-system/sample-item-4', function () {
    return view('4-emergency-response-system.sample-item-4');
})->name('emergency.sample-item-4');

Route::get('/emergency-response-system/sample-item-5', function () {
    return view('4-emergency-response-system.sample-item-5');
})->name('emergency.sample-item-5');

Route::get('/emergency-response-system/sample-item-6', function () {
    return view('4-emergency-response-system.sample-item-6');
})->name('emergency.sample-item-6');

Route::get('/emergency-response-system/sample-non-dropdown-item', function () {
    return view('4-emergency-response-system.sample-non-dropdown-item');
})->name('emergency.sample-non-dropdown-item');

// Safety Campaign Routes
Route::get('/public-safety-campaign-management/sample-item-1', function () {
    return view('7-public-safety-campaign-manageement.sample-item-1');
})->name('safety-campaign.sample-item-1');

Route::get('/public-safety-campaign-management/sample-item-2', function () {
    return view('7-public-safety-campaign-manageement.sample-item-2');
})->name('safety-campaign.sample-item-2');

Route::get('/public-safety-campaign-management/sample-item-3', function () {
    return view('7-public-safety-campaign-manageement.sample-item-3');
})->name('safety-campaign.sample-item-3');

Route::get('/public-safety-campaign-management/sample-item-4', function () {
    return view('7-public-safety-campaign-manageement.sample-item-4');
})->name('safety-campaign.sample-item-4');

Route::get('/public-safety-campaign-management/sample-item-5', function () {
    return view('7-public-safety-campaign-manageement.sample-item-5');
})->name('safety-campaign.sample-item-5');

Route::get('/public-safety-campaign-management/sample-item-6', function () {
    return view('7-public-safety-campaign-manageement.sample-item-6');
})->name('safety-campaign.sample-item-6');

Route::get('/public-safety-campaign-management/sample-non-dropdown-item', function () {
    return view('7-public-safety-campaign-manageement.sample-non-dropdown-item');
})->name('safety-campaign.sample-non-dropdown-item');

// Community Policing Routes
Route::get('/community-policing-and-surveillance/sample-item-1', function () {
    return view('5.-community-policing-and-surveillance.sample-item-1');
})->name('community-policing.sample-item-1');

Route::get('/community-policing-and-surveillance/sample-item-2', function () {
    return view('5.-community-policing-and-surveillance.sample-item-2');
})->name('community-policing.sample-item-2');

Route::get('/community-policing-and-surveillance/sample-item-3', function () {
    return view('5.-community-policing-and-surveillance.sample-item-3');
})->name('community-policing.sample-item-3');

Route::get('/community-policing-and-surveillance/sample-item-4', function () {
    return view('5.-community-policing-and-surveillance.sample-item-4');
})->name('community-policing.sample-item-4');

Route::get('/community-policing-and-surveillance/sample-item-5', function () {
    return view('5.-community-policing-and-surveillance.sample-item-5');
})->name('community-policing.sample-item-5');

Route::get('/community-policing-and-surveillance/sample-item-6', function () {
    return view('5.-community-policing-and-surveillance.sample-item-6');
})->name('community-policing.sample-item-6');

Route::get('/community-policing-and-surveillance/sample-non-dropdown-item', function () {
    return view('5.-community-policing-and-surveillance.sample-non-dropdown-item');
})->name('community-policing.sample-non-dropdown-item');

// Health and Safety Routes
Route::get('/health-and-safety-inspections/sample-item-1', function () {
    return view('8-health-and-safety-inspections.sample-item-1');
})->name('health-safety.sample-item-1');

Route::get('/health-and-safety-inspections/sample-item-2', function () {
    return view('8-health-and-safety-inspections.sample-item-2');
})->name('health-safety.sample-item-2');

Route::get('/health-and-safety-inspections/sample-item-3', function () {
    return view('8-health-and-safety-inspections.sample-item-3');
})->name('health-safety.sample-item-3');

Route::get('/health-and-safety-inspections/sample-item-4', function () {
    return view('8-health-and-safety-inspections.sample-item-4');
})->name('health-safety.sample-item-4');

Route::get('/health-and-safety-inspections/sample-item-5', function () {
    return view('8-health-and-safety-inspections.sample-item-5');
})->name('health-safety.sample-item-5');

Route::get('/health-and-safety-inspections/sample-item-6', function () {
    return view('8-health-and-safety-inspections.sample-item-6');
})->name('health-safety.sample-item-6');

Route::get('/health-and-safety-inspections/sample-non-dropdown-item', function () {
    return view('8-health-and-safety-inspections.sample-non-dropdown-item');
})->name('health-safety.sample-non-dropdown-item');

// Disaster Preparedness Routes
Route::get('/disaster-preparedness-training-and-simulation/sample-item-1', function () {
    return view('9-disaster-preeparedneses-training-and-simulation.sample-item-1');
})->name('disaster-prep.sample-item-1');

Route::get('/disaster-preparedness-training-and-simulation/sample-item-2', function () {
    return view('9-disaster-preeparedneses-training-and-simulation.sample-item-2');
})->name('disaster-prep.sample-item-2');

Route::get('/disaster-preparedness-training-and-simulation/sample-item-3', function () {
    return view('9-disaster-preeparedneses-training-and-simulation.sample-item-3');
})->name('disaster-prep.sample-item-3');

Route::get('/disaster-preparedness-training-and-simulation/sample-item-4', function () {
    return view('9-disaster-preeparedneses-training-and-simulation.sample-item-4');
})->name('disaster-prep.sample-item-4');

Route::get('/disaster-preparedness-training-and-simulation/sample-item-5', function () {
    return view('9-disaster-preeparedneses-training-and-simulation.sample-item-5');
})->name('disaster-prep.sample-item-5');

Route::get('/disaster-preparedness-training-and-simulation/sample-item-6', function () {
    return view('9-disaster-preeparedneses-training-and-simulation.sample-item-6');
})->name('disaster-prep.sample-item-6');

Route::get('/disaster-preparedness-training-and-simulation/sample-non-dropdown-item', function () {
    return view('9-disaster-preeparedneses-training-and-simulation.sample-non-dropdown-item');
})->name('disaster-prep.sample-non-dropdown-item');

// Emergency Communication Routes
Route::get('/emergency-communication-system/sample-item-1', function () {
    return view('10-emergency-communication-system.sample-item-1');
})->name('emergency-comm.sample-item-1');

Route::get('/emergency-communication-system/sample-item-2', function () {
    return view('10-emergency-communication-system.sample-item-2');
})->name('emergency-comm.sample-item-2');

Route::get('/emergency-communication-system/sample-item-3', function () {
    return view('10-emergency-communication-system.sample-item-3');
})->name('emergency-comm.sample-item-3');

Route::get('/emergency-communication-system/sample-item-4', function () {
    return view('10-emergency-communication-system.sample-item-4');
})->name('emergency-comm.sample-item-4');

Route::get('/emergency-communication-system/sample-item-5', function () {
    return view('10-emergency-communication-system.sample-item-5');
})->name('emergency-comm.sample-item-5');

Route::get('/emergency-communication-system/sample-item-6', function () {
    return view('10-emergency-communication-system.sample-item-6');
})->name('emergency-comm.sample-item-6');

Route::get('/emergency-communication-system/sample-non-dropdown-item', function () {
    return view('10-emergency-communication-system.sample-non-dropdown-item');
})->name('emergency-comm.sample-non-dropdown-item');

Route::post('/logout', function () {
    // Clear JWT token from session (centralized login)
    session()->forget('jwt_token');

    // Also logout local auth if using it
    if (auth()->check()) {
        auth()->logout();
    }

    // Completely invalidate the session
    session()->invalidate();
    session()->regenerateToken();

    // Redirect to login based on environment
    if (app()->environment() === 'production') {
        return redirect('https://login.alertaraqc.com');
    }

    return redirect('/login');
})->name('logout');
