<?php
// Hata raporlamayı aç
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Mevcut sayfayı belirle
$current_page = basename($_SERVER['PHP_SELF']);

// Güvenlik kontrolü
if (!defined('SECURE_ACCESS')) {
    define('SECURE_ACCESS', true);
}
?>
<nav class="bg-white dark:bg-gray-800 shadow-lg fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="index.php" class="flex items-center space-x-5">
                        <img src="cdn/logo.png" alt="CTransfer Logo" class="h-8 w-8">
                        <span class="h-16 md:block hidden w-px bg-gray-200 dark:bg-gray-600"></span>

                    </a>
                </div>

                <div class="hidden sm:ml-6 sm:flex sm:space-x-8 duration-300 transition-all ">
                    <a href="index.php" class="<?php echo $current_page === 'index.php' ? 'border-indigo-500 text-gray-900 dark:text-white' : 'duration-200 transition-all border-transparent text-gray-500 dark:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 hover:text-gray-700 dark:hover:text-gray-200'; ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        <i class="fa-solid fa-house mr-2"></i> Ana Sayfa
                    </a>
                    <a href="transfer.php" class="<?php echo $current_page === 'transfer.php' ? 'border-indigo-500 text-gray-900 dark:text-white' : 'duration-200 transition-all border-transparent text-gray-500 dark:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 hover:text-gray-700 dark:hover:text-gray-200'; ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        <i class="fa-solid fa-file-import mr-2"></i> Transfer
                    </a>
                    <a href="setup.php" class="<?php echo $current_page === 'setup.php' ? 'border-indigo-500 text-gray-900 dark:text-white' : 'duration-200 transition-all border-transparent text-gray-500 dark:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 hover:text-gray-700 dark:hover:text-gray-200'; ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        <i class="fa-solid fa-sliders mr-2"></i> Kurulum
                    </a>
                    <a href="check.php" class="<?php echo $current_page === 'check.php' ? 'border-indigo-500 text-gray-900 dark:text-white' : 'duration-200 transition-all border-transparent text-gray-500 dark:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 hover:text-gray-700 dark:hover:text-gray-200'; ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        <i class="fa-solid fa-check mr-2"></i> Sistem Kontrolü
                    </a>
                </div>
            </div>
            <div class="flex items-center flex-row space-x-3">
                <button id="theme-toggle" class="p-2 rounded-lg text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-700">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path>
                    </svg>
                </button>

                <div class="flex items-center">
                    <a target="_blank" href="https://github.com/ebuword/ctransfer" class="duration-200 transition-all border px-3 border-gray-200 dark:border-gray-700 hover:border-gray-300 dark:hover:border-gray-600 cursor-pointer rounded-md px-2 py-1 text-sm text-gray-400 dark:text-gray-500 font-light" data-tippy-content="CTransfer v1.0 BETA | Güncel sürümü GitHub sayfasından kontrol edebilirsiniz.">v1.0 BETA</a>
                </div>

                <div class="sm:hidden">
                    <button type="button" class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Ana menüyü aç</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

    </div>

    <!-- Mobil menü -->
    <div class="sm:hidden hidden" id="mobile-menu">
        <div class="pt-2 pb-3 space-y-1">
            <a href="index.php" class="<?php echo $current_page === 'index.php' ? 'bg-indigo-50 dark:bg-indigo-900 border-indigo-500 text-indigo-700 dark:text-indigo-200' : 'border-transparent text-gray-500 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 hover:text-gray-700 dark:hover:text-gray-200'; ?> block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                <i class="fa-solid fa-house mr-2"></i> Ana Sayfa
            </a>
            <a href="transfer.php" class="<?php echo $current_page === 'transfer.php' ? 'bg-indigo-50 dark:bg-indigo-900 border-indigo-500 text-indigo-700 dark:text-indigo-200' : 'border-transparent text-gray-500 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 hover:text-gray-700 dark:hover:text-gray-200'; ?> block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                <i class="fa-solid fa-file-import mr-2"></i> Transfer
            </a>
            <a href="setup.php" class="<?php echo $current_page === 'setup.php' ? 'bg-indigo-50 dark:bg-indigo-900 border-indigo-500 text-indigo-700 dark:text-indigo-200' : 'border-transparent text-gray-500 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 hover:text-gray-700 dark:hover:text-gray-200'; ?> block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                <i class="fa-solid fa-sliders mr-2"></i> Kurulum
            </a>
            <a href="check.php" class="<?php echo $current_page === 'check.php' ? 'bg-indigo-50 dark:bg-indigo-900 border-indigo-500 text-indigo-700 dark:text-indigo-200' : 'border-transparent text-gray-500 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 hover:text-gray-700 dark:hover:text-gray-200'; ?> block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                <i class="fa-solid fa-check mr-2"></i> Sistem Kontrolü
            </a>
        </div>
    </div>
