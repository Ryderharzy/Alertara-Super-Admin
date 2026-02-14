@php
// Handle JWT token from centralized login URL
if (request()->query('token')) {
    session(['jwt_token' => request()->query('token')]);
}
@endphp

@extends('layouts.app')

@section('content')
        <div class="p-6 lg:p-8 mb-8">
            <!-- Page Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
                <p class="text-gray-600 mt-2">Welcome back! Here's your crime alert system overview.</p>
            </div>

            <!-- Statistics Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Incidents Card -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total Incidents</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">1,234</p>
                            <p class="text-green-600 text-xs mt-2">↑ 12% from last month</p>
                        </div>
                        <div class="w-12 h-12 bg-alertara-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-exclamation-triangle text-alertara-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Active Alerts Card -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Active Alerts</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">42</p>
                            <p class="text-red-600 text-xs mt-2">8 Critical</p>
                        </div>
                        <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-bell text-red-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Resolved Cases Card -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Resolved Cases</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">856</p>
                            <p class="text-blue-600 text-xs mt-2">69.4% resolution rate</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-check-circle text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Response Time Card -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Avg Response Time</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">4.2 min</p>
                            <p class="text-green-600 text-xs mt-2">↓ 8% improvement</p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-clock text-green-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Crime Trends Chart -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <div class="mb-4">
                        <h2 class="text-lg font-semibold text-gray-900">Crime Trends (30 Days)</h2>
                        <p class="text-sm text-gray-500 mt-1">Incident distribution over the last month</p>
                    </div>
                    <div class="h-64 flex items-center justify-center bg-gray-50 rounded border border-gray-200">
                        <div class="text-center">
                            <i class="fas fa-chart-line text-4xl text-gray-300 mb-2"></i>
                            <p class="text-gray-500">Chart visualization placeholder</p>
                        </div>
                    </div>
                </div>

                <!-- Crime by Type Chart -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <div class="mb-4">
                        <h2 class="text-lg font-semibold text-gray-900">Incidents by Type</h2>
                        <p class="text-sm text-gray-500 mt-1">Distribution of crime categories</p>
                    </div>
                    <div class="h-64 flex items-center justify-center bg-gray-50 rounded border border-gray-200">
                        <div class="text-center">
                            <i class="fas fa-chart-pie text-4xl text-gray-300 mb-2"></i>
                            <p class="text-gray-500">Chart visualization placeholder</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Section -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">Recent Activity</h2>
                </div>
                <div class="divide-y divide-gray-200">
                    <!-- Activity Item 1 -->
                    <div class="p-6 hover:bg-gray-50 transition-colors">
                        <div class="flex items-start justify-between">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-exclamation text-red-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Critical Alert: Armed Robbery</p>
                                    <p class="text-sm text-gray-600 mt-1">Location: Downtown District - Area A</p>
                                    <p class="text-xs text-gray-500 mt-2">Reported 2 hours ago</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 bg-red-100 text-red-700 text-xs font-medium rounded-full">Critical</span>
                        </div>
                    </div>

                    <!-- Activity Item 2 -->
                    <div class="p-6 hover:bg-gray-50 transition-colors">
                        <div class="flex items-start justify-between">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-warning text-yellow-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">High Priority: Vehicle Theft</p>
                                    <p class="text-sm text-gray-600 mt-1">Location: Central Plaza - Parking Lot B</p>
                                    <p class="text-xs text-gray-500 mt-2">Reported 5 hours ago</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-medium rounded-full">High</span>
                        </div>
                    </div>

                    <!-- Activity Item 3 -->
                    <div class="p-6 hover:bg-gray-50 transition-colors">
                        <div class="flex items-start justify-between">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-info text-blue-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Case Resolved: Shoplifting Incident</p>
                                    <p class="text-sm text-gray-600 mt-1">Location: Commercial Street - Store #42</p>
                                    <p class="text-xs text-gray-500 mt-2">Resolved 12 hours ago</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">Resolved</span>
                        </div>
                    </div>

                    <!-- Activity Item 4 -->
                    <div class="p-6 hover:bg-gray-50 transition-colors">
                        <div class="flex items-start justify-between">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-chart-line text-purple-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Trend Alert: Increased Activity in Zone 3</p>
                                    <p class="text-sm text-gray-600 mt-1">42% increase in reported incidents this week</p>
                                    <p class="text-xs text-gray-500 mt-2">Detected 1 day ago</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 text-xs font-medium rounded-full">Trend</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
