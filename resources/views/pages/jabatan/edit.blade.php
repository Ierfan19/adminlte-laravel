<div class="p2">
    <div class="form-group">
        <label class="form-label" for="kode_jabatan">Kode Jabatan</label>
        <input class="form-control" value="{{$edit_jabatan->kode_jabatan}}" type="text" name="kode_jabatan" id="kode_jabatan">
    </div>
    <div class="form-group">
        <label class="form-label" for="nama_jabatan">Nama Jabatan</label>
        <input class="form-control" value="{{$edit_jabatan->nama_jabatan}}" type="text" name="nama_jabatan" id="nama_jabatan">
    </div>
    <div class="form-group">
        <label class="form-label" for="gapok">Gaji Pokok</label>
        <input class="form-control" value="{{$edit_jabatan->gapok}}" type="text" name="gapok" id="gapok">
    </div>
    <div class="form-group">
        <label class="form-label" for="tunjangan">Tunjangan Jabatan</label>
        <input class="form-control" value="{{$edit_jabatan->tunjangan_jabatan}}" type="text" name="tunjangan" id="tunjangan">
    </div>
    <button class="btn btn-primary" onclick="update()">Submit</button>
</div>