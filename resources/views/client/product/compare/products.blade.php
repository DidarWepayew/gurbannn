<div class="text-start">
    <table class="table table-responsive table-striped table-sm small">
        <tbody>
        <tr>
            <td width="12%"></td>
            <td>
                <table class="table table-responsive table-striped table-sm mb-0">
                    <tbody>
                    <tr>
                        <td width="16%">@lang('app.images')</td>
                        <td width="28%">
                            <img src="{{ count($obj1->images) > 0 ? Storage::url($obj1->images[0]) : asset('img/product.jpg') }}" class="img-fluid" alt="">
                        </td>
                        <td width="28%">
                            @if(isset($obj2))
                                <img src="{{ count($obj2->images) > 0 ? Storage::url($obj2->images[0]) : asset('img/product.jpg') }}" class="img-fluid" alt="">
                            @endif
                        </td>
                        <td width="28%">
                            @if(isset($obj3))
                                <img src="{{ count($obj3->images) > 0 ? Storage::url($obj3->images[0]) : asset('img/product.jpg') }}" class="img-fluid" alt="">
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td width="12%"></td>
            <td>
                <table class="table table-responsive table-striped table-sm mb-0">
                    <tbody>
                    <tr>
                        <td width="16%">@lang('app.name')</td>
                        <td width="28%">
                            <div class="h6">
                                <a href="{{ route('brands.show', $obj1->brand->slug) }}" class="link-dark text-decoration-none">
                                    {{ $obj1->brand->name }}
                                </a>
                                <a href="{{ route('products.show', $obj1->slug) }}" class="link-primary text-decoration-none">
                                    {{ $obj1->name }}
                                </a>
                            </div>
                            <div>
                                {!! str('<i class="bi-star-fill text-warning"></i> ')->repeat(round($obj1->rating, 0)) !!}
                                {!! str('<i class="bi-star text-warning"></i> ')->repeat(round(5 - $obj1->rating, 0)) !!}
                            </div>
                        </td>
                        <td width="28%">
                            @if(isset($obj2))
                                <div class="h6">
                                    <a href="{{ route('brands.show', $obj2->brand->slug) }}" class="link-dark text-decoration-none">
                                        {{ $obj2->brand->name }}
                                    </a>
                                    <a href="{{ route('products.show', $obj2->slug) }}" class="link-primary text-decoration-none">
                                        {{ $obj2->name }}
                                    </a>
                                </div>
                                <div>
                                    {!! str('<i class="bi-star-fill text-warning"></i> ')->repeat(round($obj2->rating, 0)) !!}
                                    {!! str('<i class="bi-star text-warning"></i> ')->repeat(round(5 - $obj2->rating, 0)) !!}
                                </div>
                            @else
                                <form action="{{ route('products.compare') }}">
                                    <input type="hidden" name="phone1" value="{{ $obj1->id  }}" required>
                                    <input type="hidden" name="phone3" value="{{ isset($obj3) ? $obj3->id : null  }}" required>

                                    <div class="mb-2">
                                        <label for="phone2" class="form-label fw-semibold mb-1">
                                            @lang('app.product') ID
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control form-control-sm @error('phone2') is-invalid @enderror" name="phone2" id="phone2" value="{{ old('phone2') }}" required>
                                        @error('phone2')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-secondary btn-sm w-100">
                                        <i class="bi-grid"></i> @lang('app.compare')
                                    </button>
                                </form>
                            @endif
                        </td>
                        <td width="28%">
                            @if(isset($obj3))
                                <div class="h6">
                                    <a href="{{ route('brands.show', $obj3->brand->slug) }}" class="link-dark text-decoration-none">
                                        {{ $obj3->brand->name }}
                                    </a>
                                    <a href="{{ route('products.show', $obj3->slug) }}" class="link-primary text-decoration-none">
                                        {{ $obj3->name }}
                                    </a>
                                </div>
                                <div>
                                    {!! str('<i class="bi-star-fill text-warning"></i> ')->repeat(round($obj3->rating, 0)) !!}
                                    {!! str('<i class="bi-star text-warning"></i> ')->repeat(round(5 - $obj3->rating, 0)) !!}
                                </div>
                            @else
                                <form action="{{ route('products.compare') }}">
                                    <input type="hidden" name="phone1" value="{{ $obj1->id  }}" required>
                                    <input type="hidden" name="phone2" value="{{ isset($obj2) ? $obj2->id : null  }}" required>

                                    <div class="mb-2">
                                        <label for="phone3" class="form-label fw-semibold mb-1">
                                            @lang('app.product') ID
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control form-control-sm @error('phone3') is-invalid @enderror" name="phone3" id="phone3" value="{{ old('phone3') }}" required>
                                        @error('phone3')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-secondary btn-sm w-100">
                                        <i class="bi-grid"></i> @lang('app.compare')
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        @foreach($attributeGroups as $attributeGroup)
            <tr>
                <td width="12%">{{ $attributeGroup->name }}</td>
                <td>
                    <table class="table table-responsive table-striped table-sm mb-0">
                        <tbody>
                        @foreach($attributeGroup->attributes as $attribute)
                            <tr>
                                <td width="16%">{{ $attribute->name }}</td>
                                <td width="28%">
                                    <table class="table table-responsive table-striped table-sm mb-0">
                                        <tbody>
                                        @foreach($attribute->attributeValues as $attributeValue)
                                            @if($obj1->attributeValues->contains($attributeValue))
                                                <tr>
                                                    <td>{{ $attributeValue->name }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </td>
                                <td width="28%">
                                    @if(isset($obj2))
                                        <table class="table table-responsive table-striped table-sm mb-0">
                                            <tbody>
                                            @foreach($attribute->attributeValues as $attributeValue)
                                                @if($obj2->attributeValues->contains($attributeValue))
                                                    <tr>
                                                        <td>{{ $attributeValue->name }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </td>
                                <td width="28%">
                                    @if(isset($obj3))
                                        <table class="table table-responsive table-striped table-sm mb-0">
                                            <tbody>
                                            @foreach($attribute->attributeValues as $attributeValue)
                                                @if($obj3->attributeValues->contains($attributeValue))
                                                    <tr>
                                                        <td>{{ $attributeValue->name }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>