<!DOCTYPE html>
<html lang="tr" class="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="CTransfer - Gizlilik Politikası">
  <meta name="keywords" content="gizlilik, privacy, veri koruma">
  <meta name="author" content="CTransfer">
  <meta property="og:title" content="CTransfer - Gizlilik Politikası">
  <meta property="og:description" content="CTransfer gizlilik politikası ve veri koruma bilgileri.">
  <meta property="og:image" content="cdn/logo.png">
  <meta property="og:url" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
  <link rel="icon" type="image/png" href="cdn/logo.png">
  <title>CTransfer - Gizlilik Politikası</title>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <style>
    @font-face {
        font-family: 'Blisey';
        src: url('cdn/Blisey.otf') format('opentype');
    }

    .brand-font {
        font-family: 'Blisey', sans-serif;
    }
  </style>
</head>

<body class="bg-light dark:bg-gray-900 text-darkText dark:text-gray-100 min-h-screen font-sans transition-colors duration-200">
  <div class="relative">
    <!-- Header Background -->
    <div class="absolute top-0 left-0 right-0 h-32 bg-gradient-to-b from-blue-500/10 to-transparent dark:from-blue-500/5 dark:to-transparent -z-10"></div>
    
    <div class="max-w-4xl mx-auto px-4 py-12">
      <!-- Header -->
      <div class="text-center mb-12 relative">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-500/10 to-purple-500/10 dark:from-blue-500/5 dark:to-purple-500/5 rounded-3xl blur-3xl -z-10"></div>
        <div class="relative">
          <div class="inline-block p-3 bg-white dark:bg-gray-800 rounded-full shadow-lg mb-4">
            <div class="bg-gradient-to-r from-blue-500 to-purple-500 dark:from-blue-400 dark:to-purple-400 text-white p-4 rounded-full">
              <i class="fas fa-shield-alt text-3xl"></i>
            </div>
          </div>
          <h1 class="text-4xl font-bold gradient-text brand-font mb-4">Gizlilik Politikası</h1>
          <p class="text-gray-500 dark:text-gray-400 text-lg">CTransfer'ın gizlilik politikası hakkında bilgi edinin</p>
        </div>
      </div>
      
      <!-- Main Content -->
      <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-soft overflow-hidden relative">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 dark:from-blue-500/2 dark:to-purple-500/2"></div>
        
        <div class="p-8 space-y-8">
          <!-- Introduction -->
          <div class="space-y-4">
            <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400">
              <i class="fas fa-info-circle mr-2"></i> Giriş
            </h2>
            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
              CTransfer, yerel ağınızda dosya paylaşımı yapmanızı sağlayan bir uygulamadır. Bu gizlilik politikası, uygulamanın veri toplama ve kullanımı hakkında bilgi vermektedir.
            </p>
          </div>
          
          <!-- Data Collection -->
          <div class="space-y-4">
            <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400">
              <i class="fas fa-database mr-2"></i> Veri Toplama
            </h2>
            <div class="space-y-4">
              <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg">
                <h3 class="font-semibold text-lg mb-2">Toplanan Veriler</h3>
                <ul class="list-disc list-inside space-y-2 text-gray-600 dark:text-gray-300">
                  <li>Bilgisayar adı (hostname)</li>
                  <li>IP adresi (yerel ağ)</li>
                  <li>Yüklenen dosyaların adları ve boyutları</li>
                </ul>
              </div>
              <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                CTransfer, yalnızca uygulamanın çalışması için gerekli olan minimum veriyi toplar. Bu veriler yalnızca yerel ağınızda saklanır ve hiçbir şekilde üçüncü taraflarla paylaşılmaz.
              </p>
            </div>
          </div>
          
          <!-- Data Storage -->
          <div class="space-y-4">
            <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400">
              <i class="fas fa-hdd mr-2"></i> Veri Saklama
            </h2>
            <div class="space-y-4">
              <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg">
                <h3 class="font-semibold text-lg mb-2">Saklama Süresi</h3>
                <ul class="list-disc list-inside space-y-2 text-gray-600 dark:text-gray-300">
                  <li>Yüklenen dosyalar: Kullanıcı tarafından silinene kadar</li>
                  <li>IP adresi: Oturum süresince</li>
                  <li>Bilgisayar adı: Oturum süresince</li>
                </ul>
              </div>
              <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                Tüm veriler yalnızca yerel ağınızda saklanır ve internet üzerinden herhangi bir sunucuya gönderilmez.
              </p>
            </div>
          </div>
          
          <!-- Security -->
          <div class="space-y-4">
            <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400">
              <i class="fas fa-lock mr-2"></i> Güvenlik
            </h2>
            <div class="space-y-4">
              <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg">
                <h3 class="font-semibold text-lg mb-2">Güvenlik Önlemleri</h3>
                <ul class="list-disc list-inside space-y-2 text-gray-600 dark:text-gray-300">
                  <li>Yerel ağ güvenliği</li>
                  <li>Dosya şifreleme</li>
                  <li>Güvenli dosya transferi</li>
                </ul>
              </div>
              <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                CTransfer, dosyalarınızın güvenliğini sağlamak için çeşitli güvenlik önlemleri kullanır. Ancak, yerel ağınızın güvenliğinden siz sorumlusunuz.
              </p>
            </div>
          </div>
          
          <!-- Contact -->
          <div class="space-y-4">
            <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400">
              <i class="fas fa-envelope mr-2"></i> İletişim
            </h2>
            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
              Gizlilik politikası hakkında sorularınız için lütfen bizimle iletişime geçin.
            </p>
          </div>
        </div>
        
        <!-- Footer -->
        <div class="bg-gray-50 dark:bg-gray-700/50 px-8 py-6 flex justify-between items-center relative z-10">
          <a href="index.php" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-500 dark:to-purple-500 hover:from-blue-700 hover:to-purple-700 dark:hover:from-blue-600 dark:hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
            <i class="fas fa-home mr-2"></i>
            Ana Sayfa
          </a>
        </div>
      </div>
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
  </script>
</body>

</html> 