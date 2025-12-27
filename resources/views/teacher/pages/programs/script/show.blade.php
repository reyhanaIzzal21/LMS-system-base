<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.tab-link');
        const contents = document.querySelectorAll('.tab-content');

        // 1. Function to Switch Tab
        function switchTab(targetId) {
            // Hide all contents
            contents.forEach(content => {
                content.classList.add('hidden');
            });

            // Remove active styling from all tabs
            tabs.forEach(tab => {
                tab.classList.remove('border-primary-600', 'text-primary-600');
                tab.classList.add('border-transparent', 'text-slate-500', 'hover:text-slate-700',
                    'hover:border-slate-300');
            });

            // Show Target Content
            const targetContent = document.getElementById(targetId);
            if (targetContent) {
                targetContent.classList.remove('hidden');
            }

            // Add active styling to clicked tab
            const activeTab = document.querySelector(`[data-target="${targetId}"]`);
            if (activeTab) {
                activeTab.classList.remove('border-transparent', 'text-slate-500', 'hover:text-slate-700',
                    'hover:border-slate-300');
                activeTab.classList.add('border-primary-600', 'text-primary-600');
            }
        }

        // 2. Event Listener for Tab Clicks
        tabs.forEach(tab => {
            tab.addEventListener('click', function(e) {
                const target = this.getAttribute('data-target');
                switchTab(target);
            });
        });

        // 3. Logic: Check URL Hash on Page Load (Persistence)
        const hash = window.location.hash.substring(1);
        if (hash && document.getElementById(hash)) {
            switchTab(hash);
        } else {
            switchTab('description');
        }

        // 4. Handle Browser Back/Forward Buttons
        window.addEventListener('hashchange', function() {
            const newHash = window.location.hash.substring(1);
            if (newHash && document.getElementById(newHash)) {
                switchTab(newHash);
            }
        });

        // 5. Initialize teacher search
        initializeTeacherSearch();
    });

    // Teacher Search Functionality
    function initializeTeacherSearch() {
        const searchInput = document.getElementById('teacher-search');
        const teacherCards = document.querySelectorAll('.teacher-card');

        if (!searchInput || !teacherCards.length) return;

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();

            teacherCards.forEach(card => {
                const name = card.getAttribute('data-name') || '';
                const email = card.getAttribute('data-email') || '';

                if (name.includes(searchTerm) || email.includes(searchTerm)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }
</script>
