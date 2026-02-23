@extends('admin.layouts.app')

@section('title', 'Daftar Kotak Masuk')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->message }}</td>
        
                <td>
                    <form action="{{ route('admin.kotak_masuk.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kontak ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $contacts->links() }}

    <!-- Reply Modal -->
    <div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="replyModalLabel">Balas Pesan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="replyForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="contactName" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="contactName" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="contactEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="contactEmail" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="originalMessage" class="form-label">Pesan Asli</label>
                            <textarea class="form-control" id="originalMessage" rows="3" readonly></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="replyMessage" class="form-label">Pesan Balasan</label>
                            <textarea class="form-control" id="replyMessage" name="reply_message" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Kirim Balasan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openReplyModal(id, name, email, message) {
            document.getElementById('contactName').value = name;
            document.getElementById('contactEmail').value = email;
            document.getElementById('originalMessage').value = message;
            document.getElementById('replyForm').action = '/admin/kotak_masuk/' + id + '/reply';
            new bootstrap.Modal(document.getElementById('replyModal')).show();
        }
    </script>
@endsection
