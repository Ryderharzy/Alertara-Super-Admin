/**
 * Sidebar Navigation Module
 * Handles dropdown toggles and search functionality
 */

(function () {
    'use strict';

    // ── Search Modal ─────────────────────────────────────────
    var overlay = document.getElementById('searchOverlay');
    var modalInput = document.getElementById('searchModalInput');
    var resultsContainer = document.getElementById('searchModalResults');
    var sidebarSearchInput = document.querySelector('input[placeholder="Quick search..."]');
    var selectedIndex = -1;

    /**
     * Build a flat list of all searchable sidebar items with breadcrumb paths.
     * Each entry: { text, breadcrumb[], href, icon }
     */
    function buildSearchIndex() {
        var items = [];
        var nav = document.querySelector('.sidebar-scroll nav');
        if (!nav) return items;

        var sections = nav.querySelectorAll('.nav-section');
        sections.forEach(function (section) {
            var sectionLabel = section.querySelector('.section-label');
            var sectionName = sectionLabel ? sectionLabel.textContent.trim() : '';

            // Dashboard link (no section-label)
            var dashLink = section.querySelector('a[href]');
            if (!sectionLabel && dashLink) {
                var dashText = dashLink.querySelector('span');
                var dashIcon = dashLink.querySelector('i');
                items.push({
                    text: dashText ? dashText.textContent.trim() : dashLink.textContent.trim(),
                    breadcrumb: [dashText ? dashText.textContent.trim() : 'Dashboard'],
                    href: dashLink.getAttribute('href'),
                    icon: dashIcon ? dashIcon.className : 'fas fa-file'
                });
                return;
            }

            // L1 buttons (department toggles)
            var l1Buttons = section.querySelectorAll('button[class*="-toggle"]:not(.tree-node)');
            l1Buttons.forEach(function (btn) {
                var btnSpan = btn.querySelector('span > span.font-medium') || btn.querySelector('span > span');
                var btnText = btnSpan ? btnSpan.textContent.trim() : '';
                // The dropdown content sibling
                var content = btn.parentElement.querySelector('.dropdown-menu');
                if (!content) return;

                // Subsection labels and their children
                var children = content.children;
                var currentSubsection = '';

                for (var i = 0; i < children.length; i++) {
                    var child = children[i];

                    if (child.classList.contains('subsection-label')) {
                        currentSubsection = child.textContent.trim();
                        continue;
                    }

                    // L2 toggle buttons (tree-node buttons)
                    var l2Btn = child.querySelector('button[class*="-toggle"]');
                    if (l2Btn) {
                        var l2Span = l2Btn.querySelector('span > span:not(.flex)') || l2Btn.querySelector('span > span');
                        var l2Text = l2Span ? l2Span.textContent.trim() : '';
                        // L2 children
                        var l2Content = child.querySelector('.dropdown-menu');
                        if (l2Content) {
                            var l2Items = l2Content.querySelectorAll('.tree-node, a');
                            l2Items.forEach(function (l2Item) {
                                var itemSpan = l2Item.querySelector('span');
                                var itemText = itemSpan ? itemSpan.textContent.trim() : l2Item.textContent.trim();
                                var itemIcon = l2Item.querySelector('i');
                                var itemHref = l2Item.tagName === 'A' ? l2Item.getAttribute('href') : '';

                                var crumbs = [sectionName, btnText];
                                if (currentSubsection) crumbs.push(currentSubsection);
                                crumbs.push(l2Text);
                                crumbs.push(itemText);

                                items.push({
                                    text: itemText,
                                    breadcrumb: crumbs,
                                    href: itemHref,
                                    icon: itemIcon ? itemIcon.className : 'fas fa-file'
                                });
                            });
                        }
                        continue;
                    }

                    // Direct links or divs (non-dropdown items)
                    if (child.tagName === 'A' || (child.tagName === 'DIV' && child.classList.contains('tree-node'))) {
                        var span = child.querySelector('span');
                        var text = span ? span.textContent.trim() : child.textContent.trim();
                        var icon = child.querySelector('i');
                        var href = child.tagName === 'A' ? child.getAttribute('href') : '';

                        var crumbs = [sectionName, btnText];
                        if (currentSubsection) crumbs.push(currentSubsection);
                        crumbs.push(text);

                        items.push({
                            text: text,
                            breadcrumb: crumbs,
                            href: href,
                            icon: icon ? icon.className : 'fas fa-file'
                        });
                    }
                }
            });

            if (!sectionLabel) return;
        });

        // Account section items
        var accountSection = nav.querySelector('.nav-section:last-of-type');
        if (accountSection && !accountSection.querySelector('.section-label')) {
            var accountItems = accountSection.querySelectorAll('div.flex');
            accountItems.forEach(function (item) {
                var span = item.querySelector('span');
                var icon = item.querySelector('i');
                var text = span ? span.textContent.trim() : '';
                if (text) {
                    items.push({
                        text: text,
                        breadcrumb: ['Account', text],
                        href: '',
                        icon: icon ? icon.className : 'fas fa-file'
                    });
                }
            });
        }

        return items;
    }

    var searchIndex = [];
    // Build index once DOM is ready
    function initSearchIndex() {
        searchIndex = buildSearchIndex();
    }
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initSearchIndex);
    } else {
        initSearchIndex();
    }

    function highlightMatch(text, query) {
        if (!query) return escapeHtml(text);
        var lowerText = text.toLowerCase();
        var lowerQuery = query.toLowerCase();
        var idx = lowerText.indexOf(lowerQuery);
        if (idx === -1) return escapeHtml(text);
        var before = text.substring(0, idx);
        var match = text.substring(idx, idx + query.length);
        var after = text.substring(idx + query.length);
        return escapeHtml(before) + '<span class="search-highlight">' + escapeHtml(match) + '</span>' + escapeHtml(after);
    }

    function escapeHtml(str) {
        var div = document.createElement('div');
        div.appendChild(document.createTextNode(str));
        return div.innerHTML;
    }

    function renderResults(query) {
        selectedIndex = -1;
        if (!query || !query.trim()) {
            resultsContainer.innerHTML = '<div class="search-no-results">Type to search sidebar items...</div>';
            return;
        }

        var q = query.toLowerCase().trim();
        var matches = searchIndex.filter(function (item) {
            // Match against the item text or any breadcrumb segment
            return item.breadcrumb.some(function (seg) {
                return seg.toLowerCase().indexOf(q) !== -1;
            });
        });

        if (matches.length === 0) {
            resultsContainer.innerHTML = '<div class="search-no-results">No results found for "' + escapeHtml(query) + '"</div>';
            return;
        }

        var html = '<div class="search-modal-label">Go to</div>';
        matches.forEach(function (item, idx) {
            var breadcrumbHtml = item.breadcrumb.map(function (seg) {
                return highlightMatch(seg, query);
            }).join('<span class="breadcrumb-sep">&rsaquo;</span>');

            var tag = item.href ? 'a' : 'div';
            var hrefAttr = item.href ? ' href="' + escapeHtml(item.href) + '"' : '';

            html += '<' + tag + ' class="search-result-item" data-index="' + idx + '"' + hrefAttr + '>';
            html += '<div class="result-icon"><i class="' + escapeHtml(item.icon) + '"></i></div>';
            html += '<div class="result-text"><div class="result-breadcrumb">' + breadcrumbHtml + '</div></div>';
            if (item.href) {
                html += '<i class="fas fa-arrow-right result-arrow"></i>';
            }
            html += '</' + tag + '>';
        });

        resultsContainer.innerHTML = html;
    }

    function openSearchModal() {
        if (searchIndex.length === 0) initSearchIndex();
        overlay.classList.add('is-active');
        modalInput.value = '';
        renderResults('');
        setTimeout(function () { modalInput.focus(); }, 50);
    }

    function closeSearchModal() {
        overlay.classList.remove('is-active');
        modalInput.value = '';
        // Return focus to sidebar input
        if (sidebarSearchInput) sidebarSearchInput.value = '';
    }

    function navigateResults(direction) {
        var items = resultsContainer.querySelectorAll('.search-result-item');
        if (items.length === 0) return;

        // Remove current selection
        if (selectedIndex >= 0 && selectedIndex < items.length) {
            items[selectedIndex].classList.remove('is-selected');
        }

        selectedIndex += direction;
        if (selectedIndex < 0) selectedIndex = items.length - 1;
        if (selectedIndex >= items.length) selectedIndex = 0;

        items[selectedIndex].classList.add('is-selected');
        items[selectedIndex].scrollIntoView({ block: 'nearest' });
    }

    function selectResult() {
        var items = resultsContainer.querySelectorAll('.search-result-item');
        if (selectedIndex >= 0 && selectedIndex < items.length) {
            var item = items[selectedIndex];
            if (item.tagName === 'A' && item.href) {
                window.location.href = item.href;
            }
            closeSearchModal();
        }
    }

    // Event: sidebar input opens modal
    if (sidebarSearchInput) {
        sidebarSearchInput.addEventListener('focus', function () {
            openSearchModal();
            this.blur();
        });
    }

    // Event: Ctrl+K opens modal
    document.addEventListener('keydown', function (e) {
        if (e.key === 'k' && (e.ctrlKey || e.metaKey)) {
            e.preventDefault();
            openSearchModal();
        }
    });

    // Event: Escape closes modal
    if (overlay) {
        overlay.addEventListener('click', function (e) {
            if (e.target === overlay) closeSearchModal();
        });
    }
    if (document.getElementById('searchModalEsc')) {
        document.getElementById('searchModalEsc').addEventListener('click', closeSearchModal);
    }

    // Event: typing in modal input
    if (modalInput) {
        modalInput.addEventListener('input', function () {
            renderResults(this.value);
        });

        modalInput.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                e.preventDefault();
                closeSearchModal();
            } else if (e.key === 'ArrowDown') {
                e.preventDefault();
                navigateResults(1);
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                navigateResults(-1);
            } else if (e.key === 'Enter') {
                e.preventDefault();
                selectResult();
            }
        });
    }

    /**
     * Generic dropdown toggle
     * Toggles .is-open on content and .is-open-trigger on button
     * @param {string} buttonSelector - CSS selector for toggle buttons
     * @param {string} contentSelector - CSS selector for dropdown content
     */
    function setupToggle(buttonSelector, contentSelector) {
        document.querySelectorAll(buttonSelector).forEach(function (button) {
            button.addEventListener('click', function () {
                const content = this.parentElement.querySelector(contentSelector);
                if (!content) return;

                const opening = !content.classList.contains('is-open');
                content.classList.toggle('is-open', opening);
                this.classList.toggle('is-open-trigger', opening);
            });
        });
    }

    /**
     * Mark active navigation items based on current URL and open parent dropdowns
     */
    function setActiveItems() {
        const currentLocation = window.location.href;
        const currentPath = window.location.pathname;
        const allLinks = document.querySelectorAll('a[href]');
        let activeLink = null;

        // Find the link that matches the current path
        allLinks.forEach(function (link) {
            const href = link.getAttribute('href');
            if (!href) return;

            // Get the absolute URL for comparison
            const absoluteHref = new URL(href, window.location.origin).href;
            const normalizedCurrentLocation = currentLocation.split('?')[0]; // Remove query params

            // Try exact match with full URL
            if (absoluteHref === normalizedCurrentLocation) {
                activeLink = link;
                return;
            }

            // Try match with pathname
            const hrefPath = new URL(href, window.location.origin).pathname;
            const normalizedCurrentPath = currentPath.replace(/\/$/, '');
            const normalizedHrefPath = hrefPath.replace(/\/$/, '');

            if (normalizedHrefPath === normalizedCurrentPath) {
                activeLink = link;
            }
        });

        // If we found a matching link, activate it and its parents
        if (activeLink) {
            activateLinkAndParents(activeLink);
        }
    }

    // Set active items on page load
    document.addEventListener('DOMContentLoaded', setActiveItems);
    setActiveItems();

    /**
     * Activate a specific link and its parent dropdowns
     */
    function activateLinkAndParents(link) {
        // Remove active class from all items
        document.querySelectorAll('.active-nav-item').forEach(function (item) {
            item.classList.remove('active-nav-item');
            if (item.tagName === 'A') {
                item.classList.add('text-gray-600', 'hover:bg-gray-100');
            } else if (item.tagName === 'BUTTON') {
                item.classList.add('text-gray-700', 'hover:bg-gray-100');
            }
        });

        // Mark the clicked link as active
        link.classList.add('active-nav-item');
        link.classList.remove('text-gray-600', 'hover:bg-gray-100');

        // Traverse up to open all parent dropdowns and mark buttons
        let parent = link.parentElement;
        while (parent && parent !== document.body) {
            if (parent.classList.contains('dropdown-menu')) {
                parent.classList.add('is-open');

                const dropdownClasses = Array.from(parent.classList);
                const contentClass = dropdownClasses.find(cls => cls.includes('content'));

                if (contentClass) {
                    const toggleClass = contentClass.replace('-content', '-toggle');
                    const buttons = document.querySelectorAll('button.' + toggleClass);

                    buttons.forEach(function (button) {
                        button.classList.add('is-open-trigger');
                        button.classList.add('active-nav-item');
                        button.classList.remove('text-gray-700', 'text-gray-600', 'hover:bg-gray-100');
                    });
                }
            }
            parent = parent.parentElement;
        }
    }

    /**
     * Handle click events on navigation items to mark them as active
     */
    function setupActiveOnClick() {
        const allLinks = document.querySelectorAll('a[href]');

        allLinks.forEach(function (link) {
            link.addEventListener('click', function (e) {
                // Let the click proceed (page will reload)
                activateLinkAndParents(link);
            });
        });
    }

    // Setup click handlers
    setupActiveOnClick();

    // Setup all dropdown toggles
    // Crime Data Analytics
    setupToggle('.crime-data-toggle',          '.crime-data-content');
    setupToggle('.crime-trend-toggle',         '.crime-trend-content');
    setupToggle('.crime-predictive-toggle',    '.crime-predictive-content');
    setupToggle('.crime-reports-toggle',       '.crime-reports-content');

    // Law Enforcement
    setupToggle('.law-dept-toggle',            '.law-dept-content');
    setupToggle('.law-example1-toggle',        '.law-example1-content');
    setupToggle('.law-example2-toggle',        '.law-example2-content');

    // Traffic & Transport
    setupToggle('.traffic-dept-toggle',        '.traffic-dept-content');
    setupToggle('.traffic-example1-toggle',    '.traffic-example1-content');
    setupToggle('.traffic-example2-toggle',    '.traffic-example2-content');

    // Fire Services
    setupToggle('.fire-services-toggle',       '.fire-services-content');
    setupToggle('.fire-example1-toggle',       '.fire-example1-content');
    setupToggle('.fire-example2-toggle',       '.fire-example2-content');

    // Emergency Response
    setupToggle('.emergency-response-toggle',  '.emergency-response-content');
    setupToggle('.emergency-example1-toggle',  '.emergency-example1-content');
    setupToggle('.emergency-example2-toggle',  '.emergency-example2-content');

    // Community Policing
    setupToggle('.community-policing-toggle',  '.community-policing-content');
    setupToggle('.community-example1-toggle',  '.community-example1-content');
    setupToggle('.community-example2-toggle',  '.community-example2-content');

    // Public Safety Campaign
    setupToggle('.public-safety-toggle',       '.public-safety-content');
    setupToggle('.safety-example1-toggle',     '.safety-example1-content');
    setupToggle('.safety-example2-toggle',     '.safety-example2-content');

    // Health & Safety
    setupToggle('.health-safety-toggle',       '.health-safety-content');
    setupToggle('.health-example1-toggle',     '.health-example1-content');
    setupToggle('.health-example2-toggle',     '.health-example2-content');

    // Disaster Preparedness
    setupToggle('.disaster-prep-toggle',       '.disaster-prep-content');
    setupToggle('.disaster-example1-toggle',   '.disaster-example1-content');
    setupToggle('.disaster-example2-toggle',   '.disaster-example2-content');

    // Emergency Communication
    setupToggle('.emergency-comm-toggle',      '.emergency-comm-content');
    setupToggle('.comm-example1-toggle',       '.comm-example1-content');
    setupToggle('.comm-example2-toggle',       '.comm-example2-content');
})();
