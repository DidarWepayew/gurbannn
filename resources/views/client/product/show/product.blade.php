<div class="text-start">
    <img src="{{ count($obj->images) > 0 ? Storage::url($obj->images[0]) : asset('img/product.jpg') }}" class="img-fluid" alt="">
    <div class="h5">
        <a href="{{ route('brands.show', $obj->brand->slug) }}" class="link-dark text-decoration-none">
            {{ $obj->brand->name }}
        </a>
        {{ $obj->name }}
        <a href="{{ route('products.compare', ['phone1' => $obj->id]) }}" class="btn btn-secondary btn-sm">
            <i class="bi-grid"></i> @lang('app.compare')
        </a>
    </div>
    <div class="mb-3">
        {!! str('<i class="bi-star-fill text-warning"></i> ')->repeat(round($obj->rating, 0)) !!}
        {!! str('<i class="bi-star text-warning"></i> ')->repeat(round(5 - $obj->rating, 0)) !!}
    </div>
    <table class="table table-responsive table-striped table-sm small">
        <tbody>
        @foreach($obj->attributeValues->groupBy('attribute.attribute_group_id') as $key => $attributeGroup)
            <tr>
                <td class="w-25">{{ $attributeGroup[0]->attribute->attributeGroup->name }}</td>
                <td>
                    <table class="table table-responsive table-striped table-sm mb-0">
                        <tbody>
                        @foreach($attributeGroup->groupBy('attribute_id') as $key => $attribute)
                            <tr>
                                <td class="w-25">{{ $attribute[0]->attribute->name }}</td>
                                <td>
                                    <table class="table table-responsive table-striped table-sm mb-0">
                                        <tbody>
                                        @foreach($attribute as $attributeValue)
                                            <tr>
                                                <td>{{ $attributeValue->name }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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