<x-navbar-spv />
@extends('layouts.app')
@section('content')
    {{-- @dd($pegawai) --}}
    <div class="container">
        <div class="card">
            <h5 class="card-header">{{ $dayName }}, {{ $day }}-{{ $month }}-{{ $year }}</h5>
            <div class="card-body">
                <form action="{{ route('spv.absensi.store', ['year' => $year, 'month' => $month, 'day' => $day]) }}"
                    method="POST"">
                    @csrf
                    @php
                        $now = date('Y-m-d');
                        $tgl = strtotime($year . '-' . $month . '-' . $day);
                        $ok = $now == date('Y-m-d', $tgl);
                    @endphp
                    @if ($ok == true)
                        <button type="submit"
                            class="btn btn-sm btn-primary tw-bg-[#007bff] text-white tw-px-4 tw-mx-2 tw-self-end">Simpan <i
                                class="bi bi-clipboard-check"></i></button>
                    @endif
                    <div class="w-full tw-mx-5">
                        @foreach ($pegawai as $item)
                        {{-- @dd($item) --}}
                            <div class="d-flex row tw-shadow-md border rounded px-4 py-2 my-2">
                                <div class="col-md-7  tw-align-middle">
                                    <div class="row">
                                        <div class="col-md-2">NIP</div>
                                        <div class="col">: {{ $item->nip }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">Nama</div>
                                        <div class="col">: {{ $item->nama }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">Jabatan</div>
                                        <div class="col">: {{ $item->jabatan }}</div>
                                    </div>
                                </div>
                                <div class="col-md tw-align-middle text-end tw-my-auto">
                                    <div class=tw-h-full">
                                        <div class="form-check form-check-inline">
                                            <input required class="form-check-input" type="radio"
                                                name="status_{{ $item->pegawai_id }}" id="hadir_{{ $item->pegawai_id }}"
                                                value="HADIR"
                                                {{ isset($item->status) && $item->status == 'HADIR' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="hadir_{{ $item->pegawai_id }}">HADIR</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input required class="form-check-input" type="radio"
                                                name="status_{{ $item->pegawai_id }}" id="alpa_{{ $item->pegawai_id }}"
                                                value="ALPA"
                                                {{ isset($item->status) && $item->status == 'ALPA' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="alpa_{{ $item->pegawai_id }}">ALPA</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input required class="form-check-input" type="radio"
                                                name="status_{{ $item->pegawai_id }}" id="sakit_{{ $item->pegawai_id }}"
                                                value="SAKIT"
                                                {{ isset($item->status) && $item->status == 'SAKIT' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="sakit_{{ $item->pegawai_id }}">SAKIT</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input required class="form-check-input" type="radio"
                                                name="status_{{ $item->pegawai_id }}" id="izin_{{ $item->pegawai_id }}"
                                                value="IZIN"
                                                {{ isset($item->status) && $item->status == 'IZIN' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="izin_{{ $item->pegawai_id }}">IZIN</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input required class="form-check-input" type="radio"
                                                name="status_{{ $item->pegawai_id }}" id="cuti{{ $item->pegawai_id }}"
                                                value="CUTI"
                                                {{ isset($item->status) && $item->status == 'CUTI' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="cuti{{ $item->pegawai_id }}">CUTI</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
