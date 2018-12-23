<table id="table">
  <thead>
    <tr>
    <th>No</th>
    <th>Nama Barang</th>
    <th>Jumlah Diskon</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @php
    $num = (($start * 5) - 5) + 1
    @endphp

    @foreach($data_kupon as $kupon)
      <tr>
        <td>{{ $num++ }}</td>
        <td>{{ $kupon->nm_barang }}</td>
        <td>{{ $kupon->diskon }}</td>
        <td>{{ $kupon->tgl_mulai_berlaku }}</td>
        <td>{{ $kupon->tgl_expired }}</td>
        <td>
          <a href="{{ url('/') }}/kupon/update/{{ $kupon->id_kupon }}" class="btn btn-primary btn-sm">Update</a>
          <a href="{{ url('/') }}/kupon/delete/{{ $kupon->id_kupon }}" class="btn btn-danger btn-sm">Delete</a>
        </td>
    </tr>
    @endforeach
  </tbody>
  </table>
 {!! $data_kupon->render() !!}
