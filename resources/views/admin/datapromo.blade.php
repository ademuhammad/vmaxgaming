@extends('admin.template')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable Promo</h3>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <div class="d-flex justify-content-start ">
            <a href="{{ route('time.create') }}" class="btn btn-success">Create</a>
        </div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Promo Title</th>
                    <th>Promo Start</th>
                    <th>Promo End</th>
                    <th>Content</th>
                    <th>Images</th>
                    <th>Link Tiktok</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($time->items() as $t)
                    <tr>
                        <td>{{ $t->promotitle }}</td>
                        <td>{{ $t->starttime }}</td>
                        <td>{{ $t->endtime }}</td>
                        <td>{{ $t->content }}</td>
                        <td class="text-center">
                            <img src="{{ asset('/storage/file/'.$t->images) }}" class="rounded" style="width: 100px">
                        </td>
                        <td>{{ $t->tiktok }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('time.edit', $t->id) }}">Edit</a>
                            <form action="{{ route('time.destroy', $t->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <!-- Tombol Edit Tiktok -->
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#editTiktokModal{{ $t->id }}">
                                Mulai/Stop Tiktok
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modals -->
    @foreach ($time->items() as $t)
        <div class="modal fade" id="editTiktokModal{{ $t->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editTiktokModalLabel{{ $t->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTiktokModalLabel{{ $t->id }}">Tambah link</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form Edit Tiktok -->
                        <form action="{{ route('time.updateTiktok', $t->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="tiktok">Tiktok Link</label>
                                <input type="text" class="form-control" id="tiktok" name="tiktok"
                                    value="{{ $t->tiktok }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- End Modals -->

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@endsection