</nav>

<!-- Navbar için boşluk -->
<div class="h-16"></div>

<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>
<script>
    tippy('[data-tippy-content]', {
        placement: 'top',
        allowHTML: 'true'
    });
</script>

<script>
    // Tema değiştirme
    const themeToggleBtn = document.getElementById('theme-toggle');
    const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

    // Sayfa yüklendiğinde tema tercihini kontrol et
    document.addEventListener('DOMContentLoaded', () => {
        const savedTheme = localStorage.getItem('theme') || 'light';
        document.documentElement.classList.toggle('dark', savedTheme === 'dark');
        updateThemeIcons(savedTheme);
    });

    // Tema ikonlarını güncelle
    function updateThemeIcons(theme) {
        if (theme === 'dark') {
            themeToggleLightIcon.classList.remove('hidden');
            themeToggleDarkIcon.classList.add('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
            themeToggleLightIcon.classList.add('hidden');
        }
    }

    // Tema değiştirme butonuna tıklandığında
    themeToggleBtn.addEventListener('click', () => {
        const isDark = document.documentElement.classList.toggle('dark');
        const newTheme = isDark ? 'dark' : 'light';

        // Tema tercihini kaydet
        localStorage.setItem('theme', newTheme);
        updateThemeIcons(newTheme);
    });

    // Mobil menü
    const mobileMenuButton = document.querySelector('.mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    // Mobil menü butonuna tıklandığında
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', (e) => {
            // Sayfa yenilemeyi engelle
            e.preventDefault();

            // Menü durumunu değiştir
            const isHidden = mobileMenu.classList.contains('hidden');

            // Menü ikonlarını değiştir
            const icons = mobileMenuButton.querySelectorAll('svg');
            if (icons.length >= 2) {
                icons[0].classList.toggle('hidden');
                icons[1].classList.toggle('hidden');
            }

            if (isHidden) {
                // Menüyü aç
                mobileMenu.classList.remove('hidden');
                mobileMenu.style.display = 'block';
                // Animasyon için kısa bir gecikme
                setTimeout(() => {
                    mobileMenu.style.opacity = '1';
                    mobileMenu.style.transform = 'translateY(0)';
                }, 10);
            } else {
                // Menüyü kapat
                mobileMenu.style.opacity = '0';
                mobileMenu.style.transform = 'translateY(-100%)';
                // Animasyon bittikten sonra gizle
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                    mobileMenu.style.display = 'none';
                }, 300);
            }
        });

        // Sayfa yüklendiğinde menüyü başlangıç durumuna getir
        document.addEventListener('DOMContentLoaded', () => {
            // Menüyü gizle ve animasyon özelliklerini ayarla
            mobileMenu.classList.add('hidden');
            mobileMenu.style.display = 'none';
            mobileMenu.style.opacity = '0';
            mobileMenu.style.transform = 'translateY(-100%)';
            mobileMenu.style.transition = 'all 0.3s ease-in-out';
            mobileMenu.style.position = 'absolute';
            mobileMenu.style.width = '100%';
            mobileMenu.style.backgroundColor = 'inherit';
            mobileMenu.style.zIndex = '50';
        });

        // Menü linklerine tıklandığında menüyü kapat
        const menuLinks = mobileMenu.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.style.opacity = '0';
                mobileMenu.style.transform = 'translateY(-100%)';
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                    mobileMenu.style.display = 'none';
                    // Menü ikonlarını sıfırla
                    const icons = mobileMenuButton.querySelectorAll('svg');
                    if (icons.length >= 2) {
                        icons[0].classList.remove('hidden');
                        icons[1].classList.add('hidden');
                    }
                }, 300);
            });
        });
    }
</script>