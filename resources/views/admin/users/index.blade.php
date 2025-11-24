@extends('layouts.app')

@section('content')
    <div class="py-3">
        <div class="admin-hero mb-3">
            <div class="d-flex justify-content-between align-items-start position-relative z-1">
                <div>
                    <span class="section-title text-light">Admin</span>
                    <h4 class="fw-bold mt-1 text-white">Kelola Pengguna</h4>
                    <p class="text-light text-opacity-75 mb-0">Hapus akun terdaftar yang melanggar kebijakan. Admin tidak dapat menghapus akun sendiri.</p>
                </div>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-light">Kembali ke ringkasan</a>
            </div>
        </div>
        <div class="admin-table-card p-3">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Terdaftar</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td class="fw-semibold">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><span class="badge text-bg-light text-uppercase">{{ $user->role }}</span></td>
                                <td>{{ $user->created_at->format('d M Y') }}</td>
                                <td class="text-end">
                                    @if ($user->id === auth()->id())
                                        <span class="text-body-secondary small">Akun Anda</span>
                                    @else
                                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="d-inline" onsubmit="return confirm('Hapus pengguna ini? Tindakan ini tidak dapat dibatalkan.');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-body-secondary">Belum ada pengguna.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-2">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
