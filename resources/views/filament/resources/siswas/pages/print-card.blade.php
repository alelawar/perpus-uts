<x-filament-panels::page>
    <style>
        @media print {
            @page { margin: 15mm; size: A4 portrait; }
            body, html { background: white !important; }
            
            /* 1. HANYA hide elemen UI yang jelas-jelas tidak perlu */
            header, nav, .fi-sidebar, .fi-topbar, footer, .fi-breadcrumbs, .no-print { 
                display: none !important; 
            }
            
            /* 2. Reset padding/margin wrapper Filament agar tidak geser */
            .fi-main, .fi-page-content { 
                padding: 0 !important; 
                margin: 0 !important; 
                width: 100% !important; 
                background: white !important;
            }

            /* 3. Posisikan container tepat di tengah halaman print */
            .print-container {
                position: absolute !important;
                top: 25mm !important;
                left: 50% !important;
                transform: translateX(-50%) !important;
                width: auto !important;
                z-index: 9999 !important;
            }
            
            .card-preview-wrapper { background: transparent !important; padding: 0 !important; }
            
            /* 4. Styling khusus kartu saat print */
            .student-card {
                width: 85.6mm !important;
                height: 54mm !important;
                box-shadow: none !important;
                border: 1.5px solid #000 !important;
                border-radius: 0 !important;
                page-break-inside: avoid;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        }
    </style>

    <div class="print-container">
        {{-- Button Actions (Hidden saat print) --}}
        <div class="no-print mb-6 flex justify-end gap-3">
            <x-filament::button 
                wire:click="$refresh"
                color="gray"
                icon="heroicon-o-arrow-path"
                size="sm"
            >
                Refresh
            </x-filament::button>
            
            <x-filament::button 
                onclick="window.print()"
                color="primary"
                icon="heroicon-o-printer"
                size="sm"
            >
                Print Kartu
            </x-filament::button>
        </div>

        {{-- Preview Card --}}
        <div class="card-preview-wrapper flex justify-center items-center min-h-[300px] p-6 bg-gray-50 rounded-2xl print:bg-transparent print:p-0 print:min-h-0">
            <div class="student-card relative w-[340px] aspect-[856/540] bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 print:w-[85.6mm] print:h-[54mm] print:rounded-none print:shadow-none print:border-2 print:border-black">
                
                {{-- Header --}}
                <div class="bg-gradient-to-r from-blue-700 to-indigo-800 p-3 text-white print:bg-blue-800">
                    <div class="flex items-center gap-2">
                        <img src="https://smkinfokom-bogor.sch.id/images/logo123.png" alt="Logo" class="w-10 h-10 bg-white rounded-full p-1 object-contain print:border print:border-gray-300">
                        <div class="flex-1 leading-tight">
                            <h2 class="text-[10px] font-bold uppercase tracking-wider">SEKOLAH MENENGAH ATAS</h2>
                            <h3 class="text-xs font-semibold">SMK INFOKOM BOGOR</h3>
                            <p class="text-[9px] opacity-90 mt-0.5">Jl. Letjen Ibrahim Adjie No.178, RT.03/RW.08, Sindangbarang, Kec. Bogor Bar., Kota Bogor, Jawa Barat 16117</p>
                        </div>
                    </div>
                </div>

                {{-- Body --}}
                <div class="px-3 pt-3 flex gap-3">
                    {{-- Details --}}
                    <div class="flex-1 text-[10px] space-y-1 print:text-black">
                        <div class="flex gap-1">
                            <span class="w-10 font-medium text-gray-600 print:text-gray-700">NIS</span>
                            <span class="text-gray-400">:</span>
                            <span class="font-semibold text-gray-900 truncate">{{ $siswa->nis ?? '-' }}</span>
                        </div>
                        <div class="flex gap-1">
                            <span class="w-10 font-medium text-gray-600 print:text-gray-700">Nama</span>
                            <span class="text-gray-400">:</span>
                            <span class="font-semibold text-gray-900 uppercase truncate">{{ $siswa->nama ?? '-' }}</span>
                        </div>
                        <div class="flex gap-1">
                            <span class="w-10 font-medium text-gray-600 print:text-gray-700">Kelas</span>
                            <span class="text-gray-400">:</span>
                            <span class="font-semibold text-gray-900 truncate">{{ $siswa->kelas ?? '-' }}</span>
                        </div>
                        <div class="flex gap-1">
                            <span class="w-10 font-medium text-gray-600 print:text-gray-700">Jurusan</span>
                            <span class="text-gray-400">:</span>
                            <span class="font-semibold text-gray-900 truncate">{{ $siswa->jurusan ?? '-' }}</span>
                        </div>
                    </div>

                    {{-- QR Code --}}
                    <div class="flex-shrink-0 flex flex-col items-center justify-center">
                        <div class="w-10 h-10 bg-white p-1 rounded border border-gray-200 flex items-center justify-center print:border-gray-400">
                            {!! $siswa->qr_code_inline ?? '<div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-500 text-[8px]">QR</div>' !!}
                        </div>
                        <span class="text-[8px] text-gray-500 mt-1 print:text-black">Scan QR</span>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="px-3 pb-2 pt-0 flex justify-between items-end border-t border-gray-100 print:border-gray-400">
                    <div class="text-[9px] text-gray-600 print:text-black">
                        <span class="block">Berlaku hingga:</span>
                        <span class="font-semibold text-gray-900">{{ $siswa->tgl_masuk->addYear(3)->format('d M Y') }}</span>
                    </div>
                </div>

                {{-- Badge --}}
                <div class="absolute top-0 right-0 bg-yellow-500 text-white text-[8px] font-bold px-2 py-0.5 rounded-bl-lg print:bg-yellow-600 print:text-black print:bg-none print:border-l print:border-b print:border-yellow-700">
                    KARTU PERPUSTAKAAN
                </div>
            </div>
        </div>
    </div>
</x-filament-panels::page>