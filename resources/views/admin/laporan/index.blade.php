@extends('backend.master')
@section('backend')

<div class="col-12">
              <div class="card mb-4">
                <div class="card-header"><strong>Laporan</strong><span class="small ms-1"></span></div>
                <div class="card-body">    
                  <div class="example">     
                    <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                      <form method="GET" action="{{ route('laporan.show') }}" class="mb-3">
                    <div class="row">
                        
                    <div class="col-md-4">
                   <div class="form-group">
                  <label for="tgl_awal">Tanggal Awal</label>
                <input type="date" name="tgl_awal" id="tgl_awal" class="form-control @error('tgl_awal') is-invalid @enderror">
                @error('tgl_awal')
                            <div class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                </div>
            </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="tgl_akhir">Tanggal Akhir</label>
                <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control @error('tgl_akhir') is-invalid @enderror">
                @error('tgl_akhir')
                            <div class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="submit">&nbsp;</label>
                <button type="submit" class="btn btn-success form-control">Cari</button>
            </div>
        </div>
    </div>
</form>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
@endsection