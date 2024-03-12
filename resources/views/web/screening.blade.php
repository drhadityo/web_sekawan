@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Persetujuan Screening -->
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    
    <form method="POST" action="{{ route('screenings.store') }}">
    @csrf
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title">Persetujuan Screening</h3>
                <ol style="font-size: 16px;">
                    <li>Screening ini digunakan untuk mendeteksi dini penyakit TB.</li>
                    <li>Adapun hasil rencana tindak lanjut Screening berupa Rekomendasi tempat Fasilitas Layanan kesehatan terdekat yang dapat melakukan Screening TB dan dibawah naungan Dinas Kesehatan.</li>
                    <li>Data dalam formulir ini sangat dijaga privasinya dari pihak yang tidak memiliki wewenang.</li>
                    <li>Saya mengerti tujuan mengisi Screening ini, dan bersedia untuk melakukan investigasi kontak.</li>
                    <li>Saya bersedia mengisi semua data formulir Screening dengan sebenar-benarnya sesuai kondisi yang sedang saya alami.</li>
                </ol>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="agreement" name="agreement">
                    <label class="form-check-label" for="agreement" name="agreement" style="font-size: 16px;">Ya, saya menyetujui</label>
                </div>
            </div>
        </div>

        <!-- Identitas Diri -->
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title">Identitas Diri</h3>
                    <div class="mb-3">
                        <label for="full Name" class="form-label" style="font-size: 16px;">Nama Lengkap:</label>
                        <input type="text" class="form-control" id="fullName" name="full_name" required style="font-size: 16px;">
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label" style="font-size: 16px;">Kontak:</label>
                        <input type="text" class="form-control" id="contact" name="contact" required style="font-size: 16px;">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label" style="font-size: 16px;">Jenis Kelamin:</label>
                        <select class="form-select" id="gender" name="gender" required style="font-size: 16px;">
                            <option value="" selected disabled style="font-size: 16px;">Pilih Jenis Kelamin</option>
                            <option value="male" style="font-size: 16px;">Laki-laki</option>
                            <option value="female" style="font-size: 16px;">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label" style="font-size: 16px;">Umur:</label>
                        <input type="number" class="form-control" id="age" name="age" required style="font-size: 16px;">
                    </div>
                    <div class="mb-3">
                        <label for="district" class="form-label" style="font-size: 16px;">Domisili Kecamatan:</label>
                        <select class="form-select" id="district" name="district" required style="font-size: 16px;">
                            <option value="" selected disabled style="font-size: 16px;">Pilih Kecamatan di Jember</option>
                            <option value="Kaliwates" style="font-size: 16px;">Kaliwates</option>
                            <option value="Patrang" style="font-size: 16px;">Patrang</option>
                            <option value="Sumbersari" style="font-size: 16px;">Sumbersari</option>
                            <option value="Arjasa" style="font-size: 16px;">Arjasa</option>
                            <option value="Pakusari" style="font-size: 16px;">Pakusari</option>
                            <option value="Sukorambi" style="font-size: 16px;">Sukorambi</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="screeningDate" class="form-label" style="font-size: 16px;">Tanggal Screening:</label>
                        <input type="date" class="form-control" id="screeningDate" name="screening_date" required style="font-size: 16px;">
                    </div>
                    
                    <script>
                        var today = new Date();
                
                        var year = today.getFullYear();
                        var month = ("0" + (today.getMonth() + 1)).slice(-2);
                        var day = ("0" + today.getDate()).slice(-2);
                    
                        var formattedDate = year + "-" + month + "-" + day;
                    
                        document.getElementById("screeningDate").value = formattedDate;
                    </script>
                    
                    <div class="mb-3">
                        <label for="contactWithTB" style="font-size: 16px;">Apakah ada kontak satu rumah dengan pasien TBC?</label><br>
                        <input type="radio" id="contactYes" name="contact_with_tb" value="Ya" required>
                        <label for="contactYes" style="font-size: 16px;">Ya</label>
                        <input type="radio" id="contactNo" name="contact_with_tb" value="Tidak">
                        <label for="contactNo" style="font-size: 16px;">Tidak</label>
                    </div>                
            </div>
        </div>

        <!-- Pertanyaan Screening -->
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title" style="font-size: 16px;">Pertanyaan Screening</h3>

                <!-- Pertanyaan Batuk -->
                <div class="mb-3">
                    <label for="cough" style="font-size: 16px;">Apakah Anda mengalami batuk selama 2 minggu atau lebih?</label><br>
                    <input type="radio" id="coughYes" name="batuk" value="Ya" required>
                    <label for="coughYes" style="font-size: 16px;">Ya</label>
                    <input type="radio" id="coughNo" name="batuk" value="Tidak">
                    <label for="coughNo" style="font-size: 16px;">Tidak</label>
                </div>

                <!-- Gejala Lain -->
                <div class="mb-3">
                    <label for="breath" style="font-size: 16px;">Apakah Anda pernah mengalami sesak nafas dalam 2 bulan terakhir?</label><br>
                    <input type="radio" id="breathYes" name="sesak_nafas" value="Ya" required>
                    <label for="breathYes" style="font-size: 16px;">Ya</label>
                    <input type="radio" id="breathNo" name="sesak_nafas" value="Tidak">
                    <label for="breathNo" style="font-size: 16px;">Tidak</label>
                </div>
                <div class="mb-3">
                    <label for="sweat" style="font-size: 16px;">Apakah Anda pernah berkeringat saat malam hari tanpa berkegiatan?</label><br>
                    <input type="radio" id="sweatYes" name="keringat_malam_hari" value="Ya" required>
                    <label for="sweatYes" style="font-size: 16px;">Ya</label>
                    <input type="radio" id="sweatNo" name="keringat_malam_hari" value="Tidak">
                    <label for="sweatNo" style="font-size: 16px;">Tidak</label>
                </div>
                <div class="mb-3">
                    <label for="fever" style="font-size: 16px;">Apakah Anda pernah mengalami demam meriang selama lebih dari 1 bulan?</label><br>
                    <input type="radio" id="feverYes" name="demam_meriang" value="Ya" required>
                    <label for="feverYes" style="font-size: 16px;">Ya</label>
                    <input type="radio" id="feverNo" name="demam_meriang" value="Tidak">
                    <label for="feverNo" style="font-size: 16px;">Tidak</label>
                </div>

                <!-- Faktor Risiko -->
                <div class="mb-3">
                    <label for="pregnant" style="font-size: 16px;">Apakah Anda ibu hamil?</label><br>
                    <input type="radio" id="pregnantYes" name="ibu_hamil" value="Ya" required>
                    <label for="pregnantYes" style="font-size: 16px;">Ya</label>
                    <input type="radio" id="pregnantNo" name="ibu_hamil" value="Tidak">
                    <label for="pregnantNo" style="font-size: 16px;">Tidak</label>
                </div>
                <div class="mb-3">
                    <label for="elderly" style="font-size: 16px;">Apakah Anda adalah lansia lebih dari 60 tahun?</label><br>
                    <input type="radio" id="elderlyYes" name="lansia" value="Ya" required>
                    <label for="elderlyYes" style="font-size: 16px;">Ya</label>
                    <input type="radio" id="elderlyNo" name="lansia" value="Tidak">
                    <label for="elderlyNo" style="font-size: 16px;">Tidak</label>
                </div>
                <div class="mb-3">
                    <label for="diabetes" style="font-size: 16px;">Apakah Anda menderita diabetes melitus?</label><br>
                    <input type="radio" id="diabetesYes" name="diabetes_melitus" value="Ya" required>
                    <label for="diabetesYes" style="font-size: 16px;">Ya</label>
                    <input type="radio" id="diabetesNo" name="diabetes_melitus" value="Tidak">
                    <label for="diabetesNo" style="font-size: 16px;">Tidak</label>
                </div>
                <div class="mb-3">
                    <label for="smoke" style="font-size: 16px;">Apakah Anda merokok?</label><br>
                    <input type="radio" id="smokeYes" name="merokok" value="Ya" required>
                    <label for="smokeYes" style="font-size: 16px;">Ya</label>
                    <input type="radio" id="smokeNo" name="merokok" value="Tidak">
                    <label for="smokeNo" style="font-size: 16px;">Tidak</label>
                </div>
            </div>
        </div>

        <!-- Kontak -->
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title">Kontak</h3>
                <div class="mb-3" style="font-size: 16px;">
                    Berikan informasi Screening ini kepada kontak erat terdekat anda
                </div>            
                <div class="mb-3">
                    <label for="contact1Name" style="font-size: 16px;">Kontak 1</label><br>
                    <input type="text" id="contact1Name" name="contact1_name" placeholder="Nama" required style="font-size: 16px;">
                    <input type="tel" id="contact1" name="contact1_number" placeholder="Nomor Kontak" required style="font-size: 16px;">
                </div>
                <div class="mb-3">
                    <label for="contact2Name" style="font-size: 16px;">Kontak 2</label><br>
                    <input type="text" id="contact2Name" name="contact2_name" placeholder="Nama" required style="font-size: 16px;">
                    <input type="tel" id="contact2" name="contact2_number" placeholder="Nomor Kontak" required style="font-size: 16px;">
                </div>
                <div class="mb-3">
                    <label for="contact3Name" style="font-size: 16px;">Kontak 3</label><br>
                    <input type="text" id="contact3Name" name="contact3_name" placeholder="Nama" required style="font-size: 16px;">
                    <input type="tel" id="contact3" name="contact3_number" placeholder="Nomor Kontak" required style="font-size: 16px;">
                </div>
            </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
            <button type="submit"  class="btn btn-danger me-md-2 mb-2 mb-md-0">Kirim Data Screening</button>
        </div>
    </form>
</div>
@endsection

<style>
    .card {
        border-radius: 16px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
    }

    .card-title {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .form-label {
        font-size: 16px;
    }

    .form-check-label {
        font-size: 16px;
        margin-left: 10px;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
</style>
