/**
 * Sidebar Navigation Module
 * Handles dropdown toggles and search functionality
 */

(function () {
    'use strict';

    // Ctrl+K focuses search
    const searchInput = document.querySelector('input[placeholder="Quick search..."]');
    if (searchInput) {
        document.addEventListener('keydown', function (e) {
            if (e.key === 'k' && (e.ctrlKey || e.metaKey)) {
                e.preventDefault();
                searchInput.focus();
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
