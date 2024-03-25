@extends('layouts.user.profile')

@section('content')
    <section id="keranjang" style="margin-top: 5rem">
        <div class="container-sm">
            @if ($historis)
                <div style="border: 1px solid #5F5B00; border-radius: 10px; padding: 1rem"
                    class="mb-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h1 style="color: #5F5B00; font-size: 25px; font-weight: 400; text-transform: capitalize; padding: 0.5rem; margin: 0%"
                            class="d-flex align-items-center">{{ $historis->status }}
                        </h1>
                    </div>
                </div>

                <div style="border: 1px solid #5F5B00; border-radius: 10px; padding: 1rem"
                    class="mb-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h1 style="color: #5F5B00; font-size: 20px; font-weight: 400; text-transform: capitalize; padding: 0.5rem; margin: 0%"
                            class="d-flex align-items-center">Estimasi diterima tanggal : Minggu, 25 Feb 2024
                        </h1>
                        <p
                            style="color: #5F5B00; font-size: 16px; font-weight: 400; text-transform: capitalize; padding: 0.5rem; margin: 0%">
                            Dikirim dengan Reguler - J&T Expreess
                        </p>
                    </div>
                </div>

                <div class="card w-100"
                    style="border-color: #5F5B00; border-width: 0.5px; box-shadow: 0px 0px 15px #5f5a0040; padding: 0px">
                    <div class="d-flex justify-content-between card-header"
                        style="background-color: white; border-color: #5F5B00; border-bottom-width: 0.5px">
                        <div class="d-flex align-items-center gap-1">
                            <p class="" style="margin: 0%; color: #5F5B00; font-size: 16px; font-weight: 300">
                                No. Resi</p>
                        </div>
                        <div>
                            <p
                                style="color: #5F5B00; margin: 0px; font-size: 16px; font-weight: 300; text-transform: capitalize">
                                {{ $historis->noresi }}</p>
                        </div>
                    </div>
                    <div style="padding: 10px" class="d-flex gap-4">
                        <div style="width: 100%;" class="d-flex justify-content-between">
                            <div style="width: fit-content;">
                                <p style="margin-bottom: 3px; color: #5F5B00; font-size: 16px; font-weight: 300;">Kurir</p>
                                <p style="margin-bottom: 3px">Jasa Kirim</p>
                                <p style="margin-bottom: 3px">PPN</p>
                                <p style="margin-bottom: 3px">Total</p>
                            </div>
                            <div style="width: fit-content">
                                <p id="totalHarga" style="margin-bottom: 3px"></p>
                                <p style="margin-bottom: 3px">Rp. 5.000,00</p>
                                <p style="margin-bottom: 3px">Rp. 2.000,00</p>
                                <p id="totalHargaPPN" style="margin-bottom: 3px"></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
