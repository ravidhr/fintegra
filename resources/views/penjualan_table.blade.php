<table id="table">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Barang</th>
      <th>Nama Customer</th>
      <th>Tanggal Penjualan</th>
      <th>Harga</th>
      <th>Jumlah</th>
      <th>Total</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @php
    $num = (($start * 5) - 5) + 1
    @endphp

    @foreach($data_penjualan as $penjualan)
      <tr>
        <td>{{ $num++ }}</td>
        <td>{{ $penjualan->nm_barang }}</td>
        <td>{{ $penjualan->nama_customer }}</td>
        <td>{{ $penjualan->tgl_penjualan }}</td>
        <td>{{ $penjualan->harga_jual }}</td>
        <td>{{ $penjualan->jml_barang }}</td>
        <td>{{ $penjualan->harga_jual * $penjualan->jml_barang }}</td>
        <td>
          <a href="{{ url('/') }}/penjualan/delete/{{ $penjualan->id_penjualan }}" class="btn btn-danger btn-sm">Delete</a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{!! $data_penjualan->render() !!}
