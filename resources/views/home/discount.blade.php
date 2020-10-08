@php
    $discounts=App\Discount::all();
@endphp
<div class="card">
  <div class="card-header">
    Discount
  </div>
  <ul class="list-group list-group-flush">
      <li class="list-group-item">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="discount" id="discount-0" value="0" checked v-on:change="discountChange(0,0)">
                <label class="form-check-label" for="discount-0">
                    None
                </label>
            </div>
        </li>
      @foreach ($discounts as $discount)
        <li class="list-group-item">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="discount" id="discount-{{ $discount->id }}" value="{{ $discount->id }}" v-on:change="discountChange({{ $discount->id }},{{ $discount->percent }})">
                <label class="form-check-label" for="discount-{{ $discount->id }}">
                    {{ $discount->name }} ( {{ $discount->percent }}% )
                </label>
            </div>
        </li>
      @endforeach
  </ul>
</div>
