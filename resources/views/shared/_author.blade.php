<span class="text-muted">{{ $lable . ' ' . $model->created_date }}</span>
<div class="media-body d-flex justify-center">
    <a href="{{ $model->user->url }}" class="pe-2">
        <img src="{{ $model->user->avatar }}" alt="" srcset=""></a>
    <a href="{{ $model->user->url }}">{{ $model->user->name }}</a>
</div>
