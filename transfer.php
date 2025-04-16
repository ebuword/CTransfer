<?php
$ip = file_exists("ip.txt") ? trim(file_get_contents("ip.txt")) : "127.0.0.1";
?>
<!DOCTYPE html>
<html lang="tr" class="light">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="CTransfer - Dosya Transfer Sayfası">
  <meta name="keywords" content="dosya transfer, file upload, dosya yükleme">
  <meta name="author" content="CTransfer">
  <meta property="og:title" content="CTransfer - Dosya Transfer">
  <meta property="og:description" content="CTransfer ile dosyalarınızı hızlı ve güvenli bir şekilde paylaşın.">
  <meta property="og:image" content="cdn/logo.png">
  <meta property="og:url" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
  <link rel="icon" type="image/png" href="cdn/logo.png">
  <title>CTransfer | Yerel Dosya Paylaşımı</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            primary: '#2563eb',
            light: '#f9fafb',
            darkText: '#1f2937',
            success: '#16a34a',
            danger: '#dc2626'
          },
          boxShadow: {
            soft: '0 4px 20px rgba(0, 0, 0, 0.08)',
            glow: '0 0 15px rgba(37, 99, 235, 0.3)',
          },
          animation: {
            'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
            'bounce-slow': 'bounce 2s infinite',
          }
        }
      }
    }
  </script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <style>
    @keyframes modalFadeIn {
      from {
        opacity: 0;
        backdrop-filter: blur(0);
      }
      to {
        opacity: 1;
        backdrop-filter: blur(4px);
      }
    }

    @keyframes modalFadeOut {
      from {
        opacity: 1;
        backdrop-filter: blur(4px);
      }
      to {
        opacity: 0;
        backdrop-filter: blur(0);
      }
    }

    @keyframes modalSlideIn {
      from {
        transform: translateY(20px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    @keyframes modalSlideOut {
      from {
        transform: translateY(0);
        opacity: 1;
      }
      to {
        transform: translateY(20px);
        opacity: 0;
      }
    }

    .modal-backdrop {
      animation: modalFadeIn 0.3s ease-out forwards;
    }

    .modal-backdrop.hiding {
      animation: modalFadeOut 0.3s ease-out forwards;
    }

    .modal-content {
      animation: modalSlideIn 0.3s ease-out forwards;
    }

    .modal-content.hiding {
      animation: modalSlideOut 0.3s ease-out forwards;
    }

    .brand-font {
        font-family: 'Blisey', sans-serif;
    }
  </style>
</head>

<body class="bg-light dark:bg-gray-900 text-darkText dark:text-gray-100 min-h-screen flex flex-col">
<?php include 'navbar.php'; ?>
  
<div class="flex-1 w-full max-w-6xl mx-auto space-y-8 p-6">
    <!-- Header -->
    <div class="text-center relative">
      <div class="absolute inset-0 bg-gradient-to-r from-blue-500/10 to-purple-500/10 dark:from-blue-500/5 dark:to-purple-500/5 rounded-3xl blur-3xl -z-10"></div>
      <div class="relative">
        <h1 class="text-4xl brand-font bg-clip-text text-transparent bg-gradient-to-r from-blue-500 to-pink-500 flex items-center justify-center space-x-4">
          <img src="cdn/logo.png" alt="CTransfer Logo" class="h-12 w-12">
          <div class="w-px h-12 bg-gradient-to-b from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400 mx-4"></div>
          <span>CTransfer</span>
        </h1>
        <p class="text-gray-500 dark:text-gray-400 mt-3 text-lg">Yerel ağınızda dosyaları güvenle ve hızlıca paylaşın.</p>
      </div>
    </div>

    <!-- Security Info -->
    <div class="bg-white dark:bg-gray-800 border-l-4 border-primary p-6 rounded-2xl shadow-soft text-sm text-gray-700 dark:text-gray-300 relative overflow-hidden">
      <div class="absolute right-0 top-0 w-32 h-32 bg-blue-500/5 dark:bg-blue-400/5 rounded-full -mr-16 -mt-16"></div>
      <div class="absolute left-0 bottom-0 w-32 h-32 bg-purple-500/5 dark:bg-purple-400/5 rounded-full -ml-16 -mb-16"></div>
      <div class="relative">
        <p class="mb-2 font-semibold text-lg"><i class="fa-solid fa-wand-magic-sparkles text-primary dark:text-blue-400"></i> Güvenliğiniz Bizim İçin Önemli</p>
        <p class="leading-relaxed">
          <strong>CTransfer</strong>, dosyalarınızı yalnızca <u>yerel cihazlarınız arasında</u> aktarır. Herhangi bir sunucuyla, internetle veya üçüncü taraf servislerle <strong>bağlantı kurmaz</strong>. Sistem, bilgisayarınızın <strong>IPv4 adresini</strong> alır ve yerel bir oturum başlatarak, ağınızdaki diğer cihazlarla güvenli paylaşım sağlar.
        </p>
        <p class="mt-4"><i class="fa-solid fa-gear"></i> Kurulum hakkında bilgi almak için <a class="font-semibold text-blue-600 dark:text-blue-400 hover:opacity-75 duration-300 cursor-pointer" href="/setup.php"><i class="fa-solid fa-sliders"></i> Set-up</a> sayfasına göz atın.</p>
      </div>
    </div>

    <!-- Notification Container -->
    <div id="notificationContainer" class="fixed top-4 right-4 z-50 space-y-2"></div>

    <!-- Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <!-- QR Code -->
      <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-soft border border-gray-200 dark:border-gray-700 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 dark:from-blue-500/2 dark:to-purple-500/2 rounded-2xl"></div>
        <div class="relative">
          <h2 class="text-2xl font-bold text-center mb-6 flex items-center justify-center">
            <i class="fa-solid fa-link text-primary dark:text-blue-400 mr-2"></i> Bağlantı Bilgisi
          </h2>
          <div class="flex items-center justify-center mb-6">
            <div id="qrcode" class="p-4 border-2 border-gray-200 dark:border-gray-700 rounded-xl shadow-inner bg-white"></div>
          </div>
          <div class="mx-auto items-center flex flex-col justify-center">
            <p class="text-center text-sm text-gray-600 dark:text-gray-400 mb-2">Yukarıdaki kare kodu okutun veya tarayıcınızdan şu adrese girin</p>
            <div class="flex items-center space-x-2 bg-blue-50 dark:bg-blue-900/30 px-4 py-2 rounded-lg">
              <i class="fa-solid fa-globe text-primary dark:text-blue-400"></i>
              <p class="font-mono text-lg text-primary dark:text-blue-400">
                http://<?php echo $ip; ?>:8000
              </p>
              <button onclick="navigator.clipboard.writeText('http://<?php echo $ip; ?>:8000')" class="text-gray-500 hover:text-primary dark:hover:text-blue-400 transition-colors">
                <i class="fa-solid fa-copy"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- File Upload -->
      <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-soft border border-gray-200 dark:border-gray-700 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 dark:from-blue-500/2 dark:to-purple-500/2 rounded-2xl"></div>
        <div class="relative">
          <h2 class="text-2xl font-bold mb-6 flex items-center">
            <i class="fa-solid fa-cloud-arrow-up text-primary dark:text-blue-400 mr-2"></i> Dosya Yükle
          </h2>
          <div id="dropZone" class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-8 text-center mb-6 transition-all duration-300 hover:border-primary dark:hover:border-blue-400 hover:shadow-glow cursor-pointer">
            <i class="fa-solid fa-cloud-arrow-up text-5xl text-gray-400 dark:text-gray-500 mb-4"></i>
            <p class="text-gray-500 dark:text-gray-400 text-lg">Dosyaları sürükleyip bırakın veya tıklayıp seçin</p>
          </div>
          <form id="uploadForm" enctype="multipart/form-data" class="space-y-4">
            <input type="file" name="file[]" id="fileInput" required multiple class="hidden" />
            <div id="fileList" class="space-y-2 max-h-48 overflow-y-auto pr-2"></div>
            <div id="uploadProgress" class="hidden">
              <div class="w-full bg-gradient-to-r from-blue-500 to-blue-700 dark:from-blue-500 dark:to-purple-500 rounded-full h-2.5 mb-2 overflow-hidden">
                <div class="bg-gradient-to-r from-green-500 to-emerald-500 h-2.5 rounded-full transition-all duration-300" style="width: 0%"></div>
              </div>
              <p class="text-sm text-gray-500 dark:text-gray-400 text-center" id="uploadStatus"></p>
            </div>
            <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-500 dark:to-purple-500 text-white py-3 px-4 rounded-xl font-semibold hover:from-blue-700 hover:to-purple-700 dark:hover:from-blue-600 dark:hover:to-purple-600 transition-all duration-300 shadow-lg hover:shadow-glow disabled:opacity-50 disabled:cursor-not-allowed">
              <i class="fa-solid fa-upload mr-2"></i> Yükle
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- File Statistics -->
    <div id="fileStats" class="bg-white dark:bg-gray-800 p-4 sm:p-6 rounded-2xl shadow-soft mb-6 relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 dark:from-blue-500/2 dark:to-purple-500/2 rounded-2xl"></div>
      <div class="relative">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
          <h2 class="text-lg sm:text-xl font-bold flex items-center space-x-2">
            <i class="fas fa-chart-pie text-primary dark:text-blue-400"></i>
            <span>Dosya İstatistikleri</span>
          </h2>
          <div class="flex flex-wrap gap-2 sm:gap-4">
            <div class="flex items-center space-x-2 bg-gray-100 dark:bg-gray-700/50 px-3 py-1 rounded-full">
              <i class="fas fa-folder text-primary dark:text-blue-400"></i>
              <span class="text-sm font-medium">Toplam <span id="totalFiles" class="text-primary dark:text-blue-400">0</span> dosya</span>
            </div>
            <div class="flex items-center space-x-2 bg-gray-100 dark:bg-gray-700/50 px-3 py-1 rounded-full">
              <i class="fas fa-database text-primary dark:text-blue-400"></i>
              <span class="text-sm font-medium">Kullanılan alan <span id="totalSize" class="text-primary dark:text-blue-400">0 B</span></span>
            </div>
          </div>
        </div>
        
        <div id="fileTypeStats" class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4">
          <!-- File type cards will be dynamically added here -->
        </div>
      </div>
    </div>

    <!-- Filter and Search -->
    <div class="bg-white dark:bg-gray-800 p-4 sm:p-6 rounded-2xl shadow-soft mb-6 relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 dark:from-blue-500/2 dark:to-purple-500/2 rounded-2xl"></div>
      <div class="relative">
        <div class="flex flex-col sm:flex-row gap-4">
          <!-- File Type Filter -->
          <div class="flex-1">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
              <i class="fas fa-filter mr-2"></i>Dosya Türü
            </label>
            <select id="fileTypeFilter" class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
              <option value="all">Tüm Dosyalar</option>
              <!-- File types will be dynamically added here -->
            </select>
          </div>
          
          <!-- Search -->
          <div class="flex-1">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
              <i class="fas fa-search mr-2"></i>Dosya Ara
            </label>
            <input type="text" id="fileSearch" class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5" placeholder="Dosya adına göre ara...">
          </div>
        </div>
      </div>
    </div>

    <!-- Gallery -->
    <div id="gallery" class="space-y-6 sm:space-y-8">
      <!-- Images Section -->
      <div class="bg-white dark:bg-gray-800 p-4 sm:p-6 rounded-2xl shadow-soft relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 to-teal-500/5 dark:from-emerald-500/2 dark:to-teal-500/2 rounded-2xl"></div>
        <div class="relative">
          <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <h2 class="text-lg sm:text-xl font-bold flex items-center space-x-2">
              <i class="fas fa-image text-emerald-500 dark:text-emerald-400"></i>
              <span>Görseller ve Gifler</span>
            </h2>
            <div class="flex items-center space-x-2 bg-emerald-100 dark:bg-emerald-900/30 px-3 py-1 rounded-full">
              <i class="fas fa-folder text-emerald-500 dark:text-emerald-400"></i>
              <span class="text-sm font-medium">Toplam: <span id="totalImages" class="text-emerald-500 dark:text-emerald-400">0</span></span>
            </div>
          </div>
          <div id="imagesGrid" class="grid grid-cols-2 xs:grid-cols-3 sm:grid-cols-4 lg:grid-cols-5 gap-3 sm:gap-4">
            <!-- Images will be loaded here -->
          </div>
        </div>
      </div>

      <!-- Videos Section -->
      <div class="bg-white dark:bg-gray-800 p-4 sm:p-6 rounded-2xl shadow-soft relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-orange-500/5 dark:from-amber-500/2 dark:to-orange-500/2 rounded-2xl"></div>
        <div class="relative">
          <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <h2 class="text-lg sm:text-xl font-bold flex items-center space-x-2">
              <i class="fas fa-video text-amber-500 dark:text-amber-400"></i>
              <span>Videolar</span>
            </h2>
            <div class="flex items-center space-x-2 bg-amber-100 dark:bg-amber-900/30 px-3 py-1 rounded-full">
              <i class="fas fa-folder text-amber-500 dark:text-amber-400"></i>
              <span class="text-sm font-medium">Toplam: <span id="totalVideos" class="text-amber-500 dark:text-amber-400">0</span></span>
            </div>
          </div>
          <div id="videosGrid" class="grid grid-cols-2 xs:grid-cols-3 sm:grid-cols-4 lg:grid-cols-5 gap-3 sm:gap-4">
            <!-- Videos will be loaded here -->
          </div>
        </div>
      </div>

      <!-- Documents Section -->
      <div class="bg-white dark:bg-gray-800 p-4 sm:p-6 rounded-2xl shadow-soft relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-indigo-500/5 dark:from-blue-500/2 dark:to-indigo-500/2 rounded-2xl"></div>
        <div class="relative">
          <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <h2 class="text-lg sm:text-xl font-bold flex items-center space-x-2">
              <i class="fas fa-file text-blue-500 dark:text-blue-400"></i>
              <span>Belgeler</span>
            </h2>
            <div class="flex items-center space-x-2 bg-blue-100 dark:bg-blue-900/30 px-3 py-1 rounded-full">
              <i class="fas fa-folder text-blue-500 dark:text-blue-400"></i>
              <span class="text-sm font-medium">Toplam: <span id="totalDocuments" class="text-blue-500 dark:text-blue-400">0</span></span>
            </div>
          </div>
          <div id="documentsGrid" class="grid grid-cols-2 xs:grid-cols-3 sm:grid-cols-4 lg:grid-cols-5 gap-3 sm:gap-4">
            <!-- Documents will be loaded here -->
          </div>
        </div>
      </div>

      <!-- Archives Section -->
      <div class="bg-white dark:bg-gray-800 p-4 sm:p-6 rounded-2xl shadow-soft relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-pink-500/5 dark:from-purple-500/2 dark:to-pink-500/2 rounded-2xl"></div>
        <div class="relative">
          <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <h2 class="text-lg sm:text-xl font-bold flex items-center space-x-2">
              <i class="fas fa-file-zipper text-purple-500 dark:text-purple-400"></i>
              <span>Arşivler</span>
            </h2>
            <div class="flex items-center space-x-2 bg-purple-100 dark:bg-purple-900/30 px-3 py-1 rounded-full">
              <i class="fas fa-folder text-purple-500 dark:text-purple-400"></i>
              <span class="text-sm font-medium">Toplam: <span id="totalArchives" class="text-purple-500 dark:text-purple-400">0</span></span>
            </div>
          </div>
          <div id="archivesGrid" class="grid grid-cols-2 xs:grid-cols-3 sm:grid-cols-4 lg:grid-cols-5 gap-3 sm:gap-4">
            <!-- Archives will be loaded here -->
          </div>
        </div>
      </div>

      <!-- Other Files Section -->
      <div class="bg-white dark:bg-gray-800 p-4 sm:p-6 rounded-2xl shadow-soft relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-gray-500/5 to-gray-600/5 dark:from-gray-500/2 dark:to-gray-600/2 rounded-2xl"></div>
        <div class="relative">
          <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <h2 class="text-lg sm:text-xl font-bold flex items-center space-x-2">
              <i class="fas fa-file text-gray-500 dark:text-gray-400"></i>
              <span>Diğer Dosyalar</span>
            </h2>
            <div class="flex items-center space-x-2 bg-gray-100 dark:bg-gray-700/50 px-3 py-1 rounded-full">
              <i class="fas fa-folder text-gray-500 dark:text-gray-400"></i>
              <span class="text-sm font-medium">Toplam: <span id="totalOthers" class="text-gray-500 dark:text-gray-400">0</span></span>
            </div>
          </div>
          <div id="othersGrid" class="grid grid-cols-2 xs:grid-cols-3 sm:grid-cols-4 lg:grid-cols-5 gap-3 sm:gap-4">
            <!-- Other files will be loaded here -->
          </div>
        </div>
      </div>

      <!-- Executable Files Section -->
      <div class="bg-white dark:bg-gray-800 p-4 sm:p-6 rounded-2xl shadow-soft relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-red-500/5 to-orange-500/5 dark:from-red-500/2 dark:to-orange-500/2 rounded-2xl"></div>
        <div class="relative">
          <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <h2 class="text-lg sm:text-xl font-bold flex items-center space-x-2">
              <i class="fas fa-terminal text-red-500 dark:text-red-400"></i>
              <span>Çalıştırılabilir Dosyalar</span>
            </h2>
            <div class="flex items-center space-x-2 bg-red-100 dark:bg-red-900/30 px-3 py-1 rounded-full">
              <i class="fas fa-folder text-red-500 dark:text-red-400"></i>
              <span class="text-sm font-medium">Toplam: <span id="totalExecutables" class="text-red-500 dark:text-red-400">0</span></span>
            </div>
          </div>
          <div id="executablesGrid" class="grid grid-cols-2 xs:grid-cols-3 sm:grid-cols-4 lg:grid-cols-5 gap-3 sm:gap-4">
            <!-- Executable files will be loaded here -->
          </div>
        </div>
      </div>
    </div>

    <?php include 'footer.php'; ?>
  </div>

  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/tippy.js@6"></script>
  <script>
    tippy('[data-tippy-content]', {
      placement: 'top',
      allowHTML: 'true'
    });

    // Wait for DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize theme
      const themeToggle = document.getElementById('themeToggle');
      const html = document.documentElement;

      const getTheme = () => localStorage.getItem('theme') || 'light';
      const setTheme = (theme) => {
        localStorage.setItem('theme', theme);
        html.className = theme;
      };

      // Initialize theme
      setTheme(getTheme());

      if (themeToggle) {
        themeToggle.addEventListener('click', () => {
          const newTheme = html.className === 'dark' ? 'light' : 'dark';
          setTheme(newTheme);
        });
      }

      // Initialize QR Code
      const qrcodeElement = document.getElementById('qrcode');
      if (qrcodeElement) {
        const ip = "<?php echo $ip; ?>";
        new QRCode(qrcodeElement, `http://${ip}:8000`);
      }

      // Initialize file upload functionality
      const fileInput = document.getElementById('fileInput');
      const fileList = document.getElementById('fileList');
      const uploadForm = document.getElementById('uploadForm');
      const dropZone = document.getElementById('dropZone');
      const uploadProgress = document.getElementById('uploadProgress');
      const progressBar = uploadProgress?.querySelector('div > div');
      const uploadStatus = document.getElementById('uploadStatus');

      if (!fileInput || !fileList || !uploadForm || !dropZone || !uploadProgress || !progressBar || !uploadStatus) {
        console.error('Required elements not found in the DOM');
        return;
      }

      // Initialize event listeners
      dropZone.addEventListener('click', () => fileInput.click());

      ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, (e) => {
          e.preventDefault();
          e.stopPropagation();
        });
      });

      ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => {
          dropZone.classList.add('border-primary', 'dark:border-blue-400', 'shadow-glow');
        });
      });

      ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => {
          dropZone.classList.remove('border-primary', 'dark:border-blue-400', 'shadow-glow');
        });
      });

      dropZone.addEventListener('drop', (e) => {
        fileInput.files = e.dataTransfer.files;
        updateFileList();
      });

      fileInput.addEventListener('change', updateFileList);

      function updateFileList() {
        fileList.innerHTML = '';
        Array.from(fileInput.files).forEach(file => {
          const fileSize = (file.size / (1024 * 1024)).toFixed(2);
          const div = document.createElement('div');
          div.className = 'flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg';
          div.innerHTML = `
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-file text-primary dark:text-blue-400"></i>
              <span class="text-sm truncate">${file.name}</span>
            </div>
            <span class="text-xs text-gray-500 dark:text-gray-400">${fileSize}MB</span>
          `;
          fileList.appendChild(div);
        });
      }

      uploadForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const files = fileInput.files;
        if (!files.length) return;

        uploadProgress.classList.remove('hidden');
        let totalProgress = 0;
        let completedFiles = 0;

        for (const file of files) {
          const formData = new FormData();
          formData.append('file', file);

          try {
            uploadStatus.textContent = `${file.name} yükleniyor...`;
            
            await new Promise((resolve, reject) => {
              const xhr = new XMLHttpRequest();
              
              xhr.upload.addEventListener('progress', (e) => {
                if (e.lengthComputable) {
                  const fileProgress = (e.loaded / e.total) * (100 / files.length);
                  totalProgress = (completedFiles * (100 / files.length)) + fileProgress;
                  progressBar.style.width = `${totalProgress}%`;
                }
              });

              xhr.addEventListener('load', () => {
                if (xhr.status === 200) {
                  completedFiles++;
                  resolve();
                } else {
                  reject(new Error(`HTTP error! status: ${xhr.status}`));
                }
              });

              xhr.addEventListener('error', () => {
                reject(new Error('Network error'));
              });

              xhr.open('POST', 'upload.php');
              xhr.send(formData);
            });

          } catch (error) {
            notify(`⚠️ ${file.name} yüklenirken hata oluştu!`, "error");
            console.error('Upload error:', error);
          }
        }

        setTimeout(() => {
          uploadProgress.classList.add('hidden');
          progressBar.style.width = '0%';
        }, 1000);

        notify("Dosyalar yüklendi!");
        fileInput.value = '';
        fileList.innerHTML = '';
        loadFiles();
      });

      // Initial file load
      loadFiles();
    });

    // Notification system
    const notificationContainer = document.getElementById('notificationContainer');
    const notify = (message, type = "success") => {
      if (!notificationContainer) return;
      
      const notification = document.createElement('div');
      notification.className = `p-4 rounded-xl text-white font-medium transform transition-all duration-300 translate-y-0 opacity-100 shadow-lg ${
        type === "success" ? "bg-gradient-to-r from-green-500 to-green-600" : "bg-gradient-to-r from-red-500 to-red-600"
      }`;

      notification.innerHTML = `
        <div class="flex items-center space-x-2">
          <i class="fa-solid ${type === "success" ? "fa-check-circle" : "fa-exclamation-circle"}"></i>
          <span>${message}</span>
        </div>
      `;

      notificationContainer.appendChild(notification);

      setTimeout(() => {
        notification.style.transform = 'translate-y-0';
        notification.style.opacity = '0';
        setTimeout(() => notification.remove(), 300);
      }, 4000);
    };

    async function loadFiles() {
      try {
        const response = await fetch('get_files.php');
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        const data = await response.json();
        
        if (!data.success) {
          throw new Error(data.error || 'Bilinmeyen bir hata oluştu');
        }

        // Reset counters
        let totalFiles = 0;
        let totalSize = 0;
        let totalImages = 0;
        let totalVideos = 0;
        let totalDocuments = 0;
        let totalArchives = 0;
        let totalExecutables = 0;
        let totalOthers = 0;
        
        const fileTypeCounts = {};
        const fileTypeSizes = {};
        const uniqueFileTypes = new Set();
        const fileTypeIcons = {
          // Images
          'png': { icon: 'fa-image', color: 'emerald' },
          'jpg': { icon: 'fa-image', color: 'emerald' },
          'jpeg': { icon: 'fa-image', color: 'emerald' },
          'gif': { icon: 'fa-image', color: 'emerald' },
          'webp': { icon: 'fa-image', color: 'emerald' },
          'svg': { icon: 'fa-image', color: 'emerald' },
          'bmp': { icon: 'fa-image', color: 'emerald' },
          'tiff': { icon: 'fa-image', color: 'emerald' },
          
          // Videos
          'mp4': { icon: 'fa-video', color: 'amber' },
          'webm': { icon: 'fa-video', color: 'amber' },
          'ogg': { icon: 'fa-video', color: 'amber' },
          'mov': { icon: 'fa-video', color: 'amber' },
          'avi': { icon: 'fa-video', color: 'amber' },
          'wmv': { icon: 'fa-video', color: 'amber' },
          'flv': { icon: 'fa-video', color: 'amber' },
          
          // Documents
          'pdf': { icon: 'fa-file-pdf', color: 'red' },
          'doc': { icon: 'fa-file-word', color: 'blue' },
          'docx': { icon: 'fa-file-word', color: 'blue' },
          'xls': { icon: 'fa-file-excel', color: 'green' },
          'xlsx': { icon: 'fa-file-excel', color: 'green' },
          'ppt': { icon: 'fa-file-powerpoint', color: 'orange' },
          'pptx': { icon: 'fa-file-powerpoint', color: 'orange' },
          'txt': { icon: 'fa-file-lines', color: 'gray' },
          'rtf': { icon: 'fa-file-lines', color: 'gray' },
          
          // Archives
          'zip': { icon: 'fa-file-zipper', color: 'indigo' },
          'rar': { icon: 'fa-file-zipper', color: 'indigo' },
          '7z': { icon: 'fa-file-zipper', color: 'indigo' },
          'tar': { icon: 'fa-file-zipper', color: 'indigo' },
          'gz': { icon: 'fa-file-zipper', color: 'indigo' },
          
          // Code
          'html': { icon: 'fa-file-code', color: 'orange' },
          'css': { icon: 'fa-file-code', color: 'blue' },
          'js': { icon: 'fa-file-code', color: 'yellow' },
          'php': { icon: 'fa-file-code', color: 'purple' },
          'py': { icon: 'fa-file-code', color: 'blue' },
          'java': { icon: 'fa-file-code', color: 'red' },
          'cpp': { icon: 'fa-file-code', color: 'blue' },
          'c': { icon: 'fa-file-code', color: 'blue' },
          'cs': { icon: 'fa-file-code', color: 'green' },
          'sql': { icon: 'fa-database', color: 'blue' },
          
          // Audio
          'mp3': { icon: 'fa-file-audio', color: 'pink' },
          'wav': { icon: 'fa-file-audio', color: 'pink' },
          'flac': { icon: 'fa-file-audio', color: 'pink' },
          
          // Executables
          'exe': { icon: 'fa-terminal', color: 'red' },
          'bat': { icon: 'fa-terminal', color: 'red' },
          
          // Default
          'default': { icon: 'fa-file', color: 'gray' }
        };

        // Clear all grids
        document.getElementById('imagesGrid').innerHTML = '';
        document.getElementById('videosGrid').innerHTML = '';
        document.getElementById('documentsGrid').innerHTML = '';
        document.getElementById('archivesGrid').innerHTML = '';
        document.getElementById('othersGrid').innerHTML = '';
        document.getElementById('executablesGrid').innerHTML = '';

        // File type categories
        const imageTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'bmp', 'tiff'];
        const videoTypes = ['mp4', 'webm', 'ogg', 'mov', 'avi', 'wmv', 'flv'];
        const documentTypes = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'txt', 'rtf'];
        const archiveTypes = ['zip', 'rar', '7z', 'tar', 'gz'];
        const executableTypes = ['exe', 'bat'];

        // Process files
        if (data.files && Array.isArray(data.files)) {
          data.files.forEach(file => {
            const fileExtension = file.name.split('.').pop().toLowerCase();
            uniqueFileTypes.add(fileExtension);
            
            // Update counters
            totalFiles++;
            totalSize += file.size;
            
            const isImage = imageTypes.includes(fileExtension);
            const isVideo = videoTypes.includes(fileExtension);
            const isDocument = documentTypes.includes(fileExtension);
            const isArchive = archiveTypes.includes(fileExtension);
            const isExecutable = executableTypes.includes(fileExtension);
            
            if (isImage) totalImages++;
            else if (isVideo) totalVideos++;
            else if (isDocument) totalDocuments++;
            else if (isArchive) totalArchives++;
            else if (isExecutable) totalExecutables++;
            else totalOthers++;
            
            // Create file element
            const fileElement = document.createElement('div');
            fileElement.className = 'relative group';
            
            if (isImage) {
              fileElement.innerHTML = `
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700/50 dark:to-gray-800/50 rounded-xl p-4 hover:shadow-lg hover:scale-[1.02] transition-all duration-300 cursor-pointer">
                  <div class="aspect-w-16 aspect-h-9 mb-2">
                    <img src="uploads/${file.name}" alt="${file.name}" class="object-cover rounded-lg w-full h-full">
                  </div>
                  <div class="text-center">
                    <p class="text-sm font-medium text-gray-800 dark:text-white truncate">${file.name}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">${formatFileSize(file.size)}</p>
                  </div>
                  <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/50 rounded-xl">
                    <div class="flex space-x-2">
                      <a href="uploads/${file.name}" data-fancybox="gallery" data-caption="${file.name}" class="p-2 bg-white/20 hover:bg-white/30 rounded-full transition-colors">
                        <i class="fas fa-eye text-white"></i>
                      </a>
                      <a href="uploads/${file.name}" download class="p-2 bg-white/20 hover:bg-white/30 rounded-full transition-colors">
                        <i class="fas fa-download text-white"></i>
                      </a>
                    </div>
                  </div>
                </div>
              `;
              document.getElementById('imagesGrid').appendChild(fileElement);
            } else if (isVideo) {
              fileElement.innerHTML = `
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700/50 dark:to-gray-800/50 rounded-xl p-4 hover:shadow-lg hover:scale-[1.02] transition-all duration-300 cursor-pointer">
                  <div class="aspect-w-16 aspect-h-9 mb-2">
                    <video class="object-cover rounded-lg w-full h-full">
                      <source src="uploads/${file.name}" type="video/${fileExtension}">
                    </video>
                    <div class="absolute inset-0 flex items-center justify-center">
                      <i class="fas fa-play text-white text-4xl opacity-75"></i>
                    </div>
                  </div>
                  <div class="text-center">
                    <p class="text-sm font-medium text-gray-800 dark:text-white truncate">${file.name}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">${formatFileSize(file.size)}</p>
                  </div>
                  <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/50 rounded-xl">
                    <div class="flex space-x-2">
                      <a href="uploads/${file.name}" data-fancybox="gallery" data-caption="${file.name}" class="p-2 bg-white/20 hover:bg-white/30 rounded-full transition-colors">
                        <i class="fas fa-play text-white"></i>
                      </a>
                      <a href="uploads/${file.name}" download class="p-2 bg-white/20 hover:bg-white/30 rounded-full transition-colors">
                        <i class="fas fa-download text-white"></i>
                      </a>
                    </div>
                  </div>
                </div>
              `;
              document.getElementById('videosGrid').appendChild(fileElement);
            } else if (isDocument) {
              fileElement.innerHTML = `
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700/50 dark:to-gray-800/50 rounded-xl p-4 hover:shadow-lg hover:scale-[1.02] transition-all duration-300 cursor-pointer">
                  <div class="flex items-center justify-center mb-2">
                    <div class="bg-blue-100 dark:bg-blue-900/30 p-3 rounded-full">
                      <i class="fas fa-file text-blue-500 dark:text-blue-400 text-4xl"></i>
                    </div>
                  </div>
                  <div class="text-center">
                    <p class="text-sm font-medium text-gray-800 dark:text-white truncate">${file.name}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">${formatFileSize(file.size)}</p>
                  </div>
                  <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/50 rounded-xl">
                    <div class="flex space-x-2">
                      ${fileExtension === 'txt' ? `
                        <button onclick="handleTextPreview('${file.name}')" class="p-2 bg-white/20 hover:bg-white/30 rounded-full transition-colors">
                          <i class="fas fa-eye text-white"></i>
                        </button>
                      ` : ''}
                      <a href="uploads/${file.name}" download class="p-2 bg-white/20 hover:bg-white/30 rounded-full transition-colors">
                        <i class="fas fa-download text-white"></i>
                      </a>
                    </div>
                  </div>
                </div>
              `;
              document.getElementById('documentsGrid').appendChild(fileElement);
            } else if (isArchive) {
              fileElement.innerHTML = `
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700/50 dark:to-gray-800/50 rounded-xl p-4 hover:shadow-lg hover:scale-[1.02] transition-all duration-300 cursor-pointer">
                  <div class="flex items-center justify-center mb-2">
                    <div class="bg-purple-100 dark:bg-purple-900/30 p-3 rounded-full">
                      <i class="fas fa-file-zipper text-purple-500 dark:text-purple-400 text-4xl"></i>
                    </div>
                  </div>
                  <div class="text-center">
                    <p class="text-sm font-medium text-gray-800 dark:text-white truncate">${file.name}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">${formatFileSize(file.size)}</p>
                  </div>
                  <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/50 rounded-xl">
                    <div class="flex space-x-2">
                      <button onclick="handleZipView('${file.name}')" class="p-2 bg-white/20 hover:bg-white/30 rounded-full transition-colors">
                        <i class="fas fa-folder-open text-white"></i>
                      </button>
                      <a href="uploads/${file.name}" download class="p-2 bg-white/20 hover:bg-white/30 rounded-full transition-colors">
                        <i class="fas fa-download text-white"></i>
                      </a>
                    </div>
                  </div>
                </div>
              `;
              document.getElementById('archivesGrid').appendChild(fileElement);
            } else if (isExecutable) {
              fileElement.innerHTML = `
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700/50 dark:to-gray-800/50 rounded-xl p-4 hover:shadow-lg hover:scale-[1.02] transition-all duration-300 cursor-pointer">
                  <div class="flex items-center justify-center mb-2">
                    <div class="bg-red-100 dark:bg-red-900/30 p-3 rounded-full">
                      <i class="fas fa-terminal text-red-500 dark:text-red-400 text-4xl"></i>
                    </div>
                  </div>
                  <div class="text-center">
                    <p class="text-sm font-medium text-gray-800 dark:text-white truncate">${file.name}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">${formatFileSize(file.size)}</p>
                  </div>
                  <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/50 rounded-xl">
                    <div class="flex space-x-2">
                      <a href="uploads/${file.name}" download class="p-2 bg-white/20 hover:bg-white/30 rounded-full transition-colors">
                        <i class="fas fa-download text-white"></i>
                      </a>
                    </div>
                  </div>
                </div>
              `;
              document.getElementById('executablesGrid').appendChild(fileElement);
            } else {
              fileElement.innerHTML = `
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700/50 dark:to-gray-800/50 rounded-xl p-4 hover:shadow-lg hover:scale-[1.02] transition-all duration-300 cursor-pointer">
                  <div class="flex items-center justify-center mb-2">
                    <div class="bg-gray-100 dark:bg-gray-700/50 p-3 rounded-full">
                      <i class="fas fa-file text-gray-500 dark:text-gray-400 text-4xl"></i>
                    </div>
                  </div>
                  <div class="text-center">
                    <p class="text-sm font-medium text-gray-800 dark:text-white truncate">${file.name}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">${formatFileSize(file.size)}</p>
                  </div>
                  <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/50 rounded-xl">
                    <div class="flex space-x-2">
                      <a href="uploads/${file.name}" download class="p-2 bg-white/20 hover:bg-white/30 rounded-full transition-colors">
                        <i class="fas fa-download text-white"></i>
                      </a>
                    </div>
                  </div>
                </div>
              `;
              document.getElementById('othersGrid').appendChild(fileElement);
            }
          });
        }

        // Update statistics
        document.getElementById('totalFiles').textContent = totalFiles;
        document.getElementById('totalSize').textContent = formatFileSize(totalSize);
        
        // Hide/show sections based on file count
        const sections = {
          'imagesGrid': { count: totalImages, counterId: 'totalImages' },
          'videosGrid': { count: totalVideos, counterId: 'totalVideos' },
          'documentsGrid': { count: totalDocuments, counterId: 'totalDocuments' },
          'archivesGrid': { count: totalArchives, counterId: 'totalArchives' },
          'executablesGrid': { count: totalExecutables, counterId: 'totalExecutables' },
          'othersGrid': { count: totalOthers, counterId: 'totalOthers' }
        };

        Object.entries(sections).forEach(([sectionId, data]) => {
          const section = document.getElementById(sectionId)?.parentElement?.parentElement;
          const counterElement = document.getElementById(data.counterId);
          
          if (section) {
            if (data.count === 0) {
              section.style.display = 'none';
            } else {
              section.style.display = 'block';
              if (counterElement) {
                counterElement.textContent = data.count;
              }
            }
          }
        });

        // Update file type filter dropdown
        const fileTypeFilter = document.getElementById('fileTypeFilter');
        fileTypeFilter.innerHTML = '<option value="all">Tüm Dosyalar</option>';
        Array.from(uniqueFileTypes).sort().forEach(type => {
          const option = document.createElement('option');
          option.value = type;
          option.textContent = type.toUpperCase();
          fileTypeFilter.appendChild(option);
        });

        // Initialize Fancybox
        Fancybox.bind("[data-fancybox]", {
          Thumbs: {
            autoStart: false,
          },
          Toolbar: {
            display: {
              left: ["infobar"],
              middle: ["zoomIn", "zoomOut", "toggle1to1", "rotateCCW", "rotateCW", "flipX", "flipY"],
              right: ["slideshow", "thumbs", "close"],
            },
          },
          Images: {
            zoom: true,
            wheel: "zoom",
          },
          Video: {
            autoplay: true,
          },
        });

        // Add event listeners for filtering and searching
        const fileSearch = document.getElementById('fileSearch');
        const filterAndSearch = () => {
          const selectedType = fileTypeFilter.value;
          const searchTerm = fileSearch.value.toLowerCase();
          
          const fileElements = document.querySelectorAll('#gallery .group');
          fileElements.forEach(element => {
            const fileName = element.querySelector('p').textContent.toLowerCase();
            const fileType = fileName.split('.').pop().toLowerCase();
            
            const matchesType = selectedType === 'all' || fileType === selectedType;
            const matchesSearch = fileName.includes(searchTerm);
            
            element.style.display = matchesType && matchesSearch ? 'block' : 'none';
          });
        };

        fileTypeFilter.addEventListener('change', filterAndSearch);
        fileSearch.addEventListener('input', filterAndSearch);

      } catch (error) {
        console.error('Dosya yükleme hatası:', error);
        notify(`Dosyalar yüklenirken bir hata oluştu: ${error.message}`, 'error');
      }
    }

    function formatFileSize(bytes) {
      if (bytes === 0) return '0 B';
      const k = 1024;
      const sizes = ['B', 'KB', 'MB', 'GB', 'TB'];
      const i = Math.floor(Math.log(bytes) / Math.log(k));
      return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    // Text preview modal
    const textPreviewModal = document.createElement('div');
    textPreviewModal.className = 'fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden modal-backdrop';
    textPreviewModal.innerHTML = `
      <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 max-w-2xl w-full max-h-[80vh] overflow-hidden flex flex-col modal-content">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Metin Önizleme</h3>
          <button onclick="closeTextPreview()" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
            <i class="fas fa-times"></i>
          </button>
        </div>
        <div class="flex-1 overflow-y-auto pr-2">
          <pre id="textPreviewContent" class="whitespace-pre-wrap font-mono text-sm text-gray-800 dark:text-gray-200 bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg"></pre>
        </div>
      </div>
    `;
    document.body.appendChild(textPreviewModal);

    function showTextPreview(filename, content) {
      const textPreviewContent = document.getElementById('textPreviewContent');
      textPreviewContent.textContent = content;
      textPreviewModal.classList.remove('hidden');
    }

    function closeTextPreview() {
      textPreviewModal.classList.add('hiding');
      textPreviewModal.querySelector('.modal-content').classList.add('hiding');
      setTimeout(() => {
        textPreviewModal.classList.add('hidden');
        textPreviewModal.classList.remove('hiding');
        textPreviewModal.querySelector('.modal-content').classList.remove('hiding');
      }, 300);
    }

    // Zip modal
    const zipModal = document.createElement('div');
    zipModal.className = 'fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden modal-backdrop';
    zipModal.innerHTML = `
      <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 max-w-2xl w-full max-h-[80vh] overflow-hidden flex flex-col modal-content">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Zip İçeriği</h3>
          <button onclick="closeZipModal()" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
            <i class="fas fa-times"></i>
          </button>
        </div>
        <div class="flex-1 overflow-y-auto pr-2">
          <div id="zipContents" class="space-y-2"></div>
        </div>
      </div>
    `;
    document.body.appendChild(zipModal);

    function showZipContents(filename, contents) {
      const zipContents = document.getElementById('zipContents');
      zipContents.innerHTML = '';
      
      contents.forEach(item => {
        const div = document.createElement('div');
        div.className = 'flex items-center justify-between p-2 bg-gray-50 dark:bg-gray-700/50 rounded-lg';
        div.innerHTML = `
          <div class="flex items-center space-x-2">
            <i class="fas ${item.isDir ? 'fa-folder' : 'fa-file'} text-purple-500 dark:text-purple-400"></i>
            <span class="text-sm">${item.name}</span>
          </div>
          ${!item.isDir ? `<span class="text-xs text-gray-500 dark:text-gray-400">${formatFileSize(item.size)}</span>` : ''}
        `;
        zipContents.appendChild(div);
      });

      zipModal.classList.remove('hidden');
    }

    function closeZipModal() {
      zipModal.classList.add('hiding');
      zipModal.querySelector('.modal-content').classList.add('hiding');
      setTimeout(() => {
        zipModal.classList.add('hidden');
        zipModal.classList.remove('hiding');
        zipModal.querySelector('.modal-content').classList.remove('hiding');
      }, 300);
    }

    // Modal dışına tıklandığında kapat
    [textPreviewModal, zipModal].forEach(modal => {
      modal.addEventListener('click', (e) => {
        if (e.target === modal) {
          if (modal === textPreviewModal) {
            closeTextPreview();
          } else {
            closeZipModal();
          }
        }
      });
    });

    // Add this function before the closing script tag
    function handleZipView(filename) {
      fetch('get_zip_contents.php?file=' + encodeURIComponent(filename))
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            showZipContents(filename, data.contents);
          } else {
            notify('Zip dosyası içeriği alınamadı: ' + data.error, 'error');
          }
        })
        .catch(error => {
          console.error('Zip içeriği alınırken hata:', error);
          notify('Zip dosyası içeriği alınamadı', 'error');
        });
    }

    // Add this function before the closing script tag
    function handleTextPreview(filename) {
      fetch('get_text_content.php?file=' + encodeURIComponent(filename))
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            showTextPreview(filename, data.content);
          } else {
            notify('Metin dosyası içeriği alınamadı: ' + data.error, 'error');
          }
        })
        .catch(error => {
          console.error('Metin içeriği alınırken hata:', error);
          notify('Metin dosyası içeriği alınamadı', 'error');
        });
    }
  </script>
</body>

</html>