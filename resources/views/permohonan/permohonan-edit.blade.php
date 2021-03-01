@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-purple">
                <div class="card-body">
                    <h3>Form <strong class="text-success">Permohonan</strong></h3>
                    <hr>        
                    <form action="{{ route('permohonans.update', $permohonan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="row form-group">
                            <div class="col-md-4 text-right">
                                <label for="nomor_permohonan" class="control-label col-form-label">Nomor Permohonan</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $permohonan->nomor_permohonan }}" type="text" class="form-control" id="nomor_permohonan" name="nomor_permohonan" placeholder="Nomor Permohonan...">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4 text-right">
                                <label for="judul_permohonan" class="control-label col-form-label">Judul Permohonan</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $permohonan->judul_permohonan }}" type="text" class="form-control" id="judul_permohonan" name="judul_permohonan" placeholder="Judul Permohonan...">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4 text-right">
                                <label for="jumlah_permohonan" class="control-label col-form-label">Jumlah Permohonan</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" class="form-control" value="{{ $permohonan->jumlah_permohonan }}" id="jumlah_permohonan" name="jumlah_permohonan" placeholder="Jumlah Permohonan...">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4 text-right">
                                <label for="bank_id" class="control-label col-form-label">Bank</label>
                            </div>
                            <div class="col-md-8">
                                <select type="text" value="{{ $permohonan->bank->nama_bank }}" class="custom-select" id="bank_id" name="bank_id" placeholder="Jenis Bank...">
                                    @foreach ($banks as $bank)
                                    <option value="{{ $bank->id }}">{{ $bank->nama_bank }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4 text-right">
                                <label for="tanggal_permohonan" class="control-label col-form-label">Tanggal Permohonan</label>
                            </div>
                            <div class="col-md-8">
                                <input type="date" class="form-control" id="tanggal_permohonan" name="tanggal_permohonan" value = "{{ $permohonan->tanggal_permohonan }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4 text-right">
                                <label for="note" class="control-label col-form-label">Note</label>
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control" name="note" id="note" rows="3">{{ $permohonan->note }}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4 text-right">
                                <label for="status_berkas" class="control-label col-form-label">Status Berkas</label>
                            </div>
                            <div class="col-md-8">
                                <select type="text" value="{{ $permohonan->status_berkas }}" class="custom-select" id="status_berkas" name="status_berkas" placeholder="Jenis Bank...">
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4 text-right">
                                <label for="status_rilis" class="control-label col-form-label">Status Rilis</label>
                            </div>
                            <div class="col-md-8">
                                <select type="text" value="{{ $permohonan->status_rilis }}" class="custom-select" id="status_rilis" name="status_rilis" placeholder="Jenis Bank...">
                                    <option value="pending">Pending</option>
                                    <option value="rilis">Rilis</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="text-right">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection