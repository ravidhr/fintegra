<table id="table">
 <thead>
   <tr>
   <th>No</th>
   <th>Nama Barang</th>
   <th>Kategori Barang</th>
   <th>Stok Barang</th>
   <th>Harga Beli</th>
   <th>Harga Jual</th>
   <th>Supplier</th>
   <th>Action</th>
   </tr>
 </thead>
 <tbody>
   @php
   $num = (($start * 5) - 5) + 1
   @endphp
   @foreach($data_barang as $barang)
    <tr>
      <td>{{ $num++ }}</td>
      <td>{{ $barang->nm_barang }}</td>
      <td>{{ $barang->nama_kategori }}</td>
      <td>{{ $barang->stok_barang }}</td>
      <td>{{ $barang->harga_beli }}</td>
      <td>{{ $barang->harga_jual }}</td>
      <td>{{ $barang->nama_supplier }}</td>
      <td>
        <a href="{{ url('/') }}/barang/update/{{ $barang->id_barang }}" class="btn btn-primary btn-sm">Update</a>
        <a href="{{ url('/') }}/barang/delete/{{ $barang->id_barang }}" class="btn btn-danger btn-sm">Delete</a>
      </td>
    </tr>
   @endforeach
 </tbody>
 </table>
 {!! $data_barang->render() !!}
