<!DOCTYPE html>
<html lang="tr" class="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CTransfer Kurulum Rehberi</title>
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
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    @keyframes slideUp {
      from {
        transform: translateY(20px);
        opacity: 0;
      }

      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .animate-fade-in {
      animation: fadeIn 0.5s ease-in-out;
    }

    .animate-slide-up {
      animation: slideUp 0.5s ease-out;
    }
  </style>
</head>

<body class="bg-light dark:bg-gray-900 text-darkText dark:text-gray-100 font-sans transition-colors duration-200">
<?php include 'navbar.php'; ?>
  <div class="max-w-4xl mx-auto space-y-8">
    <!-- Header -->
    <div class="text-center relative animate-fade-in">
      <div class="absolute inset-0 bg-gradient-to-r from-blue-500/10 to-purple-500/10 dark:from-blue-500/5 dark:to-purple-500/5 rounded-3xl blur-3xl -z-10"></div>
      <div class="relative mt-6">
        <div class="inline-block p-3 bg-white dark:bg-gray-800 rounded-full shadow-lg mb-4">
          <div class="bg-gradient-to-r from-blue-500 to-purple-500 dark:from-blue-400 dark:to-purple-400 text-white p-4 rounded-full">
            <i class="fas fa-wrench text-3xl"></i>
          </div>
        </div>
        <h1 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400">
          CTransfer Kurulum Rehberi
        </h1>
        <p class="text-gray-500 dark:text-gray-400 mt-3 text-lg">Yerel dosya paylaşım sisteminizi başlatmak için lütfen aşağıdaki adımları takip edin.</p>
      </div>
    </div>
    <!-- Main Content -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-soft p-8 relative overflow-hidden animate-slide-up">
      <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 dark:from-blue-500/2 dark:to-purple-500/2 rounded-2xl"></div>
      <div class="relative space-y-8">

        <!-- Step 1 -->
        <div class="step-card group" data-step="1">
          <div class="step-content">
            <h2 class="text-xl font-semibold mb-2 flex items-center">
              <i class="fas fa-server text-primary dark:text-blue-400 mr-2"></i>
              XAMPP Kurulumu
            </h2>
            <div class="space-y-2">
              <p class="text-gray-700 dark:text-gray-300">İlk olarak <a href="https://www.apachefriends.org/" target="_blank" class="text-primary dark:text-blue-400 hover:underline">XAMPP'ı</a> masaüstünüze kurun.</p>
              <p class="text-gray-700 dark:text-gray-300">XAMPP Control Panel üzerinden Apache servisini başlatın.</p>
            </div>

            <div class="mt-4 bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg group-hover:shadow-lg transition-all duration-300">
              <img src="cdn/xampp-control.png" alt="XAMPP Control Panel" class="w-full rounded-lg shadow-md">
              <div class="mt-3 space-y-2">
                <p class="text-sm text-gray-500 dark:text-gray-400">XAMPP Control Panel'de:</p>
                <ol class="list-decimal list-inside text-sm text-gray-500 dark:text-gray-400 space-y-1">
                  <li>Apache sekmesinde Config butonuna tıklayın</li>
                  <li>Açılan menüde PHP (php.ini) dosyasını seçin</li>
                  <li>Dosyayı açın ve bir sonraki adıma geçin</li>
                </ol>
              </div>
            </div>

            <!-- Troubleshooting Tips -->
            <div class="mt-4 bg-amber-50 dark:bg-amber-900/30 border-l-4 border-amber-500 dark:border-amber-400 p-4 rounded-lg">
              <div class="flex items-start space-x-3">
                <i class="fa-solid fa-triangle-exclamation text-amber-500 dark:text-amber-400 mt-1"></i>
                <div>
                  <p class="font-medium text-amber-800 dark:text-amber-200">Sorun Giderme İpuçları</p>
                  <ul class="mt-2 text-sm text-amber-700 dark:text-amber-300 space-y-1">
                    <li>• Apache başlatılamıyorsa, 80 portunu kullanan başka bir uygulama olabilir</li>
                    <li>• XAMPP kurulumunda hata alıyorsanız, antivirüs programınızı geçici olarak devre dışı bırakın</li>
                    <li>• Kurulum sırasında Windows Güvenlik Duvarı uyarısı alırsanız, Apache'ye izin verin</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Step 2 -->
        <div class="step-card group" data-step="2">
          <div class="step-content">
            <h2 class="text-xl font-semibold mb-2 flex items-center">
              <i class="fas fa-file-zipper text-primary dark:text-blue-400 mr-2"></i>
              PHP Zip Eklentisi
            </h2>
            <div class="space-y-2">
              <p class="text-gray-700 dark:text-gray-300">PHP.ini dosyasında zip eklentisini etkinleştirin.</p>
            </div>

            <div class="mt-4 bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg group-hover:shadow-lg transition-all duration-300">
              <img src="cdn/extension_zip.png" alt="PHP.ini Ayarları" class="w-full rounded-lg shadow-md">
              <div class="mt-3 space-y-2">
                <p class="text-sm text-gray-500 dark:text-gray-400">PHP.ini dosyasında:</p>
                <ol class="list-decimal list-inside text-sm text-gray-500 dark:text-gray-400 space-y-1">
                  <li><code class="bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">extension=zip</code> satırını bulun</li>
                  <li>Satırın başındaki noktalı virgülü kaldırın</li>
                  <li>Dosyayı kaydedin</li>
                  <li>XAMPP Control Panel'de Apache'yi yeniden başlatın</li>
                </ol>
              </div>
            </div>

            <!-- Quick Check -->
            <div class="mt-4 bg-emerald-50 dark:bg-emerald-900/30 border-l-4 border-emerald-500 dark:border-emerald-400 p-4 rounded-lg">
              <div class="flex items-start space-x-3">
                <i class="fa-solid fa-circle-check text-emerald-500 dark:text-emerald-400 mt-1"></i>
                <div>
                  <p class="font-medium text-emerald-800 dark:text-emerald-200">Hızlı Kontrol</p>
                  <p class="mt-2 text-sm text-emerald-700 dark:text-emerald-300">Zip eklentisinin etkin olduğunu kontrol etmek için:</p>
                  <ol class="mt-2 text-sm text-emerald-700 dark:text-emerald-300 space-y-1">
                    <li>1. XAMPP Control Panel'de Apache'yi durdurun</li>
                    <li>2. Apache'yi yeniden başlatın</li>
                    <li>3. <a href="check.php" class="text-emerald-700 font-semibold dark:text-emerald-400 hover:underline">Sistem Kontrolü</a> sayfasını ziyaret edin</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Step 3 -->
        <div class="step-card group" data-step="3">
          <div class="step-content">
            <h2 class="text-xl font-semibold mb-2 flex items-center">
              <i class="fas fa-file-import text-primary dark:text-blue-400 mr-1"></i>
              CTransfer'ı Başlatın
            </h2>
            <div class="space-y-2">
              <p class="text-gray-700 dark:text-gray-300">Sistemi başlatmak için indirdiğiniz ana proje dizininden <code class="bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">start.bat</code> dosyasını çalıştırın.</p>
            </div>

            <div class="mt-4 bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg group-hover:shadow-lg transition-all duration-300">
              <img src="cdn/start.png" alt="start.bat Dosyası" class="w-full rounded-lg shadow-md">
              <div class="mt-3 space-y-2">
                <p class="text-sm text-gray-500 dark:text-gray-400">Başlatma işlemi:</p>
                <ol class="list-decimal list-inside text-sm text-gray-500 dark:text-gray-400 space-y-1">
                  <li>start.bat dosyasına çift tıklayın</li>
                  <li>Komut istemcisinin açılmasını bekleyin</li>
                  <li>Sistem başlatıldığında IP adresiniz gösterilecektir</li>
                </ol>
              </div>
            </div>

            <!-- Common Issues -->
            <div class="mt-4 bg-red-50 dark:bg-red-900/30 border-l-4 border-red-500 dark:border-red-400 p-4 rounded-lg">
              <div class="flex items-start space-x-3">
                <i class="fa-solid fa-circle-exclamation text-red-500 dark:text-red-400 mt-1"></i>
                <div>
                  <p class="font-medium text-red-800 dark:text-red-200">Sık Karşılaşılan Sorunlar</p>
                  <ul class="mt-2 text-sm text-red-700 dark:text-red-300 space-y-1">
                    <li>• start.bat dosyası açılmıyorsa, dosyaya sağ tıklayıp "Yönetici olarak çalıştır"ı seçin</li>
                    <li>• Komut istemcisi hemen kapanıyorsa, PHP kurulumunuzu kontrol edin</li>
                    <li>• IP adresi gösterilmiyorsa, ağ bağlantınızı kontrol edin</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Step 4 -->
        <div class="step-card group" data-step="4">
          <div class="step-content">
            <h2 class="text-xl font-semibold mb-2 flex items-center">
              <i class="fas fa-share-nodes text-primary dark:text-blue-400 mr-2"></i>
              Dosya Paylaşımı
            </h2>
            <div class="space-y-2">
              <p class="text-gray-700 dark:text-gray-300">Sistem başlatıldığında size IP adresiniz gösterilecektir.</p>
              <p class="text-gray-700 dark:text-gray-300">Bu adresi diğer cihazlarla paylaşarak veya QR kodunu okutarak dosya transferi yapabilirsiniz.</p>
            </div>

            <div class="mt-4 bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg group-hover:shadow-lg transition-all duration-300">
              <div class="flex items-center justify-center space-x-4">
                <div class="text-center">
                  <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center mx-auto mb-2">
                    <i class="fas fa-qrcode text-2xl text-primary dark:text-blue-400"></i>
                  </div>
                  <p class="text-sm text-gray-500 dark:text-gray-400">QR Kod ile</p>
                </div>
                <div class="text-center">
                  <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900/30 rounded-full flex items-center justify-center mx-auto mb-2">
                    <i class="fas fa-link text-2xl text-primary dark:text-blue-400"></i>
                  </div>
                  <p class="text-sm text-gray-500 dark:text-gray-400">Link ile</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Additional Info -->
        <div class="bg-blue-50 dark:bg-blue-900/30 border-l-4 border-blue-500 dark:border-blue-400 rounded p-4 text-blue-800 dark:text-blue-200 text-sm">
          <div class="flex items-start space-x-3">
            <i class="fa-solid fa-circle-info text-blue-500 dark:text-blue-400 mt-1"></i>
            <div>
              <p class="font-medium">Önemli Bilgi</p>
              <p class="mt-1">Tüm cihazların aynı ağda olduğundan emin olun. CTransfer yalnızca yerel ağ üzerinde çalışır.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Buttons -->
    <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4 px-4">
      <a href="index.php" class="w-full sm:w-auto inline-flex items-center justify-center bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-500 dark:to-purple-500 text-white px-6 py-3 rounded-xl font-semibold hover:from-blue-700 hover:to-purple-700 dark:hover:from-blue-600 dark:hover:to-purple-600 transition-all duration-300 shadow-lg hover:shadow-glow">
        <i class="fa-solid fa-arrow-right mr-2"></i> CTransfer'a Git
      </a>
      <a href="check.php" class="w-full sm:w-auto inline-flex items-center justify-center bg-gradient-to-r from-green-600 to-emerald-600 dark:from-green-500 dark:to-emerald-500 text-white px-6 py-3 rounded-xl font-semibold hover:from-green-700 hover:to-emerald-700 dark:hover:from-green-600 dark:hover:to-emerald-600 transition-all duration-300 shadow-lg hover:shadow-glow">
        <i class="fa-solid fa-check-circle mr-2"></i> Sistemi Kontrol Et
      </a>
    </div>
  </div>

  <?php include 'footer.php'; ?>

  <script>
    // Theme Toggle
    const html = document.documentElement;
    const getTheme = () => localStorage.getItem('theme') || 'light';
    const setTheme = (theme) => {
      localStorage.setItem('theme', theme);
      html.className = theme;
    };
    setTheme(getTheme());

    // Scroll animasyonları
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('opacity-100', 'translate-y-0');
          entry.target.classList.remove('opacity-0', 'translate-y-4');
        }
      });
    }, {
      threshold: 0.1
    });

    document.querySelectorAll('.step-card').forEach(card => {
      observer.observe(card);
    });
  </script>
</body>

</html>