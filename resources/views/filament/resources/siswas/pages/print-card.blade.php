<x-filament-panels::page>
    <div class="print-container">
        {{-- Button Print --}}
        <div class="no-print mb-4 flex justify-end gap-2">
            <x-filament::button 
                wire:click="$refresh"
                color="gray"
                icon="heroicon-o-arrow-path"
            >
                Refresh
            </x-filament::button>
            
            <x-filament::button 
                onclick="window.print()"
                color="success"
                icon="heroicon-o-printer"
            >
                Print Kartu
            </x-filament::button>
        </div>

        {{-- Card Content --}}
        <div class="student-card">
            <div class="card-header">
                <img src="{{ asset('images/logo-sekolah.png') }}" alt="Logo" class="logo">
                <div class="school-info">
                    <h2>SEKOLAH MENENGAH ATAS</h2>
                    <h3>SMA NEGERI 1 EXAMPLE</h3>
                    <p>Jl. Example No. 123, Kota Example</p>
                </div>
            </div>

            <div class="card-body">
                <div class="student-info">
                    @if($siswa->foto)
                        <img src="{{ Storage::url($siswa->foto) }}" alt="Foto" class="photo">
                    @else
                        <div class="photo-placeholder">
                            <span>Foto</span>
                        </div>
                    @endif
                    
                    <div class="details">
                        <table>
                            <tr>
                                <td class="label">NIS</td>
                                <td class="separator">:</td>
                                <td class="value">{{ $siswa->nis }}</td>
                            </tr>
                            <tr>
                                <td class="label">Nama</td>
                                <td class="separator">:</td>
                                <td class="value">{{ $siswa->nama }}</td>
                            </tr>
                            <tr>
                                <td class="label">Kelas</td>
                                <td class="separator">:</td>
                                <td class="value">{{ $siswa->kelas ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="label">Jurusan</td>
                                <td class="separator">:</td>
                                <td class="value">{{ $siswa->jurusan ?? '-' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="qr-section">
                    {{-- Render SVG inline pakai {!! !!} --}}
                    <div class="qr-code-svg">
                        {!! $siswa->qr_code_inline !!}
                    </div>
                    <p class="qr-label">Scan untuk data peminjaman</p>
                </div>
            </div>

            <div class="card-footer">
                <p>Berlaku s.d: {{ now()->addYear()->format('d/m/Y') }}</p>
            </div>
        </div>
    </div>

    <style>
        @media print {
            .no-print {
                display: none !important;
            }
            
            body * {
                visibility: hidden;
            }
            
            .student-card, .student-card * {
                visibility: visible;
            }
            
            .student-card {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
            }
            
            @page {
                size: 8.5cm 5.5cm;
                margin: 0;
            }
        }

        .print-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 2rem;
        }

        .student-card {
            width: 8.5cm;
            height: 5.5cm;
            border: 2px solid #2563eb;
            border-radius: 8px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 0.5cm;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            font-family: 'Arial', sans-serif;
            color: white;
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 0.3cm;
            padding-bottom: 0.3cm;
            border-bottom: 2px solid rgba(255,255,255,0.3);
            margin-bottom: 0.3cm;
        }

        .logo {
            width: 1cm;
            height: 1cm;
            object-fit: contain;
            background: white;
            border-radius: 4px;
            padding: 2px;
        }

        .school-info h2 {
            font-size: 8pt;
            font-weight: bold;
            margin: 0;
            line-height: 1.2;
        }

        .school-info h3 {
            font-size: 10pt;
            font-weight: bold;
            margin: 0;
            line-height: 1.2;
        }

        .school-info p {
            font-size: 6pt;
            margin: 0;
            opacity: 0.9;
        }

        .card-body {
            display: flex;
            gap: 0.4cm;
        }

        .student-info {
            flex: 1;
            display: flex;
            gap: 0.3cm;
        }

        .photo, .photo-placeholder {
            width: 2cm;
            height: 2.5cm;
            object-fit: cover;
            border-radius: 4px;
            border: 2px solid white;
        }

        .photo-placeholder {
            background: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 8pt;
        }

        .details table {
            width: 100%;
            font-size: 7pt;
        }

        .details .label {
            font-weight: bold;
            width: 1.5cm;
        }

        .details .separator {
            width: 0.2cm;
            text-align: center;
        }

        .details .value {
            font-weight: normal;
        }

        .qr-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .qr-code-svg {
            width: 2cm;
            height: 2cm;
            background: white;
            padding: 0.1cm;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
        }


        .qr-placeholder {
            width: 2cm;
            height: 2cm;
            background: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 6pt;
            border-radius: 4px;
        }

        .qr-label {
            font-size: 5pt;
            margin-top: 0.1cm;
            text-align: center;
            opacity: 0.9;
        }

        .card-footer {
            margin-top: 0.2cm;
            padding-top: 0.2cm;
            border-top: 1px solid rgba(255,255,255,0.3);
            text-align: center;
            font-size: 6pt;
            opacity: 0.8;
        }
    </style>
</x-filament-panels::page>