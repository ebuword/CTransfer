<?php
$hostname = gethostname();
$serverActive = (shell_exec("netstat -an | findstr :8000") !== null);
$zipExtensionActive = extension_loaded('zip');
?>

<!DOCTYPE html>
<html lang="tr" class="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="CTransfer - Sistem Kontrol Sayfası">
  <meta name="keywords" content="sistem kontrol, system check, durum kontrol">
  <meta name="author" content="CTransfer">
  <meta property="og:title" content="CTransfer - Sistem Kontrol">
  <meta property="og:description" content="CTransfer sistem durumu ve kontrol sayfası.">
  <meta property="og:image" content="cdn/logo.png">
  <meta property="og:url" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
  <link rel="icon" type="image/png" href="cdn/logo.png">
  <title>CTransfer - Sistem Kontrol</title>
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
            'fade-in': 'fadeIn 0.5s ease-in-out',
            'slide-up': 'slideUp 0.5s ease-out',
          }
        }
      }
    }
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <style>
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    @keyframes slideUp {
      from { transform: translateY(20px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }
    .animate-fade-in { animation: fadeIn 0.5s ease-in-out; }
    .animate-slide-up { animation: slideUp 0.5s ease-out; }
  </style>
</head>

<body class="bg-light dark:bg-gray-900 text-darkText dark:text-gray-100 min-h-screen flex flex-col font-sans transition-colors duration-200">
  <?php include 'navbar.php'; ?>
  
  <div class="flex-1 max-w-4xl mx-auto space-y-8 p-6">
    <!-- Header -->
    <div class="text-center relative animate-fade-in">
      <div class="absolute inset-0 bg-gradient-to-r from-blue-500/10 to-purple-500/10 dark:from-blue-500/5 dark:to-purple-500/5 rounded-3xl blur-3xl -z-10"></div>
      <div class="relative">
        <div class="inline-block p-3 bg-white dark:bg-gray-800 rounded-full shadow-lg mb-4">
          <div class="bg-gradient-to-r from-blue-500 to-purple-500 dark:from-blue-400 dark:to-purple-400 text-white p-4 rounded-full">
            <i class="fas fa-server text-3xl"></i>
          </div>
        </div>
        <h1 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400 mb-2">Sistem Kontrolü</h1>
        <p class="text-gray-500 dark:text-gray-400 text-lg">Sistem durumunuz, bilgisayar adı, sunucu bağlantısı, PHP sürümü, dosya izinleri ve diğer önemli sistem bileşenlerinin detaylı kontrol sonuçları aşağıda listelenmiştir.</p>
      </div>
    </div>
    
    <!-- Main Card -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-soft overflow-hidden relative animate-slide-up">
      <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 dark:from-blue-500/2 dark:to-purple-500/2"></div>
      
      <!-- Card Header -->
      <div class="bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-500 dark:to-purple-500 py-4 px-6">
        <div class="flex items-center justify-between">
          <h2 class="text-xl font-semibold text-white flex items-center">
            <i class="fas fa-chart-line mr-2"></i>
            Sistem Durumu
          </h2>
          <button id="themeToggle" class="p-2 rounded-full hover:bg-white/10 transition-colors">
          </button>
        </div>
      </div>
      
      <!-- Card Content -->
      <div class="p-6 space-y-6 relative">
        <!-- Computer Name -->
        <div class="flex items-center justify-between border-b border-gray-100 dark:border-gray-700 pb-4">
          <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-gradient-to-br from-blue-100 to-purple-100 dark:from-blue-900/30 dark:to-purple-900/30 rounded-full flex items-center justify-center text-blue-600 dark:text-blue-400">
              <i class="fas fa-desktop"></i>
            </div>
            <div>
              <p class="text-gray-500 dark:text-gray-400 text-sm">Bilgisayar Adı</p>
              <h3 class="font-semibold text-lg"><?php echo $hostname; ?></h3>
            </div>
          </div>
          <div>
            <span class="px-4 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-200 rounded-full text-sm font-medium">
              <i class="fas fa-info-circle mr-1"></i> Tanımlandı
            </span>
          </div>
        </div>
        
        <!-- Server Status -->
        <div id="status-indicator" class="flex items-center justify-between opacity-0 transition-opacity duration-700 ease-in-out border-b border-gray-100 dark:border-gray-700 pb-4">
          <div class="flex items-center space-x-3">
            <div id="status-icon" class="w-10 h-10 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700/50 dark:to-gray-800/50 rounded-full flex items-center justify-center">
              <i class="fas fa-plug"></i>
            </div>
            <div>
              <p class="text-gray-500 dark:text-gray-400 text-sm">Sunucu Durumu</p>
              <h3 class="font-semibold text-lg">
                Port 8000
                <span id="status-badge" class="ml-2 px-3 py-1 rounded-full text-xs border">
                  <?php echo $serverActive ? 'Aktif' : 'Pasif'; ?>
                </span>
              </h3>
            </div>
          </div>
          <div>
            <?php if($serverActive): ?>
              <span class="flex items-center text-green-600 dark:text-green-400">
                <i class="fas fa-circle-check mr-1"></i> Çalışıyor
              </span>
            <?php else: ?>
              <span class="flex items-center text-red-600 dark:text-red-400">
                <i class="fas fa-circle-xmark mr-1"></i> Kapalı
              </span>
            <?php endif; ?>
          </div>
        </div>
        
        <!-- PHP Zip Extension Status -->
        <div id="zip-status-indicator" class="flex items-center justify-between opacity-0 transition-opacity duration-700 ease-in-out border-b border-gray-100 dark:border-gray-700 pb-4">
          <div class="flex items-center space-x-3">
            <div id="zip-status-icon" class="w-10 h-10 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700/50 dark:to-gray-800/50 rounded-full flex items-center justify-center">
              <i class="fas fa-file-zipper"></i>
            </div>
            <div>
              <p class="text-gray-500 dark:text-gray-400 text-sm">PHP Zip Eklentisi</p>
              <h3 class="font-semibold text-lg">
                Zip
                <span id="zip-status-badge" class="ml-2 px-3 py-1 rounded-full text-xs border">
                  <?php echo $zipExtensionActive ? 'Aktif' : 'Pasif'; ?>
                </span>
              </h3>
            </div>
          </div>
          <div>
            <?php if($zipExtensionActive): ?>
              <span class="flex items-center text-green-600 dark:text-green-400">
                <i class="fas fa-circle-check mr-1"></i> Çalışıyor
              </span>
            <?php else: ?>
              <span class="flex items-center text-red-600 dark:text-red-400">
                <i class="fas fa-circle-xmark mr-1"></i> Kapalı
              </span>
            <?php endif; ?>
          </div>
        </div>
        
        <!-- System Time -->
        <div class="flex items-center justify-between">
          <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-gradient-to-br from-indigo-100 to-purple-100 dark:from-indigo-900/30 dark:to-purple-900/30 rounded-full flex items-center justify-center text-indigo-600 dark:text-indigo-400">
              <i class="fas fa-clock"></i>
            </div>
            <div>
              <p class="text-gray-500 dark:text-gray-400 text-sm">Sistem Zamanı</p>
              <h3 class="font-semibold text-lg" id="current-time">
                <?php echo date('d.m.Y H:i:s'); ?>
              </h3>
            </div>
          </div>
        </div>
        
        <!-- Server Warning -->
        <div id="server-warning" class="hidden bg-amber-50 dark:bg-amber-900/30 border-l-4 border-amber-500 dark:border-amber-400 p-4 rounded-md mt-6">
          <div class="flex items-start">
            <div class="flex-shrink-0">
              <i class="fas fa-triangle-exclamation text-amber-500 dark:text-amber-400 text-xl"></i>
            </div>
            <div class="ml-3">
              <h3 class="text-amber-800 dark:text-amber-200 font-medium">Sunucu çalışmıyor!</h3>
              <div class="mt-2 text-amber-700 dark:text-amber-300 text-sm">
                <p>CTransfer servislerinin düzgün çalışması için sunucunun aktif olması gerekmektedir.</p>
                <div class="mt-3 space-y-2">
                  <p class="font-medium">Aşağıdaki adımları izleyin:</p>
                  <ol class="list-decimal list-inside text-sm space-y-1 ml-2">
                    <li>Masaüstündeki <code class="bg-amber-100 dark:bg-amber-900/50 px-2 py-0.5 rounded">başlat.bat</code> dosyasını çalıştırın</li>
                    <li>Komut istemcisinin açılmasını bekleyin</li>
                    <li>Bu sayfayı yenileyin ve kontrol edin</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Card Footer -->
      <div class="bg-gray-50 dark:bg-gray-700/50 px-6 py-4 flex justify-between items-center relative z-10">
        <button onclick="window.location.reload()" class="flex items-center text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition">
          <i class="fas fa-arrows-rotate mr-2"></i>
          Yenile
        </button>
        
        <div class="space-x-2">
          <a href="setup.php" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
            <i class="fas fa-arrow-left mr-2"></i>
            Geri Dön
          </a>
          
          <a href="/transfer.php" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-500 dark:to-purple-500 hover:from-blue-700 hover:to-purple-700 dark:hover:from-blue-600 dark:hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
            <i class="fas fa-home mr-2"></i>
            CTransfer'a Git
          </a>
        </div>
      </div>
    </div>
    
    <!-- Info Cards -->
    <div class="grid md:grid-cols-2 gap-4 mt-6">
      <div class="bg-white dark:bg-gray-800 rounded-xl shadow-soft p-4 border-l-4 border-blue-500 dark:border-blue-400 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 dark:from-blue-500/2 dark:to-purple-500/2"></div>
        <div class="relative flex items-center space-x-3">
          <div class="bg-blue-100 dark:bg-blue-900/30 p-2 rounded-full text-blue-600 dark:text-blue-400">
            <i class="fas fa-info-circle"></i>
          </div>
          <div>
            <h3 class="font-medium">CTransfer Nasıl Çalışır?</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Sunucu 8000 portunda çalışarak dosya transferini sağlar.</p>
          </div>
        </div>
      </div>
      
      <div class="bg-white dark:bg-gray-800 rounded-xl shadow-soft p-4 border-l-4 border-emerald-500 dark:border-emerald-400 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 to-teal-500/5 dark:from-emerald-500/2 dark:to-teal-500/2"></div>
        <div class="relative flex items-center space-x-3">
          <div class="bg-emerald-100 dark:bg-emerald-900/30 p-2 rounded-full text-emerald-600 dark:text-emerald-400">
            <i class="fas fa-question-circle"></i>
          </div>
          <div>
            <h3 class="font-medium">Yardıma mı ihtiyacınız var?</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Sorun yaşıyorsanız, destek ekibimizle iletişime geçebilirsiniz.</p>
          </div>
        </div>
      </div>
    </div>
    <?php include 'footer.php'; ?>
  </div>

  <script>
    // Theme Toggle
    const themeToggle = document.getElementById('themeToggle');
    const html = document.documentElement;
    const getTheme = () => localStorage.getItem('theme') || 'light';
    const setTheme = (theme) => {
      localStorage.setItem('theme', theme);
      html.className = theme;
    };
    setTheme(getTheme());

    themeToggle.addEventListener('click', () => {
      const newTheme = html.className === 'dark' ? 'light' : 'dark';
      setTheme(newTheme);
    });

    // System Clock
    function updateClock() {
      const now = new Date();
      const options = { 
        year: 'numeric', 
        month: '2-digit', 
        day: '2-digit',
        hour: '2-digit', 
        minute: '2-digit', 
        second: '2-digit',
        hour12: false
      };
      document.getElementById('current-time').textContent = now.toLocaleString('tr-TR', options).replace(',', '');
      setTimeout(updateClock, 1000);
    }
    updateClock();

    // Server Status Animation
    document.addEventListener('DOMContentLoaded', function() {
      const statusIndicator = document.getElementById('status-indicator');
      const zipStatusIndicator = document.getElementById('zip-status-indicator');
      const statusBadge = document.getElementById('status-badge');
      const statusIcon = document.getElementById('status-icon');
      const zipStatusBadge = document.getElementById('zip-status-badge');
      const zipStatusIcon = document.getElementById('zip-status-icon');
      const serverWarning = document.getElementById('server-warning');
      
      // Elementlerin varlığını kontrol et
      if (statusIndicator && zipStatusIndicator) {
        setTimeout(() => {
          statusIndicator.classList.remove('opacity-0');
          statusIndicator.classList.add('opacity-100');
          zipStatusIndicator.classList.remove('opacity-0');
          zipStatusIndicator.classList.add('opacity-100');
        }, 300);
      }
      
      const serverStatus = <?php echo $serverActive ? 'true' : 'false'; ?>;
      const zipStatus = <?php echo $zipExtensionActive ? 'true' : 'false'; ?>;
      
      if (statusBadge && statusIcon) {
        if (serverStatus) {
          statusBadge.classList.add('bg-green-100', 'text-green-800', 'border-green-500', 'dark:bg-green-900/30', 'dark:text-green-200', 'dark:border-green-400');
          statusIcon.classList.add('text-green-500', 'dark:text-green-400');
        } else {
          statusBadge.classList.add('bg-red-100', 'text-red-800', 'border-red-500', 'dark:bg-red-900/30', 'dark:text-red-200', 'dark:border-red-400');
          statusIcon.classList.add('text-red-500', 'dark:text-red-400');
          if (serverWarning) {
            serverWarning.classList.remove('hidden');
          }
        }
      }

      if (zipStatusBadge && zipStatusIcon) {
        if (zipStatus) {
          zipStatusBadge.classList.add('bg-green-100', 'text-green-800', 'border-green-500', 'dark:bg-green-900/30', 'dark:text-green-200', 'dark:border-green-400');
          zipStatusIcon.classList.add('text-green-500', 'dark:text-green-400');
        } else {
          zipStatusBadge.classList.add('bg-red-100', 'text-red-800', 'border-red-500', 'dark:bg-red-900/30', 'dark:text-red-200', 'dark:border-red-400');
          zipStatusIcon.classList.add('text-red-500', 'dark:text-red-400');
        }
      }
    });
  </script>
</body>

</html>