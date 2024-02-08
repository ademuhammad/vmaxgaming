@extends('admin.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Promo</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('promo.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="promotitle" class="form-label">Promo Title</label>
                    <input type="text" class="form-control" id="promotitle" name="promotitle" required>
                </div>
                <div class="mb-3">
                    <label for="images" class="form-label">Image</label>
                    <input type="file" class="form-control" id="images" name="images" accept="image/*" required>
                </div>
                <div class="mb-3">
                    <label for="starttime" class="form-label">Start Time</label>
                    <input type="datetime-local" class="form-control" id="starttime" name="starttime" required>
                </div>
                <div class="mb-3">
                    <label for="endtime" class="form-label">End Time</label>
                    <input type="datetime-local" class="form-control" id="endtime" name="endtime" required>
                </div>
                <div class="mb-3">
                    <label for="tiktok" class="form-label">TikTok</label>
                    <input type="text" class="form-control" id="tiktok" name="tiktok" required>
                </div>
                <button type="submit" class="btn btn-primary">Create Promo</button>
            </form>
        </div>
    </div>
@endsection
