<?php
$ip = file_exists("ip.txt") ? trim(file_get_contents("ip.txt")) : "127.0.0.1";
?>
<!DOCTYPE html>
<html lang="tr" class="light">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CTransfer | Yerel Dosya Paylaşım Sistemi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            primary: '#2563eb',
            light: '#f9fafb',
            darkText: '#1f2937',
          },
          boxShadow: {
            soft: '0 4px 20px rgba(0, 0, 0, 0.08)',
            glow: '0 0 15px rgba(37, 99, 235, 0.3)',
            'glow-lg': '0 0 30px rgba(37, 99, 235, 0.4)',
          },
          animation: {
            'float': 'float 6s ease-in-out infinite',
          },
          backgroundImage: {
            'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
            'gradient-conic': 'conic-gradient(var(--tw-gradient-stops))',
          }
        }
      }
    }
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <style>
    @keyframes float {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-20px); }
      100% { transform: translateY(0px); }
    }
    .gradient-text {
      background: linear-gradient(45deg, #3b82f6, #8b5cf6);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
    }
    .glass-effect {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
    }
    .dark .glass-effect {
      background: rgba(17, 24, 39, 0.7);
    }
    [data-aos] {
      pointer-events: none;
    }
    [data-aos].aos-animate {
      pointer-events: auto;
    }
    .feature-card {
      position: relative;
      overflow: hidden;
      transition: all 0.3s ease;
    }
    .feature-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
      transform: translateX(-100%);
      transition: transform 0.6s ease;
    }
    .feature-card:hover::before {
      transform: translateX(100%);
    }
    .feature-card:hover {
      transform: translateY(-5px);
    }
    .step-number {
      position: absolute;
      top: 0;
      right: 0;
      width: 40px;
      height: 40px;
      background: linear-gradient(45deg, #3b82f6, #8b5cf6);
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      border-radius: 0 0 0 1rem;
      opacity: 0;
      transform: translateY(-100%);
      transition: all 0.3s ease;
    }
    .step-card:hover .step-number {
      opacity: 1;
      transform: translateY(0);
    }
    .cta-button {
      position: relative;
      overflow: hidden;
      transition: all 0.3s ease;
    }
    .cta-button::after {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
      transform: rotate(45deg) translate(-100%, -100%);
      transition: transform 0.6s ease;
    }
    .cta-button:hover::after {
      transform: rotate(45deg) translate(100%, 100%);
    }
    .cta-button:hover {
      transform: translateY(-2px);
    }
    .hero-section {
      position: relative;
      overflow: hidden;
    }
    .hero-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: radial-gradient(circle at 50% 50%, rgba(37, 99, 235, 0.1), transparent 70%);
      pointer-events: none;
    }
    .feature-icon {
      position: relative;
      transition: all 0.3s ease;
    }
    .feature-icon::after {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 100%;
      height: 100%;
      background: radial-gradient(circle, rgba(37, 99, 235, 0.1), transparent 70%);
      transform: translate(-50%, -50%) scale(0);
      transition: transform 0.3s ease;
    }
    .feature-card:hover .feature-icon::after {
      transform: translate(-50%, -50%) scale(1);
    }
    .step-card {
      position: relative;
      transition: all 0.3s ease;
    }
    .step-card:hover {
      transform: translateY(-5px);
    }
    .step-icon {
      position: relative;
      transition: all 0.3s ease;
    }
    .step-card:hover .step-icon {
      transform: scale(1.1);
    }
  </style>
</head>

