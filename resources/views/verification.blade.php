@extends('layouts.bootstrap5')

@section('content')
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-3">Terima kasih telah mendaftar!</h4>
                        <p class="text-center">Selanjutnya, silahkan melakukan konfirmasi melalui nomor dibawah ini:</p>
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center gap-4 mb-5">
                            <a href="https://wa.me/+6285237563046?text=Assalamu'alaikum,%20Saya%20ingin%20verifikasi%20pendaftaran"
                                class="btn btn-success"><i class="bi bi-whatsapp"></i> Ustadz Imam Sudarmoko</a>
                            <a href="https://wa.me/+6282264184506?text=Assalamu'alaikum,%20Saya%20ingin%20verifikasi%20pendaftaran"
                                class="btn btn-success"><i class="bi bi-whatsapp"></i> Ustadzah Ihda Qurrati 'Aini</a>
                            <a href="https://wa.me/+6285931100660?text=Assalamu'alaikum,%20Saya%20ingin%20verifikasi%20pendaftaran"
                                class="btn btn-success"><i class="bi bi-whatsapp"></i> Ustadz Saiful Bahri</a>
                            <a href="https://wa.me/+6285172390625?text=Assalamu'alaikum,%20Saya%20ingin%20verifikasi%20pendaftaran"
                                class="btn btn-success"><i class="bi bi-whatsapp"></i> Ustadzah Anggita Larasati</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
