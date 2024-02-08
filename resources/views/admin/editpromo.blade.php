@extends('admin.template')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Promo</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('time.update', $time->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" required>{{ $time->content }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="promotitle" class="form-label">Promo Title</label>
                    <input type="text" class="form-control" id="promotitle" name="promotitle" value="{{ $time->promotitle }}" required>
                </div>
                <div class="mb-3">
                    <label for="images" class="form-label">Image</label>
                    <input type="file" class="form-control" id="images" name="images" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="starttime" class="form-label">Start Time</label>
                    <input type="datetime-local" class="form-control" id="starttime" name="starttime" value="{{ \Carbon\Carbon::parse($time->starttime)->format('Y-m-d\TH:i') }}" required>
                </div>
                <div class="mb-3">
                    <label for="endtime" class="form-label">End Time</label>
                    <input type="datetime-local" class="form-control" id="endtime" name="endtime" value="{{ \Carbon\Carbon::parse($time->endtime)->format('Y-m-d\TH:i') }}" required>
                </div>
                <div class="mb-3">
                    <label for="tiktok" class="form-label">TikTok</label>
                    <input type="text" class="form-control" id="tiktok" name="tiktok" value="{{ $time->tiktok }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Promo</button>
            </form>
        </div>
    </div>
@endsection

