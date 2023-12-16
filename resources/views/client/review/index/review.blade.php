<div class="text-bg-dark mb-3">
    <div class="fs-3">@lang('app.reviews')</div>
</div>
<div class="text-start">
    @foreach($objs as $review)
        <div class="border rounded p-2 p-sm-3 mb-1 mb-sm-2">
            <div class="fw-semibold mb-0 mb-sm-1">
                <a href="{{ route('products.show', $review->product->slug) }}" class="link-primary text-decoration-none">
                    {{ $review->product->name }}
                </a>
            </div>
            <div>
                <i class="bi-person-circle text-secondary"></i> {{ $review->user->name }}
            </div>
            <div class="d-flex justify-content-between align-items-center mt-0 mt-sm-1">
                <div>
                    {!! str('<i class="bi-star-fill text-warning"></i> ')->repeat($review->rating) !!}
                    {!! str('<i class="bi-star text-warning"></i> ')->repeat(5 - $review->rating) !!}
                    <span class="badge text-bg-{{ $review->statusColor() }}">
                        <i class="bi-{{ $review->statusIcon() }}"></i> {{ $review->status() }}
                    </span>
                </div>
                <div class="small">
                    {{ $review->created_at->format('d.m.Y H:i:s') }}
                </div>
            </div>
            <div class="mt-0 mt-sm-1">
                {{ $review->comment }}
            </div>
            @if(isset($review->reply))
                <div class="ms-3 ms-sm-4 mt-0 mt-sm-1 text-secondary fst-italic">
                    <i class="bi-reply-fill"></i> {{ $review->reply }}
                </div>
            @endif
        </div>
    @endforeach
</div>