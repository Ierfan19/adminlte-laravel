<div class="p2">
    
<div class="form-group">
        <label class="form-label" for="kode_golongan">Kode Golongan</label>
        <input class="form-control" value="{{$editgolongan->kode_golongan}}" type="text" name="kode_golongan" id="kode_golongan">
    </div>
    <div class="form-group">
        <label class="form-label" for="nama_golongan">Nama Golongan</label>
        <input class="form-control" value="{{$editgolongan->nama_golongan}}" type="text" name="nama_golongan" id="nama_golongan">
    </div>
    <div class="form-group">
        <label class="form-label" for="tunjangan_suami_istri">Tunjangan Suami Istri</label>
        <input class="form-control" value="{{$editgolongan->tunjangan_suami_istri}}" type="text" name="tunjangan_suami_istri" id="tunjangan_suami_istri">
    </div>
    <div class="form-group">
        <label class="form-label" for="tunjangan_anak">Tunjangan Anak</label>
        <input class="form-control" value="{{$editgolongan->tunjangan_anak}}" type="text" name="tunjangan_anak" id="tunjangan_anak">
    </div>
    <div class="form-group">
        <label class="form-label" for="uang_makan">Uang Makan</label>
        <input class="form-control" value="{{$editgolongan->uang_makan}}" type="text" name="uang_makan" id="uang_makan">
    </div>
    <div class="form-group">
        <label class="form-label" for="uang_lembur">Uang Lembur</label>
        <input class="form-control" value="{{$editgolongan->uang_lembur}}" type="text" name="uang_lembur" id="uang_lembur">
    </div>
    <div class="form-group">
        <label class="form-label" for="askes">Asuransi Kesehatan</label>
        <input class="form-control" value="{{$editgolongan->askes}}" type="text" name="askes" id="askes">
    </div>
    <button class="btn btn-primary" onclick="update()">Submit</button>
</div>