<!DOCTYPE html>
<html lang="tr" class="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Yardım | CTransfer</title>
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
              <i class="fas fa-question-circle text-3xl"></i>
            </div>
          </div>
          <h1 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400 mb-2">Yardım</h1>
          <p class="text-gray-500 dark:text-gray-400 text-lg">CTransfer kullanımı hakkında sık sorulan sorular ve yardım</p>
        </div>
      </div>
      
      <!-- Main Content -->
      <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-soft overflow-hidden relative">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 dark:from-blue-500/2 dark:to-purple-500/2"></div>
        
        <div class="p-8 space-y-8">
          <!-- Quick Start -->
          <div class="space-y-4">
            <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400">
              <i class="fas fa-rocket mr-2"></i> Hızlı Başlangıç
            </h2>
            <div class="space-y-4">
              <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg">
                <h3 class="font-semibold text-lg mb-2">CTransfer'ı Kullanmaya Başlama</h3>
                <ol class="list-decimal list-inside space-y-2 text-gray-600 dark:text-gray-300">
                  <li>Masaüstündeki <code class="bg-gray-100 dark:bg-gray-700 px-2 py-0.5 rounded">başlat.bat</code> dosyasını çalıştırın</li>
                  <li>Tarayıcınızda <code class="bg-gray-100 dark:bg-gray-700 px-2 py-0.5 rounded">http://localhost:8000</code> adresine gidin</li>
                  <li>Dosyalarınızı sürükleyip bırakın veya tıklayarak seçin</li>
                  <li>Yükleme tamamlandığında dosyalarınız hazır olacaktır</li>
                </ol>
              </div>
            </div>
          </div>
          
          <!-- FAQ -->
          <div class="space-y-4">
            <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400">
              <i class="fas fa-question mr-2"></i> Sık Sorulan Sorular
            </h2>
            <div class="space-y-4">
              <!-- Question 1 -->
              <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg">
                <h3 class="font-semibold text-lg mb-2">Dosya boyutu sınırı nedir?</h3>
                <p class="text-gray-600 dark:text-gray-300">CTransfer yerel ağınızda çalıştığı için dosya boyutu sınırı yoktur. Bilgisayarınızın depolama alanı yeterli olduğu sürece istediğiniz boyutta dosya yükleyebilirsiniz.</p>
              </div>
              
              <!-- Question 2 -->
              <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg">
                <h3 class="font-semibold text-lg mb-2">Hangi dosya türlerini yükleyebilirim?</h3>
                <p class="text-gray-600 dark:text-gray-300">CTransfer tüm dosya türlerini destekler. Ancak, yasadışı içerik veya virüs içeren dosyalar yüklenemez.</p>
              </div>
              
              <!-- Question 3 -->
              <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg">
                <h3 class="font-semibold text-lg mb-2">Dosyalarım nerede saklanıyor?</h3>
                <p class="text-gray-600 dark:text-gray-300">Dosyalarınız yalnızca yerel ağınızda saklanır ve internet üzerinden herhangi bir sunucuya gönderilmez.</p>
              </div>
              
              <!-- Question 4 -->
              <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg">
                <h3 class="font-semibold text-lg mb-2">Dosyalarımı nasıl silebilirim?</h3>
                <p class="text-gray-600 dark:text-gray-300">Yüklenen dosyalar bölümünden dosyalarınızı seçip sil butonuna tıklayarak silebilirsiniz.</p>
              </div>
            </div>
          </div>
          
          <!-- Troubleshooting -->
          <div class="space-y-4">
            <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400">
              <i class="fas fa-wrench mr-2"></i> Sorun Giderme
            </h2>
            <div class="space-y-4">
              <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg">
                <h3 class="font-semibold text-lg mb-2">Yaygın Sorunlar ve Çözümleri</h3>
                <ul class="list-disc list-inside space-y-2 text-gray-600 dark:text-gray-300">
                  <li>Sunucu başlatılamıyorsa: <code class="bg-gray-100 dark:bg-gray-700 px-2 py-0.5 rounded">başlat.bat</code> dosyasını yönetici olarak çalıştırmayı deneyin</li>
                  <li>Dosya yüklenemiyorsa: Dosya boyutunu ve türünü kontrol edin</li>
                  <li>Bağlantı sorunları: Yerel ağ bağlantınızı kontrol edin</li>
                  <li>Diğer sorunlar: <code class="bg-gray-100 dark:bg-gray-700 px-2 py-0.5 rounded">check.php</code> sayfasını ziyaret edin</li>
                </ul>
              </div>
            </div>
          </div>
          
          <!-- Contact -->
          <div class="space-y-4">
            <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400">
              <i class="fas fa-envelope mr-2"></i> İletişim
            </h2>
            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
              Sorularınız veya önerileriniz için lütfen bizimle iletişime geçin. Size en kısa sürede yardımcı olmaya çalışacağız.
            </p>
          </div>
        </div>
        
        <!-- Footer -->
        <div class="bg-gray-50 dark:bg-gray-700/50 px-8 py-6 flex justify-between items-center">
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