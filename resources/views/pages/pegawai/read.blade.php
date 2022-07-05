
                  @foreach($pegawai as $row)
                    <tr>
                        <td class="text-white">{{$row->nip}}</td>
                        <td class="text-white">{{$row->nama_pegawai}}</td>
                        <td class="text-white">{{$row->kode_jabatan}}</td>
                        <td class="text-white">{{$row->kode_golongan}}</td>
                        <td class="text-white">{{$row->status}}</td>
                        <td class="text-white">{{$row->jumlah_anak}}</td>
                        <td class="text-white"><button class="btn btn-info" onclick="show('{{$row->nip}}')">Edit</button><button class="btn btn-danger" onclick="destroy('{{$row->nip}}')">Hapus</button></td>
                    </tr>
                    @endforeach