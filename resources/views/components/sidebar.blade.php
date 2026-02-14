<!-- Sidebar Styles -->
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<!-- Sidebar -->
<aside class="w-72 bg-white border-r border-gray-200 fixed left-0 top-0 bottom-0 transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0 z-30 flex flex-col overflow-hidden">
    <!-- Search Box (Sticky) -->
    <div class="bg-white border-b border-gray-200 p-3 flex-shrink-0">
        <div class="relative">
            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
            <input type="text"
                   placeholder="Quick search..."
                   class="w-full pl-8 pr-12 py-2 text-sm border border-gray-300 rounded hover:border-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-transparent">
            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs">Ctrl K</span>
        </div>
    </div>

    <!-- Scrollable Navigation -->
    <div class="sidebar-scroll overflow-y-auto flex-1 py-2">
        <nav class="px-3">

            <!-- ── Dashboard ──────────────────────────── -->
            <div class="nav-section">
                <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 rounded text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                    <i class="fas fa-chart-pie w-4 h-4 mr-3 flex-shrink-0 text-gray-500"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
            </div>

            <!-- ── 1. Law Enforcement and Incident Reporting ───── -->
            <div class="nav-section">
                <span class="section-label">Law Enforcement &amp; Incident Reporting</span>

                <!-- Crime Data (L1 Collapsible) -->
                <div class="mt-0.5">
                    <button class="law-dept-toggle w-full flex items-center justify-between px-3 py-2 rounded text-sm text-gray-700 hover:bg-gray-100 transition-colors"
                            type="button">
                        <span class="flex items-center">
                            <i class="fas fa-shield-halved w-4 h-4 mr-3 flex-shrink-0 text-gray-500"></i>
                            <span class="font-medium">Law Enforcement Department</span>
                        </span>
                        <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                    </button>

                    <!-- L1 Submenu -->
                    <div class="law-dept-content dropdown-menu submenu-tree">
                        <span class="subsection-label">Example Dropdown 1</span>
                        <div>
                            <button class="tree-node law-example1-toggle w-full flex items-center justify-between px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors"
                                    type="button">
                                <span class="flex items-center">
                                    <i class="fas fa-folder w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Example Content</span>
                                </span>
                                <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                            </button>
                            <div class="law-example1-content dropdown-menu submenu-tree-l2">
                                <a href="{{ route('law-enforcement.sample-item-1') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 1</span>
                                </a>
                                <a href="{{ route('law-enforcement.sample-item-2') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 2</span>
                                </a>
                                <a href="{{ route('law-enforcement.sample-item-3') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 3</span>
                                </a>
                            </div>
                        </div>

                        <span class="subsection-label">Example Dropdown 2</span>
                        <div>
                            <button class="tree-node law-example2-toggle w-full flex items-center justify-between px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors"
                                    type="button">
                                <span class="flex items-center">
                                    <i class="fas fa-folder w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Example Content</span>
                                </span>
                                <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                            </button>
                            <div class="law-example2-content dropdown-menu submenu-tree-l2">
                                <a href="{{ route('law-enforcement.sample-item-4') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 4</span>
                                </a>
                                <a href="{{ route('law-enforcement.sample-item-5') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 5</span>
                                </a>
                                <a href="{{ route('law-enforcement.sample-item-6') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 6</span>
                                </a>
                            </div>
                        </div>

                        <a href="{{ route('law-enforcement.sample-non-dropdown-item') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                            <i class="fas fa-star w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                            <span>Sample Non-Dropdown Item</span>
                        </a>
                    </div> <!-- /.law-dept-content -->
                </div>
            </div>

            <!-- ── 2. Traffic and Transport Management ───── -->
            <div class="nav-section">
                <span class="section-label">Traffic &amp; Transport Management</span>

                <!-- Crime Data (L1 Collapsible) -->
                <div class="mt-0.5">
                    <button class="traffic-dept-toggle w-full flex items-center justify-between px-3 py-2 rounded text-sm text-gray-700 hover:bg-gray-100 transition-colors"
                            type="button">
                        <span class="flex items-center">
                            <i class="fas fa-car w-4 h-4 mr-3 flex-shrink-0 text-gray-500"></i>
                            <span class="font-medium">Traffic Department</span>
                        </span>
                        <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                    </button>

                    <!-- L1 Submenu -->
                    <div class="traffic-dept-content dropdown-menu submenu-tree">
                        <span class="subsection-label">Example Dropdown 1</span>
                        <div>
                            <button class="tree-node traffic-example1-toggle w-full flex items-center justify-between px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors"
                                    type="button">
                                <span class="flex items-center">
                                    <i class="fas fa-folder w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Example Content</span>
                                </span>
                                <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                            </button>
                            <div class="traffic-example1-content dropdown-menu submenu-tree-l2">
                                <a href="{{ route('traffic.sample-item-1') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 1</span>
                                </a>
                                <a href="{{ route('traffic.sample-item-2') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 2</span>
                                </a>
                                <a href="{{ route('traffic.sample-item-3') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 3</span>
                                </a>
                            </div>
                        </div>

                        <span class="subsection-label">Example Dropdown 2</span>
                        <div>
                            <button class="tree-node traffic-example2-toggle w-full flex items-center justify-between px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors"
                                    type="button">
                                <span class="flex items-center">
                                    <i class="fas fa-folder w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Example Content</span>
                                </span>
                                <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                            </button>
                            <div class="traffic-example2-content dropdown-menu submenu-tree-l2">
                                <a href="{{ route('traffic.sample-item-4') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 4</span>
                                </a>
                                <a href="{{ route('traffic.sample-item-5') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 5</span>
                                </a>
                                <a href="{{ route('traffic.sample-item-6') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 6</span>
                                </a>
                            </div>
                        </div>

                        <a href="{{ route('traffic.sample-non-dropdown-item') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                            <i class="fas fa-star w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                            <span>Sample Non-Dropdown Item</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- ── 3. Fire and Rescue Services Management ───── -->
            <div class="nav-section">
                <span class="section-label">Fire &amp; Rescue Services Management</span>

                <!-- Fire Services (L1 Collapsible) -->
                <div class="mt-0.5">
                    <button class="fire-services-toggle w-full flex items-center justify-between px-3 py-2 rounded text-sm text-gray-700 hover:bg-gray-100 transition-colors"
                            type="button">
                        <span class="flex items-center">
                            <i class="fas fa-fire w-4 h-4 mr-3 flex-shrink-0 text-gray-500"></i>
                            <span class="font-medium">Fire Department</span>
                        </span>
                        <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                    </button>

                    <!-- L1 Submenu -->
                    <div class="fire-services-content dropdown-menu submenu-tree">
                        <span class="subsection-label">Example Dropdown 1</span>
                        <div>
                            <button class="tree-node fire-example1-toggle w-full flex items-center justify-between px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors"
                                    type="button">
                                <span class="flex items-center">
                                    <i class="fas fa-folder w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Example Content</span>
                                </span>
                                <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                            </button>
                            <div class="fire-example1-content dropdown-menu submenu-tree-l2">
                                <a href="{{ route('fire.sample-item-1') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 1</span>
                                </a>
                                <a href="{{ route('fire.sample-item-2') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 2</span>
                                </a>
                                <a href="{{ route('fire.sample-item-3') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 3</span>
                                </a>
                            </div>
                        </div>

                        <span class="subsection-label">Example Dropdown 2</span>
                        <div>
                            <button class="tree-node fire-example2-toggle w-full flex items-center justify-between px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors"
                                    type="button">
                                <span class="flex items-center">
                                    <i class="fas fa-folder w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Example Content</span>
                                </span>
                                <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                            </button>
                            <div class="fire-example2-content dropdown-menu submenu-tree-l2">
                                <a href="{{ route('fire.sample-item-4') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 4</span>
                                </a>
                                <a href="{{ route('fire.sample-item-5') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 5</span>
                                </a>
                                <a href="{{ route('fire.sample-item-6') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 6</span>
                                </a>
                            </div>
                        </div>

                        <a href="{{ route('fire.sample-non-dropdown-item') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                            <i class="fas fa-star w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                            <span>Sample Non-Dropdown Item</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- ── 4. Emergency Response System ───── -->
            <div class="nav-section">
                <span class="section-label">Emergency Response System</span>

                <!-- Emergency Response (L1 Collapsible) -->
                <div class="mt-0.5">
                    <button class="emergency-response-toggle w-full flex items-center justify-between px-3 py-2 rounded text-sm text-gray-700 hover:bg-gray-100 transition-colors"
                            type="button">
                        <span class="flex items-center">
                            <i class="fas fa-ambulance w-4 h-4 mr-3 flex-shrink-0 text-gray-500"></i>
                            <span class="font-medium">Emergency Department</span>
                        </span>
                        <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                    </button>

                    <!-- L1 Submenu -->
                    <div class="emergency-response-content dropdown-menu submenu-tree">
                        <span class="subsection-label">Example Dropdown 1</span>
                        <div>
                            <button class="tree-node emergency-example1-toggle w-full flex items-center justify-between px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors"
                                    type="button">
                                <span class="flex items-center">
                                    <i class="fas fa-folder w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Example Content</span>
                                </span>
                                <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                            </button>
                            <div class="emergency-example1-content dropdown-menu submenu-tree-l2">
                                <a href="{{ route('emergency.sample-item-1') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 1</span>
                                </a>
                                <a href="{{ route('emergency.sample-item-2') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 2</span>
                                </a>
                                <a href="{{ route('emergency.sample-item-3') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 3</span>
                                </a>
                            </div>
                        </div>

                        <span class="subsection-label">Example Dropdown 2</span>
                        <div>
                            <button class="tree-node emergency-example2-toggle w-full flex items-center justify-between px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors"
                                    type="button">
                                <span class="flex items-center">
                                    <i class="fas fa-folder w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Example Content</span>
                                </span>
                                <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                            </button>
                            <div class="emergency-example2-content dropdown-menu submenu-tree-l2">
                                <a href="{{ route('emergency.sample-item-4') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 4</span>
                                </a>
                                <a href="{{ route('emergency.sample-item-5') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 5</span>
                                </a>
                                <a href="{{ route('emergency.sample-item-6') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 6</span>
                                </a>
                            </div>
                        </div>

                        <a href="{{ route('emergency.sample-non-dropdown-item') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                            <i class="fas fa-star w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                            <span>Sample Non-Dropdown Item</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- ── 5. Community Policing and Surveillance ───── -->
            <div class="nav-section">
                <span class="section-label">Community Policing &amp; Surveillance</span>

                <!-- Community Policing (L1 Collapsible) -->
                <div class="mt-0.5">
                    <button class="community-policing-toggle w-full flex items-center justify-between px-3 py-2 rounded text-sm text-gray-700 hover:bg-gray-100 transition-colors"
                            type="button">
                        <span class="flex items-center">
                            <i class="fas fa-shield w-4 h-4 mr-3 flex-shrink-0 text-gray-500"></i>
                            <span class="font-medium">Community Department</span>
                        </span>
                        <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                    </button>

                    <!-- L1 Submenu -->
                    <div class="community-policing-content dropdown-menu submenu-tree">
                        <span class="subsection-label">Example Dropdown 1</span>
                        <div>
                            <button class="tree-node community-example1-toggle w-full flex items-center justify-between px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors"
                                    type="button">
                                <span class="flex items-center">
                                    <i class="fas fa-folder w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Example Content</span>
                                </span>
                                <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                            </button>
                            <div class="community-example1-content dropdown-menu submenu-tree-l2">
                                <a href="{{ route('community-policing.sample-item-1') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 1</span>
                                </a>
                                <a href="{{ route('community-policing.sample-item-2') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 2</span>
                                </a>
                                <a href="{{ route('community-policing.sample-item-3') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 3</span>
                                </a>
                            </div>
                        </div>

                        <span class="subsection-label">Example Dropdown 2</span>
                        <div>
                            <button class="tree-node community-example2-toggle w-full flex items-center justify-between px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors"
                                    type="button">
                                <span class="flex items-center">
                                    <i class="fas fa-folder w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Example Content</span>
                                </span>
                                <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                            </button>
                            <div class="community-example2-content dropdown-menu submenu-tree-l2">
                                <a href="{{ route('community-policing.sample-item-4') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 4</span>
                                </a>
                                <a href="{{ route('community-policing.sample-item-5') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 5</span>
                                </a>
                                <a href="{{ route('community-policing.sample-item-6') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 6</span>
                                </a>
                            </div>
                        </div>

                        <a href="{{ route('community-policing.sample-non-dropdown-item') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                            <i class="fas fa-star w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                            <span>Sample Non-Dropdown Item</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- ── 6. Crime Data Analytics & Reporting ───── -->
            <div class="nav-section">
                <span class="section-label">Crime Data Analytics &amp; Reporting</span>

                <!-- Crime Data (L1 Collapsible) -->
                <div class="mt-0.5">
                    <button class="crime-data-toggle w-full flex items-center justify-between px-3 py-2 rounded text-sm text-gray-700 hover:bg-gray-100 transition-colors"
                            type="button">
                        <span class="flex items-center">
                            <i class="fas fa-database w-4 h-4 mr-3 flex-shrink-0 text-gray-500"></i>
                            <span class="font-medium">Crime Department</span>
                        </span>
                        <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                    </button>

                    <!-- L1 Submenu — vertical border + branch connectors -->
                    <div class="crime-data-content dropdown-menu submenu-tree">

                        <!-- Crime Management -->
                        <span class="subsection-label">Crime Management</span>
                        <div class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                            <i class="fas fa-file-lines w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                            <span>Crime</span>
                        </div>

                        <!-- Crime Analysis -->
                        <span class="subsection-label">Crime Analysis</span>
                        <div class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                            <i class="fas fa-map w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                            <span>Crime Mapping</span>
                        </div>

                        <!-- Analytics -->
                        <span class="subsection-label">Analytics</span>

                        <!-- Trend Analytics (L2 Collapsible) -->
                        <div>
                            <button class="tree-node crime-trend-toggle w-full flex items-center justify-between px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors"
                                    type="button">
                                <span class="flex items-center">
                                    <i class="fas fa-chart-line w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Trend Analytics</span>
                                </span>
                                <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                            </button>
                            <!-- L2 Submenu -->
                            <div class="crime-trend-content dropdown-menu submenu-tree-l2">
                                <div class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-calendar-days w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Time-Based Trends</span>
                                </div>
                                <div class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-map-pin w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Location Trends</span>
                                </div>
                                <div class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-chart-bar w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Crime Type Trends</span>
                                </div>
                            </div>
                        </div>

                        <!-- Predictive -->
                        <span class="subsection-label">Predictive</span>

                        <!-- Predictive Analytics (L2 Collapsible) -->
                        <div>
                            <button class="tree-node crime-predictive-toggle w-full flex items-center justify-between px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors"
                                    type="button">
                                <span class="flex items-center">
                                    <i class="fas fa-brain w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Predictive Analytics</span>
                                </span>
                                <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                            </button>
                            <!-- L2 Submenu -->
                            <div class="crime-predictive-content dropdown-menu submenu-tree-l2">
                                <div class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-location-dot w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Crime Hotspot</span>
                                </div>
                                <div class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-triangle-exclamation w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Risk Forecasting</span>
                                </div>
                                <div class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-magnifying-glass w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Pattern Detection</span>
                                </div>
                            </div>
                        </div>

                        <!-- Reports & Alerts -->
                        <span class="subsection-label">Reports &amp; Alerts</span>

                        <!-- Reports (L2 Collapsible) -->
                        <div>
                            <button class="tree-node crime-reports-toggle w-full flex items-center justify-between px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors"
                                    type="button">
                                <span class="flex items-center">
                                    <i class="fas fa-file-lines w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Reports</span>
                                </span>
                                <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                            </button>
                            <!-- L2 Submenu -->
                            <div class="crime-reports-content dropdown-menu submenu-tree-l2">
                                <div class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-eye w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>View Reports</span>
                                </div>
                                <div class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-download w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Download Report</span>
                                </div>
                            </div>
                        </div>

                        <!-- Alerts (standalone) -->
                        <div class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                            <i class="fas fa-exclamation-circle w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                            <span>Alerts</span>
                        </div>

                    </div><!-- /.crime-data-content -->
                </div>
            </div>

            <!-- ── 7. Public Safety Campaign Management ───── -->
            <div class="nav-section">
                <span class="section-label">Public Safety Campaign Management</span>

                <!-- Public Safety (L1 Collapsible) -->
                <div class="mt-0.5">
                    <button class="public-safety-toggle w-full flex items-center justify-between px-3 py-2 rounded text-sm text-gray-700 hover:bg-gray-100 transition-colors"
                            type="button">
                        <span class="flex items-center">
                            <i class="fas fa-people-group w-4 h-4 mr-3 flex-shrink-0 text-gray-500"></i>
                            <span class="font-medium">Safety Campaign Department</span>
                        </span>
                        <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                    </button>

                    <!-- L1 Submenu -->
                    <div class="public-safety-content dropdown-menu submenu-tree">
                        <span class="subsection-label">Example Dropdown 1</span>
                        <div>
                            <button class="tree-node safety-example1-toggle w-full flex items-center justify-between px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors"
                                    type="button">
                                <span class="flex items-center">
                                    <i class="fas fa-folder w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Example Content</span>
                                </span>
                                <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                            </button>
                            <div class="safety-example1-content dropdown-menu submenu-tree-l2">
                                <a href="{{ route('safety-campaign.sample-item-1') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 1</span>
                                </a>
                                <a href="{{ route('safety-campaign.sample-item-2') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 2</span>
                                </a>
                                <a href="{{ route('safety-campaign.sample-item-3') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 3</span>
                                </a>
                            </div>
                        </div>

                        <span class="subsection-label">Example Dropdown 2</span>
                        <div>
                            <button class="tree-node safety-example2-toggle w-full flex items-center justify-between px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors"
                                    type="button">
                                <span class="flex items-center">
                                    <i class="fas fa-folder w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Example Content</span>
                                </span>
                                <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                            </button>
                            <div class="safety-example2-content dropdown-menu submenu-tree-l2">
                                <a href="{{ route('safety-campaign.sample-item-4') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 4</span>
                                </a>
                                <a href="{{ route('safety-campaign.sample-item-5') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 5</span>
                                </a>
                                <a href="{{ route('safety-campaign.sample-item-6') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 6</span>
                                </a>
                            </div>
                        </div>

                        <a href="{{ route('safety-campaign.sample-non-dropdown-item') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                            <i class="fas fa-star w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                            <span>Sample Non-Dropdown Item</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- ── 8. Health and Safety Inspections ───── -->
            <div class="nav-section">
                <span class="section-label">Health &amp; Safety Inspections</span>

                <!-- Health Safety (L1 Collapsible) -->
                <div class="mt-0.5">
                    <button class="health-safety-toggle w-full flex items-center justify-between px-3 py-2 rounded text-sm text-gray-700 hover:bg-gray-100 transition-colors"
                            type="button">
                        <span class="flex items-center">
                            <i class="fas fa-hospital w-4 h-4 mr-3 flex-shrink-0 text-gray-500"></i>
                            <span class="font-medium">Health Department</span>
                        </span>
                        <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                    </button>

                    <!-- L1 Submenu -->
                    <div class="health-safety-content dropdown-menu submenu-tree">
                        <span class="subsection-label">Example Dropdown 1</span>
                        <div>
                            <button class="tree-node health-example1-toggle w-full flex items-center justify-between px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors"
                                    type="button">
                                <span class="flex items-center">
                                    <i class="fas fa-folder w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Example Content</span>
                                </span>
                                <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                            </button>
                            <div class="health-example1-content dropdown-menu submenu-tree-l2">
                                <a href="{{ route('health-safety.sample-item-1') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 1</span>
                                </a>
                                <a href="{{ route('health-safety.sample-item-2') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 2</span>
                                </a>
                                <a href="{{ route('health-safety.sample-item-3') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 3</span>
                                </a>
                            </div>
                        </div>

                        <span class="subsection-label">Example Dropdown 2</span>
                        <div>
                            <button class="tree-node health-example2-toggle w-full flex items-center justify-between px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors"
                                    type="button">
                                <span class="flex items-center">
                                    <i class="fas fa-folder w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Example Content</span>
                                </span>
                                <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                            </button>
                            <div class="health-example2-content dropdown-menu submenu-tree-l2">
                                <a href="{{ route('health-safety.sample-item-4') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 4</span>
                                </a>
                                <a href="{{ route('health-safety.sample-item-5') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 5</span>
                                </a>
                                <a href="{{ route('health-safety.sample-item-6') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 6</span>
                                </a>
                            </div>
                        </div>

                        <a href="{{ route('health-safety.sample-non-dropdown-item') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                            <i class="fas fa-star w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                            <span>Sample Non-Dropdown Item</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- ── 9. Disaster Preparedness Training and Simulation ───── -->
            <div class="nav-section">
                <span class="section-label">Disaster Preparedness &amp; Training</span>

                <!-- Disaster Preparedness (L1 Collapsible) -->
                <div class="mt-0.5">
                    <button class="disaster-prep-toggle w-full flex items-center justify-between px-3 py-2 rounded text-sm text-gray-700 hover:bg-gray-100 transition-colors"
                            type="button">
                        <span class="flex items-center">
                            <i class="fas fa-triangle-exclamation w-4 h-4 mr-3 flex-shrink-0 text-gray-500"></i>
                            <span class="font-medium">Disaster Department</span>
                        </span>
                        <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                    </button>

                    <!-- L1 Submenu -->
                    <div class="disaster-prep-content dropdown-menu submenu-tree">
                        <span class="subsection-label">Example Dropdown 1</span>
                        <div>
                            <button class="tree-node disaster-example1-toggle w-full flex items-center justify-between px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors"
                                    type="button">
                                <span class="flex items-center">
                                    <i class="fas fa-folder w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Example Content</span>
                                </span>
                                <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                            </button>
                            <div class="disaster-example1-content dropdown-menu submenu-tree-l2">
                                <a href="{{ route('disaster-prep.sample-item-1') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 1</span>
                                </a>
                                <a href="{{ route('disaster-prep.sample-item-2') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 2</span>
                                </a>
                                <a href="{{ route('disaster-prep.sample-item-3') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 3</span>
                                </a>
                            </div>
                        </div>

                        <span class="subsection-label">Example Dropdown 2</span>
                        <div>
                            <button class="tree-node disaster-example2-toggle w-full flex items-center justify-between px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors"
                                    type="button">
                                <span class="flex items-center">
                                    <i class="fas fa-folder w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Example Content</span>
                                </span>
                                <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                            </button>
                            <div class="disaster-example2-content dropdown-menu submenu-tree-l2">
                                <a href="{{ route('disaster-prep.sample-item-4') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 4</span>
                                </a>
                                <a href="{{ route('disaster-prep.sample-item-5') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 5</span>
                                </a>
                                <a href="{{ route('disaster-prep.sample-item-6') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 6</span>
                                </a>
                            </div>
                        </div>

                        <a href="{{ route('disaster-prep.sample-non-dropdown-item') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                            <i class="fas fa-star w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                            <span>Sample Non-Dropdown Item</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- ── 10. Emergency Communication System ───── -->
            <div class="nav-section">
                <span class="section-label">Emergency Communication System</span>

                <!-- Emergency Communication (L1 Collapsible) -->
                <div class="mt-0.5">
                    <button class="emergency-comm-toggle w-full flex items-center justify-between px-3 py-2 rounded text-sm text-gray-700 hover:bg-gray-100 transition-colors"
                            type="button">
                        <span class="flex items-center">
                            <i class="fas fa-radio w-4 h-4 mr-3 flex-shrink-0 text-gray-500"></i>
                            <span class="font-medium">Communication Department</span>
                        </span>
                        <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                    </button>

                    <!-- L1 Submenu -->
                    <div class="emergency-comm-content dropdown-menu submenu-tree">
                        <span class="subsection-label">Example Dropdown 1</span>
                        <div>
                            <button class="tree-node emergency-comm-example1-toggle w-full flex items-center justify-between px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors"
                                    type="button">
                                <span class="flex items-center">
                                    <i class="fas fa-folder w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Example Content</span>
                                </span>
                                <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                            </button>
                            <div class="emergency-comm-example1-content dropdown-menu submenu-tree-l2">
                                <a href="{{ route('emergency-comm.sample-item-1') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 1</span>
                                </a>
                                <a href="{{ route('emergency-comm.sample-item-2') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 2</span>
                                </a>
                                <a href="{{ route('emergency-comm.sample-item-3') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 3</span>
                                </a>
                            </div>
                        </div>

                        <span class="subsection-label">Example Dropdown 2</span>
                        <div>
                            <button class="tree-node emergency-comm-example2-toggle w-full flex items-center justify-between px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors"
                                    type="button">
                                <span class="flex items-center">
                                    <i class="fas fa-folder w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Example Content</span>
                                </span>
                                <i class="fas fa-chevron-right text-xs chevron-icon text-gray-400"></i>
                            </button>
                            <div class="emergency-comm-example2-content dropdown-menu submenu-tree-l2">
                                <a href="{{ route('emergency-comm.sample-item-4') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 4</span>
                                </a>
                                <a href="{{ route('emergency-comm.sample-item-5') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 5</span>
                                </a>
                                <a href="{{ route('emergency-comm.sample-item-6') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fas fa-file w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                                    <span>Sample Item 6</span>
                                </a>
                            </div>
                        </div>

                        <a href="{{ route('emergency-comm.sample-non-dropdown-item') }}" class="tree-node flex items-center px-3 py-1.5 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
                            <i class="fas fa-star w-4 h-4 mr-3 flex-shrink-0 text-gray-400"></i>
                            <span>Sample Non-Dropdown Item</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- ── Account ──────────────────────────────── -->
            <div class="nav-section">
                <div class="flex items-center px-3 py-2 rounded text-sm text-gray-700 hover:bg-gray-100 transition-colors cursor-pointer">
                    <i class="fas fa-user w-4 h-4 mr-3 flex-shrink-0 text-gray-500"></i>
                    <span>Profile</span>
                </div>
                <div class="flex items-center px-3 py-2 rounded text-sm text-gray-700 hover:bg-gray-100 transition-colors cursor-pointer">
                    <i class="fas fa-sliders-h w-4 h-4 mr-3 flex-shrink-0 text-gray-500"></i>
                    <span>Settings</span>
                </div>
                <div class="flex items-center px-3 py-2 rounded text-sm text-gray-700 hover:bg-gray-100 transition-colors cursor-pointer">
                    <i class="fas fa-arrow-right-from-bracket w-4 h-4 mr-3 flex-shrink-0 text-gray-500"></i>
                    <span>Logout</span>
                </div>
            </div>
        </nav>
    </div>
</aside>

<!-- Search Modal -->
<div class="search-overlay" id="searchOverlay">
    <div class="search-modal">
        <div class="search-modal-input-wrap">
            <i class="fas fa-search"></i>
            <input type="text" class="search-modal-input" id="searchModalInput" placeholder="Search..." autocomplete="off">
            <span class="search-modal-esc" id="searchModalEsc">Esc</span>
        </div>
        <div class="search-modal-results" id="searchModalResults"></div>
        <div class="search-modal-footer">
            <span><kbd>&uarr;</kbd><kbd>&darr;</kbd> to navigate</span>
            <span><kbd>&crarr;</kbd> to select</span>
        </div>
    </div>
</div>

<!-- Sidebar JavaScript -->
<script src="{{ asset('js/sidebar.js') }}"></script>
