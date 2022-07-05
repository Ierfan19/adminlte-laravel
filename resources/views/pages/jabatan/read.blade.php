
                  @foreach($jabatan as $row)
                    <tr>
                        <td class="text-white">{{$row->kode_jabatan}}</td>
                        <td class="text-white">{{$row->nama_jabatan}}</td>
                        <td class="text-white">{{$row->gapok}}</td>
                        <td class="text-white">{{$row->tunjangan_jabatan}}</td>
                        <td class="text-white"><button class="btn btn-info" onclick="show('{{$row->kode_jabatan}}')">Edit</button><button class="btn btn-danger" onclick="destroy('{{$row->kode_jabatan}}')">Hapus</button></td>
                    </tr>
                    @endforeach