@extends('admin.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Wa Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->wanumber }}</td>
                            <td>
                                <a href="javascript:void(0)" id="modal-edit" data-id="{{ $d->id }}"
                                    class="btn btn-primary btn-sm">EDIT</a>
                                <form action="{{ route('register.destroy', $d->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <button class="btn btn-success" onclick="sendToWhatsApp('{{ $d->wanumber }}', '{{ $d->name }}')">Send to WhatsApp</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Button to Send Broadcast to All Numbers -->
        <div class="mt-3">
            <button class="btn btn-success" onclick="sendBroadcastToWhatsApp()">Send Broadcast to All</button>
        </div>
    </div>

    @include('admin.modaledit-registes')

    <script>
        function sendToWhatsApp(phoneNumber, name) {
            const message = encodeURIComponent(`Hi ${name}, your WA Number is ${phoneNumber}`);
            const whatsappLink = `https://api.whatsapp.com/send?phone=+${phoneNumber}&text=${message}`;
            window.open(whatsappLink, '_blank');
        }

        function sendBroadcastToWhatsApp() {
            const allNumbers = {!! json_encode($data->pluck('wanumber')) !!};
            const message = encodeURIComponent("Your broadcast message here");
            const whatsappLink = `https://api.whatsapp.com/send?text=${message}&phones=${allNumbers.join(',')}`;
            window.open(whatsappLink, '_blank');
        }
    </script>
@endsection
