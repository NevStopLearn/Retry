<form action="{{ route('statuses.store') }}" method="POST">
    @include('shared._errors')
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">标题：</label>
        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
    </div>
    <div class="form-group">
        <label for="title">内容：</label>
        @include('shared._ueditor')
    </div>
    <div class="text-right">
        <button type="submit" class="btn btn-primary mt-3">发布</button>
    </div>
</form>