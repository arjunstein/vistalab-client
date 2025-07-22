@push('script')
    <script>
        // function to toggle dark mode
        function applyTheme() {
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                    '(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        }

        // when page loaded
        applyTheme();

        // when licewire navigated
        document.addEventListener("livewire:navigated", () => {
            applyTheme();
        });
    </script>
@endpush
