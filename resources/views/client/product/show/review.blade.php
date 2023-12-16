<div class="text-bg-dark my-3">
    <div class="fs-3">@lang('app.reviews')</div>
</div>
<div class="text-start">
    @foreach($obj->reviews as $review)
        <div class="border rounded p-2 p-sm-3 mb-1 mb-sm-2">
            <div>
                <i class="bi-person-circle text-secondary"></i> {{ $review->user->name }}
            </div>
            <div class="d-flex justify-content-between align-items-center mt-0 mt-sm-1">
                <div>
                    {!! str('<i class="bi-star-fill text-warning"></i> ')->repeat($review->rating) !!}
                    {!! str('<i class="bi-star text-warning"></i> ')->repeat(5 - $review->rating) !!}
                    @auth
                        @if(auth()->user()['is_admin'] or auth()->id() == $review->user_id)
                            <span class="badge text-bg-{{ $review->statusColor() }}">
                                <i class="bi-{{ $review->statusIcon() }}"></i> {{ $review->status() }}
                            </span>
                        @endif
                    @endauth
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

    @auth
        <div class="border rounded p-2 p-sm-3">
            <form action="{{ route('reviews.store') }}" method="post">
                @csrf
                @honeypot

                <input type="hidden" name="product_id" value="{{ $obj->id }}" required>

                <div class="fs-4 mb-3" id="stars">
                    <a href="#" class="link-warning"><i class="bi-star"></i></a>
                    <a href="#" class="link-warning"><i class="bi-star"></i></a>
                    <a href="#" class="link-warning"><i class="bi-star"></i></a>
                    <a href="#" class="link-warning"><i class="bi-star"></i></a>
                    <a href="#" class="link-warning"><i class="bi-star"></i></a>
                </div>

                <div class="d-none mb-3">
                    <label for="rating" class="form-label fw-semibold">
                        @lang('app.rating')
                        <span class="text-danger">*</span>
                    </label>
                    <input type="number" min="0" max="5" class="form-control @error('rating') is-invalid @enderror" name="rating" id="rating" value="0" required>
                    @error('rating')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="comment" class="form-label fw-semibold">
                        @lang('app.comment')
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control @error('comment') is-invalid @enderror" name="comment" id="comment" value="{{ old('comment') }}" required>
                    @error('comment')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    @lang('app.review')
                </button>
            </form>
        </div>
    @else
        <a href="{{ route('login') }}" class="btn btn-secondary w-100">
            @lang('app.login')
        </a>
    @endauth
</div>

<script>
    // Get star elements
    const stars = document.querySelectorAll('#stars a');
    const ratingInput = document.getElementById('rating');

    // Add click event listeners to stars
    stars.forEach((star, index) => {
        star.addEventListener('click', () => {
            event.preventDefault();
            const ratingValue = index + 1; // Rating value is 1 to 5
            ratingInput.value = ratingValue; // Update the hidden input value

            // Update star appearance
            stars.forEach((s, i) => {
                if (i < ratingValue) {
                    s.firstElementChild.classList.add('bi-star-fill');
                    s.firstElementChild.classList.remove('bi-star');
                } else {
                    s.firstElementChild.classList.add('bi-star');
                    s.firstElementChild.classList.remove('bi-star-fill');
                }
            });
        });
    });
</script>