<body class="dark:bg-gray-900 text-darkText dark:text-gray-100 min-h-screen flex flex-col">
  <?php include 'navbar.php'; ?>

  <!-- Hero Section -->
  <div class="hero-section relative overflow-hidden min-h-[90vh] flex items-center">
    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 via-purple-500/10 to-pink-500/10 dark:from-blue-500/5 dark:via-purple-500/5 dark:to-pink-500/5"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
      <div class="text-center">
        <div class="inline-block p-3 glass-effect rounded-full shadow-lg mb-8" data-aos="fade-down" data-aos-duration="800">
          <div class="bg-gradient-to-r from-blue-500 to-purple-500 text-white p-4 rounded-full">
            <i class="fas fa-share-alt text-4xl"></i>
          </div>
        </div>
        <h1 class="text-5xl md:text-7xl font-extrabold gradient-text mb-6" data-aos="fade-up" data-aos-duration="800">
          Yerel Ağınızda Güvenli Dosya Paylaşımı
        </h1>
        <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-300 mb-8 max-w-3xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
          CTransfer ile dosyalarınızı yerel ağınızda hızlı, güvenli ve kolay bir şekilde paylaşın. İnternet bağlantısına gerek duymadan, verilerinizi güvenle aktarın.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-6" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
          <a href="transfer.php" class="cta-button group inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-glow hover:scale-105">
            <i class="fas fa-upload mr-2 group-hover:rotate-12 transition-transform duration-300"></i> Hemen Başla
          </a>
          <a href="setup.php" class="group inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-gray-700 dark:text-white bg-white dark:bg-gray-800 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-300 shadow-lg hover:scale-105">
            <i class="fas fa-book mr-2 group-hover:rotate-12 transition-transform duration-300"></i> Kurulum Rehberi
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Features Section -->
  <div class="py-24 bg-white dark:bg-gray-800 relative">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-50 dark:to-gray-900/50"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold gradient-text" data-aos="fade-up" data-aos-duration="800">
          Neden CTransfer?
        </h2>
        <p class="mt-4 text-xl text-gray-600 dark:text-gray-300" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
          Modern ve güvenli dosya paylaşım çözümü
        </p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="feature-card group bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-soft hover:shadow-lg transition-all duration-300" data-aos="fade-up" data-aos-duration="800">
          <div class="feature-icon bg-blue-100 dark:bg-blue-900/30 w-20 h-20 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
            <i class="fas fa-shield-alt text-3xl text-blue-600 dark:text-blue-400"></i>
          </div>
          <h3 class="text-xl font-bold mb-4">Güvenli Paylaşım</h3>
          <p class="text-gray-600 dark:text-gray-300">Dosyalarınız sadece yerel ağınızda kalır, internet üzerinden erişilemez. Maksimum güvenlik için tasarlandı.</p>
        </div>

        <div class="feature-card group bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-soft hover:shadow-lg transition-all duration-300" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
          <div class="feature-icon bg-purple-100 dark:bg-purple-900/30 w-20 h-20 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
            <i class="fas fa-bolt text-3xl text-purple-600 dark:text-purple-400"></i>
          </div>
          <h3 class="text-xl font-bold mb-4">Hızlı Transfer</h3>
          <p class="text-gray-600 dark:text-gray-300">Yerel ağ hızında dosya transferi yapın. Büyük dosyaları saniyeler içinde paylaşın.</p>
        </div>

        <div class="feature-card group bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-soft hover:shadow-lg transition-all duration-300" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
          <div class="feature-icon bg-emerald-100 dark:bg-emerald-900/30 w-20 h-20 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
            <i class="fas fa-mobile-alt text-3xl text-emerald-600 dark:text-emerald-400"></i>
          </div>
          <h3 class="text-xl font-bold mb-4">Kolay Erişim</h3>
          <p class="text-gray-600 dark:text-gray-300">QR kod ile mobil cihazlardan hızlı erişim. Tüm cihazlarınızdan kolayca bağlanın.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- How It Works Section -->
  <div class="py-24 bg-gray-50 dark:bg-gray-900 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold gradient-text" data-aos="fade-up" data-aos-duration="800">
          Nasıl Çalışır?
        </h2>
        <p class="mt-4 text-xl text-gray-600 dark:text-gray-300" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
          Sadece 4 adımda dosya paylaşımına başlayın
        </p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div class="step-card text-center group relative" data-aos="fade-up" data-aos-duration="800">
          <div class="step-number">1</div>
          <div class="step-icon bg-white dark:bg-gray-800 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-6 shadow-soft group-hover:shadow-lg transition-all duration-300">
            <i class="fas fa-download text-3xl text-blue-600 dark:text-blue-400"></i>
          </div>
          <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-soft group-hover:shadow-lg transition-all duration-300">
            <h3 class="font-bold text-lg mb-2">1. Kurulum</h3>
            <p class="text-gray-600 dark:text-gray-300">CTransfer'ı bilgisayarınıza kurun</p>
          </div>
        </div>

        <div class="step-card text-center group relative" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
          <div class="step-number">2</div>
          <div class="step-icon bg-white dark:bg-gray-800 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-6 shadow-soft group-hover:shadow-lg transition-all duration-300">
            <i class="fas fa-play text-3xl text-purple-600 dark:text-purple-400"></i>
          </div>
          <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-soft group-hover:shadow-lg transition-all duration-300">
            <h3 class="font-bold text-lg mb-2">2. Başlatın</h3>
            <p class="text-gray-600 dark:text-gray-300">Sistemi başlatın ve IP adresinizi alın</p>
          </div>
        </div>

        <div class="step-card text-center group relative" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
          <div class="step-number">3</div>
          <div class="step-icon bg-white dark:bg-gray-800 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-6 shadow-soft group-hover:shadow-lg transition-all duration-300">
            <i class="fas fa-qrcode text-3xl text-emerald-600 dark:text-emerald-400"></i>
          </div>
          <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-soft group-hover:shadow-lg transition-all duration-300">
            <h3 class="font-bold text-lg mb-2">3. Bağlanın</h3>
            <p class="text-gray-600 dark:text-gray-300">QR kod veya link ile bağlanın</p>
          </div>
        </div>

        <div class="step-card text-center group relative" data-aos="fade-up" data-aos-delay="600" data-aos-duration="800">
          <div class="step-number">4</div>
          <div class="step-icon bg-white dark:bg-gray-800 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-6 shadow-soft group-hover:shadow-lg transition-all duration-300">
            <i class="fas fa-share-alt text-3xl text-red-600 dark:text-red-400"></i>
          </div>
          <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-soft group-hover:shadow-lg transition-all duration-300">
            <h3 class="font-bold text-lg mb-2">4. Paylaşın</h3>
            <p class="text-gray-600 dark:text-gray-300">Dosyalarınızı güvenle paylaşın</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- CTA Section -->
  <div class="relative py-24 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 via-purple-500/10 to-pink-500/10 dark:from-blue-500/5 dark:via-purple-500/5 dark:to-pink-500/5"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <div class="inline-block p-3 glass-effect rounded-full shadow-lg mb-8" data-aos="fade-down" data-aos-duration="800">
        <div class="bg-gradient-to-r from-blue-500 to-purple-500 text-white p-4 rounded-full">
          <i class="fas fa-rocket text-4xl"></i>
        </div>
      </div>
      <h2 class="text-3xl md:text-4xl font-bold gradient-text mb-6" data-aos="fade-up" data-aos-duration="800">
        Hemen Başlayın
      </h2>
      <p class="text-xl text-gray-600 dark:text-gray-300 mb-8 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
        CTransfer ile dosya paylaşımını güvenli ve kolay hale getirin. Hemen şimdi ücretsiz kullanmaya başlayın.
      </p>
      <a href="transfer.php" class="cta-button group inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-glow hover:scale-105" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
        <i class="fas fa-rocket mr-2 group-hover:rotate-12 transition-transform duration-300"></i> Şimdi Deneyin
      </a>
    </div>
  </div>

  <?php include 'footer.php'; ?>

  <script>
    // Initialize AOS
    AOS.init({
      duration: 800,
      once: true,
      offset: 100,
      easing: 'ease-out-cubic'
    });

    // Theme Toggle
    document.addEventListener('DOMContentLoaded', function() {
      const html = document.documentElement;
      const getTheme = () => localStorage.getItem('theme') || 'light';
      const setTheme = (theme) => {
        localStorage.setItem('theme', theme);
        html.className = theme;
      };
      setTheme(getTheme());
    });
  </script>
</body>

</html>
