<div 
    x-data="{ 
        status: 'Memuat kamera...', 
        statusColor: '#666',
        qrReader: null,
        
        init() {
            this.$nextTick(() => {
                this.startScanner();
            });
        },
        
        startScanner() {
            if (typeof Html5Qrcode === 'undefined') {
                this.status = '❌ Library gagal dimuat';
                this.statusColor = 'red';
                return;
            }
            
            this.qrReader = new Html5Qrcode('qr-reader');
            this.status = ' Meminta akses kamera...';
            
            this.qrReader.start(
                { facingMode: 'environment' },
                { fps: 10, qrbox: { width: 250, height: 250 } },
                (decodedText) => {
                    this.status = '✅ QR terdeteksi! Redirect...';
                    this.statusColor = 'green';
                    
                    this.qrReader.stop().then(() => {
                        window.location.href = decodedText;
                    });
                }
            ).then(() => {
                this.status = 'Arahkan ke QR Code';
                this.statusColor = 'green';
            }).catch(err => {
                console.error('❌ Error:', err);
                this.status = '❌ Gagal: ' + err;
                this.statusColor = 'red';
            });
        }
    }" 
    
>
    <div id="qr-reader" style="width: 100%; max-width: 500px; margin: 0 auto;"></div>
    
    <div 
        x-text="status" 
        :style="'margin-top: 1rem; text-align: center; color: ' + statusColor"
    ></div>
</div>

@assets
<script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
@endassets