<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Index</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h2>Daftar Member</h2>
        <p>Selamat datang, {{ Auth::guard('members')->user()->username }}!</p>

        <form action="{{ route('member.logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr>
                        <td>{{ $member->nama }}</td>
                        <td>{{ $member->username }}</td>
                        <td><a href="{{ route('member.show', $member->id_member) }}">Lihat Detail</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tambahkan tombol untuk menambah portofolio atau fitur lainnya di sini -->
    </div>
</body>
</html>
