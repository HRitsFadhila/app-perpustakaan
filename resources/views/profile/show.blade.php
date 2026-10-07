<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Saya</title>
    <style>
        body { font-family: sans-serif; margin: 40px; max-width: 500px; }
        table { border-collapse: collapse; width: 100%; margin-top: 16px; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { width: 160px; background: #f3f4f6; }
        .alert-success { background: #d1fae5; color: #065f46; padding: 10px 14px; border-radius: 4px; margin-bottom: 16px; }
        .alert-error { background: #fee2e2; color: #991b1b; padding: 10px 14px; border-radius: 4px; margin-bottom: 16px; }
        .form-group { margin-bottom: 12px; }
        .form-group label { display: block; margin-bottom: 4px; font-weight: bold; }
        .form-group input { width: 100%; padding: 6px 10px; border: 1px solid #ccc; border-radius: 4px; }
        .error-text { color: #991b1b; font-size: 13px; margin-top: 4px; }
        .btn { display: inline-block; padding: 6px 14px; background: #2563eb; color: #fff; text-decoration: none; border-radius: 4px; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Profil Saya</h1>

    @if (session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <table>
        <tr>
            <th>Nama</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Role</th>
            <td>{{ ucfirst($user->role) }}</td>
        </tr>
    </table>

    <h2 style="margin-top: 30px;">Ganti Password</h2>

    <form action="{{ route('profil.password') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="password_lama">Password Lama</label>
            <input type="password" name="password_lama" id="password_lama" required>
            @error('password_lama')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_baru">Password Baru</label>
            <input type="password" name="password_baru" id="password_baru" required>
            @error('password_baru')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_baru_confirmation">Konfirmasi Password Baru</label>
            <input type="password" name="password_baru_confirmation" id="password_baru_confirmation" required>
        </div>

        <button type="submit" class="btn">Ubah Password</button>
    </form>
</body>
</html>
