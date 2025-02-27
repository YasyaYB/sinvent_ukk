@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="{{ route('kategori.create') }}" class="btn btn-md btn-success">TAMBAH KATEGORI</a>
                            <div class="w-50">
                                <form action="{{ route('kategori.index') }}" method="GET">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search for ..." value="{{ request()->query('search') }}">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-outline-secondary">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        @if(session('Success'))
                            <div class="alert alert-success">
                                {{ session('Success') }}
                            </div>
                        @endif

                        @if(session('Gagal'))
                            <div class="alert alert-danger">
                                {{ session('Gagal') }}
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>DESKRIPSI</th>
                                    <th>KATEGORI</th>
                                    <th style="width: 15%">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($rsetKategori as $rowkategori)
                                    <tr>
                                        <td>{{ $rowkategori->id }}</td>
                                        <td>{{ $rowkategori->deskripsi }}</td>
                                        <td>{{ $rowkategori->kategori_desc }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kategori.destroy', $rowkategori->id) }}" method="POST">
                                                <a href="{{ route('kategori.show', $rowkategori->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('kategori.edit', $rowkategori->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Data Barang belum tersedia</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- {{ $siswa->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
