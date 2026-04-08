<x-layout>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 py-12 px-4">
        <div class="max-w-2xl mx-auto">
            
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Registrasi Siswa</h1>
                <p class="text-gray-600">Lengkapi data berikut untuk mendaftar sebagai siswa baru</p>
            </div>

            <!-- Card Form -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-8 py-6">
                    <h2 class="text-white text-lg font-semibold">Data Pendaftaran</h2>
                </div>

                <!-- Form Body -->
                <form action="{{ route('post-registred') }}" method="POST" class="p-8" id="registration-form">
                    @csrf

                    <!-- Alert Success -->
                    @if(session('success'))
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg flex items-start gap-3">
                        <svg class="w-5 h-5 text-green-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-green-800 text-sm">{{ session('success') }}</p>
                    </div>
                    @endif

                    <!-- Alert General Error -->
                    @if(session('error'))
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg flex items-start gap-3">
                        <svg class="w-5 h-5 text-red-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-red-800 text-sm">{{ session('error') }}</p>
                    </div>
                    @endif

                    <!-- Alert Error Captcha (Hidden by default) -->
                    <div id="captcha-error" class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg hidden">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-red-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            <div class="flex-1">
                                <p class="text-red-800 text-sm font-medium" id="captcha-error-message"></p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        
                        <!-- Section: Data Pribadi -->
                        <div>
                            <h3 class="text-sm font-semibold text-gray-700 mb-4 flex items-center gap-2">
                                <div class="w-1 h-5 bg-blue-600 rounded"></div>
                                Data Pribadi
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                
                                <!-- Nama Lengkap -->
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Nama Lengkap <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           name="nama" 
                                           value="{{ old('nama') }}"
                                           class="w-full px-4 py-3 border rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition {{ $errors->has('nama') ? 'border-red-500 bg-red-50' : 'border-gray-300' }}"
                                           placeholder="Masukkan nama lengkap"
                                           required>
                                    @error('nama')
                                    <div class="flex items-start gap-2 mt-2">
                                        <svg class="w-4 h-4 text-red-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <!-- NIS -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Nomor Induk Siswa (NIS) <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           name="nis" 
                                           value="{{ old('nis') }}"
                                           class="w-full px-4 py-3 border rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition {{ $errors->has('nis') ? 'border-red-500 bg-red-50' : 'border-gray-300' }}"
                                           placeholder="Contoh: 2024001"
                                           required>
                                    @error('nis')
                                    <div class="flex items-start gap-2 mt-2">
                                        <svg class="w-4 h-4 text-red-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <!-- No Telepon -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Nomor Telepon <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           name="no_telp" 
                                           value="{{ old('no_telp') }}"
                                           class="w-full px-4 py-3 border rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition {{ $errors->has('no_telp') ? 'border-red-500 bg-red-50' : 'border-gray-300' }}"
                                           placeholder="Contoh: 08123456789"
                                           required>
                                    @error('no_telp')
                                    <div class="flex items-start gap-2 mt-2">
                                        <svg class="w-4 h-4 text-red-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <!-- Section: Data Akademik -->
                        <div class="pt-4">
                            <h3 class="text-sm font-semibold text-gray-700 mb-4 flex items-center gap-2">
                                <div class="w-1 h-5 bg-blue-600 rounded"></div>
                                Data Akademik
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                
                                <!-- Kelas -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Kelas <span class="text-red-500">*</span>
                                    </label>
                                    <select name="kelas"
                                            class="w-full px-4 py-3 border rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition {{ $errors->has('kelas') ? 'border-red-500 bg-red-50' : 'border-gray-300' }}"
                                            required>
                                        <option value="" disabled {{ old('kelas') ? '' : 'selected' }}>Pilih kelas</option>
                                        <option value="X" {{ old('kelas') === 'X' ? 'selected' : '' }}>X</option>
                                        <option value="XI" {{ old('kelas') === 'XI' ? 'selected' : '' }}>XI</option>
                                        <option value="XII" {{ old('kelas') === 'XII' ? 'selected' : '' }}>XII</option>
                                    </select>
                                    @error('kelas')
                                    <div class="flex items-start gap-2 mt-2">
                                        <svg class="w-4 h-4 text-red-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <!-- Jurusan -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Jurusan <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           name="jurusan" 
                                           value="{{ old('jurusan') }}"
                                           class="w-full px-4 py-3 border rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition {{ $errors->has('jurusan') ? 'border-red-500 bg-red-50' : 'border-gray-300' }}"
                                           placeholder="Contoh: IPA, IPS, TKJ"
                                           required>
                                    @error('jurusan')
                                    <div class="flex items-start gap-2 mt-2">
                                        <svg class="w-4 h-4 text-red-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <!-- Tanggal Masuk -->
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Tanggal Masuk <span class="text-red-500">*</span>
                                    </label>
                                    <input type="date" 
                                           name="tgl_masuk" 
                                           value="{{ old('tgl_masuk') }}"
                                           class="w-full px-4 py-3 border rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition {{ $errors->has('tgl_masuk') ? 'border-red-500 bg-red-50' : 'border-gray-300' }}"
                                           required>
                                    @error('tgl_masuk')
                                    <div class="flex items-start gap-2 mt-2">
                                        <svg class="w-4 h-4 text-red-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <!-- Section: Verifikasi -->
                        <div class="pt-4 border-t border-gray-200">
                            <h3 class="text-sm font-semibold text-gray-700 mb-4 flex items-center gap-2">
                                <div class="w-1 h-5 bg-blue-600 rounded"></div>
                                Verifikasi Keamanan
                            </h3>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-3">
                                    Captcha <span class="text-red-500">*</span>
                                </label>
                                
                                <div class="flex items-center gap-3 mb-3">
                                    <div id="captcha-question"
                                         class="flex-1 px-6 py-4 bg-gradient-to-r from-blue-50 to-indigo-50 border-2 border-blue-200 rounded-lg text-gray-800 font-semibold text-lg text-center">
                                        <!-- soal captcha -->
                                    </div>

                                    <button type="button" 
                                            onclick="generateCaptcha()"
                                            class="px-4 py-4 bg-white border-2 border-gray-300 rounded-lg hover:bg-gray-50 transition group">
                                        <svg class="w-5 h-5 text-gray-600 group-hover:rotate-180 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                        </svg>
                                    </button>
                                </div>

                                <input type="text" 
                                       id="captcha-input"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                       placeholder="Masukkan hasil penjumlahan"
                                       autocomplete="off"
                                       required>
                            </div>
                        </div>

                    </div>

                    <!-- Submit Button -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <button type="submit"
                                class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold py-4 rounded-lg hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <span class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Daftar Sekarang
                            </span>
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>

    <!-- JavaScript Captcha -->
    <script>
        let captchaAnswer = 0;

        // Generate captcha
        function generateCaptcha() {
            const a = Math.floor(Math.random() * 20) + 1;
            const b = Math.floor(Math.random() * 20) + 1;
            
            captchaAnswer = a + b;
            
            document.getElementById('captcha-question').innerText = `${a} + ${b} = ?`;
            document.getElementById('captcha-input').value = '';
            
            // Hide error message saat generate ulang
            hideCaptchaError();
        }

        // Show captcha error message
        function showCaptchaError(message) {
            const errorDiv = document.getElementById('captcha-error');
            const errorMessage = document.getElementById('captcha-error-message');
            
            errorMessage.textContent = message;
            errorDiv.classList.remove('hidden');
            
            // Scroll ke error message
            errorDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }

        // Hide captcha error message
        function hideCaptchaError() {
            const errorDiv = document.getElementById('captcha-error');
            errorDiv.classList.add('hidden');
        }

        // Validate captcha before submit
        function validateCaptcha(event) {
            event.preventDefault(); // Prevent form submit
            
            const input = document.getElementById('captcha-input').value.trim();
            
            // Check if captcha is empty
            if (!input) {
                showCaptchaError('⚠️ Captcha harus diisi!');
                document.getElementById('captcha-input').focus();
                return false;
            }
            
            // Check if captcha is correct
            const userAnswer = parseInt(input);
            
            if (isNaN(userAnswer)) {
                showCaptchaError('❌ Captcha harus berupa angka!');
                document.getElementById('captcha-input').focus();
                return false;
            }
            
            if (userAnswer !== captchaAnswer) {
                showCaptchaError('❌ Jawaban captcha salah! Silakan coba lagi.');
                generateCaptcha();
                document.getElementById('captcha-input').focus();
                return false;
            }
            
            // Captcha benar, submit form
            hideCaptchaError();
            document.getElementById('registration-form').submit();
        }

        // Event listener untuk form submit
        document.getElementById('registration-form').addEventListener('submit', validateCaptcha);

        // Event listener untuk input captcha - hide error saat user mulai mengetik
        document.getElementById('captcha-input').addEventListener('input', function() {
            if (this.value.trim() !== '') {
                hideCaptchaError();
            }
        });

        // Generate captcha saat halaman dimuat
        window.addEventListener('DOMContentLoaded', function() {
            generateCaptcha();
        });
    </script>
</x-layout>