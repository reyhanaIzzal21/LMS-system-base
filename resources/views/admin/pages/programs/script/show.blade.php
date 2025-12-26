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
                // Kita biarkan default behavior href="#..." berjalan agar URL berubah
                const target = this.getAttribute('data-target');

                // Panggil fungsi switch UI
                switchTab(target);
            });
        });

        // 3. Logic: Check URL Hash on Page Load (Persistence)
        const hash = window.location.hash.substring(1); // remove '#'
        if (hash && document.getElementById(hash)) {
            switchTab(hash);
        } else {
            // Default to first tab if no hash
            switchTab('description');
        }

        // 4. Handle Browser Back/Forward Buttons
        window.addEventListener('hashchange', function() {
            const newHash = window.location.hash.substring(1);
            if (newHash && document.getElementById(newHash)) {
                switchTab(newHash);
            }
        });
    });
</script>
