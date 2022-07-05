
                  @foreach($golongan as $row)
                    <tr>
                        <td class="text-white">{{$row->kode_golongan}}</td>
                        <td class="text-white">{{$row->nama_golongan}}</td>
                        <td class="text-white">{{ number_format((float)($row->tunjangan_suami_istri), 2) }}</td>
                        <td class="text-white">{{$row->tunjangan_anak}}{{ number_format((float)($row->tunjangan_anak), 2) }}</td>
                        <td class="text-white">{{ number_format((float)($row->uang_makan), 2) }}</td>
                        <td class="text-white">{{ number_format((float)($row->uang_lembur), 2) }}</td>
                        <td class="text-white">{{ number_format((float)($row->askes), 2) }}</td>
                        <td class="text-white"><button class="btn btn-info" onclick="show('{{$row->kode_golongan}}')">Edit</button><button class="btn btn-danger" onclick="destroy('{{$row->kode_golongan}}')">Hapus</button></td>
                    </tr>
                    @endforeach