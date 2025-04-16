# CTransfer

CTransfer, yerel ağınızda dosyaları güvenli ve hızlı bir şekilde paylaşmanıza olanak tanıyan bir dosya transfer uygulamasıdır. Bu uygulama, dosyalarınızı yalnızca yerel cihazlar arasında aktarır ve herhangi bir sunucuya veya üçüncü taraf servislere bağlantı kurmaz.

## Özellikler

- **Yerel Dosya Paylaşımı**: Dosyalarınızı yerel ağınızdaki diğer cihazlarla güvenli bir şekilde paylaşın.
- **Kullanıcı Dostu Arayüz**: Basit ve anlaşılır bir arayüz ile dosya yükleme ve görüntüleme işlemlerini kolayca gerçekleştirin.
- **QR Kod Desteği**: Diğer aygıtlar ile aynı bağlantıya katılmak için kare kodu okutun.

## Gereksinimler

- PHP 7.0 veya üzeri
- Web sunucusu (Apache, Nginx vb.)
- Tarayıcı (Chrome, Firefox, Safari vb.)

> Proje tamamen Xampp ile geliştirilmiştir. Sorunsuz olarak Xampp üzerinden kullanabilirsiniz.

## Kurulum

1. **Proje Dosyalarını İndirin**: Proje dosyalarını GitHub üzerinden indirin veya klonlayın.
   
   ```bash
   git clone https://github.com/ebuword/ctransfer.git
   ```

2. **Dosyaları Açın**: İndirdiğiniz dosyaları bir klasör içerisinde açın ve baslat.bat çalıştırın.

3. **IP Adresi Ayarı**: `ip.txt` dosyasını oluşturun ve içini boş bırakın. baslat.bat açtığınızda IPV4 adresiniz otomatik olarak buna kaydedilecektir. Eğer bu dosya yoksa, uygulama varsayılan olarak `127.0.0.1` kullanacaktır.

4. **Web Sunucusunu Başlatın**: Web sunucunuzu başlatın ve tarayıcınızda `http://localhost/` adresine gidin.

## Kullanım

1. **Dosya Yükleme**: Ana sayfada "Dosya Yükle" bölümünden dosyalarınızı seçin ve "Yükle" butonuna tıklayın.
2. **Yüklenen Dosyaları Görüntüleme**: Yüklediğiniz dosyalar "Yüklenen Dosyalar" bölümünde görüntülenecektir.
3. **Dosyaları Silme**: Silmek istediğiniz dosyaların yanındaki kutucukları işaretleyin ve "Seçilenleri Sil" butonuna tıklayın.


## Katkıda Bulunma

Bu projeye katkıda bulunmak isterseniz, lütfen bir pull request oluşturun veya sorunlarınızı bildirin.

## Lisans

Bu proje [MIT Lisansı](LICENSE) altında lisanslanmıştır.

## İletişim

Herhangi bir sorunuz veya geri bildiriminiz varsa, lütfen [contact@9fud.com](mailto:contact@9fud.com) adresi üzerinden benimle iletişime geçin.
